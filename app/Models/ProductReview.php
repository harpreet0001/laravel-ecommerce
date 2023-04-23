<?php

namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ProductReview extends Eloquent
{   
    
    protected $connection = 'mongodb';
    protected $table 	  = 'product_reviews';
    protected $fillable   = [
        						'productId','title','review','rating','posted_by','active'       						
    						];
    protected $isActive = 1;

    public function scopeIsActiveProductReview($query)
    {
        return $query->where('active',$this->isActive);
    }

    public function product()
    {
    	return $this->belongsTo('App\Models\Product','productId','_id');
    }	
  
}

