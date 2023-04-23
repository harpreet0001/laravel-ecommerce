<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class Order extends Model
{


    protected $connection = 'mongodb';
    protected $table 	  = 'orders';
    protected $fillable   = ['unique_order_id','userId','billing_address_details','shipping_address_details','coupon_details','discount','tax','subtotal','shipping','total','payment_method','payment_method_comment','shipping_method_details','shipping_method_comment','card_details','orderstatus','ordercomment','deleted'];

    public function orderItems(){
       return $this->hasMany('App\Models\OrderItem','orderId','_id');
    }

    public function orderuser(){
       return $this->belongsTo('App\User','userId','_id');
    }

    public function getBillingAddressDetailsAttribute($value){
    	return json_decode($value);
    }

    public function getShippingAddressDetailsAttribute($value){
    	return json_decode($value);
    }

    public function getShippingMethodDetailsAttribute($value){
        return json_decode($value);
    }

    public function getCardDetailsAttribute($value){
        return json_decode($value);
    }

    public function scopeOrderSearch($query,$search)
    {
       return $query->where('billing_address_details', 'like', '%'.$search.'%')
                    ->orWhere('shipping_address_details', 'like', '%'.$search.'%')
                    ->orWhere('subtotal', 'like', '%'.$search.'%')
                    ->orWhere('total', 'like', '%'.$search.'%');
    }

    public function scopeWhereOrderStatus($query,$orderstatus)
    {
        return $query->where('orderstatus',(int)$orderstatus);
    }

    public function scopeOrderByField($query,$sortField = '_id',$sortOrder = 'desc'){
        return $query->orderBy($sortField,$sortOrder);
    }

    public function ordershipment(){
       return $this->hasOne('App\Models\OrderShipment','orderId','_id');
    }

    // public function scopeWhereLike($query, $column, $value)
    // {
    //     return $query->where($column, 'like', '%'.$value.'%');
    // }

    // public function scopeOrWhereLike($query, $column, $value)
    // {
    //     return $query->orWhere($column, 'like', '%'.$value.'%');
    // }

}
