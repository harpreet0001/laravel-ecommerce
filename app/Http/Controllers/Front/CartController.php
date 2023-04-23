<?php

namespace App\Http\Controllers\Front;


use App\Models\Product;
use App\Jobs\CartRestore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
   public $path ='front.modules.main.cart-checkout.';

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->updateCoupon();
            return $next($request);
        });
        
    }

   public function cart_index(Request $request){

        $result = getNumbers($request); //comment:helper function to get new tax,coupon discount,new subtotal,new total
        return view($this->path.'cart')->with([

            'coupon'      => $result->get('coupon'),
            'newSubtotal' => $result->get('newSubtotal'),
            'newTax'      => $result->get('newTax'),
            'newTotal'    => $result->get('newTotal'),
        ]); 
   }

   public function cart_store(Request $request){
      
       $productId = base64_decode($request->productId);
       $product   = Product::where('_id',$productId)->first();
       $quantity  = $request->has('quantity') ? (int)$request->quantity : 1;

       if(is_null($product)){
       	    return response()->json([
       	    	                       'notification' => ['message'=>'Product you are looking for is not available.','title'=>"Product not found."],
					                   'status'       => 0 
					                ],404);
       }

	    $duplicates = Cart::search(function ($cartItem, $rowId) use ($product) {
	                      return $cartItem->id === $product->_id;
	               });

        if(empty($product->currentstock) || (int)$product->currentstock > 0){

  		    if($duplicates->isNotEmpty()){      

  		      	Cart::update($duplicates->first()->rowId, (int)$duplicates->first()->qty+$quantity);

              $this->fnCartRestore();
  		    }
  		    else{

  	            Cart::add($product->_id,$product->title, $quantity,$product->price)->associate('App\Models\Product');

                $this->fnCartRestore();
  		    }

            return response()->json([
			                           'notification'   => ['message'=>'Product is added to your cart.','title'=>$product->title],
			                            'status'        => 1, 
                                  'cart-count'    => Cart::count(),
                                  'cart-subtotal' => appendCurrency(Cart::subtotal()),
                                  'redirect'      => $request->has('redirect') ? $request->redirect : '',
                                 'cart-wrap-html' => view('front.includes.cart_wrap')->render()
			                  		],201);
        }

         return response()->json([
                            
				                    'notification' => ['message'=>'We currently do not have enough items in stock.','title'=>$product->title],
				                    'status'       => 0 
				                ],400);
   }

   public function cart_update(Request $request,$cartId){

        $productId = base64_decode($request->productId);
        $product   = Product::where('_id',$productId)->first();
        if(is_null($product)){
        	return back()->with('error','Product not found');
        }
        $quantity  = $request->has('quantity') ? (int)$request->quantity : 1;
        $cart      = Cart::get($cartId);
        if(is_null($cart)){
        	return back()->with('error','Cart not found');
        }

        if(empty($product->currentstock) || (int)$product->currentstock > 0){
	        Cart::update($cartId,$quantity);
          $this->fnCartRestore();
	        return back()->with('success','Cart is updated');		     
         }

       return back()->with('error','We currently do not have enough items in stock.');

   }

   public function cart_destroy(Request $request,$cartId){
       
      $cart    = Cart::get($cartId);
      $product =  Product::where('_id',$cart->id)->first();
     	Cart::remove($cartId);
      $this->fnCartRestore();
      if($request->ajax()){
        return response()->json([
                                   'notification'   => ['message'=>'Product is removed from your cart.','title'=>$product->title],
                                   'status'         => 1, 
                                   'cart-count'    => Cart::count(),
                                   'cart-subtotal' => appendCurrency(Cart::subtotal()),
                                   'cart-wrap-html' => view('front.includes.cart_wrap')->render()
                            ],200);

      }else{

        return back()->with('success', 'Product has been removed!');
      }

   }

   protected function fnCartRestore()
   {
       if(auth()->check())
        {
            dispatch_now(new CartRestore());
        }
   }


}  