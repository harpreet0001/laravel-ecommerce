<div class="form-group View-all-select">
    <label for="exampleFormControlSelect1">By Status:</label>
    <select class="form-control" id="orderStatusFilter" name="orderStatusFilter">
        <option value="">All Orders</option>
          <?php $__currentLoopData = orderStatusArr(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusId => $statusText): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($statusId); ?>" <?php if(isset(request()->orderStatus) && request()->orderStatus == $statusId): ?><?php echo e('selected'); ?><?php endif; ?>>
                <?php echo e($statusText); ?>

            </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div><?php /**PATH /home/megatanws/public_html/web/resources/views/admin/modules/order/dynamic/filters/order_status.blade.php ENDPATH**/ ?>