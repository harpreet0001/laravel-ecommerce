<?php
namespace App\Http\Controllers;
use Mail;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Traits\NewsletterTrait;
use App\Mail\NewsletterSubscriptionMail;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{ 
    use NewsletterTrait;

    public function subscription(Request $request)
    {
        $this->validate($request,[
           'email' => ['required', 'string', 'email', 'regex:/^([a-zA-Z0-9_\-\.])+\@([a-zA-Z0-9\-])+\.[a-zA-Z]{2,4}$/i','max:255'],
           'agree' => ['required','integer','in:1']
        ],[

              'agree.*' => 'Please agree to our privacy policy'
          ]);
    
        $newslettersubscriber = Newsletter::where('email',$request->email)->first();
        if(is_null($newslettersubscriber)){
           
            return $this->create_newsletter_subscription($request->email);
        }
        throw ValidationException::withMessages(['email' => 'Your are already subscribed.']);
    }

    
}
