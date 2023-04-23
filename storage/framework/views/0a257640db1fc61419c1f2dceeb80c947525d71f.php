<form class="form-horizontal" method="post" id="shipping_address_save" action="<?php echo e(route('checkout.shipping_address_save')); ?>" onsubmit="checkout.shipping_address_save(this)">
    <?php echo csrf_field(); ?>
    <?php echo method_field('post'); ?>
    <div class="radio">
        <label>
            <input type="radio" name="shipping_address" value="existing" checked="checked">
            I want to use an existing address</label>
    </div>
    <div id="shipping-existing">
        <select name="addressId" class="form-control">
               <option value="">--Please Select--</option>
            <?php $__currentLoopData = $addressbooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addressbook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($addressbook->_id); ?>" 
                 <?php if(!is_null(session()->get('order.shippingId')) && session()->get('order.shippingId') == $addressbook->_id): ?>
                     <?php echo e('selected'); ?>

                <?php else: ?>
                   <?php if($addressbook->default == '1'): ?><?php echo e('selected'); ?> <?php endif; ?>
                <?php endif; ?>>
                <?php echo e($addressbook->firstname); ?> <?php echo e($addressbook->lastname); ?> <?php echo e($addressbook->company ?? ''); ?> <?php echo e($addressbook->city); ?> <?php echo e($addressbook->postcode); ?> 
            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <span class="text text-danger error-msg" id="addressId_error"></span>
    </div>
    <div class="radio">
        <label>
            <input type="radio" name="shipping_address" value="new">
            I want to use a new address</label>
    </div>
    <br>
    <div id="shipping-new" style="display: none;">
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-shipping-firstname">First Name</label>
            <div class="col-sm-10">
                <input type="text" name="firstname" value="" placeholder="First Name" id="input-shipping-firstname" class="form-control">
                <span class="text text-danger error-msg" id="firstname_error"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-shipping-lastname">Last Name</label>
            <div class="col-sm-10">
                <input type="text" name="lastname" value="" placeholder="Last Name" id="input-shipping-lastname" class="form-control">
                <span class="text text-danger error-msg" id="lastname_error"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="input-shipping-company">Company</label>
            <div class="col-sm-10">
                <input type="text" name="company" value="" placeholder="Company" id="input-shipping-company" class="form-control">
                <span class="text text-danger error-msg" id="company_error"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-shipping-address-1">Address 1</label>
            <div class="col-sm-10">
                <input type="text" name="address_1" value="" placeholder="Address 1" id="input-shipping-address-1" class="form-control">
                <span class="text text-danger error-msg" id="address_1_error"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="input-shipping-address-2">Address 2</label>
            <div class="col-sm-10">
                <input type="text" name="address_2" value="" placeholder="Address 2" id="input-shipping-address-2" class="form-control">
                <span class="text text-danger error-msg" id="address_2_error"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-shipping-city">City</label>
            <div class="col-sm-10">
                <input type="text" name="city" value="" placeholder="City" id="input-shipping-city" class="form-control">
                <span class="text text-danger error-msg" id="city_error"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-shipping-postcode">Post Code</label>
            <div class="col-sm-10">
                <input type="text" name="postcode" value="" placeholder="Post Code" id="input-shipping-postcode" class="form-control">
                <span class="text text-danger error-msg" id="postcode_error"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-shipping-country">Country</label>
            <div class="col-sm-10">
                 <?php if (isset($component)) { $__componentOriginalc09f45ae8d7885be35947834572c6aa413dc522b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Country::class, []); ?>
<?php $component->withName('country'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc09f45ae8d7885be35947834572c6aa413dc522b)): ?>
<?php $component = $__componentOriginalc09f45ae8d7885be35947834572c6aa413dc522b; ?>
<?php unset($__componentOriginalc09f45ae8d7885be35947834572c6aa413dc522b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                <span class="text text-danger error-msg" id="countryId_error"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-shipping-zone">Region / State</label>
            <div class="col-sm-10">
                 <?php if (isset($component)) { $__componentOriginalb2640b77c32d26ba10655579995102bd879c2ae6 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\State::class, []); ?>
<?php $component->withName('state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalb2640b77c32d26ba10655579995102bd879c2ae6)): ?>
<?php $component = $__componentOriginalb2640b77c32d26ba10655579995102bd879c2ae6; ?>
<?php unset($__componentOriginalb2640b77c32d26ba10655579995102bd879c2ae6); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
               <span class="text text-danger error-msg" id="stateId_error"></span>
            </div>
        </div>
    </div>
    <div class="buttons clearfix">
        <div class="pull-right">
            <button type="submit" id="button-shipping-address" data-loading-text="Loading..." class="btn btn-primary"><span>Continue</span></button>
        </div>
    </div>
</form><?php /**PATH E:\Ecommerce\resources\views/form/shipping_address.blade.php ENDPATH**/ ?>