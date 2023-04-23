<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\CouponTrait;

class CouponController extends Controller
{
   use CouponTrait;

   public function apply(Request $request)
   {
      return $this->applyCoupon($request);
   }

   public function deleteApplyCoupon(Request $request)
   {
      return $this->deleteCoupon($request);
   }

}  