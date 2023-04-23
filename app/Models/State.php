<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class State extends Model
{
    protected $connection = 'mongodb';
    protected $table 	  = 'states';
    protected $fillable   = ['countryId','state_name','state_name','state_tax'];

}
