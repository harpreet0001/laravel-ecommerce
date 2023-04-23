<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category as CategoryModel;

class Category extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $selectedCategory;
    public $categories;
    public $routename;

    public function __construct($selectedCategory = null,$routename = 'shop')
    {
       $this->routename        = $routename;
       $this->selectedCategory = $selectedCategory;
       $this->categories       = CategoryModel::isActiveCategory()
                                              ->orderBy('series','asc')
                                              ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {  
        return view('components.category')->with([
              
              'categories'       => $this->categories,
              'selectedCategory' => $this->selectedCategory
        ]);
    }

 
}
