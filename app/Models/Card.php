<?php

namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class Card extends Model
{
    protected $connection = 'mongodb';
    protected $table 	  = 'cards';
    protected $fillable   = ['userId','cc_owner','cc_number','cc_expire_date_month','cc_expire_date_year','cc_cvv2'];

    public function setOptionsAttribute($value) {
  
           $this->attributes['options'] = base64_encode($value);
     }

}

