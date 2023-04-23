<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;

class TopCategory extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $topcategories;
    private $size = 10;

    public function __construct()
    { 
        $this->topcategories = Category::query()
                                      ->isActiveCategory()
                                      ->where('top',1)
                                      ->orderBy('series','ASC')
                                      ->get();
    }  

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {  
        return view('components.top-category')->with(['topcategories' => $this->topcategories]);
    }

 
}
