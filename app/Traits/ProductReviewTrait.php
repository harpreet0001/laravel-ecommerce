<?php
namespace App\Traits;

use Mail;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductReview;

Trait ProductReviewTrait
{ 
    public function add(Request $request,$encodedProductId)
    {
    	$data = $this->validate($request,[
                
              'posted_by'  => 'required|string|min:2:max:255',
              'title'      => 'required|string|min:2|max:255',
              'review'     => 'required|string|min:10|max:10000',
              'rating'     => 'required|integer|in:1,2,3,4,5'
        ],[

             'posted_by.required' => 'Name field is required',
             'posted_by.min'      => 'Name field should have min 2 characters',
             'posted_by.max'      => 'Name field should have max 255 characters',
        ]);

        $productId = base64_decode($encodedProductId);
        $product   = Product::findorFail($productId);
        if(!is_null($product)){
        	$data['productId'] = $product->_id;
        	$data['rating']    = (int)$data['rating'];
        	$data['active']    = 0;
            ProductReview::create($data);
            return response()->json(['success' => 'Yoou view successfully submitted for verification','status' => 1],200);
        }
        return response()->json(['error' => 'Product not found','status' => 0],404);

    }
  
}
