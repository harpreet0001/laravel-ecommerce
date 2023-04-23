<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
   public $path ='front.modules.main.account.order.';

   public function __construct(){
   	  $this->middleware('auth');
   }

   public function orderhistory(){
   	$orders = Order::where('userId',auth()->user()->_id)
   	               ->with(['orderitems' => function($orderitem) { return $orderitem->with('product'); } ])
   	               ->orderBy('desc','order._id')
   	               ->get(); 
   	return view($this->path.'order_history',compact('orders'));
   }

   public function orderdetails($orderId){

   	  $order = Order::where(['_id' => $orderId ,'userId' => auth()->user()->_id])
   	                ->with(['orderitems' => function($orderitem) { return $orderitem->with('product'); } ])
   	                ->orderBy('desc','order._id')
   	                ->first();

   	  return view($this->path.'order_details',compact('order'));
   }

}  