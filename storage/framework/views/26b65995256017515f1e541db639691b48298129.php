<?php $__env->startSection('meta-data'); ?>
<meta name="auth-check" content="<?php echo e((Auth::check()) ? 'true' : 'false'); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- breadcrumb -->
<!-- breadcrumb -->
<?php $__env->startComponent('front.includes.breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">checkout/checkout</a></li>
<?php if (isset($__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941)): ?>
<?php $component = $__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941; ?>
<?php unset($__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<!-- breadcrumb end-->
<!-- page-title -->
<?php $__env->startComponent('front.includes.page_title'); ?>
<h1 class="title page-title"><span>checkout/checkout</span></h1>
<?php if (isset($__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a)): ?>
<?php $component = $__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a; ?>
<?php unset($__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<div id="checkout-checkout" class="container">
    <div class="row">
        <div id="content" class="col-sm-12">
            <div class="panel panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#collapse-checkout-option" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle collapsed" aria-expanded="false">Step 1: Checkout Options <i class="fa fa-caret-down <?php if(!auth()->check()): ?> <?php echo e('fa-minus fa-plus'); ?> <?php endif; ?>"></i></a>
                        </h4>
                    </div>
                    <?php if(!auth()->check()): ?>
                        <div class="panel-collapse collapse" id="collapse-checkout-option" data-parent="#accordion" aria-expanded="false" style="height: 0px;">
                            <div class="panel-body">
                                <div class="row login-box">
                                    <div class="col-sm-6">
                                        <div class="well">
                                            <h2 class="title">New Customer</h2>
                                            <p>Checkout Options:</p>
                                            <div class="radio">
                                                <label><input type="radio" name="account" value="register" checked="checked">Register Account</label>
                                            </div>
                                            <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                                            <div class="buttons">
                                                <div class="pull-right">
                                                    <button type="button" id="button-account" data-loading-text="Loading..." class="btn btn-primary" action="<?php echo e(route('checkout.checkout_register')); ?>"><span>Continue</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="well">
                                            <h2 class="title">Returning Customer</h2>
                                            <p>I am a returning customer</p>
                                            <form method="post" action="<?php echo e(route('checkout.checkout_login')); ?>" id="login-forms" onsubmit="checkout.login(this)">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('post'); ?>
                                                <?php echo $__env->make('form.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <div class="buttons">
                                                    <div class="pull-right">
                                                        <button type="submit" id="button-login" data-loading-text="Loading..." class="btn btn-primary"><span>Login</span></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#collapse-payment-address" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle collapsed" aria-expanded="false">
                                Step 2: <?php if(!auth()->check()): ?><?php echo e('Account &'); ?><?php endif; ?> Billing Details <i class="fa fa-caret-down"></i>
                            </a>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapse-payment-address" data-parent="#accordion" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">

                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#collapse-shipping-address" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle" aria-expanded="true">Step 3: Delivery Details <i class="fa fa-caret-down"></i></a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapse-shipping-address" data-parent="#accordion" aria-expanded="true" style="">
                        <div class="panel-body">

                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#collapse-shipping-method" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle" aria-expanded="true">Step 4: Delivery Method <i class="fa fa-caret-down"></i></a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapse-shipping-method" data-parent="#accordion" aria-expanded="true" style="">
                        <div class="panel-body">

                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#collapse-payment-method" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle" aria-expanded="true">Step 5: Payment Method <i class="fa fa-caret-down"></i></a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapse-payment-method" data-parent="#accordion" aria-expanded="true" style="">
                        <div class="panel-body">

                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#collapse-checkout-confirm" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle" aria-expanded="true">Step 6: Confirm Order <i class="fa fa-caret-down"></i></a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapse-checkout-confirm" data-parent="#accordion" aria-expanded="true" style="">
                        <div class="panel-body">


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.layout',['pageslug' => 'checkout/checkout'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Ecommerce\resources\views/front/modules/main/cart-checkout/checkout.blade.php ENDPATH**/ ?>