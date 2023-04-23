<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class Coupon extends Model
{
    protected $connection = 'mongodb';
    protected $table 	  = 'coupons';
    protected $fillable   = ['coupon','discount_type','coupon_for','discount','users','min_cart_total','max_discount','usage_time','expire_date','description','active','delete'];
    

    public function calculateDiscount($subtotal)
    {
    	$subtotal = (float)$subtotal;

        if($this->discount_type == 2) {
           return (float)$this->discount;   
        } 
        elseif ($this->discount_type == 1)
        {
            $max_discount = (float)$this->max_discount;
            if($subtotal  < $max_discount)
            {
            	return round(($this->discount / 100) * $subtotal);
            } 
            else
            {
                return round(((float)($this->discount) / 100) * $max_discount);
            } 
        } 
        else 
        { 
            return 0;
        }
    }

}

