<?php
namespace App\Http\Controllers\Backend\Admin;

use Cart;
use App\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Backend\Admin\CommonController;
use Hash;
use App\Models\Addressbook;
use App\Models\Order;
use App\Models\ShippingMethod;
use App\Models\Card;
use App\Models\OrderItem;

class AjaxController extends CommonController
{

     public function searchCustomer()
     {
        $customers  = User::query()
                           ->select('_id','firstname','lastname','email','contact','role')
                           ->where('role','customer')
                           ->where('delete','!=',1);

        if(request()->has('search'))
        { 
           $search    = trim(request()->search);
           $customers = $customers->where('firstname','like','%'.$search.'%')
                                  ->orWhere('lastname','like','%'.$search.'%')
                                  ->orWhere('email','like','%'.$search.'%')
                                  ->orWhere('contact','like','%'.$search.'%');
        } 

        $customers = $customers->take(20)->get();

        return  response()->json([

                                   'customers' => $customers->toArray(),
                                   'status'    => 1

                                  ],200);                   

     }

     public function addressList(Request $request)
     {
         if($request->has('customerId'))
         {

            $customer = User::query()
                             ->select('_id','firstname','lastname','email','contact','role')
                             ->where('role','customer')
                             ->where('delete','!=',1)
                             ->where('_id',$request->customerId)
                             ->first();
            $addresses = $customer->addressbooks;

           if(!is_null($addresses))
           {
                $addresses = $addresses->map(function($address) {


                       return [
                                'id'           => $address->_id,
                                'firstname'    => $address->firstname, 
                                'lastname'     => $address->lastname,
                                'company'      => $address->company,
                                'address_1'    => $address->address_1,
                                'address_2'    => $address->address_2,
                                'city'         => $address->city,
                                'postcode'     => $address->postcode,
                                'countryName'  => getCountryName($address->countryId),
                                'countryId'    => $address->countryId,
                                'stateId'      => $address->stateId,
                                'stateName'    => getStateName($address->stateId),
                                 
                            ];
                });

               $addresses = $addresses->toArray();
           }
           else
           {
              $addresses = [];
           }
           
           return response()->json([
                                      'email'     => $customer->email,
                                      'firstName' => $customer->firstname,
                                      'lastName'  => $customer->lastname,
                                      'addresses' => $addresses

                                   ],200);

         }
         else
         {
            return  response()->json(['error' => 'No Customer Found!'],404);
         }
     }
     

    public function searchProducts(Request $request)
    {
        $products = [];

        if(request()->has('search'))
        { 
            $products  = Product::query()
                           ->select('_id','title','image','description','price')
                           ->where('delete','!=',1);

            $search    = trim(request()->search);
            $products  = $products->where('title','like','%'.$search.'%')
                                ->orWhere('sku','like','%'.$search.'%')
                                ->orWhere('description','like','%'.$search.'%')
                                ->orWhere('pagetitle','like','%'.$search.'%');

            $products  = $products->take(20)->get();                     
        } 

        if(!is_null($products) && count($products) > 0)
        {

            $products = $products->map(function($product) {


                       return [
                                'id'          => $product->_id,
                                'title'       => $product->title, 
                                'image'       => asset($product->image),
                                'description' => $product->description,
                                'price'       => $product->price,

                                 
                            ];
            });

            $products = $products->toArray();

        }
        else
        {
            $products = [];
        }

        return  response()->json([

                                   'products' => $products,
                                   'status'    => 1

                                  ],200);        
    } 

    public function checkEmailAvailability(Request $request)
    {
        if($request->has('email'))
        {
          $user = User::where('email',$request->email)->first();

          if(is_null($user))
          {
             return response()->json(['availability' => 'true','status' => 1],200);
          }

            return response()->json(['availability'  => 'false','status' => 0],200);
        }
        else
        {
            return response()->json(['error' => 'Request doesnot contain email','status' => 0],404);
        }
       
    }

