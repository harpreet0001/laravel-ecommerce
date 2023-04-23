<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use Mail;
use Cart;
use App\User;
use DataTables;
use App\Models\Order;
use App\Models\Module;
use App\Models\OrderItem;
use App\Models\Addressbook;
use Illuminate\Http\Request;
use App\Mail\OrderStatusChanged;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Backend\Admin\CommonController;
class OrderController extends CommonController
{
    public $path ='admin.modules.order.';

    protected function validators(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:100', 'unique:modules'],
            'slug'  => ['required', 'string', 'max:100', 'unique:modules']
        ]);
    }

    public function list(Request $request)
    {
    
      $pagination = (request()->limit) ? (int)(request()->limit) : 10;
      //commment::orders-with-orderitems-products-and-users
      $orders     = Order::query();

        //commment::-----filter-for-order-status-----               
        if($request->has('orderStatus')){

            if($this->isOrderStatusExist($request->get('orderStatus'))) {

                $orders = $orders->whereOrderStatus($request->get('orderStatus'));
            }
             
        }
        //-------------------------------------------

        //commment::-----searchfilter----- 
        if($request->has('searchQuery')){ 

            $searchText = $request->searchQuery;
            $orders     = $orders->where('unique_order_id','like', '%'. $searchText.'%')
                                 ->orWhere('total','like', '%'. $searchText.'%')
                                 ->orWhere('created_at','like', '%'. $searchText.'%');                   
        }
        //-------------------------------------------

        //commment::-----filter-for-order-status-----
        if($request->has('sortField') && $request->has('sortOrder')) {

            $orders = $orders->orderByField($request->get('sortField'),$request->get('sortOrder'));
        }
        //-------------------------------------------

        //commment::-----filter-for-user-------------
        $user = null;
        if(request()->has('userId') && !is_null(request()->get('userId'))) {
            $userId = base64_decode(request()->get('userId'));
            $user   = User::where('_id',$userId)->first();
            if(!is_null($user))
            {
               $orders = $orders->where('userId',$user->_id);
            }
        }
        //-------------------------------------------

        $orders =   $orders->orderBy('_id','desc')->paginate($pagination);
                        
        if($request->ajax()){
            return view($this->path."dynamic.viewOrders")->with(['orders' => $orders])->render();
        }                

        return view($this->path."list")->with(['orders' => $orders,'user' => $user]);
       
    }

    public function view($orderId)
    {
        $orderId = base64_decode($orderId);
        $order   = Order::query()
                       ->where('_id',$orderId)
                       ->with(['orderItems' => function($orderItem){ return $orderItem->with('product');},'orderuser'])
                       ->first();

        if(is_null($order)){
            return abort('404');
        }

        return view($this->path."view",compact('order'));
    }

    public function create()
    {
        Cart::instance('adminCart')->destroy();
        return view($this->path."create");
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $orderId = base64_decode($id);
        $order  = Order::query()
                       ->where('_id',$orderId)
                       ->with(['orderItems','orderuser'])
                       ->first();

        if(is_null($order)){
            return abort('404');
        }

        return view($this->path."edit",compact('order'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function orderQuickView($orderId) //comment:order quick view in modal
    {
        $order  = Order::query()
                       ->where('_id',$orderId)
                       ->with(['orderItems','orderuser'])
                       ->first();
        return view($this->path."dynamic.orderquickview")->with(['order' => $order])->render();
    }

    public function updateOrderStatus(Request $request) //comment:update status of order
    {
        $orderId = base64_decode($request->orderId);
        $order   = Order::where('_id',$orderId)->first();
        if(is_null($order)){
            return response()->json(['error' => 'Order doesnot exist.','status' => 0],404);
        }
        $orderstatus = (int)$request->orderStatus;
        if(!$this->isOrderStatusExist($orderstatus)){
            return response()->json(['error' => 'Order status doesnot exist.','status' => 0],404);
        }
        $order = tap($order)->update(['orderstatus' => $orderstatus]);
        // <!-- send order status upadte email -->
        $this->sendOrderStatusMail($order);
        return response()->json(['success' => 'Order status updated successfully.','status' => 1],200);
    }

    public function orderAction(Request $request) //comment:for printing purpose
    {
        if($request->has('orderId'))
        {
            $orderId  =  base64_decode($request->orderId);
            $order    =  Order::query()
                              ->where('_id',$orderId)
                              ->with(['orderItems' => function($orderItem){           
                                    return $orderItem->with('product');
                               },'orderuser'])
                              ->first();

            if(is_null($order))
            {
                return abort('404');
            }

            if($request->has('Todo'))
            {
                if($request->Todo == 'printInvoice')
                {
                   return view($this->path.'print.printInvoice',compact('order'));
                }

                if($request->Todo == 'printPackingSlip'){
                         
                    return view($this->path.'print.printPackingSlip',compact('order'));
                }
            }
            
        }
    }

    public function getAddressbook($id)
    {
       $address = Addressbook::where('_id',$id)->first();

       if(request()->address == 'billing')
       {
          $billing_address = $address;
          return view($this->path.'form.billing_address_form',compact('billing_address'));  
       }
       else
       {
          $shipping_address = $address;
          return view($this->path.'form.shipping_address_form',compact('shipping_address')); 
       }

    }

    public function orderUpdateItemQuantityPrice(Request $request,$id)
    {
        $this->validate($request,[
               
               'quantity' => ['required','integer','min:1','max:100000'],
               'price'    => ['required','numeric','min:1','max:100000']
        ]);

       $orderitem = OrderItem::where('_id',$id)->first();

       if(is_null($orderitem)){
           return response()->json(['error' => 'Order item doesnot exist','status' => 0],404);
       }

    }

    public function orderUpdate(Request $request,$orderId)
    {
        $this->validate($request,$this->orderValidationRules(),$this->orderValidationCustomMessages());

        $orderId  =  base64_decode($orderId);
        $order    =  Order::query()
                              ->where('_id',$orderId)
                              ->with(['orderItems' => function($orderItem){           
                                    return $orderItem->with('product');
                               },'orderuser'])
                              ->first();

        if(is_null($order)){
            return response()->json(['error' => 'order doesnot exist','status' => 0],404);
        }                      
        
        //comment:billing address details
        $billingAddressDetailsData = [
               
                    'firstname'     =>  $request->billing_firstname,
                    'lastname'      =>  $request->billing_lastname,
                    'company'       =>  $request->billing_company ,
                    'address_1'     =>  $request->billing_address_1,
                    'address_2'     =>  $request->billing_address_2,
                    'city'          =>  $request->billing_city,  
                    'countryId'     =>  $request->billing_countryId,
                    'stateId'       =>  $request->billing_stateId,
                    'postcode'      =>  $request->billing_postcode,

        ];

        //comment:shipping address details
        $shippingAddressDetailsData = [
               
                    'firstname'     =>  $request->shipping_firstname,
                    'lastname'      =>  $request->shipping_lastname,
                    'company'       =>  $request->shipping_company ,
                    'address_1'     =>  $request->shipping_address_1,
                    'address_2'     =>  $request->shipping_address_2,
                    'city'          =>  $request->shipping_city,  
                    'countryId'     =>  $request->shipping_countryId,
                    'stateId'       =>  $request->shipping_stateId,
                    'postcode'      =>  $request->shipping_postcode,

        ];

        /**
            Insert data in orders items table
            multiply qty accroding to price
            update qty table
        ***/
        foreach($request->itemid as $key => $requestedItem) {
            foreach($order->orderItems as $orderItem) {
                if($requestedItem == $orderItem->_id) {
                    /**update item quantity if exist in request**/
                    $dbOrderItem = OrderItem::where('_id',$orderItem->_id)->first();
                    $dbOrderItem->fill([
                                          'quantity' => $request->quantity[$key],
                                      ])->update();
                }
            }
        }

        /**updating order total and subtotal **/
        $orderSubtotal =  (float)Order::query()
                                ->where('_id',$orderId)
                                ->first()
                                ->orderItems->sum(function($orderItem){
                                        return $orderItem->quantity * $orderItem->price;
                                });
        
        $orderToatal    = $orderSubtotal + 0; //0 for tax
        
        $order = tap($order)->update([  
                        'subtotal'                 => $orderSubtotal, 
                        'orderstatus'              => 2, //for shipped
                        'total'                    => $orderToatal,                
                        'billing_address_details'  => json_encode($billingAddressDetailsData),
                        'shipping_address_details' => json_encode($shippingAddressDetailsData),
                        'ordercomment'             => $request->ordercomment ?? ''

                    ]);
               
       
        if($request->has('saveBillingAddress') && $request->saveBillingAddress == '1'){
            
            $billingAddressbook = Addressbook::updateOrCreate([
                     
                     'userId'        =>  $order->userId,
                     'firstname'     =>  $request->billing_firstname,
                     'lastname'      =>  $request->billing_lastname,
                     'company'       =>  $request->billing_company ,
                     'address_1'     =>  $request->billing_address_1,
                     'address_2'     =>  $request->billing_address_2,
                     'city'          =>  $request->billing_city,  
                     'countryId'     =>  $request->billing_countryId,
                     'stateId'       =>  $request->billing_stateId,
                     'postcode'      =>  $request->billing_postcode,

            ]);

        }

        if($request->has('saveShippingAddress') && $request->saveBillingAddress == '1'){
            
            $billingAddressbook = Addressbook::updateOrCreate([
                     
                     'userId'        =>  $order->userId,
                     'firstname'     =>  $request->shipping_firstname,
                     'lastname'      =>  $request->shipping_lastname,
                     'company'       =>  $request->shipping_company ,
                     'address_1'     =>  $request->shipping_address_1,
                     'address_2'     =>  $request->shipping_address_2,
                     'city'          =>  $request->shipping_city,  
                     'countryId'     =>  $request->shipping_countryId,
                     'stateId'       =>  $request->shipping_stateId,
                     'postcode'      =>  $request->shipping_postcode,

            ]);

        }
        // <!--send-order-status-changed-email -->
        if($request->has('emailInvoiceToCustomer'))
        {
           $this->sendOrderStatusMail($order);
        }

        session()->flash('success','Order details successfully updated');

        return response()->json(['success' => 'order details successfully updated','status'=>1],200);

    }

    protected function orderValidationRules()
    {
        return [
                  
                    'billing_firstname'     =>  ['required','string','min:1','max:500'],
                    'billing_lastname'      =>  ['required','string','min:1','max:500'],
                    'billing_company'       =>  ['nullable','string','min:1','max:500'],
                    'billing_address_1'     =>  ['required','string','min:1','max:500'],
                    'billing_address_2'     =>  ['nullable','string','min:1','max:500'],
                    'billing_city'          =>  ['required','string','min:1','max:500'],
                    'billing_countryId'     =>  ['required','string','exists:countries,_id'],
                    'billing_stateId'       =>  ['nullable','string','exists:states,_id'],
                    'billing_postcode'      =>  ['required','string','min:1','max:500'],
                    'shipping_firstname'    =>  ['required','string','min:1','max:500'],
                    'shipping_lastname'     =>  ['required','string','min:1','max:500'],
                    'shipping_company'      =>  ['nullable','string','min:1','max:500'],
                    'shipping_address_1'    =>  ['required','string','min:1','max:500'],
                    'shipping_address_2'    =>  ['nullable','string','min:1','max:500'],
                    'shipping_city'         =>  ['required','string','min:1','max:500'],
                    'shipping_countryId'    =>  ['required','string','exists:countries,_id'],
                    'shipping_stateId'      =>  ['nullable','string','exists:states,_id'],
                    'shipping_postcode'     =>  ['required','string','min:1','max:500'],
                    'quantity.*'            =>  ['required','integer','min:1','max:100000']
 
        ];
    }

    protected function orderValidationCustomMessages()
    {
         return [
                
                'quantity.*.required' => 'quantity field is required',
                'quantity.*.integer'  => 'quantity is invalid',
                'quantity.*.min'      => 'quantity must be equal or greater than 1',
                'quantity.*.max'      => 'quantity must be equal or less than 100000',

         ];
    }

    protected function isOrderStatusExist($orderstatus){

        if(isset(orderStatusArr()[$orderstatus])){
            return true;
        }
        return false;
    }

    protected function sendOrderStatusMail($order)
    {
        Mail::to($order->orderuser->email)->send(new OrderStatusChanged($order));
    }
}
