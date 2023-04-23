<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use Validator;
use DataTables;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use App\Http\Controllers\Backend\Admin\CommonController;

class ProductreviewController extends CommonController
{
    public $path ='admin.modules.productreview.';

    protected function validators(array $data)
    {

        $rules =  [
                      'posted_by'  => 'required|string|min:2:max:255',
                      'title'      => 'required|string|min:2|max:255',
                      'review'     => 'required|string|min:10|max:10000',
                      'rating'     => 'required|integer|in:1,2,3,4,5',
                  ];
        $messages =  [
                     'posted_by.required' => 'Name field is required',
                     'posted_by.min'      => 'Name field should have min 2 characters',
                     'posted_by.max'      => 'Name field should have max 255 characters',
                  ];

        return Validator::make($data,$rules,$messages);
    }

    public function list()
    {  
        $productReviews = ProductReview::latest()->get();
        return view($this->path."list")->with(['productReviews' => $productReviews]);
    }

    public function create()
    {
        //return view($this->path."create");
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $ProductReviewData = ProductReview::where('_id',base64_decode($id))->first();
        if(is_null($ProductReviewData)){
             abort('404');
        }
        return view($this->path."edit")->with(['ProductReviewData' => $ProductReviewData]);
    }

    public function update(Request $request, $id)
    {
        $data           = $this->validators($request->all())->validate();
        $data['active'] = isset($request->active) ? 1 : 0;

        $ProductReview  = ProductReview::where('_id',base64_decode($id))->first();
        if(is_null($ProductReview)){
             abort('404');
        }
        $return     = $ProductReview->fill($data)->update();
        $msg        = 'Something went wrong..!!';
        if($return){
            $msg    = 'Record upadted succesfully.';
        }
        return redirect()->route('productreview-list')->withSuccess($msg); 
    }

    public function delete($id)
    {
        $id         = base64_decode($id);
        $return     = ProductReview::where('_id',$id)->first()->delete();
        $msg        = 'Something went wrong..!!';
        if($return){
            $msg = 'Record deleted succesfully.';
        }
        return redirect()->route('productreview-list')->withSuccess($msg); 
    }

    public function active(Request $request, $id)
    {
        $value  = $request->value == 'true' ? 1 : 0;
        $return = ProductReview::where('_id',$id)->update(['active' => $value]);
        return response()->json(['return'=>$return]);
    }
}
