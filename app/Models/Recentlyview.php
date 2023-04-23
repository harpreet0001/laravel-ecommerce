<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class Recentlyview extends Model
{
    protected $connection = 'mongodb';
    protected $table 	  = 'recentlyviews';
    protected $fillable   = ['userId','productId'];

    public function product(){
    	return  $this->belongsTo('App\Models\Product','productId','_id');
    }

}

