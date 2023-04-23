<?php if(Cart::instance('adminCart')->count() > 0): ?>
<div class="table-responsive">
	 <table class="table">
	    <thead>
          <tr>
            <th>Products Image</th>
            <th>Products Name</th>
            <th>Qty</th>
            <th>Item Price </th>
            <th>Item Total</th>
          </tr>
        </thead>
		<tbody>
		    <?php $__currentLoopData = Cart::instance('adminCart')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>									
				<tr id="itemId_<?php echo e($item->model->_id); ?>">
					<td class="quoteItemImage">
						<span class="product-img"><img src="<?php echo e(asset($item->model->image)); ?>" alt=""></span>
					</td>
					<td>
						<div class="quoteItemName"><?php echo e($item->model->title); ?></div>
				    </td>
					<td class="quoteItemQuantity">
	                    <?php echo e($item->qty); ?>

					</td>
			        <td class="quoteItemPrice"><?php echo e(priceFormat($item->price)); ?></td>
			        <td class="quoteItemTotal"><span><?php echo e(priceFormat($item->price * $item->qty)); ?></span></td>
			    </tr>
		    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    <tr>
				    <td colspan="4"></td>
				    <td class="order-subtotal">Subtotal:<?php echo e(priceFormat(Cart::instance('adminCart')->total())); ?></td>
				</tr>
				<tr>
				    <td colspan="4"></td>
				    <td>Shipping:<span class="order-shipping"></span></td>
				</tr>
				<tr>
				    <td colspan="4"></td>
				    <td>Total:<span class="order-total"></span></td>
				</tr>
	    </tbody>
	</table>
 </div>	
<?php else: ?>
 <p>Your cart is empty</p>
<?php endif; ?>

             


<?php /**PATH /home/megatanws/public_html/web/resources/views/admin/modules/order/dynamic/saveorderlist.blade.php ENDPATH**/ ?>