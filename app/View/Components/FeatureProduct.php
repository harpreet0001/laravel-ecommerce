<?php

namespace App\View\Components;
use Illuminate\View\Component;
use App\Models\Product;

class FeatureProduct extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $products;
    private $no_of_products = 5; 
    public function __construct()
    {
        $this->products = Product::query()
                                 ->isActiveProduct()
                                 ->isFeaturedProduct()
                                 ->take($this->no_of_products)
                                 ->get();                           
    } 

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {  
        return view('components.feature-product')->with(['products' => $this->products]);
    }

 
}
