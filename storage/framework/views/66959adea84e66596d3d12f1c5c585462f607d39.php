<form method="post" action="<?php echo e(route('checkout.shipping_method_save')); ?>" id="shipping_method_save" onsubmit="checkout.shipping_method_save(this)">
    <?php echo csrf_field(); ?>
    <?php echo method_field('post'); ?>
    <p>Please select the preferred shipping method to use on this order.</p>
    <p><strong>Total-Based Shipping</strong></p>
    <div class="radio">
        <?php $__currentLoopData = $shippingmethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $shippingmethod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <label> 
            <input type="radio" name="shipping_method" value="<?php echo e(base64_encode($shippingmethod->_id)); ?>" <?php if($index==0): ?> <?php echo e('checked'); ?> <?php endif; ?> >
                <?php echo e($shippingmethod->methodname); ?> - <?php echo priceFormat(calShippingMethodCost($shippingmethod->_id)); ?>

            </label>
            <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <span class="text text-danger err-msg" id="shipping_method_error"></span>
    </div>
    <p><strong>Add Comments About Your Delivery</strong></p>
    <p>
        <textarea name="shipping_method_comment" rows="8" class="form-control" placeholder="Write here..."></textarea>
    </p>
    <div class="buttons">
        <div class="pull-right">
            <button type="submit" id="button-shipping-method" data-loading-text="Loading..." class="btn btn-primary"><span>Continue</span></button>
        </div>
    </div>
</form>
<?php /**PATH E:\Ecommerce\resources\views/form/shipping_method.blade.php ENDPATH**/ ?>