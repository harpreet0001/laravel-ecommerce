<?php $__env->startSection('content'); ?>
<!-- breadcrumb -->
<!-- breadcrumb -->
<?php $__env->startComponent('front.includes.breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="<?php echo e(route('account.home')); ?>">Account</a></li>
<li class="breadcrumb-item"><a href="<?php echo e(Request::url()); ?>">Order Detail</a></li>
<?php if (isset($__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941)): ?>
<?php $component = $__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941; ?>
<?php unset($__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<!-- breadcrumb end-->
<!-- page-title -->
<?php $__env->startComponent('front.includes.page_title'); ?>
<h1 class="title page-title"><span>Order-Details</span></h1>
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
                <div class="AccountOrder">
                    <h2>MEGATAN - Order #<?php echo e($order->unique_order_id); ?></h2>
                    <div class="BlockContent">
                        <p class="InfoMessage">
                            Your order details are shown below.
                        </p>
                        <p class="Meta">
                            <span style="display: ">
                                <strong>Order Status:</strong> <?php echo ucwords(orderstatusVal($order->orderstatus)); ?><br>
                            </span>
                            <strong>Order Date:</strong> <?php echo fnDateTimeFormat($order->created_at); ?><br>
                            <strong>Order Total: <?php echo priceFormat($order->total); ?></strong>
                        </p>
                        <hr>
                        <div class="Billing-wrapper">
                            <div class="BillingDetails">
                                <?php ($billingaddress = $order->billing_address_details); ?>
                                <h3>Billing Details</h3>
                                <strong><?php echo e($billingaddress->firstname); ?> <?php echo e($billingaddress->lastname); ?></strong><br>
                                <?php echo getCountryName($billingaddress->countryId); ?> <?php echo getStateName($billingaddress->stateId); ?> <?php echo e($billingaddress->city); ?> <?php echo e($billingaddress->company); ?> <br>
                                <?php echo e($billingaddress->address_1); ?><br>
                                <?php echo e($billingaddress->address_2); ?>

                                
                            </div>
                            <div class="ShippingDetails" style="">
                                <?php ($shippingaddress = $order->shipping_address_details); ?>
                                <h3>Shipping Details</h3>
                                <strong><?php echo e($shippingaddress->firstname); ?> <?php echo e($shippingaddress->lastname); ?></strong><br>
                                <?php echo getCountryName($shippingaddress->countryId); ?> <?php echo getStateName($shippingaddress->stateId); ?> <?php echo e($shippingaddress->city); ?> <?php echo e($shippingaddress->company); ?> <br>
                                <?php echo e($shippingaddress->address_1); ?><br>
                                <?php echo e($shippingaddress->address_2); ?>

                            </div>
                        </div>
                        <hr class="Clear">
                        <form>
                            <div class="table-responsive">
                                <h3>Order #<?php echo e($order->unique_order_id); ?> Contained the Following Items:</h3>
                                <table class="table table-bordered order-detail_table">
                                    <thead>
                                        <tr>
                                            <tr>Product Image</tr>
                                            <td class="text-left td-details">Item Details</td>
                                            <td class="text-right td-price">Price</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $order->orderitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                           <tr>
                                                <td class="OrderItem">
                                                    <img src="<?php echo e(imagePath($orderitem->product->image)); ?>" width="60">
                                                    <!-- <input type="checkbox"> -->
                                                    <?php echo e($orderitem->quantity); ?> x
                                                    <a href="<?php echo e(route('product.show',$orderitem->product->slug)); ?>"><?php echo e($orderitem->product->title); ?></a>
                                                </td>
                                                <td class="OrderItem" align="right"><em class="ProductPrice"><?php echo priceFormat($orderitem->price); ?></em></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="SubTotal" align="right">
                                            <td>Subtotal:</td>
                                            <td><em class="ProductPrice"><?php echo priceFormat($order->subtotal); ?></em></td>
                                        </tr>
                                        <?php if(!empty($order->discount) && $order->discount != 0): ?>
                                        <tr class="SubTotal" align="right">
                                            <td>Discount:</td>
                                            <td><em class="ProductPrice">-<?php echo priceFormat($order->discount); ?></em></td>
                                        </tr>
                                        <?php endif; ?>
                                        <tr class="Shipping" align="right">
                                            <?php 
                                                 
                                                $shipping_method_details = $order->shipping_method_details; 
                                            ?>
                                            <td>Shipping(<?php echo e($shipping_method_details->methodname); ?>):</td>
                                            <td><em class="ProductPrice">+ <?php echo priceFormat($order->shipping); ?></em></td>
                                        </tr>
                                        <tr class="Tax" align="right">
                                            <td>Tax:</td>
                                            <td><em class="ProductPrice">+ <?php echo priceFormat($order->tax); ?></em></td>
                                        </tr>
                                        <tr class="SubTotal" align="right">
                                            <td>Grand Total:</td>
                                            <td><em class="ProductPrice"><?php echo priceFormat($order->total); ?></em></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="order-page-buttons">
                                <!-- <button class="btn main-btn">REORDER</button> -->
                            </div>
                        </form>
                        <!-- <div class="order-comments">
                            <hr class="Clear">
                            <h3>Order Instructions/Comments</h3>
                            <div class="">
                                <p>
                                    Testing order by Deftsoft team
                                </p>
                            </div>
                        </div> -->
                        <hr class="Clear">
                        <?php 
                                $order_shipment = $order->ordershipment;
                        ?>
                        <?php if(!is_null($order_shipment)): ?>
                        <h3>Shipments for Order #<?php echo e($order->unique_order_id); ?></h3>
                            <div class="table-responsive">                               
                                <table class="table table-bordered OrderShipments">
                                    <thead>
                                        <tr>
                                            <th class="DateShipped">Date Shipped</th>
                                            <th class="ShippingMethod">Shipping Method</th>
                                            <th class="TrackingNumber">Tracking Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td class="DateShipped"><?php echo e($order_shipment->created_at); ?></td>
                                        <td class="ShippingMethod"><span style=""> (<?php echo e($order_shipment->shipping_methodname); ?>)</span></td>
                                        <td class="TrackingNumber"><?php echo e($order_shipment->shipping_trackno); ?></td>
                                    </tbody>
                                </table>
                            </div> 
                         <?php endif; ?>                              
                    </div>
                </div>
            </div>
            <?php echo $__env->make('front.includes.aside',['activelink' => 'order-history'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.layout',['pageslug' => 'Account','pagetitle'=>'Account|Order-Details'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/front/modules/main/account/order/order_details.blade.php ENDPATH**/ ?>