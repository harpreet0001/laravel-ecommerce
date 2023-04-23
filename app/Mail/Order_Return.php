<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Order_Return extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$first_name,$last_name,$telephone,$order_id,$order_date,$quantity,$product_name,$product_code,$reason,$opened,$details)
    {
        $this->email = $email;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->telephone = $telephone;
        $this->order_id = $order_id;
        $this->order_date = $order_date;
        $this->quantity = $quantity;
        $this->product_name = $product_name;
        $this->product_code = $product_code;
        $this->reason = $reason;
        $this->opened = $opened;
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
           return $this->view('email.return')
                    ->with([
                        'email' => $this->email,
                        'first_name' => $this->first_name,
                        'last_name' => $this->last_name,
                        'telephone' => $this->telephone,
                        'order_id' => $this->order_id,
                        'order_date' => $this->order_date,
                        'product_name' => $this->product_name,
                        'product_code' => $this->product_code,
                        'reason' => $this->reason,
                        'opened' => $this->opened,
                        'details' => $this->details,
                        'quantity' => $this->quantity                            
                    ]);
    }
}
