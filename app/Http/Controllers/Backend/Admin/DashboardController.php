<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use App\User;
use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Backend\Admin\CommonController;


class DashboardController extends CommonController
{
	 public $path ='admin.modules.';
   
   public function dashboard()
   {  
      $categoryCount = Category::where('delete','!=',1)->count();
      $productCount  = Product::where('delete','!=',1)->count();
      $orderCount    = Order::count();
      $customerCount = User::where('role','customer')->where('delete','!=',1)->count();

      return view($this->path.'main')->with([

            'categoryCount' => $categoryCount,
            'productCount'  => $productCount,
            'customerCount' => $categoryCount,
            'orderCount'    => $orderCount
      ]);
   }
}  