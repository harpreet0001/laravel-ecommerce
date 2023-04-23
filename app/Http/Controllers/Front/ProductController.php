<?php

namespace App\Http\Controllers\Front;

use Session;
use App\Models\Product;
use App\Models\Category;
use App\Models\Recentlyview;
use Illuminate\Http\Request;
use App\Traits\ProductReviewTrait;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{  
    use ProductReviewTrait;

	  public $path ='front.modules.main.';

    protected $max_compare_count = 3;

    public function product_quick_view($productId){

        $productId = base64_decode($productId);
        $product   = Product::isActiveProduct()->with(['getProductBrand'])->where('_id',$productId)->first();
        if(is_null($product))
        {
            return 'Product not found';
        }
        $html      = view($this->path.'popups.product_quick_view',compact('product'))->render();
        return $html;
    }

    public function show($productSlug) /**product detail**/
    {   
        $categoryId = null;
        $product    = Product::isActiveProduct()->where('slug',$productSlug)->first();
        if(is_null($product)){
            return abort('404');
        }
        if(request()->has('cId'))
        {
           $categoryId = base64_decode(request()->get('cId'));
        }

        $productsCategoryList = $product->categoryList();
        $selectedCategory     = $productsCategoryList->first();
        if(!is_null($categoryId))
        {
           $selectedCategory = $productsCategoryList->where('_id',$categoryId)->first();
        }


        return view($this->path.'product')->with(['product'  => $product ,'selectedCategory' => $selectedCategory]);

    }

    public function compare_show()
    {
       if(isset($_COOKIE['compare_products'])){
           
           $compare_products_arr = (array)json_decode($_COOKIE['compare_products']); //decode product cookie 

           $produts_ids          = array_map(function($prductEncodedId){      //base64 decode all stored product ids in cookie
                                     return base64_decode($prductEncodedId);
                                    },$compare_products_arr);



           $products             = Product::whereIn('_id',$produts_ids)->get();

           return view($this->path.'compare',compact('products'));

       }else{

            return view($this->path.'compare');
       }
    }

    public function compare_add(Request $request)
    {  
       $productEncodeId = $request->product_id;
       $productId       = base64_decode($productEncodeId); 
       $product         = Product::where('_id',$productId)->first();

      //condition:1 If product not found
       if(is_null($product)){
          
            return response()->json(['error' => 'product not found','status' => 0],404);
       }

       if(isset($_COOKIE['compare_products'])){
           
          $compare_products_arr = (array)json_decode($_COOKIE['compare_products']);
          
          //condition:2 If comapradion limit exceeded
          if(count($compare_products_arr) > $this->max_compare_count){

                      return response()->json([
                            
                            'count'         =>  count($compare_products_arr),
                            'notification'  =>  [
                                                    'buttons'   => "",
                                                    'className' => "notification-compare",
                                                    'image'     => "",
                                                    'message'   => 'You can compare only 4 products at a time',
                                                    'position'  => "tr",
                                                    'title'     =>  "Comparsion limit exceeded", 
                                                  ],
                            'success'       =>  'Error: Already added <a href="'.route('product.show',base64_encode($product->_id)).'">'.$product->title.'</a> 
                                                  to your <a href="'.route('compare.show').'">product comparison</a>!',
                            'count-html'    =>  '<span class="count-badge compare-badge">'.count($compare_products_arr).'</span>',
                  ],404);
          }

          //condition:3 If product alreday stored in comparison list
          if(in_array($productEncodeId, $compare_products_arr)){

             return response()->json([
                            
                            'count'         =>  count($compare_products_arr),
                            'notification'  =>  [
                                                    'buttons'   => "",
                                                    'className' => "notification-compare",
                                                    'image'     => imagePath($product->image),
                                                    'message'   => 'Error: Already added <a href="'.route('product.show',base64_encode($product->_id)).'">'.
                                                                    $product->title.'</a> to your <a href="'.route('compare.show').'">product comparison</a>!',
                                                    'position'  => "tr",
                                                    'title'     => $product->title, 
                                                  ],
                            'success'       =>  'Error: Already added <a href="'.route('product.show',base64_encode($product->_id)).'">'.$product->title.'</a> 
                                                  to your <a href="'.route('compare.show').'">product comparison</a>!',
                            'count-html'    =>  '<span class="count-badge compare-badge">'.count($compare_products_arr).'</span>'
                  ],404);
          }
          
          //condition:4 Add new product to comparsion list
          array_push($compare_products_arr,$productEncodeId);

          setcookie(  'compare_products',
                       json_encode($compare_products_arr),
                       time() + (60 * 60),
                       '/'
                   );

          return response()->json([
                            
                            'count'         =>  count($compare_products_arr),
                            'notification'  =>  [
                                                    'buttons'   => "",
                                                    'className' => "notification-compare",
                                                    'image'     =>  imagePath($product->image),
                                                    'message'   => 'Success: You have added <a href="'.route('product.show',base64_encode($product->_id)).'">'.
                                                                    $product->title.'</a> to your <a href="'.route('compare.show').'">product comparison</a>!',
                                                    'position'  => "tr",
                                                    'title'     => $product->title, 
                                                  ],
                            'success'       =>  'Success: You have added <a href="'.route('product.show',base64_encode($product->_id)).'">'.$product->title.'</a> 
                                                  to your <a href="'.route('compare.show').'">product comparison</a>!',
                            'count-html'    =>  '<span class="count-badge compare-badge">'.count($compare_products_arr).'</span>'
           ],201);

       }else{

           //condition:4 If compare cookie not set
          $compare_products_arr[1] = $productEncodeId;
         
          setcookie( 'compare_products', 
                       json_encode($compare_products_arr), 
                       time() + (60 * 60),
                       '/'
                   );

          return response()->json([

                              'count'         =>  1,
                              'notification'  =>  [
                                                    'buttons'   => "",
                                                    'className' => "notification-compare",
                                                    'image'     => "",
                                                    'message'   => 'Success: You have added <a href="'.route('product.show',base64_encode($product->_id)).'">'.
                                                                    $product->title.'</a> to your <a href="'.route('compare.show').'">product comparison</a>!',
                                                    'position'  => "tr",
                                                    'title'     => $product->title, 
                                                  ],
                              'success'       =>  'Success: You have added <a href="'.route('product.show',base64_encode($product->_id)).'">'.$product->title.'</a> 
                                                  to your <a href="'.route('compare.show').'">product comparison</a>!',
                              'count-html'    =>  '<span class="count-badge compare-badge">1</span>'
                    
           ],201);
       }
      
    }

    public function compare_remove($productEncodeId)
    {
        if(isset($_COOKIE['compare_products'])){

           $compare_products_arr = (array)json_decode($_COOKIE['compare_products']); //decode product cookie 

           if(in_array($productEncodeId,$compare_products_arr))
           {
                if (in_array($productEncodeId, $compare_products_arr)) 
                {
                    unset($compare_products_arr[array_search($productEncodeId,$compare_products_arr)]);
                }

               setcookie(  'compare_products',
                            json_encode($compare_products_arr),
                            time() + (60 * 60),
                           '/'
                       );
           }
       }

      return redirect()->route('compare.show');
    }

    public function addtorecentlyviewed($encodedProductId)
    {
       if(auth()->check()){
          $productId = base64_decode($encodedProductId);
          $product   = Product::findorFail($productId);
          if(!is_null($product)){
             $recentlyviewedproducts = auth()->user()->recentlyviews;
             if(is_null($recentlyviewedproducts->where('productId',$productId)->first())){
                if($recentlyviewedproducts->count() >= 5){
                    $recentlyviewedproducts->first()->delete();
                }
                Recentlyview::create(['userId' => auth()->user()->_id,'productId' => $productId]);
                return response()->json(['success' => 'product added to recent view list','status' => 1],201);
             }else{
                 return response()->json(['error' => 'product already added to recent view list','status' => 0],404);
             }  
          }
       }else{
          return response()->json(['error' => 'user is not authenticated','status' => 0],404);
       }
    }

    public function incrementviewcount(Request $request){ //comment::increase product view count when someone view product details
         
        if($request->has('productId')){
            $productId = base64_decode($request->productId);
            $product   = Product::findorFail($productId);
            if(!is_null($product)){
                $product->view_count = (int)$product->view_count + 1;
                $product->save();
                return response()->json(['success' => 'product view count updated','status' => 1],200);
            }
            return response()->json(['error' => 'Product not found','status' => 0],404);
        }

        return response()->json(['error' => 'Invalid request','status' => 0],404);
    }

    public function addProductReview(Request $request,$encodedProductId)
    {
        return $this->add($request,$encodedProductId); //calling ProductReviewTrait
    }

}  