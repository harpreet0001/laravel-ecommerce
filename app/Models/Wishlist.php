<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class Wishlist extends Model
{
    protected $connection = 'mongodb';
    protected $table 	  = 'wishlists';
    protected $fillable   = ['userId','productId'];

    public function product()
    {
    	return $this->belongsTo('App\Models\Product','productId');
    }
}
