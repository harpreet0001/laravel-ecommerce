<?php $__currentLoopData = $shippingmethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $shippingmethod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<label> 
		<?php ( $shippingmethod_cost = calShippingMethodCost($shippingmethod->_id)); ?>
	<input type="radio" name="shipping_method" value="<?php echo e(base64_encode($shippingmethod->_id)); ?>" data-shipping-cost="<?php echo e($shippingmethod_cost); ?>" <?php if($index==0): ?> <?php echo e('checked'); ?> <?php endif; ?> >
	    <?php echo e($shippingmethod->methodname); ?> - <?php echo priceFormat($shippingmethod_cost); ?>

	</label>
	<br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/admin/modules/order/dynamic/shippingmethodlist.blade.php ENDPATH**/ ?>