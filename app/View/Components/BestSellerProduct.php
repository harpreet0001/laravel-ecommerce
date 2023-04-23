<?php

namespace App\View\Components;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\View\Component;

class BestSellerProduct extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $products;
    private $size = 10; 
    public function __construct()
    {   
        if(OrderItem::count()> 0)
        {

            $productsArray = OrderItem::get()->groupBy('productId')->toArray();
            $productsIdsWithCount;
            foreach($productsArray as $key=>$productsArr)
            {
                $productsIdsWithCount[$key] = count($productsArr);
            }
            arsort($productsIdsWithCount); // sort by order product count
            $this->products = Product::query()
                                     ->isActiveProduct()
                                     ->whereIn('_id',array_keys($productsIdsWithCount))
                                     ->take($this->size)
                                     ->get();
                                     // ->raw(function($collection){ 
                                     //    return $collection->aggregate([ ['$sample' => ['size' => $this->size]] ]); 
                                     // });                            
        }
        else
        {
              $this->products = Product::query()
                                     ->isActiveProduct()
                                     ->take($this->size)
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
        return view('components.best-seller-product')->with(['products' => $this->products]);
    }

 
}
