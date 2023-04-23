<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category as CategoryModel;
use App\Models\Product as M_Product;
class Product extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $category;
    public $products;

    public function __construct($categoryId)
    {
        $this->category = CategoryModel::isActiveCategory()->where('_id',$categoryId)->first();
        if(is_null($this->category)){
            $this->products = [];
        }else{
            $this->products = M_Product::query()
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
        return view('components.product')->with([
                  'category' => $this->category,
                  'products' => $this->products
                ]);
    }

 
}
