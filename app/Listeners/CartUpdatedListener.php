<?php

namespace App\Listeners;

use App\Models\Coupon;
use App\Jobs\UpdateCoupon;
use App\Jobs\CartRestore;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CartUpdatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if(session()->has('coupon-'.$_SERVER['REMOTE_ADDR'])) {

            $couponId = session()->get('coupon-'.$_SERVER['REMOTE_ADDR'])['id'];

            if ($couponId) {
                 
                $coupon = Coupon::where('_id', $couponId)
                                ->where('active',1)
                                ->where('delete','!=',1)
                                ->first();

                if(!is_null($coupon))
                {
                   dispatch_now(new UpdateCoupon($coupon));
                }
                else
                {
                   session()->forget('coupon-'.$_SERVER['REMOTE_ADDR']);
                }

            }
        }
         
    }
}