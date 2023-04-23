<?php $__env->startSection('content'); ?>
<!-- breadcrumb -->
<!-- breadcrumb -->
<?php $__env->startComponent('front.includes.breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="<?php echo e(route('cart.index')); ?>">Cart</a></li>
<?php if (isset($__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941)): ?>
<?php $component = $__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941; ?>
<?php unset($__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<!-- breadcrumb end-->
<!-- page-title -->
<?php $__env->startComponent('front.includes.page_title'); ?>
<h1 class="title page-title"><span>Cart</span></h1>
<?php if (isset($__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a)): ?>
<?php $component = $__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a; ?>
<?php unset($__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<!-- page-title  end-->
<section class="my-account-all-sec cart-detail-sec">
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-9">
                 <?php echo $__env->make('message.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                 <?php echo $__env->make('message.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="cart-page">
                    <div class="cart-table">
                      <?php if(Cart::count() >0): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="text-center td-image">Image</td>
                                        <td class="text-left td-name">Product Name</td>
                                        <td class="text-center td-model">Category</td>
                                        <td class="text-center td-qty">Quantity</td>
                                        <td class="text-center td-price">Unit Price</td>
                                        <td class="text-center td-total">Total</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center td-image">
                                             <a href="<?php echo e(route('product.show',$item->model->slug)); ?>">
                                                <img src="<?php echo e(imagePath($item->model->image)); ?>" alt="" title=""></a> 
                                            </td>
                                            <td class="text-left td-name">
                                                <a href="<?php echo e(route('product.show',$item->model->slug)); ?>"><?php echo e($item->model->title); ?></a><br>
                                            </td>
                                            <td class="text-center td-model"><?php echo e($item->model->getCategory->title ?? ''); ?></td>
                                            <td class="text-center td-qty">
                                                <div class="input-group btn-block">

                                                    <form method="post" action="<?php echo e(route('cart.update',$item->rowId)); ?>">   
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('patch'); ?>
                                                        <!-- Quantity-inc-dec-btn -->
                                                        <?php echo quantityIncDecInput("stepper",$item->qty,$item->model->currentstock); ?>

                                                         <!-- Quantity-inc-dec-btn -->
                                                        <span class="input-group-btn">
                                                         <input type="hidden" name="productId" value="<?php echo e(base64_encode($item->model->_id)); ?>">
                                                          <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-update" data-original-title="Update"><i class="fa fa-refresh"></i></button>
                                                        </span>
                                                    </form>

                                                    <form method="post" action="<?php echo e(route('cart.destroy',$item->rowId)); ?>">
                                                        <span class="input-group-btn">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('delete'); ?>

                                                            <button type="submit" data-toggle="tooltip" title="Remove" class="btn btn-remove" data-original-title="Remove"><i class="fa fa-times-circle"></i></button>
															
                                                        </span>
														
                                                    </form>
                                                    
                                                </div>
												<div class="range"><span>Min:<?php echo e(productMinPurchaseQty($item->model)); ?></span><span>Max:<?php echo e(productMaxPurchaseQty($item->model)); ?></span></div>
											</td>
                                            <td class="text-center td-price"><?php echo e(priceFormat($item->model->price)); ?></td>
                                            <td class="text-center td-total"><?php echo e(priceFormat($item->model->price * $item->qty)); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                      <p>Your cart is empty</p>
                    <?php endif; ?>
                </div>
                    <?php if(Cart::count() > 0): ?>
                    <div class="cart-bottom">
                        <div class="panels-total">
                            <div class="cart-panels">
                                <h2 class="title">What would you like to do next?</h2>
                                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default panel-coupon">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a href="#collapse-coupon" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">Use Coupon Code <i class="fa fa-caret-down"></i></a></h4>
                                        </div>
                                        <div id="collapse-coupon" class="panel-collapse collapse">
                                            <?php if(!session()->get('coupon-'.$_SERVER['REMOTE_ADDR'])): ?>
                                            <form  method="POST" action="<?php echo e(route('coupon.apply')); ?>" onsubmit="coupons.apply(this);">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('post'); ?>
                                                    <input type="hidden" name="redirect_url" value="<?php echo e(Request::url()); ?>">
                                                    <input type="hidden" name="page" value="cart">
                                                <div class="panel-body form-group">
                                                    <label class="control-label" for="input-coupon">Enter your coupon here</label>
                                                    <div class="input-group">
                                                        <input type="text" name="coupon" value="" placeholder="Enter your coupon here" id="input-coupon" class="form-control">
                                                        <span class="input-group-btn">
                                                                <button type="submit" class="btn main-btn Send-btn"><i class="far fa-envelope"></i>Apply</button>
                                                        </span>
                                                    </div>
                                                    <span class="text text-danger err-msg" id="coupon_error"></span>
                                                </div>
                                            </form>
                                            <?php else: ?>
                                             <div class="after-add-coupon">
                                                    <p>Coupon name:<span> <?php echo e($coupon['name']); ?> </span></p>
                                                    <p>discount :<span> <?php echo e(priceFormat($coupon['discount'])); ?> </span></p>

                                                    <form method="post" action="<?php echo e(route('coupon.deleteApplyCoupon')); ?>" onsubmit="coupons.delete(this);">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('delete'); ?>
                                                        <input type="hidden" name="redirect_url" value="<?php echo e(Request::url()); ?>">
                                                        <input type="hidden" name="page" value="cart">
                                                        <input type="hidden" name="redirect_url" value="<?php echo e(Request::url()); ?>">
                                                        <button type="submit" class="btn btn-danger btn-xs">remove</button>
                                                    </form>
                                             </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
<!--                                     <div class="panel panel-default panel-voucher">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a href="#collapse-voucher" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle">Use Gift Certificate <i class="fa fa-caret-down"></i></a></h4>
                                        </div>
                                        <div id="collapse-voucher" class="panel-collapse collapse">
                                            <div class="panel-body form-group">
                                                <label class="control-label" for="input-voucher">Enter your gift certificate code here</label>
                                                <div class="input-group">
                                                    <input type="text" name="voucher" value="" placeholder="Enter your gift certificate code here" id="input-voucher" class="form-control">
                                                    <span class="input-group-btn">
                                                        <input type="submit" value="Apply Gift Certificate" id="button-voucher" data-loading-text="Loading..." class="btn btn-primary">
                                                    </span> </div>
                                               
                                            </div>
                                        </div>
                                    </div> -->

                                </div>
                            </div>
                            <div class="cart-total">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-right"><strong>Sub-Total:</strong></td>
                                            <td class="text-right"><?php echo e(appendCurrency(Cart::subtotal())); ?></td>
                                        </tr>
                                        <?php if(session()->get('coupon-'.$_SERVER['REMOTE_ADDR'])): ?>
                                        <tr>
                                            <td class="text-right"><strong>Coupon(<?php echo e($coupon['name']); ?>):</strong></td>
                                            <td class="text-right">-<?php echo e(priceFormat($coupon['discount'])); ?></td>
                                        </tr>
                                        <!-- <tr>
                                            <td class="text-right"><strong>New Sub-Total::</strong></td>
                                            <td class="text-right"><?php echo e(priceFormat($newSubtotal)); ?></td>
                                        </tr> -->
                                        <tr>
                                            <td class="text-right"><strong>New Total:</strong></td>
                                            <td class="text-right"><?php echo e(priceFormat($newTotal)); ?></td>
                                        </tr>
                                        <?php else: ?>
                                        <tr>
                                            <td class="text-right"><strong>Total:</strong></td>
                                            <td class="text-right"><?php echo e(priceFormat($newTotal)); ?></td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="buttons clearfix">
                            <div class="pull-left"><a href="<?php echo e(route('shop','')); ?>" class="btn btn-default"><span>Continue Shopping</span></a></div>
                            <div class="pull-right"><a href="<?php echo e(route('checkout.index')); ?>" class="btn btn-primary"><span>Checkout</span></a></div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
 <?php if (isset($component)) { $__componentOriginal4c5ba0fa3d47366552f211bfb72867d65e113e20 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PeopleAlsoBought::class, []); ?>
<?php $component->withName('people-also-bought'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal4c5ba0fa3d47366552f211bfb72867d65e113e20)): ?>
<?php $component = $__componentOriginal4c5ba0fa3d47366552f211bfb72867d65e113e20; ?>
<?php unset($__componentOriginal4c5ba0fa3d47366552f211bfb72867d65e113e20); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.layout',['pageslug' => 'Cart'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/front/modules/main/cart-checkout/cart.blade.php ENDPATH**/ ?>