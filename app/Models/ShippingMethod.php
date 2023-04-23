<?php

namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class ShippingMethod  extends Eloquent
{
    protected $connection = 'mongodb';
    protected $isActive   = 1;
    protected $table      = "shipping_methods";
    protected $fillable   = ['shippingzoneId','methodmodule','methodname','methoddetails','methodenabled','default','delete'];

     public function getMethoddetailsAttribute($value){

    	return json_decode($value);
    }
   


}