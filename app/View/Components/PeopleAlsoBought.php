<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;
use App\Models\Product;
class PeopleAlsoBought extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $category;
    public $products;
    private $size = 10;
    public function __construct($categoryId = null)
    {

        if(!is_null($categoryId)){
           $this->category = Category::isActiveCategory()->where('_id',$categoryId)->first();
        }
        else {
           $this->category = Category::isActiveCategory()->first();
        }
        if(is_null($this->category)){
            $this->products = [];
        }else{
            $this->products =  Product::query()
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
        return view('components.people-also-bought')->with([
                  'category' => $this->category,
                  'products' => $this->products
                ]);
    }

 
}
