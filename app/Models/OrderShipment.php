<?php

namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class OrderShipment extends Model
{
    protected $connection = 'mongodb';
    protected $table 	  = 'order_shipments';
    protected $fillable   = ['orderId','shipping_methodmodule','shipping_methodname','shipping_trackno','shipping_comment'];

}
