<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\View\Components\HeaderSearch;

class ShopController extends Controller
{

	public $path ='front.modules.main.shop.';

    public function shop(Request $request,$categorySlug = null) /**products listing**/
    {  
     
    	$pagination = (request()->limit) ? (int)(request()->limit) : Product::$pagination;
    	$category   = null;

      if(!is_null($categorySlug)) {
          $category = Category::where('slug',$categorySlug)->first();
      }
      else  {
          $category = Category::orderBy('series','asc')->first();
      }

      if(is_null($category)){

          return abort('404');
      }

    	$categories = Category::isActiveCategory()->orderBy('series','asc')->get();

    	if(!is_null($category->_id) && $categories->contains('id',$category->_id)){

            $products = Product::isActiveProduct()
                               ->where('category', 'like', '%' .$category->_id. '%');
    	}
    	else{

            $products = Product::isActiveProduct()
                           ->where('category', 'like', '%' .$categories->first()->_id. '%');
    	}

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

            return view($this->path.'product_list')->with(['products' => $products,'selectedCategory' => $category ])->render();
        }

    	return view($this->path.'shop')->with([
            'categories'       => $categories,
            'selectedCategory' => $category,
            'products'         => $products,
            'maxProductPrice'  => Product::maxProductPrice(),
            'minProductPrice'  => Product::minProductPrice()
        ]);
    }
    
    // <!-- Headerbar serach functionality -->
    public function search_query(Request $request){
          
        $selectedCategory = null;
        if($request->has('cId')){ //check if category exist
             $categoryId         = base64_decode($request->cId);
             $selectedCategory   = Category::where('_id',$categoryId)->first();
        }
        
        $products  = Product::query(); // <!--query -->

        if(!is_null($selectedCategory)){   //<!--category filter -->   
           $products = $products->where('category','like','%'.$selectedCategory->_id.'%');
        }

        if($request->has('search')){//<!--search  filter --> 
              $products = $products->where('title','like','%'.$request->search.'%');
        }
        $products = $products->take(4)->get();

        $data = [
                 'search'           => $request->search,
                 'products'         => $products,
                 'selectedCategory' => $selectedCategory
        ];

        return app()->make(HeaderSearch::class,compact('data'))->render();

    }

    public function search(Request $request){
       
        $pagination = (request()->limit) ? (int)(request()->limit) : Product::$pagination;
        $categoryId = !empty(request()->cId) ? base64_decode(request()->cId) : null;
        $categories = Category::isActiveCategory()->orderBy('series','asc')->get();

        if(!is_null($categoryId) && $categories->contains('id',$categoryId)){

          $products         = Product::query()
                                     ->isActiveProduct()
                                     ->where('category','like','%'.$categoryId.'%')
                                     ->with(['getProductBrand']);

          $selectedCategory = $categories->where('_id',$categoryId)->first();
        }
        else{

          $products         = Product::query()
                                     ->isActiveProduct()
                                     ->with(['getProductBrand']);

          $selectedCategory = null;
        }

        if($request->has('search') && !empty($request->search)){//<!--search  filter --> 

          $products = $products->where('title','like','%'.$request->search.'%');
          if($request->has('description') && $request->description == '1'){//<!--search  filter -->
            $products = $products->orWhere('description','like','%'.$request->search.'%');
          }                           
        }

        //<!--------Range-filter-------->
          if(request()->price_from && !is_null(request()->price_from) && !empty(request()->price_from)){
                $products = $products->where('price','>=',(int)(request()->price_from));
          }

           if(request()->price_to && !is_null(request()->price_to) && !empty(request()->price_to)){
                $products = $products->where('price','<=',(int)(request()->price_to));
          }
        //<!--------Range-filter-------->

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
            $products = $products->orderBy('series','asc')->paginate($pagination);
        }
        //<!--------filters-start-------->

        if($request->ajax()){

            return view($this->path.'product_list')->with(['products' => $products,'selectedCategory' => $selectedCategory ])->render();
        }

        return view($this->path.'search')->with([
                                                    'categories'       => $categories,
                                                    'selectedCategory' => $selectedCategory,
                                                    'products'         => $products,
                                                    'maxProductPrice'  => Product::maxProductPrice(),
                                                    'minProductPrice'  => Product::minProductPrice()
                                                ]);

    }

}  