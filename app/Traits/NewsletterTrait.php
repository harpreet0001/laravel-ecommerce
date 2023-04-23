<?php
namespace App\Traits;

use Mail;
use App\Models\Newsletter;
use App\Mail\NewsletterSubscriptionMail;

Trait NewsletterTrait
{ 
    public function create_newsletter_subscription($email)
    {
        Newsletter::create(['email' => $email,'subscribe' => Newsletter::$subscribe]);
        Mail::to($email)->send(new NewsletterSubscriptionMail($email));
        return response()->json(['success' => 'Thank you for your subscription','status' => 1]); 
    }
  
}
