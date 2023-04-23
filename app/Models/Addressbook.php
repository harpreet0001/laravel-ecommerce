<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class Addressbook extends Model
{
    protected $connection = 'mongodb';
    protected $table 	  = 'addressbooks';
    protected $fillable   = [ 'userId','firstname','lastname','company','address_1','address_2','city','postcode','countryId','stateId','phone','default'];

    public function country(){
    	return $this->belongsTo('App\Models\Country','countryId','_id');
    }

    public function state(){
    	return $this->belongsTo('App\Models\State','stateId','_id');
    }

}
