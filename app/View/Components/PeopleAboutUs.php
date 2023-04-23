<?php

namespace App\View\Components;

use App\Models\ProductReview;
use Illuminate\View\Component;

class PeopleAboutUs extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $product_reviews;
    private $size = 6;
    public function __construct()
    {
        $this->product_reviews = ProductReview::query()
                                      ->isActiveProductReview()
                                      ->raw(function($collection){ return $collection->aggregate([ ['$sample' => ['size' => $this->size]] ]); });
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {  
        return view('components.people-about-us')->with(['product_reviews' => $this->product_reviews ]);
    }

 
}
