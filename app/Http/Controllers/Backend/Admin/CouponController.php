<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use App\User;
use Validator;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Backend\Admin\CommonController;
use Mail;

class CouponController extends CommonController
{
    public $path ='admin.modules.coupon.';

    protected function validators(array $data,$couponId = null)
    {
        $discount_type = $data['discount_type'];
        $rules = [

                    'coupon'         => ['required', 'string', 'min:2','max:100','unique:coupons'],
                    'discount_type'  => ['required', 'integer', 'in:1,2'],
                    'coupon_for'     => ['nullable', 'integer', 'in:1,2'],
                    'discount'       => ['required', 'numeric'],
                    'min_cart_total' => ['required', 'numeric'],
                    'max_discount'   => ['required_if:discount_type,==,1','gt:min_cart_total'],
                    'usage_time'     => ['nullable', 'integer','min:1','max:100000'],
                    'expire_date'    => ['required', 'date','date_format:Y/m/d','after_or_equal:'.date('Y/m/d')], 
                    'description'    => ['nullable','sometimes', 'string', 'min:2','max:10000'],
                    "users"          => ['required_if:coupon_for,==,2'],
                    "users.*"        => ['required_if:coupon_for,==,2','distinct'],

                ];

        if($discount_type == 1){
            
            $rules = array_merge($rules,[
                      
                'discount' => ['required', 'numeric','min:1','max:100'],  
            ]);
        }

        if($discount_type == 2){
            
            $rules = array_merge($rules,[
                      
                'discount' => ['required', 'numeric','lt:min_cart_total'], 
            ]);
        }

        if($data['_method'] == 'patch'){

            $rules = array_merge($rules,[
                   
                   'coupon'  => 'required|string|unique:coupons,'.$couponId,
            ]);
        }        
        
        return Validator::make($data,$rules);
    }

    public function list()
    {
        $Coupons = Coupon::where('delete','!=',1)->get();
        return view($this->path."list")->with(['Coupons' => $Coupons]);
    }

    public function create()
    {
        $users = User::where('active',1)->where('delete','!=',1)->get();
        return view($this->path."create",compact('users'));
    }

    public function save(Request $request)
    {
        $this->validators($request->all())->validate();
        $return_result = $this->store($request->all()); 
        $msgz = "";
        if($return_result){
            $msgz = 'Record Saved Succesfully..!!';
        }else{
            $msgz = 'Something went wrong..!!';
        }       
        return redirect()->route('coupon-list')->withSuccess($msgz);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $CouponData = Coupon::where('_id',base64_decode($id))->where('delete','!=',1)->first();
        if(is_null($CouponData)){
             abort('404');
        }
        $users = User::where('active',1)->where('delete','!=',1)->get();
        return view($this->path."edit")->with(['CouponData' => $CouponData,'users' => $users]);
    }

    public function update(Request $request, $id)
    {
        $CouponData = Coupon::where('_id', base64_decode($id))->first();
        $this->validators($request->all(),$CouponData->_id)->validate();
        $return_result = $this->store($request->all(),$CouponData); 
        $msgz = "";
        if($return_result){
            $msgz = 'Record Updated Succesfully..!!';
        }else{
            $msgz = 'Something went wrong..!!';
        }       
        return redirect()->route('coupon-list')->withSuccess($msgz);

    }

    public function delete($id)
    {
        $id         = base64_decode($id);
        $return     = Coupon::where('_id',$id)->first()->fill(['delete' => 1])->update();
        $msg        = 'Something went wrong..!!';
        if($return){
            $msg = 'Record deleted succesfully.';
        }
        return redirect()->route('coupon-list')->withSuccess($msg);
    }

    public function active(Request $request, $id)
    {
        $value  = $request->value == 'true' ? 1 : 0;
        $return = Coupon::where('_id',$id)->update(['active' => $value]);
        return response()->json(['return'=>$return]);
    }

    protected function store(array $data,$CouponData = null)
    { 

        $db_CouponData = [

                'coupon'         => $data['coupon'],
                'discount_type'  => empty($data['discount_type'])  ? (int)"1"           : (int)   $data['discount_type'],
                'coupon_for'     => empty($data['coupon_for'])     ? (int)"1"           : (int)   $data['coupon_for'],
                'users'          => empty($data['users'])          ?  json_encode([""]) :         json_encode($data['users']),
                'discount'       => empty($data['discount'])       ? (float)"0"         : (float) $data['discount'],
                'min_cart_total' => empty($data['min_cart_total']) ? (float)"0.00"      : (float) $data['min_cart_total'],
                'max_discount'   => (empty($data['max_discount']) 
                                         || 
                                     $data['discount_type'] != '1') ? (float)"0.00"     : (float) $data['max_discount'],
                'usage_time'     => empty($data['usage_time'])      ? ""                : (int)   $data['usage_time'],
                'expire_date'    => empty($data['expire_date'])     ? ""                :         $data['expire_date'],
                'description'    => empty($data['description'])     ? ""                :         $data['description'],
                'active'         => 1,
                'delete'         => 0,
            ]; 

        if(is_null($CouponData) || $data['_method'] != 'patch') {
            return Coupon::create($db_CouponData);
        }
        else {
            return $CouponData->fill($db_CouponData)->update();
        }          
    }


}

