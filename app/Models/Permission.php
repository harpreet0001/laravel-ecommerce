<?php

namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class Permission extends Model
{
    protected $connection = 'mongodb';

    protected $table = "permissions";

    protected $fillable = [
        'userid', 'userpermissions', 'usertype'
    ];

    public function RoleName()
    {
    	return $this->belongsTo(Role::class, 'usertype', '_id');
    }

}
