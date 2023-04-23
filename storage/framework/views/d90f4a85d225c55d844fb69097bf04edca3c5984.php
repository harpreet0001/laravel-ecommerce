<form method="post" action="<?php echo e(route('checkout.payment_method_save')); ?>" id="payment_method_save" onsubmit="checkout.payment_method_save(this)">
	<?php echo csrf_field(); ?>
	<?php echo method_field('post'); ?>
    <div class="radio">
		<label> <input type="radio" name="payment_method" value="Credit Card / Debit Card" checked="checked">Credit Card / Debit Card</label>
	</div>
	<p><strong>Add Comments About Your Payment</strong></p>
	<p>
	    <textarea name="order_comment" rows="8" class="form-control" placeholder="Write here..."></textarea>
	</p>
	<div class="buttons">
	    <div class="pull-right">I have read and agree to the <a href="<?php echo e(route('terms-conditions')); ?>" class="agree" target="_blank"><b>Terms &amp; Conditions</b></a>
	        <input type="checkbox" name="agree" value="1">
	        <span class="text text-danger error-msg" id="agree_error"></span>
	        &nbsp;
	        <button type="submit" id="button-payment-method" data-loading-text="Loading..." class="btn btn-primary"><span>Continue</span></button>
	    </div>
	</div>
</form><?php /**PATH E:\Ecommerce\resources\views/form/payment_method.blade.php ENDPATH**/ ?>