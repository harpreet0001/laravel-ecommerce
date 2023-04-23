<?php
namespace App\Http\Controllers\Front;

use Hash;
use App\User;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Traits\NewsletterTrait;
use App\Http\Controllers\Controller;
use App\Mail\NewsletterSubscriptionMail;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
  use NewsletterTrait;

	public $path ='front.modules.main.account.';

	protected $account_details_rules = [

            'firstname' => ['required', 'string','regex:/^[\pL\s\-]+$/','max:255'],
            'lastname'  => ['required', 'string','regex:/^[\pL\s\-]+$/','max:255'],
            'contact'   => ['required','min:9','max:15'],
  
	];

	protected $account_password_rules = [

         'password' => ['required', 'string','min:5','max:255','confirmed'],
  
	];
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function account(){
    	return view($this->path.'account');
    }

    public function edit_account_details(){
        return view($this->path.'edit_account_details');
    }

    public function update_account_details(Request $request){
        $data = $this->validate($request,$this->account_details_rules);
        try {
        	  auth()->user()->fill($data)->update();
        	  return back()->with('success','Account details updated.');
        } catch (Exception $e) {
        	  return back()->with('error','Account details not updated.');
        }
        
    }

    public function edit_account_password(){
       return view($this->path.'edit_account_password');
    }

    public function update_account_password(Request $request){
          $data = $this->validate($request,$this->account_password_rules);
          try {
             auth()->user()->fill(['password' => Hash::make($data['password'])])->update();
             return back()->with('success','Account password updated.');
          } catch (Exception $e) {
          	return back()->with('error','Account password not updated.');
          }
    }

    public function newsletter(Request $request){

    	if($request->method() == 'GET'){		
    	  return view($this->path.'newsletter');
    	}
      else
      {
          try
          {
              if($request->newsletter == '1'){

  	            if(!auth()->user()->isNewletterSubscriber()){
                   $this->create_newsletter_subscription(auth()->user()->email);

                   return back()->with('success','You are successfully subscribed to newsletter.');
                }else {
                    return back()->with('error','You are already subscribed to newsletter.');
                }

              }else {
                  Newsletter::where('email',auth()->user()->email)->delete();
                  return back()->with('success','You are successfully unsubscribed to newsletter.');
              }
	            
	        } catch (Exception $e) {
	          	 return back()->with('error','Error while newsletter.');
	        }
     
    	}
    }


}


        
        