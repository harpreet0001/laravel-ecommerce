<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;

class HeaderSearch extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $categories         = null;
    public $products           = null;
    public $search             = null;
    public $selectedCategory   = null;
    public function __construct($data  = null)
    {
       $this->categories = Category::isActiveCategory()
                                ->orderBy('series','asc')
                                ->get();
       
        if(isset($data['products'])){
            $this->products = $data['products'];
        }
        if(isset($data['search'])){
            $this->search = $data['search'];
        }
        if(isset($data['selectedCategory'])){
            $this->selectedCategory = $data['selectedCategory'];
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {  
       return view('components.header-search')->with([
              'selectedCategory'   => $this->selectedCategory,
              'categories'         => $this->categories,
              'products'           => $this->products,
              'search'             => $this->search
       ]);
    }

 
}
