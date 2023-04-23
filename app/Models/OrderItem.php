<?php

namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class OrderItem extends Model
{
    protected $connection = 'mongodb';
    protected $table 	  = 'order_items';
    protected $fillable   = ['orderId','productId','price','quantity','deleted'];

    public function itemorder(){
       return $this->belongsTo('App\Models\Order','orderId','_id');
    }

    public function product(){
    	return $this->belongsTo('App\Models\Product','productId','_id');
    }

}

