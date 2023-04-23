<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;
use App\Models\Product;
class CategoryProduct extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $category;
    public $products;

    public function __construct()
    {
        $this->category = Category::query()
                             ->isActiveCategory()
                             ->raw(function($collection){ 
                                return $collection->aggregate([ ['$sample' => ['size' => 1]] ]); 
                             })
                             ->first();  

        if(is_null($this->category)){

            $this->products = [];
        }else{

            $this->products = Product::query()
                                    ->isActiveProduct()
                                    ->where('category', 'like', '%' .$this->category->_id. '%')
                                    ->take(10)
                                    ->get(); 
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {  
        return view('components.category-product')->with([
                  'category' => $this->category,
                  'products' => $this->products
                ]);
    }

 
}
