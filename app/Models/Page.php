<?php

namespace App\Models;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class Page  extends Eloquent
{
    protected $connection = 'mongodb';

    protected $table = "pages";

    protected $fillable = ['title','content','type','status','slug','pagetitle','metakeywords','metadescription'];

    use HasSlug;

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

}




