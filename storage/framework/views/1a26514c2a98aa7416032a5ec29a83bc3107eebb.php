<select name="<?php echo e($fieldname); ?>" id="input-country" class="<?php echo e($classes); ?>" action="<?php echo e(route('country.states')); ?>">
    <option value=""> --- Please Select --- </option>
    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <option value="<?php echo e($country['_id']); ?>" <?php if($selectedCountryId == $country['_id']): ?><?php echo e('selected'); ?><?php endif; ?>><?php echo e($country['country_name']); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<?php /**PATH E:\Ecommerce\resources\views/components/country.blade.php ENDPATH**/ ?>