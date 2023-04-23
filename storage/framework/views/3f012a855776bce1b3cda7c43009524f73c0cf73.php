<?php
        $result = getNumbers(); //comment:helper function to get new tax,coupon discount,new subtotal,new total

        $coupon      = $result->get('coupon');
        $tax         = $result->get('tax');
        $shipping    = $result->get('shipping');
        $newSubtotal = $result->get('newSubtotal');
        $newTax      = $result->get('newTax');
        $newTotal    = $result->get('newTotal');
      
?>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <td class="text-left">Product Image</td>
                <td class="text-left">Product Name</td>
                <td class="text-left">Catgory</td>
                <td class="text-right">Quantity</td>
                <td class="text-right">Unit Price</td>
                <td class="text-right">Total</td>
            </tr>
        </thead>
        <tbody>
            <?php if(Cart::count() > 0): ?>
              <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <div class="img">
                        <figure>
                            <a href="<?php echo e(route('product.show',$item->model->slug)); ?>">
                                <img src="<?php echo e(imagePath($item->model->image)); ?>" width="60">
                            </a>
                        </figure>
                        </div>
                    </td>
                    <td class="text-left"><a href="<?php echo e(route('product.show',$item->model->slug)); ?>"><?php echo e($item->model->title); ?></a> </td>
                    <td class="text-left"><?php echo e($item->model->getCategory->title ?? ''); ?></td>
                    <td class="text-right"><?php echo e($item->qty); ?></td>
                    <td class="text-right"><?php echo e(priceFormat($item->price)); ?></td>
                    <td class="text-right"><?php echo e(priceFormat($item->price * $item->qty)); ?></td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5"></td>
                <td colspan="1">
                    <?php if(!session()->get('coupon-'.$_SERVER['REMOTE_ADDR'])): ?>
                        <form method="POST" action="<?php echo e(route('coupon.apply')); ?>" onsubmit="coupons.apply(this);">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('post'); ?>      
                            <input type="hidden" name="page" value="checkout">                                       
                            <div class="input-group">
                                <input type="text" name="coupon" value="" placeholder="Enter your coupon here" id="input-coupon" class="form-control">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn main-btn Send-btn"><i class="far fa-envelope"></i>Apply</button>
                                </span>
                            </div>
                            <span class="text text-danger err-msg" id="coupon_error"></span>
                        </form>
                     <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="text-right"><strong>Sub-Total:</strong></td>
                <td class="text-right"><?php echo e(appendCurrency(Cart::subtotal())); ?></td>
            </tr>
            <?php if(session()->get('coupon-'.$_SERVER['REMOTE_ADDR'])): ?>
            <tr>
                <td colspan="5" class="text-right">
                    <strong>Coupon(<?php echo e($coupon['name']); ?>):</strong>
                    <form method="post" action="<?php echo e(route('coupon.deleteApplyCoupon')); ?>" onsubmit="coupons.delete(this);">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('delete'); ?>
                      <input type="hidden" name="page" value="checkout">  
                      <button type="submit" class="btn btn-danger btn-xs">remove</button>
                    </form>
                </td>
                <td class="text-right">-<?php echo e(priceFormat($coupon['discount'])); ?></td>
            </tr>
            <?php endif; ?>
            <tr>
                <?php   $shipping_method_detail = session()->get('order')['shippingMethodDetails']; ?>
                <td colspan="5" class="text-right"><strong>Shipping(<?php echo e($shipping_method_detail['methodname']); ?>):</strong></td>
                <td class="text-right">+ <?php echo priceFormat($shipping); ?></td>
            </tr>
            <tr>
                <td colspan="5" class="text-right"><strong>Tax:</strong></td>
                <td class="text-right">+ <?php echo e(priceFormat($tax)); ?></td>
            </tr>
            <tr>
                <td colspan="5" class="text-right"><strong>Total:</strong></td>
                <td class="text-right"><?php echo e(priceFormat($newTotal+$shipping)); ?></td>
            </tr>
        </tfoot>
    </table>
</div><?php /**PATH E:\Ecommerce\resources\views/form/cart_detail.blade.php ENDPATH**/ ?>