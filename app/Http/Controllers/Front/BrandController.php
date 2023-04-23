<?php

namespace App\Http\Controllers\Front;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
   public $path ='front.modules.main.';

   public function list()
   {
      $brands = Brand::all();
      return view($this->path.'brand.list',compact('brands'));
   }

   public function products(Request $request,$brandId)
   {
      
      try {
              $categoryId       = null;
              $selectedCategory = null;
              $brandId          = base64_decode($brandId);
              $brand            = Brand::where('_id',$brandId)->first();
              if(is_null($brand))
              {
                return abort('404');
              }

              if(request()->has('cId'))
              {
                 $categoryId = base64_decode(request()->get('cId'));
              }

              if(!is_null($categoryId))
              {
                 $selectedCategory = Category::where('_id',$categoryId)->first();
              }
              else
              {
                 $selectedCategory = null;;
              }

              $pagination = (request()->limit) ? (int)(request()->limit) : Product::$pagination;
              $products   = Product::isActiveProduct()->where('brand',$brand->_id);

              //<!--------Range-filter-------->
                  if(request()->price_from && !is_null(request()->price_from) && !empty(request()->price_from)){
                        $products = $products->where('price','>=',(int)(request()->price_from));
                  }

                   if(request()->price_to && !is_null(request()->price_to) && !empty(request()->price_to)){
                        $products = $products->where('price','<=',(int)(request()->price_to));
                  }
              //<!--------Range-filter-------->

              //<!--------Stock-filter-------->
                  if(request()->stock){
                      $products = $products->where(function($query){
                            $query->where('currentstock','')
                                  ->orWhere('currentstock','>=',1);
                      });
                  }
              //<!--------Stock-filter-------->

              //<!--------filters-start-------->
              if(request()->sort && !is_null(request()->sort) && !empty(request()->sort)){
                    $sortBy = base64_decode(request()->sort);

                 if($sortBy == 'alpha-asc'){
                         
                       $products = $products->orderBy('title','asc')->paginate($pagination);
                 }
                 if($sortBy == 'alpha-desc'){
                       
                       $products = $products->orderBy('title','desc')->paginate($pagination);
                 }
                 if($sortBy == 'price-asc'){
                         
                       $products = $products->orderBy('price','asc')->paginate($pagination);
                 }
                 if($sortBy == 'price-desc'){
                       $products = $products->orderBy('price','desc')->paginate($pagination);
                 }
              }
              else{
                $products = $products->paginate($pagination);
              }
              //<!--------filters-start-------->

              if($request->ajax()){
                return view($this->path.'shop.product_list')->with(['products' => $products,'selectedCategory' => $selectedCategory ])->render();
              }

              return view($this->path.'brand.products')->with([
                    'brand'            => $brand,
                    'selectedCategory' => $selectedCategory,
                    'products'         => $products,
                    'maxProductPrice'  => Product::maxProductPrice(),
                    'minProductPrice'  => Product::minProductPrice()
              ]);
                 
       } catch (Exception $e) {
             
             return $e;
       } 
    
   } 

}  