<?php

namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class ShippingZone  extends Eloquent
{
    protected $connection = 'mongodb';
    protected $isActive = 1;
    protected $table = "shipping_zones";
    protected $fillable = [
        
        'zonename','zonetype','zonecountry','zoneenabled','default','delete'
    ];
   
}