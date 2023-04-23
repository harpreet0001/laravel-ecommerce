<?php ($addressbooks = $order->orderuser->addressbooks); ?>
<?php if(!is_null($addressbooks) && $addressbooks->count() > 0): ?>
    <fieldset class="existingAddressList" style="display: ;">
        <legend>Use Existing Address</legend>
        <ul>
            <?php $__currentLoopData = $addressbooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addressbook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <li>
                <div class="addressDetails" style="background-image: url('../lib/flags/gb.gif')">
                    <a href="<?php echo e(route('admin.order.getAddressbook',$addressbook->_id)); ?>" data-address="<?php echo e($existingAddress); ?>" class="useExistingAddress" onclick="OrderForm.useExistingAddress(this);return false;">Use This Address</a>
                    <strong><?php echo e($addressbook->firstname); ?> <?php echo e($addressbook->lastname); ?></strong>
                    <div><?php echo e($addressbook->company); ?></div>
                    <div><?php echo e($addressbook->postcode); ?></div>
                    <div><?php echo e($addressbook->city); ?></div>
                    <div><?php echo e(getStateName($addressbook->stateId)); ?></div>
                    <div><?php echo e(getStateName($addressbook->stateId)); ?></div>
                    <div><?php echo e($addressbook->address1); ?></div>
                </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </fieldset>
  
<?php endif; ?><?php /**PATH /home/megatanws/public_html/web/resources/views/admin/modules/order/form/existingAddressbook.blade.php ENDPATH**/ ?>