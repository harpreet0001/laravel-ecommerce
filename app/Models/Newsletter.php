<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class Newsletter extends Model
{  
    protected $connection    = 'mongodb';
    protected $table 	     = "newsletters";
    protected $fillable      = ['email', 'subscribe'];
    static	  $subscribe     = 1;
    static	  $not_subscribe = 0;		    
}

