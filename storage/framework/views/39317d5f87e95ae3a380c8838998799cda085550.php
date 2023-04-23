<?php $__env->startSection('content'); ?>
<!-- breadcrumb -->
<!-- breadcrumb -->
<?php $__env->startComponent('front.includes.breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="<?php echo e(route('account.home')); ?>">Account</a></li>
<li class="breadcrumb-item"><a href="<?php echo e(Request::url()); ?>">Order History</a></li>
<?php if (isset($__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941)): ?>
<?php $component = $__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941; ?>
<?php unset($__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<!-- breadcrumb end-->
<!-- page-title -->
<?php $__env->startComponent('front.includes.page_title'); ?>
<h1 class="title page-title"><span>Order History</span></h1>
<?php if (isset($__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a)): ?>
<?php $component = $__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a; ?>
<?php unset($__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content" class=" col-sm-9">
                <div class="order-page-sec">
                    <div class="order-page_content">
                        <ul>
                            <?php if(!is_null($orders)): ?>
                             <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <li>
                                    <div class="order-page_card">
                                        <div class="order-page_card_ctnt">                                        
                                        <h3>Order #<?php echo e($order->unique_order_id); ?></h3>
                                        <p class="Meta">
                                            Order Date: <?php echo fnDateFormat($order->created_at); ?>

                                        </p>
                                        <p>This order is marked as <strong><em><?php echo orderstatusVal($order->orderstatus); ?></em></strong></p>
                                        <strong>Your Order Contains:</strong>
                                        <ul class="OrderItemList">
                                            <?php $__currentLoopData = $order->orderitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <?php echo e($orderitem->quantity); ?> x <?php echo e($orderitem->product->title); ?>

                                                    <span class="ExpectedReleaseDate"></span>
                                                 </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                        </div>
                                        <div class="order-page-buttons">
                                            <a href="<?php echo e(route('account.order-details',$order->_id)); ?>" class="btn main-btn">VIEW ORDER DETAILS</a>
                                        </div>
                                    </div>
                                    <hr>
                                 </li>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <?php endif; ?>   
                        </ul>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('front.includes.aside',['activelink' => 'account'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.layout',['pageslug' => 'Account','pagetitle'=>'Account|Order-History'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/front/modules/main/account/order/order_history.blade.php ENDPATH**/ ?>