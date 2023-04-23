<?php 

namespace App\Http\Controllers\stripe;
use App\Http\Controllers\Controller;

class StripeController extends Controller {

     public function createCustomer() {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "source=tok_1KVo33LpkPS5oXolM9J6GqRs&email=testing@gmail.com");
        curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_59BrdQVtU5lC6Ewy0WCB2m7x00tlBcR66Z' . ':' . '');

        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {             
            echo 'Error:' . curl_error($ch);
            dd('error');
        }
        curl_close($ch);

        $result = json_decode($result);

        dd($result);
     }

     public function chargeStripe() {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "amount=4300&currency=usd&customer=cus_LC3oPPgKb47GEn");
        curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_59BrdQVtU5lC6Ewy0WCB2m7x00tlBcR66Z' . ':' . '');
        
        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);

            dd('error');
        }
        curl_close($ch);

         dd($result);
     }
}

