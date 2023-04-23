<?php

namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class Role extends Model
{
    protected $connection = 'mongodb';

    protected $table = "roles";

    protected $fillable = [
        'role', 'permissions', 'active'
    ];

    public function WithTitle(){
    	return $this->hasMany(static::class, 'parent');
    }
    
}
