<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Mail\Contact;
use App\Mail\Order_Return;
use App\User;
use Auth;
use Mail;
use Session;

class PageController extends Controller
{
	public $path ='front.modules.main.';

  public function static(Request $request){
        $slug =  $request->route()->getName();
        $data = \App\Models\Page::where('slug',$slug)->first();
        
        return view($this->path.'dynamic_pages')->with('data',$data);
    }

    public function contact_form(Request $request){
        return view($this->path.'contact');
    }

    public function contact_form_save(Request $request){
        Mail::to(env('SUPPORT_EMAIL'))->send(new Contact($request->name,$request->email,$request->topic,$request->message));
        Session::flash('success', 'Mail has been successfully send');
        return redirect()->back();
    }

    public function return(){
        return view($this->path.'return');   
    }

    public function return_form_save(Request $request){
      $email = $request->email;
      $first_name = $request->first_name;
      $last_name = $request->last_name;
      $telephone = $request->telephone;
      $order_id = $request->order_id;
      $order_date = $request->order_date;
      $product_name = $request->product_name;
      $product_code = $request->product_code;
      $quantity = $request->quantity;
      $reason = $request->reason;
      $opened = $request->opened;
      $details = $request->details;
      Mail::to('test@yopmail.com')->send(new Order_Return($email,$first_name,$last_name,$telephone,$order_id,$order_date,$quantity,$product_name,$product_code,$reason,$opened,$details));
        Session::flash('message', 'Mail has been successfully send');
            return redirect()->back();
      

     
    }

}  