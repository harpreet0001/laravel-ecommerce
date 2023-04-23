<?php
namespace App\Traits;

use Mail;
use Cart;
use App\User;
use Carbon\Carbon;
use App\Models\Coupon;
use App\Jobs\UpdateCoupon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
Trait CouponTrait
{ 
    public function applyCoupon(Request $request)
    {
      if(!auth()->check()){
          throw ValidationException::withMessages(['coupon' => 'You have to login to use this coupon.']);
      }

    	$this->validate($request,[
                'coupon' => 'required|string|exists:coupons'
    	]);

        $coupon = Coupon::query()
                        ->where('coupon', $request->coupon)
                        ->where('active',1)
                        ->where('delete','!=',1)
                        ->first();
        if (!$coupon) {
        	throw ValidationException::withMessages(['coupon' => 'Invalid coupon code.']);
        }
        else {

            $expire_date    = Carbon::createFromFormat('Y/m/d',$coupon->expire_date);
            $current_date   = Carbon::now();
            $cart_subtotal  = (float)str_replace(',','', Cart::subtotal());
            $min_cart_total = (float)$coupon->min_cart_total;

            if($expire_date->lt($current_date)){
               throw ValidationException::withMessages(['coupon' => 'Invalid is expired.']);
            }
            if($cart_subtotal < $min_cart_total){
            	    throw ValidationException::withMessages(['coupon' => 'Only apply for cart subtotal '.priceFormat($min_cart_total)]);
            }

            if($coupon->usage_time !== ''){ 
                
                if(empty($coupon->usage_time) || $coupon->usage_time <= 0){
                    throw ValidationException::withMessages(['coupon' => 'Coupon is no longer available.']);       
                }
            } 
            if($coupon->coupon_for == 2){  //comment::[1 => 'for all users' ,2 => 'specific users']
               
               	    $couponUsers = User::whereIn('_id',json_decode($coupon->users))->get();
               	    if(!$couponUsers->contains('_id',auth()->user()->_id)){
                      throw ValidationException::withMessages(['coupon' => 'You are not applicable to use this coupon.']);
               	    }
               
            }
        }
        // <!--comment::calling listener session for discount -->
        dispatch_now(new UpdateCoupon($coupon));
        $page = '';
        if($request->has('page'))
        {
            $page = $request->get('page');
        }
        return response()->json([
                                   'success'      => 'Coupon has been applied!',
                                   'redirect_url' =>  $request->redirect_url ?? '',
                                   'page'         =>  $page,
                                   'html'         =>  ($page == 'checkout') ? view('form.cart_detail')->render() : '',
                                   'status'       => 1

                               ],200);
    }

     public function deleteCoupon(Request $request)
    {
        session()->forget('coupon-'.$request->ip());
        $page = '';
        if($request->has('page'))
        {
            $page = $request->get('page');
        }
        return response()->json([
                                    'success'      => 'Coupon has been removed.',
                                    'redirect_url' => $request->redirect_url ?? '',
                                    'page'         => $request->has('page') ? $request->get('page') : '',
                                    'html'         =>  ($page == 'checkout') ? view('form.cart_detail')->render() : '',
                                    'status'       => 1

                                ],200);
    }
}
