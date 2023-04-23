<?php $__env->startSection('content'); ?>
<!-- breadcrumb -->
<!-- breadcrumb -->
<?php $__env->startComponent('front.includes.breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="">Order</a></li>
<?php if (isset($__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941)): ?>
<?php $component = $__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941; ?>
<?php unset($__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<!-- breadcrumb end-->
<div class="successfull-sec">
    <div class="container">    	
        <h2>Thank You! Your order has been successfully placed.</h2>
        <div class="mt-3 text-center">
        	We have sent you email regarding your order details.
        </div>
        <div class="mt-3 text-center">
        	Please visit our product <a href="<?php echo e(route('home')); ?>" class="btn btn-success">Click Here</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.layout',['pageslug' => 'Cart'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/front/modules/main/cart-checkout/success.blade.php ENDPATH**/ ?>