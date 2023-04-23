<?php

namespace App\Models;
use App\Models\Product;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Jenssegers\Mongodb\Eloquent\Model;

class Category extends Model
{
   use HasSlug;
   protected $isActive = 1;
   protected $connection = 'mongodb';
   protected $table 	 = "categories";
   protected $fillable 	 = [
						        'title', 'description','slug', 'pagetitle', 'metakeywords', 'metadescription', 'series', 'active', 'image','top'
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

   public function scopeIsActiveCategory($query)
   {
        return $query->where('active',$this->isActive);
   }					    
}
