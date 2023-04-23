<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Coupon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function updateCoupon()
    {
    	if(session()->has('coupon-'.$_SERVER['REMOTE_ADDR'])){
            
            $couponId = session()->get('coupon-'.$_SERVER['REMOTE_ADDR'])['id'];  
            $coupon = Coupon::where('_id', $couponId)->first();
            
            if($coupon->active != 1 || $coupon->delete == 1)
            {
            	session()->forget('coupon-'.$_SERVER['REMOTE_ADDR']);
            }

          }
    }
}
