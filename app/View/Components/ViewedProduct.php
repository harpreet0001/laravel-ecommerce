<?php
namespace App\View\Components;
use DB;
use App\Models\Product;
use App\User;
use App\Models\Recentlyview;
use Illuminate\View\Component;
class ViewedProduct extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public  $recentlyviewedproducts;
    public  $mostviewedproducts;
    private $size       = 10;
    private $cookieName = 'RECENTLY_VIEWED_PRODUCTS';
    public function __construct()
    { 
  
      $this->mostviewedproducts = Product::query()
                                   ->isActiveProduct()
                                   ->orderBy('view_count','DESC')
                                   ->take($this->size)
                                   ->get();

       if(isset($_COOKIE[$this->cookieName]) && !is_null($_COOKIE[$this->cookieName]) && is_array(json_decode($_COOKIE[$this->cookieName]))){ //comment:get cookie 'RECENTLY_VIEWED_PRODUCTS'

            $recentProductsIdsArr = array_map(function($encodedProductId){
                                                return base64_decode($encodedProductId);
                                             },json_decode($_COOKIE[$this->cookieName]));

            $this->recentlyviewedproducts = Product::query()
                                                   ->isActiveProduct()
                                                   ->whereIn('_id',$recentProductsIdsArr)
                                                   ->take($this->size)
                                                   ->get();

       } else {

              $this->recentlyviewedproducts = $this->mostviewedproducts;
       }

       // if(auth()->check()){
       //      $this->recentlyviews = auth()->user()->recentlyviews()->with('product')->get();
       // }

        // $mostlyviewsProductIds = Recentlyview::raw( function ( $collection ) {
        //                                     return $collection->aggregate([
        //                                                                     [ '$group' => [ '_id' => '$productId','count' => ['$sum' => 1] ] ],
        //                                                                     [  '$sort' => ['count' => -1] ], 
                                                                                
        //                                                       ]);
        //                                                   })->pluck('_id')->toArray();
               
       // $this->mostlyviews = Recentlyview::whereIn('productId',$mostlyviewsProductIds)->with('product')->get();                                               
    } 

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {  

         return view('components.viewed-product')->with([
                'recentlyviewedproducts' => $this->recentlyviewedproducts,
                'mostviewedproducts'     => $this->mostviewedproducts
         ]);
    }

 
}
