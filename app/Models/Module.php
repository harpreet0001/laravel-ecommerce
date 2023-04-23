<?php

namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Module extends Eloquent
{
    protected $connection = 'mongodb';

    protected $table = "modules";

    protected $fillable = [
        'title', 'slug', 'slugparam', 'active', 'type', 'parent', 'iconclass', 'usetype', 'isshow', 'serial'
    ];

    public function WithChild(){
    	return $this->hasMany(static::class, 'parent');
    }

    public function WithParent(){
    	return $this->hasOne(static::class, '_id', 'parent');
    }
}
