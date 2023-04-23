<?php $__env->startSection('content'); ?>
 	<?php ($user                    = $order->orderuser); ?>
    <?php ($billing_details         = $order->billing_address_details); ?>
    <?php ($shipping_details        = $order->shipping_address_details); ?>
    <?php ($orderitems              = $order->orderItems); ?>
    <?php ($shipping_method_details = $order->shipping_method_details); ?>
 <div style="padding: 0 20px 20px;"> 
    <h2 style="font-size:22px;height:30px;color:#cc6600;border-bottom:dashed 1px gray">Thanks for Your Order!</h2>
    <div style="padding:10px;background-color:#fff4ea">
        <img src="https://ci6.googleusercontent.com/proxy/vovAzbTKxIX18WmmAOcFEJE7Y_VBEIGNi7iGFV5-18mOdTrQQxIHVW1ZuP-dNIXQAqOYZVk6nOBgXoT-Q7w2cMv_lN7-EZ1cW72o05jr=s0-d-e1-ft#https://megatan.ws/templates/megatan/images/InfoMessage.gif" class="CToWUd">&nbsp;
        Your order ID is <strong>#<?php echo e($order->unique_order_id); ?></strong>. A summary of your order is
        shown below. To view the status of your order <a href="<?php echo e(route('account.order-details',$order->_id)); ?>">click here</a>.
    </div>
    <br>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td id="" width="50%" valign="top">
                    <h3 style="font-family:Arial;font-size:18px">Shipping Address</h3>
                    <div style="font-family:Arial;font-size:12px">
                    	<?php if(isset($billing_details)): ?>
		                    <strong><?php echo e($billing_details->firstname); ?> <?php echo e($billing_details->lastname); ?></strong>
			                <br><?php echo e($billing_details->company); ?>

			                <br>
			                <?php echo e($billing_details->city); ?>,<?php echo getStateName($billing_details->stateId); ?>,<?php echo getCountryName($billing_details->countryId); ?> <br>
			                <?php echo e($billing_details->address_1); ?><br>
			                <?php echo e($billing_details->address_2); ?>

			                <?php echo e($user->phone); ?><br>
			                <?php echo e($user->email ?? ''); ?>

                        <?php endif; ?>
                </td>
                <td id="" width="50%" valign="top">
                    <h3 style="font-family:Arial;font-size:18px">Billing Address</h3>
                    <div style="font-family:Arial;font-size:12px">
                    	 <?php if(isset($shipping_details)): ?>
		                    <strong><?php echo e($shipping_details->firstname); ?> <?php echo e($shipping_details->lastname); ?></strong>
			                <br><?php echo e($shipping_details->company); ?>

			                <br>
			                <?php echo e($shipping_details->city); ?>,<?php echo getStateName($shipping_details->stateId); ?>,<?php echo getCountryName($shipping_details->countryId); ?><br>
			                <?php echo e($shipping_details->address_1); ?><br>
			                <?php echo e($shipping_details->address_2); ?>

			                <?php echo e($user->phone); ?><br>
			                <?php echo e($user->email ?? ''); ?>

		                <?php endif; ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br><br>
    <div style="font-size:12px">
        <h3 style="font-size:18px">Your Payment Comments:</h3><?php echo e($order->payment_method_comment ?? 'NA'); ?>

    </div>
    <div style="font-size:12px">
        <h3 style="font-size:18px">Your Shipping Comments:</h3><?php echo e($order->shipping_method_comment ?? 'NA'); ?>

    </div>
    <br><br>
    <div style="font-size:12px">
        <h3 style="font-size:18px">Payment Method:</h3><?php echo e($order->payment_method ?? 'NA'); ?>

    </div>

    <h3 style="font-size:18px">Your Order Contains...</h3>
    <table width="100%" id="" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td style="font-family:Arial;font-size:12px;background-color:#020b6f;color:white;padding:5px;font-weight:bold" nowrap="">Cart Items</td>
                <td style="font-family:Arial;font-size:12px;background-color:#020b6f;color:white;padding:5px;font-weight:bold" nowrap="" width="100">Qty</td>
                <td style="font-size:12px;background-color:#020b6f;color:white;padding:5px;font-weight:bold" nowrap="" width="150">Item
                    Price</td>
                <td style="font-family:Arial;font-size:12px;background-color:#020b6f;color:white;padding:5px;font-weight:bold" nowrap="" width="200" align="right">Item Total</td>
            </tr>
        </tbody>
    </table>
    <table width="100%" cellspacing="0" cellpadding="0" style="border:1px solid #c7d7db">
        <tbody>
        	<?php if(isset($orderitems)): ?>
					<?php $__currentLoopData = $orderitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                <tr>
		                    <td style="padding:5px;font-size:12px;border-bottom:solid 1px #cacaca">
		                        <strong><?php echo e($orderitem->product->title); ?></strong>
		                        <br>
		                        <table style="font-family:Arial;font-size:11px"></table>
		                    </td>
		                    <td style="padding:5px;font-size:12px;border-bottom:solid 1px #cacaca" width="100"><?php echo e($orderitem->quantity); ?></td>
		                    <td style="padding:5px;font-size:12px;border-bottom:solid 1px #cacaca" width="150"><?php echo e(priceFormat($orderitem->price)); ?></td>
		                    <td style="padding:5px;font-size:12px;border-bottom:solid 1px #cacaca" align="right" width="200"><strong><?php echo e(priceFormat($orderitem->price * $orderitem->quantity)); ?></strong></td>
		                </tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>   
        </tbody>
    </table>
    <table width="100%" id="" cellspacing="0" cellpadding="4">
        <tbody>
            <tr>
                <td align="right" style="font-family:Arial;font-size:12px"><strong>Subtotal:</strong></td>
                <td width="100" align="right" style="font-family:Arial;font-size:12px"><strong><?php echo priceFormat($order->subtotal); ?></strong></td>
            </tr>
        </tbody>
    </table>
     <?php if(!empty($order->discount) && $order->discount != 0): ?>
     <table width="100%" id="" cellspacing="0" cellpadding="4">
        <tbody>
            <tr>
                <td align="right" style="font-family:Arial;font-size:12px"><strong>Discount:</strong></td>
                <td width="100" align="right" style="font-family:Arial;font-size:12px"><strong>-<?php echo priceFormat($order->discount ?? 0); ?></strong></td>
            </tr>
        </tbody>
    </table>
    <?php endif; ?>
    <table width="100%" id="" cellspacing="0" cellpadding="4">
        <tbody>
            <tr>
                <td align="right" style="font-family:Arial;font-size:12px"><strong>Shipping(<?php echo e($shipping_method_details->methodname ?? ''); ?>):</strong></td>
                <td width="100" align="right" style="font-family:Arial;font-size:12px"><strong><?php echo priceFormat($order->shipping ?? 0); ?></strong></td>
            </tr>
        </tbody>
    </table>
    <table width="100%" id="" cellspacing="0" cellpadding="4">
        <tbody>
            <tr>
                <td align="right" style="font-family:Arial;font-size:12px"><strong>Tax:</strong></td>
                <td width="100" align="right" style="font-family:Arial;font-size:12px"><strong><?php echo priceFormat($order->tax ?? 0); ?></strong></td>
            </tr>
        </tbody>
    </table>
    <table width="100%" id="" cellspacing="0" cellpadding="4">
        <tbody>
            <tr>
                <td align="right" style="font-family:Arial;font-size:12px"><strong>Grand Total:</strong></td>
                <td width="100" align="right" style="font-family:Arial;font-size:12px"><strong><?php echo priceFormat($order->total); ?></strong></td>
            </tr>
        </tbody>
    </table>
        <p style="margin-top:12px;margin-top: 12px;padding: 10px;background: #ececec;">
            <strong><span class="il"><?php echo e(config('app.name')); ?></span></strong>
            <br>
            <a href="<?php echo e(env('APP_URL')); ?>"><?php echo e(env('APP_URL')); ?></a>
        </p>
</div>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('email.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/email/orders/placed.blade.php ENDPATH**/ ?>