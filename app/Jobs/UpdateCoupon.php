<?php

namespace App\Jobs;

use App\Models\Coupon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateCoupon implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $coupon;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (Cart::currentInstance() === 'default') {

            if(Cart::count() > 0)
            {   
                if($this->coupon->active == 1 && $this->coupon->delete != 1)
                {
                    session()->put('coupon-'.$_SERVER['REMOTE_ADDR'], [
                        'id'       => $this->coupon->id,
                        'name'     => $this->coupon->coupon,
                        'discount' => $this->coupon->calculateDiscount((float)str_replace(',','', Cart::subtotal())),
                    ]);
                }
                else
                {
                    session()->forget('coupon-'.$_SERVER['REMOTE_ADDR']);
                }
            }
            else
            {
                session()->forget('coupon-'.$_SERVER['REMOTE_ADDR']);
            }
        }
    }
}
