<?php

namespace App\Models;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class Blog  extends Eloquent
{
    protected $connection = 'mongodb';

    protected $isActive = 1;

    protected $table = "blogs";

    use HasSlug;

    protected $fillable = [
        'title', 'image', 'content', 'slug','pagetitle','metakeywords','metadescription','active'
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function scopeIsActiveBlog($query)
    {
        return $query->where('active',$this->isActive);
    }

    public function comments()
    {
        return $this->hasMany('App\Models\BlogComment','blogId','_id');
    }

}