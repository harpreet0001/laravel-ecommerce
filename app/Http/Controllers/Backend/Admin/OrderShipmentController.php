<?php

namespace App\Http\Controllers\Backend\Admin;

use Mail;
use Auth;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderShipment;
use App\Mail\OrderStatusChanged;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Backend\Admin\CommonController;

class OrderShipmentController extends CommonController
{

  protected function validators(array $data,$id =null)
  {   
      $shippingmethodmodules         = array_keys(shippingMethodModules());
      $implode_shippingmethodmodules = implode(',',$shippingmethodmodules);
   
      $rules = [
                  'shipping_methodmodule' => ['required', 'string', 'in:'.$implode_shippingmethodmodules],
                  'shipping_methodname'   => ['required', 'string','min:4','max:300'],             
                  'shipping_trackno'      => ['required','string','min:4','max:300'],
                  'shipping_comment'      => ['nullable','string','min:1','max:1000']
               ];

      return Validator::make($data,$rules);
  }


  public function save($orderId,Request $request)
  {     
      $orderId = base64_decode($orderId);
      $order   = Order::where('_id',$orderId)->first();
      if(is_null($order))
      {
         throw ValidationException::withMessages(['shipping_methodmodule' => 'Order doesnot exist']);
      }
      $this->validators($request->all())->validate();
      $return_result = $this->store($order,$request->all()); 
      $msgz = "";
      if($return_result){
          $msgz = 'OrderShipment created Succesfully';
          return response()->json(['success' => $msgz,'redirect_url' => route('order-list') ,'status'=>1],201);
      }else{
          $msgz = 'Problem while OrderShipment creation';
          return response()->json(['error' => $msgz,'status'=>0],404);
      }       
      
  }

 
    protected function store($order,array $data,$ordershipment = null)
    { 
      $db = [
              'orderId'               => $order->_id,
              'shipping_methodmodule' => $data['shipping_methodmodule' ],
              'shipping_methodname'   => $data['shipping_methodname'],
              'shipping_trackno'      => $data['shipping_trackno'],
              'shipping_comment'      => empty($data['shipping_comment']) ? "" : $data['shipping_comment'],
            ]; 

      $ordershipment = OrderShipment::where('orderId',$order->_id)->first();

      if(is_null($ordershipment))
      {
          $result = OrderShipment::create($db);

          if($result)
          {
             if(isset($data['orderstatus']) && $data['orderstatus'] == 1)
             {
                $order = tap($order)->update(['orderstatus' => 3]); //3 for partially shipped

                // <!--send-order-status-changed-email -->
                if(isset($data['emailInvoiceToCustomer']) && $data['emailInvoiceToCustomer'] == 1)
                {
                   $this->sendOrderStatusMail($order);
                }
             }
          }

          return $result;
      }
      else
      {
          $result = tap($ordershipment)->update($db);

          if($result)
          {
             if(isset($data['orderstatus']) && $data['orderstatus'] == 1)
             {
                $order = tap($order)->update(['orderstatus' => 3 ]); //3 for partially shipped

                // <!--send-order-status-changed-email -->
                 if(isset($data['emailInvoiceToCustomer']) && $data['emailInvoiceToCustomer'] == 1)
                {
                   $this->sendOrderStatusMail($order);
                }
             }
          }

          return $result;
      }

    }

    protected function sendOrderStatusMail($order)
    {
        Mail::to($order->orderuser->email)->send(new OrderStatusChanged($order));
    }

}  

