<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class Country extends Model
{
    protected $connection = 'mongodb';
    protected $table 	  = 'countries';
    protected $fillable   = ['country_sortname','country_name','country_phonecode'];

    public function states(){

    	 return $this->hasMany('App\Models\State','countryId','_id');
    }

}

