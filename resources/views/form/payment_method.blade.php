<form method="post" action="{{route('checkout.payment_method_save')}}" id="payment_method_save" onsubmit="checkout.payment_method_save(this)">
	@csrf
	@method('post')
    <div class="radio">
		<label> <input type="radio" name="payment_method" value="Credit Card / Debit Card" checked="checked">Credit Card / Debit Card</label>
	</div>
	<p><strong>Add Comments About Your Payment</strong></p>
	<p>
	    <textarea name="order_comment" rows="8" class="form-control" placeholder="Write here..."></textarea>
	</p>
	<div class="buttons">
	    <div class="pull-right">I have read and agree to the <a href="{{route('terms-conditions')}}" class="agree" target="_blank"><b>Terms &amp; Conditions</b></a>
	        <input type="checkbox" name="agree" value="1">
	        <span class="text text-danger error-msg" id="agree_error"></span>
	        &nbsp;
	        <button type="submit" id="button-payment-method" data-loading-text="Loading..." class="btn btn-primary"><span>Continue</span></button>
	    </div>
	</div>
</form>