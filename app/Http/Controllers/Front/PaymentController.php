<?php 

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class PaymentController extends Controller {

    public $path ='front.modules.main.cart-checkout.';

	public function index() {

        return view($this->path.'payment');		
	}
}