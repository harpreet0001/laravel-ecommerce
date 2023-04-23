<?php

namespace App\Http\Controllers\Front;
use Mail;
use Auth;
use Hash;
use App\User;
use App\Models\Card;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Product;
use App\Mail\OrderPlaced;
use App\Models\OrderItem;
use App\Models\Newsletter;
use App\Models\Addressbook;
use Illuminate\Http\Request;
use App\Models\ShippingZone;
use App\Models\ShippingMethod;
use App\Traits\NewsletterTrait;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CheckoutController extends Controller
{
	  use AuthenticatesUsers,NewsletterTrait; //comment:for checkout login using default laravel login() method providing by this trait

    public $path ='front.modules.main.cart-checkout.';

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->updateCoupon();
            return $next($request);
        });
        
    }

    protected function account_billing_rules()
    {
       return [         

              "firstname"         => ['required', 'string','regex:/^[\pL\s\-]+$/','max:255'],
              "lastname"          => ['required', 'string','regex:/^[\pL\s\-]+$/','max:255'],
              "email"             => ['required','string','email','max:255','unique:users,email'],
              "contact"           => ['required', 'string','min:9','max:15'],
              "password"          => ['required', 'string','min:5','max:255','confirmed'],
              "company"           => ['nullable', 'string','max:255'],
              "address_1"         => ['required', 'string','max:1000'],
              "address_2"         => ['nullable', 'string','max:1000'],
              "city"              => ['required', 'string','max:255'],
              "postcode"          => ['required', 'string','max:255'],
              "countryId"         => ['required','string','exists:countries,_id'],
              "stateId"           => ['required','string','exists:states,_id'],
              "newsletter"        => ['nullable','in:1'],
              "shipping_address"  => ['nullable','in:0,1'],
              "agree"             => ['required','in:1']
          ];
    } 

    protected function address_rules()
    {
         return [         

              "firstname"         => ['required', 'string','regex:/^[\pL\s\-]+$/','max:255'],
              "lastname"          => ['required', 'string','regex:/^[\pL\s\-]+$/','max:255'],
              "company"           => ['nullable', 'string','max:255'],
              "address_1"         => ['required', 'string','max:1000'],
              "address_2"         => ['nullable', 'string','max:1000'],
              "city"              => ['required', 'string','max:255'],
              "postcode"          => ['required', 'string','max:255'],
              "countryId"         => ['required','string','exists:countries,_id'],
              "stateId"           => ['required','string','exists:states,_id'],
          ];
    }

    public function checkout_index(){  

      if (Cart::instance('default')->count() == 0){ //comment:(check and redirect if cart is empty or not)

       	   return redirect()->route('cart.index');
      }

      //<!--conditions-->
      //comment:condition when there is no longer available to purchase
      if($this->productsAreNoLongerAvailable()){
            return redirect()->route('cart.index')->with('error','Sorry! One of the items in your cart is no longer available.');
      }
      //comment:condition when there are items purchase quantity not available
      if(!$this->productsPurchaseLimitAvailable()){
            return redirect()->route('cart.index')->with('error','Sorry! One of the items not under min max purchasing count.');
      }
      //<!--conditions-->  
      
      return view($this->path.'checkout');
    }

    protected function sendLoginResponse(Request $request) //comment:overriding Trait AuthenticatesUsers default method to send login response
    {
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);
        return response()->json(['redirect' => route('checkout.index') ,'status'=>'1'],200);
    }

   public function checkout_register()  //comment:get acoount&billing address from
   {
   	  return view('form.account_billing')->render();
   }

   public function checkout_register_save(Request $request)  //comment:save account and billing address details
   {
        $order              = session()->get('order');
   	    $data               = $this->validate($request,$this->account_billing_rules());
        $userData           = [
                                'firstname' => $data['firstname'],
                                'lastname'  => $data['lastname'],
                                'email'     => $data['email'],
                                'password'  => Hash::make($data['password']),
                                'contact'   => $data['contact'],
                                'role'      => 'customer',
                                'loggedin'  => 0,
                                'active'    => 1,
                                'delete'    => 0
                              ];
        $user               = User::create($userData);
        if($request->has('newsletter') &&  $request->newsletter == Newsletter::$subscribe){
            $this->create_newsletter_subscription($user->email);
        }

        $addressbookData    = [
                                'firstname' => $data['firstname'],
                                'lastname'  => $data['lastname'],
                                'company'   => $data['company'],
                                'address_1' => $data['address_1'],
                                'address_2' => $data['address_2'],
                                'city'      => $data['city'],
                                'postcode'  => $data['postcode'],
                                'countryId' => $data['countryId'],
                                'stateId'   => $data['stateId'],
                                'default'   => $data['default'] ?? '0',
                                'userId'    => $user->_id,
                                'phone'     => $data['contact']
                              ];

        $addressbook        =  Addressbook::create($addressbookData); 
        $order['billingId'] = $addressbook->_id;
       
        if($request->has('shipping_address') && $request->shipping_address == '1')
        {
           $order['shippingId'] = $addressbook->_id;
        }
        else{

            unset($order['shippingId']);
        } 
         session()->put('order',$order);//comment:set order session

        Auth::loginUsingId($user->_id, TRUE);

        return response()->json(['redirect' => route('checkout.index') ,'status'=>'1'],200);                  
   }

   public function payment_address() //comment:create new billing address or elect option for billing address
   {

       $addressbooks = Addressbook::where('userId',auth()->user()->_id)->get();
       return view('form.payment_address',compact('addressbooks'))->render();
   }

   public function shipping_address() //comment:create new shipping address or elect option for shipping address
   {
       $addressbooks = Addressbook::where('userId',auth()->user()->_id)->get();
       return view('form.shipping_address',compact('addressbooks'))->render();
   }

   public function shipping_method()  //comment:get shipping method form
   {
       $orderSession = session()->get('order');
       $shippingId = $orderSession['shippingId'];
       $shippingAddress = Addressbook::where('_id',$shippingId)->first();
       if(!is_null($shippingAddress))
       {
          $shippingzone    = getShippingZone($shippingAddress->countryId);//comment:helper function to get shippingzones acc to country
          $shippingmethods = getShippingMethods($shippingzone->_id);//comment:helper function to get shippingmethod for shippingzone
          return view('form.shipping_method',compact('shippingzone','shippingmethods'))->render();
       }
       else
       {
           return response()->json(['error' => 'Invalid shipping Address','status'=>0],404);
       }
   }

   public function payment_method() //comment:get payment method form
   {
      return view('form.payment_method')->render();
   }

   public function checkout_confirm(Request $request) //comment:get cart details and card detail form
   {
      
      return view('form.checkout_confirm')->render();
   }

   public function payment_address_save(Request $request) //comment:save billing address details
   {
          $order = session()->get('order');
          if($request->payment_address == 'existing'){
               
               if(is_null($request->addressId) && empty($request->addressId)){
                    throw ValidationException::withMessages(['addressId' => 'please select valid address or create new']);
               }

               $order['billingId'] = $request->addressId;
               session()->put('order',$order);session()->put('order',$order);

               return response()->json([
                                         'payment_address'      => 'existing',
                                         'status'               => 1
                                      ],200);
               
          }

           if($request->payment_address == 'new'){

              $data = $this->validate($request,$this->address_rules());

              $addressbookData  =  [
                              
                                    'firstname' => $data['firstname'],
                                    'lastname'  => $data['lastname'],
                                    'company'   => $data['company'],
                                    'address_1' => $data['address_1'],
                                    'address_2' => $data['address_2'],
                                    'city'      => $data['city'],
                                    'postcode'  => $data['postcode'],
                                    'countryId' => $data['countryId'],
                                    'stateId'   => $data['stateId'],
                                    'default'   => $data['default'] ?? '0',
                                    'userId'    => auth()->user()->_id
                                  ];

              $addressbook      = Addressbook::create($addressbookData); 
              $addressbooks     = Addressbook::where('userId',auth()->user()->_id)->get();

              $order['billingId'] = $addressbook->_id;
              session()->put('order',$order);//comment:set order session

              return response()->json([
                                         'payment_address_html' => view('form.payment_address',compact('addressbooks'))->render(),
                                         'payment_address'      => 'new',
                                         'status'               => 1
                                      ],200);
          }
   }


   public function shipping_address_save(Request $request) //comment:save shipping address details
   {

      $order = session()->get('order');

      if($request->shipping_address == 'existing'){

           if(is_null($request->addressId) && empty($request->addressId))
           {
                throw ValidationException::withMessages(['addressId' => 'please select valid address or create new']);
           }

           $order['shippingId'] = $request->addressId;
           session()->put('order',$order);//comment:set order session
           return response()->json([
                                     'shipping_address'      => 'existing',
                                     'status'               => 1
                                  ],200);
           
      }

      if($request->shipping_address == 'new'){

          $data             = $this->validate($request,$this->address_rules());
          $addressbookData  =  [
                          
                                'firstname' => $data['firstname'],
                                'lastname'  => $data['lastname'],
                                'company'   => $data['company'],
                                'address_1' => $data['address_1'],
                                'address_2' => $data['address_2'],
                                'city'      => $data['city'],
                                'postcode'  => $data['postcode'],
                                'countryId' => $data['countryId'],
                                'stateId'   => $data['stateId'],
                                'default'   => $data['default'] ?? '0',
                                'userId'    => auth()->user()->_id
                              ];

          $addressbook      = Addressbook::create($addressbookData); 
          $addressbooks     = Addressbook::where('userId',auth()->user()->_id)->get();

           $order['shippingId'] = $request->addressId;
           session()->put('order',$order);//comment:set order session

          return response()->json([
                                     'shipping_address_html' => view('form.shipping_address',compact('addressbooks'))->render(),
                                     'shipping_address'      => 'new',
                                     'status'                => 1
                                  ],200); 
      }
   }

   public function shipping_method_save(Request $request) //comment:save shipping method details
   {  

        $order                          = session()->get('order');
        $order['shippingMethodComment'] = $request->shipping_method_comment;
        if($request->has('shipping_method'))
        {
            $shippingmethod  = ShippingMethod::select('id','shippingzoneId','methodmodule','methodname')
                                        ->where('_id',base64_decode($request->shipping_method))
                                        ->first();
            if(is_null($shippingmethod))
            {
              throw ValidationException::withMessages(['shipping_method' => 'shipping method doesnot exist']);
            }                            
            $order['shippingMethodDetails'] = $shippingmethod->toArray();
            session()->put('order',$order); //comment::set order session
            return response()->json(['shipping_method' => $request->shipping_method,'status' => 1],200);
        }
        else
        {
          throw ValidationException::withMessages(['shipping_method' => 'please select valid shipping method']);
        }
        
   }

   public function payment_method_save(Request $request) //comment:save payment method details
   {
        $this->validate($request,[ 'agree' => ['required','in:1'] ]);

        $order                         = session()->get('order');
        $order['paymentMethod']        = $request->payment_method;
        $order['paymentMethodComment'] = $request->payment_method_comment;
        session()->put('order',$order);//comment::set order session

        return response()->json([
                                   'payment_method'      => $request->payment_method,
                                   'status'               => 1
                                ],200);
   }


   public function order_placed(Request $request)  //comment:save order details
   {
        $card_data = $this->validate($request,[

                "cc_owner"             => ['required','string','min:2','max:200'],
                "cc_number"            => ['required','numeric','digits:16'],
                "cc_expire_date_month" => ['required','digits_between:1,12'],
                "cc_expire_date_year"  => ['required','digits:4'],
                "cc_cvv2"              => ['required','numeric','digits:3']
        ]);
       
        /*1 jan 2022*/
        $order['card_data'] = $card_data;

         return response()->json([
                                 'success'  => 'Your are close to place a order',
                                 'status'   => 1,
                                 'redirect' =>route('checkout.order_payment')
                               ],200);  
         /*1 jan 2022 end*/


        $card         = $this->addToCardsTables($card_data);
        $order_detail = $this->addToOrdersTables($card);
        //<!--Mail send-->//
        Mail::send(new OrderPlaced($order_detail));
        //<!--Decrease product quantity-->//
        $this->decreaseProductsQuantities();
        session()->forget('order'); //forget order session
        Cart::destroy();      
         //<!--Decrease coupon quantity if -->//
        $this->decreaseCouponQuantity();
        session()->forget('coupon-'.$_SERVER['REMOTE_ADDR']); //forget coupon session

        return response()->json([
                                 'success'  => 'Your order is successfully completed',
                                 'status'   => 1,
                                 'redirect' => route('order.success')
                               ],200);            
   }

   protected function addToCardsTables($card_data)
   {
      $card = Card::where(['_id' => auth()->user()->_id, 'cc_number' => $card_data['cc_number']])->first();

      if(!is_null($card)){
            $card = tap($card)->update($card_data);
      }else{

           foreach ($card_data as $key => $value) {
             
              $card_data[$key] = base64_encode($value);
           }

            $card_data['userId']  = auth()->user()->_id;
            $card_data['deleted'] = 0;
            $card                 = Card::create($card_data);
      }

      return $card;
   }

   protected function addToOrdersTables($card)
   {
        $currentOrder = Order::orderBy('unique_order_id','desc')->first();
        $unqueID      = isset($currentOrder->unique_order_id) ? ($currentOrder->unique_order_id + 1) : 310500;

        $order            = session()->get('order');
        $billing_address  = Addressbook::where('_id',$order['billingId'])->first();
        $shipping_address = Addressbook::where('_id',$order['shippingId'])->first();
        $result           = getNumbers(); // helper function 
        $couponData       = $result->get('coupon');
        $discount         = (float) $couponData['discount'];
        $order_data       = [

               'unique_order_id'          => $unqueID,
               'userId'                   => auth()->user()->_id,
               'billing_address_details'  => json_encode($billing_address),
               'shipping_address_details' => json_encode($shipping_address),
               'discount'                 => $discount ,
               'tax'                      => (float) $result->get('tax'),
               'subtotal'                 => (float) $result->get('subtotal'),
               'shipping'                 => (float) $result->get('shipping'),
               'total'                    => (float) $result->get('newTotal') + (float) $result->get('shipping'),
               'payment_method'           => $order['paymentMethod'],
               'payment_method_comment'   => $order['paymentMethodComment'],
               'shipping_method_details'  => json_encode(session()->get('order')['shippingMethodDetails']),
               'shipping_method_comment'  => $order['shippingMethodComment'],
               'card_details'             => json_encode(collect($card)->only('cc_owner','cc_number','cc_expire_date_month','cc_expire_date_year','cc_cvv2')->toArray()),
               'orderstatus'              =>  1,
               'deleted'                  =>  0

                    ];


        if(session()->get('coupon-'.$_SERVER['REMOTE_ADDR'])) {
            $order_data['coupon_details'] = json_encode(['coupon_code' => $couponData['name'],'coupon_discount' => (float)$couponData['discount']]);
        } else {
            $order_data['coupon_details'] = "";
        }

        $order_detail    = Order::create($order_data);

        foreach (Cart::content() as $key => $item) {
          
                OrderItem::create([

                      'orderId'   =>         $order_detail->_id,
                      'productId' =>         $item->model->_id,
                      'price'     => (float) $item->price,
                      'quantity'  =>   (int) $item->qty,
                      'deleted'   =>         0
                ]);                 
         } 

        return $order_detail;    
   }

   protected function productsAreNoLongerAvailable()
   {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->_id);
            if (!empty($product->currentstock) && (int)$product->currentstock <= (int)$item->qty) {
                return true;
            }
        }

        return false;
   }

   protected function productsPurchaseLimitAvailable()
   {
      foreach (Cart::content() as $item) {
            $product = Product::find($item->model->_id);
            if (!empty($product->min_purchase_qty) && (int)$item->qty < (int)$product->min_purchase_qty) {
                return false;
            }
            if (!empty($product->max_purchase_qty) && (int)$item->qty > (int)$product->max_purchase_qty ) {
                return false;
            }
        }

      return true;
   }

    protected function decreaseCouponQuantity()
    {
        if(session()->get('coupon-'.$_SERVER['REMOTE_ADDR'])) {
            
            $sessionCoupon = session()->get('coupon-'.$_SERVER['REMOTE_ADDR']);
            $coupon = Coupon::where('_id',$sessionCoupon['id'])->first();
            if($coupon->usage_time != ""){
                $coupon->usage_time = (int)$coupon->usage_time - 1;
                $coupon->save();
            }
        } 
    }

    protected function decreaseProductsQuantities()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->_id);
            if($product->currentstock != ''){
                $product->update(['currentstock' => $product->currentstock - $item->qty]);
            }
        }
    }

}  