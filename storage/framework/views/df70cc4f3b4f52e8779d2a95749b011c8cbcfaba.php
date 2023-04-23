
<ul>
     <?php if(Cart::count() > 0): ?>
    <li class="cart-products">
        <table class="table">
            <tbody>
                <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center td-image"> 
                            <a href="<?php echo e(route('product.show',$item->model->slug)); ?>">
                                <img src="<?php echo e(imagePath($item->model->image)); ?>" alt="<?php echo e($item->model->title); ?>" title="<?php echo e($item->model->title); ?>">
                            </a>
                        </td>
                        <td class="text-left td-name">
                            <a href="<?php echo e(route('product.show',$item->model->slug)); ?>"><?php echo e($item->model->title); ?></a><br> 
                        </td>
                        <td class="text-right td-qty">x <?php echo e($item->qty); ?></td>
                        <td class="text-right td-total"><?php echo e(priceFormat($item->model->price * $item->qty)); ?></td>
                        <td class="text-center td-remove">
                            <form method="post" action="<?php echo e(route('cart.destroy',$item->rowId)); ?>" onsubmit="return cart.remove(this)">
                                <span class="input-group-btn">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                   <button type="submit" onclick="" title="Remove" class="cart-remove"><i class="fa fa-times-circle"></i></button>
                                </span>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </li>
    <li class="cart-totals">
        <div>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td class="text-right td-total-title">Sub-Total</td>
                        <td class="text-right td-total-text"><?php echo e(appendCurrency(Cart::subtotal())); ?></td>
                    </tr>
                    <tr>
                        <td class="text-right td-total-title">Total</td>
                        <td class="text-right td-total-text"><?php echo e(appendCurrency(Cart::total())); ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="cart-buttons">
                <a class="btn-cart btn" href="<?php echo e(route('cart.index')); ?>"><i class="fa"></i><span>View Cart</span></a>
                <a class="btn-checkout btn" href="<?php echo e(route('checkout.index')); ?>"><i class="fa"></i><span>Checkout</span></a>
            </div>
        </div>
    </li>
    <?php else: ?>
    <li class="cart-empty-msg">Your cart is empty!</li>
    <?php endif; ?>
</ul>

<?php /**PATH /home/megatanws/public_html/web/resources/views/front/includes/cart_wrap.blade.php ENDPATH**/ ?>