    public function addProduct(Request $request)
    {
        if($request->has('productId'))
        {
            $productId = $request->productId;
            $quantity  = $request->has('quantity') ? (int)$request->quantity : 1;
            $product   = Product::where('_id',$productId)->first();

            if(is_null($product))
            {
                return response()->json(['error' => 'Product does not exist','status' => 0],404);
            }

            $duplicates = Cart::instance('adminCart')->search(function ($cartItem, $rowId) use ($product) {
                        return $cartItem->id === $product->_id;
                 });

             if(empty($product->currentstock) || (int)$product->currentstock > 0)
             {

                if($duplicates->isNotEmpty()){      

                    Cart::instance('adminCart')->update($duplicates->first()->rowId, (int)$quantity);
                }
                else{

                    Cart::instance('adminCart')->add($product->_id,$product->title, $quantity,$product->price)->associate('App\Models\Product');
                }

                return response()->json([
                                       
                                        'cart-count'    => Cart::instance('adminCart')->count(),
                                        'cart-subtotal' => (float)str_replace(',','', Cart::instance('adminCart')->subtotal()),
                                        'redirect'      => $request->has('redirect') ? $request->redirect : '',
                                        'cartlist'      => view('admin.modules.order.dynamic.cartlist')->render(),
                                        'status'        => 1, 

                                  ],201);
              }
        }
        else
        {
            return response()->json(['error' => 'Request doesnot contain productId','status' => 0],404);
        }
    }

    public function deleteProduct(Request $request)
    {
         if($request->has('rowId'))
         {
            $rowId = $request->rowId;
            Cart::instance('adminCart')->remove($rowId);
            return response()->json([
                                       
                                        'cart-count'    => Cart::instance('adminCart')->count(),
                                        'cart-subtotal' => (float)str_replace(',','', Cart::instance('adminCart')->subtotal()),
                                        'redirect'      => $request->has('redirect') ? $request->redirect : '',
                                        'cartlist'      => view('admin.modules.order.dynamic.cartlist')->render(),
                                        'status'        => 1, 

                                  ],201);
         }
    }

    public function shippingMethods(Request $request) 
    {
       if($request->has('countryId'))
       {
          $countryId       = $request->countryId;
          $shippingzone    = getShippingZone($countryId);//comment:helper function to get shippingzones acc to country
          $shippingmethods = getShippingMethods($shippingzone->_id);//comment:helper function to get shippingmethod for shippingzone
          return response()->json([

                'shippingzone'    => $shippingzone,
                'shippingmethods' => $shippingmethods,
                'html'            => view('admin.modules.order.dynamic.shippingmethodlist',compact('shippingzone','shippingmethods'))->render()

          ],200);

       }
       else
       {
           return response()->json(['error' => 'Invalid shipping Address','status'=>0],404);
       }
    }

    public function savOrderDetail()
    {
        return response()->json([
                                    'order-detail-html' => view('admin.modules.order.dynamic.saveorderdetail')->render(),
                                    'status'            => 1

                                ],201);
    }

