<?php

namespace App\Models;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Jenssegers\Mongodb\Eloquent\Model;

class Brand extends Model
{   
	use HasSlug;
    protected $connection = 'mongodb';
    protected $table 	  = "brands";
    protected $fillable   = [
						        'title','slug','pagetitle', 'metakeywords', 'metadescription','active'
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

	public function getBrandProducts()
	{
		return $this->hasMany('App\Models\Product','brand','_id');
	}					    
}
