<?php

namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class BlogComment  extends Eloquent
{
    protected $connection = 'mongodb';
    protected $isActive   = 1;
    protected $table      = "blog_comments";
    protected $fillable   = [
        'blogId','name', 'email', 'website', 'comment','active','delete'
    ];

    public function blog()
    {
    	return $this->belongsTo('App\Models\Blog','blogId','_id');
    }

}