    public function placeOrder(Request $request)
    {   
        // <!--customer end-->
        $customer = null;

        if($request->has('orderFor') && $request->get('orderFor') == 'existing')
        {
           $customer = User::where('_id',$request->get('customerId'))->first();
        }
        else if($request->get('orderFor') == 'new')
        {
              $fistname = $request->get('customerFirst');
              $lastname = $request->get('customerLastname');
              $email    = $request->get('customerEmail');
              $password = Hash::make($request->get('customerPassword'));
              $contact  = $request->get('customerContact');

              $customer = User::create([
                     
                     'fisrtname' => $fisrtname,
                     'lastname'  => $lastname,
                     'email'     => $email,
                     'password'  => $password,
                     'role'      => 'customer',
                     'active'    => 1,
                     'loggedin'  => 1,
                     'delete'    => 0

              ]);
        }

        if(is_null($customer))
        {
            return response()->json([

                 'error'  => 'Customer not found',
                 'status' => 0,

            ],404);
        }

        // <!--customer end-->

        // <!--billing start-->
        $billingAddress = null;

        if($request->has('billingFor') && $request->get('billingFor') == 'existing')
        {
           $billingAddress = Addressbook::where('_id',$request->get('billingId'))->first();
        }
        else if($request->get('billingFor') == 'new')
        {
            $billingAddress = Addressbook::create([
                     
                      'firstname'  => $request->get('billingFirstname'),
                      'lastname'   => $request->get('billingLastname'),
                      'company'    => $request->get('billingCompnay'),
                      'address_1'  => $request->get('billingAddress1'),
                      'address_2'  => $request->get('billingAddress2'),
                      'city'       => $request->get('BillingCity'),
                      'postcode'   => $request->get('billingPostcode'),
                      'countryId'  => $request->get('billingCountryId'),
                      'stateId'    => $request->get('billingStateId'),
                      'default'    => 0,
                      'userId'     => $customer->_id,
                      'phone'      => $request->get('billingPhone')

            ]);
        }

        if(is_null($billingAddress))
        {
            return response()->json([

                 'error'  => 'Billing address not found',
                 'status' => 0,

            ],404);
        }


        // <!--billing end-->

        // <!--shipping start-->
        $shippingAddress = null;
        if($request->has('shippingTo') && $request->get('shippingTo') == 'existing')
        {
           $shippingAddress = Addressbook::where('_id',$request->get('shippingId'))->first();
        }
        else if($request->get('shippingTo') == 'new')
        {
            $shippingAddress = Addressbook::create([
                     
                      'firstname'  => $request->get('shippingFirstname'),
                      'lastname'   => $request->get('shippingLastname'),
                      'company'    => $request->get('shippingCompnay'),
                      'address_1'  => $request->get('shippingAddress1'),
                      'address_2'  => $request->get('shippingAddress2'),
                      'city'       => $request->get('shippingCity'),
                      'postcode'   => $request->get('shippingPostcode'),
                      'countryId'  => $request->get('shippingCountryId'),
                      'stateId'    => $request->get('shippingStateId'),
                      'default'    => 0,
                      'userId'     => $customer->_id,
                      'phone'      => $request->get('shippingPhone')

            ]);
        }

        if(is_null($shippingAddress))
        {
            return response()->json([
                 'error'  => 'Billing address not found',
                 'status' => 0,

            ],404);
        }

        // <!--shipping end-->

        //<!-- card -->
        $card_data =  [
                        'cc_number'            =>  $request->get('cc_number'),
                        'cc_owner'             =>  $request->get('cc_owner'),
                        'cc_expire_date_month' =>  $request->get('cc_expire_date_month'),
                        'cc_expire_date_year'  =>  $request->get('cc_expire_date_year'),
                        'cc_cvv2'              =>  $request->get('cc_cvv2'),
                      ];
        foreach ($card_data as $key => $value) {  
             $card_data[$key] = base64_encode($value);
        }
        $card_data['userId']  = $customer->_id;
        $card_data['deleted'] = 0;
        $card                 = Card::create($card_data);
        
        //<!-- card-->

        //<!--order-->
        $currentOrder   = Order::orderBy('unique_order_id','desc')->first();
        $unqueID        = isset($currentOrder->unique_order_id) ? ($currentOrder->unique_order_id + 1) : 310500;
        $shipping_method_id = base64_decode($request->get('shipping_method'));
        $shippingMethod = ShippingMethod::where('_id',$shipping_method_id)->first();
        $shipping       = (float)calShippingMethodCost($shippingMethod->_id);
        $subtotal       = (float)str_replace(',','', Cart::instance('adminCart')->subtotal());

        $order_data   = [

               'unique_order_id'          => $unqueID,
               'userId'                   => $customer->_id,
               'billing_address_details'  => json_encode($billingAddress),
               'shipping_address_details' => json_encode($shippingAddress),
               'discount'                 => 0 ,
               'tax'                      => (float) 0,
               'subtotal'                 => $subtotal,
               'shipping'                 => $shipping,
               'total'                    => $subtotal + $shipping,
               'payment_method'           => 'Credit Card / Debit Card',
               'payment_method_comment'   => '',
               'shipping_method_details'  => json_encode($shippingMethod),
               'shipping_method_comment'  => '',
              'card_details'             => json_encode(collect($card)->only('cc_owner','cc_number','cc_expire_date_month','cc_expire_date_year','cc_cvv2')->toArray()),
               'orderstatus'              =>  1,
               'deleted'                  =>  0

                    ];


        $order_detail    = Order::create($order_data);

        foreach (Cart::instance('adminCart')->content() as $key => $item) {
          
                OrderItem::create([

                      'orderId'   =>         $order_detail->_id,
                      'productId' =>         $item->model->_id,
                      'price'     => (float) $item->price,
                      'quantity'  =>   (int) $item->qty,
                      'deleted'   =>         0
                ]);                 
         } 
        //<!--order end-->
        
        Cart::instance('adminCart')->destroy();
        return response()->json([
                                 'success'  => 'Your order is successfully completed',
                                 'status'   => 1,
                                 'redirect' => route('order-list')
                               ],200); 
    }  
}  