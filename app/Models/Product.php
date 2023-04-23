<?php

namespace App\Models;
use App\Models\Category;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Product extends Eloquent
{   
    protected $isActive = 1;
    protected $featuredproduct = 1;
    protected $connection = 'mongodb';
    protected $table 	  = 'products';
    public static $pagination = 10;
    protected $fillable   = [
        						'category','brand','type','title','sku','description','image','downloadfile','downloadfileName','availability','csmessage','csreleasedate','csremovestatus','callmessage','price','costprice','retailprice','saleprice','weight','width','height','depth','fixshipping','freeshipping','currentstock','lowstock','condition', 'showcondition','warranty','searchkeyword','producttag','active','featured','min_purchase_qty','max_purchase_qty','slug','pagetitle','metakeywords','metadescription,view_count','series'        						
    						];


    public function scopeFeaturedProducts($query)
    {
       return $query->where('featured',$this->featuredproduct)->take(10);
    }

    public function scopeIsActiveProduct($query)
    {
        return $query->where('active',$this->isActive);
    }

    public function scopeIsFeaturedProduct($query)
    {
        return $query->where('featured',$this->featuredproduct);
    }    	

    public function categoryList()
    {
    	$category_arr = $this->category;
        return Category::whereIn('_id',$category_arr)->get();
    }

    public function getProductBrand()
    {
        return $this->belongsTo('App\Models\Brand','brand','_id');
    }

    public function scopeProductsFromCategory($query,$categoryId)
    {
        return $query->where('category',$categoryId)->take(3);
    }

    public function scopeMaxProductPrice($query)
    {
        return $query->max('price');
    }	

    public function scopeMinProductPrice($query)
    {
        return $query->min('price');
    }

    public function getCategoryAttribute($value){
        return json_decode($value);
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\ProductReview','productId','_id');
    }

}
