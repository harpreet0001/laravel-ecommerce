<?php

namespace App\View\Components;

use App\Models\Product;
use App\Models\Category;
use Illuminate\View\Component;
use App\Models\ProductReview as M_ProductReview;

class ProductReview extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $product;
    public $product_reviews;
    public function __construct($productId)
    {
        $this->product = Product::isActiveProduct()->where('_id',$productId)->first();
        if(!is_null($this->product)){
            $this->product_reviews = M_ProductReview::query()
                                                    ->isActiveProductReview()
                                                    ->where('productId',$this->product->_id)
                                                    ->orderBy('_id','DESC')
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
        return view('components.product-review')->with([
                                                          'product'         => $this->product,
                                                          'product_reviews' => $this->product_reviews
                                                       ]);
    }

 
}
