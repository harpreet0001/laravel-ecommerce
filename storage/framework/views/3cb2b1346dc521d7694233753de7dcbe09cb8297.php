 <select name="<?php echo e($fieldname); ?>" id="input-state " class="<?php echo e($classes); ?>">
    <option value=""> --- Please Select --- </option>
    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <option value="<?php echo e($state->_id); ?>" <?php if($selectedStateId == $state->_id): ?><?php echo e('selected'); ?><?php endif; ?>><?php echo e($state->state_name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<?php /**PATH /home/megatanws/public_html/web/resources/views/components/state.blade.php ENDPATH**/ ?>