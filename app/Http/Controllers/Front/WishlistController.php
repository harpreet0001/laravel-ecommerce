<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;

class WishlistController extends Controller
{    
     public $path ='front.modules.main.';

     public function __construct(){
          
        $this->middleware('auth')->only('show_wishlist');
     }

     public function show_wishlist()
     {
        $userwishlistproducts = Wishlist::where('userId',auth()->user()->_id)->with('product')->get(); 
        return view($this->path.'wishlist',compact('userwishlistproducts'));
     }

     public function add_to_wishlist(Request $request){

        $productEncodeId = $request->product_id;
        $productId       = base64_decode($productEncodeId); 
        $product         = Product::where('_id',$productId)->first();
        $message         = '';

        //condition:1 (If product not found)
        if(is_null($product)){

          return response()->json([
                           
                'notification'  =>  [
                                      'message'   => 'Product you are looking for is not found',
                                      'position'  => "tr",
                                      'title'     =>  'Product not found', 
                                    ],
                 ],404);     
        }
        
        //condition:2 (check user is authenticate) 
        if(!auth()->check()){
    
          return response()->json([
                           
                'notification'  =>  [
                                      'message'   => 'You must <a href="'.route('login').'">login</a> or create an account to save '.$product->title.' to your wish 
                                                      list!',
                                      'position'  => "tr",
                                      'title'     =>  $product->title, 
                                    ],
                 ],404);     
        }

        //condition:3 (If product already added to wishlist)
        $userwishlistproduct = Wishlist::where([

                                         'userId'    => auth()->user()->_id,
                                         'productId' => $product->_id

                                       ])->first();
        //remove from wishlist
        if(!is_null($userwishlistproduct)){

            $userwishlistproduct->delete();
            $message = $product->title.' removed from wishlist';

        }
        else
        {
            //condition:4 (Add product to wishlist)
            Wishlist::create([

                  'userId'    => auth()->user()->_id,
                  'productId' => $product->_id 
            ]);

            $message = $product->title.' added to your wishlist';
        }

        $userwishlistscount = Wishlist::where('userId',auth()->user()->_id)->count();

        return response()->json([
                
                'count'         =>  $userwishlistscount, 
                'count-html'    =>  '<span class="count-badge wishlist-badge">'.$userwishlistscount.'</span>',   
                'notification'  =>  [
                                      'message'   => $message,
                                      'position'  => "tr",
                                      'title'     =>  $product->title, 
                                    ],
                ],200); 

     }

     public function remove_from_wishlist($wishlistEncodedId){
        
        $wishlistId          = base64_decode($wishlistEncodedId); 
        $userwishlistproduct = Wishlist::where('_id',$wishlistId)->first();
        if(!is_null($userwishlistproduct)){
            $userwishlistproduct->delete();
            return redirect()->back()->with('success','Product remove from wishlist successfully.');
        }

     }

     public function add_from_wishlist_to_cart($productEncodedId){

     }

}