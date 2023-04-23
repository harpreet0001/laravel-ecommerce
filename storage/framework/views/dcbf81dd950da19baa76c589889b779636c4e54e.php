<div class="formRow">
    <label>
        <span class="Required">*</span>
        <span class="FormFieldLabel">First Name:</span>
    </label>
    <div class="value">
        <input type="text" class="" id="" name="billing_firstname" value="<?php echo e($billing_address->firstname); ?>">
        <span class="text text-danger err-msg d-block pt-1" id="billing_firstname_error"></span>
    </div>
</div>
<div class="formRow">
    <label>
        <span class="Required">*</span>
        <span class="FormFieldLabel">Last Name:</span>
    </label>
    <div class="value">
        <input type="text" class="" id="" name="billing_lastname" value="<?php echo e($billing_address->lastname); ?>">
        <span class="text text-danger err-msg d-block pt-1" id="billing_lastname_error"></span>
    </div>
</div>
<div class="formRow">
    <label>
        <span class="Required" style="visibility: hidden;">*</span>
        <span class="FormFieldLabel">Company Name:</span>
    </label>
    <div class="value">
        <input type="text" class="" id="" name="billing_company" value="<?php echo e($billing_address->company); ?>">
        <span class="text text-danger err-msg d-block pt-1" id="billing_company_error"></span>
    </div>
</div>
<div class="formRow">
    <label>
        <span class="Required">*</span>
        <span class="FormFieldLabel">Address Line 1:</span>
    </label>
    <div class="value">
        <input type="text" class="" id="" name="billing_address_1" value="<?php echo e($billing_address->address_1); ?>">
        <span class="text text-danger err-msg d-block pt-1" id="billing_address_1_error"></span>
    </div>
</div>
<div class="formRow">
    <label>
        <span class="Required" style="visibility: hidden;">*</span>
        <span class="FormFieldLabel">Address Line 2:</span>
    </label>
    <div class="value">
         <input type="text" class="" id="" name="billing_address_2" value="<?php echo e($billing_address->address_2); ?>">
         <span class="text text-danger err-msg d-block pt-1" id="billing_address_2_error"></span>
    </div>
</div>
<div class="formRow">
    <label>
        <span class="Required">*</span>
        <span class="FormFieldLabel">City:</span>
    </label>
    <div class="value">
        <input type="text" class="" id="" name="billing_city" value="<?php echo e($billing_address->city); ?>">
        <span class="text text-danger err-msg d-block pt-1" id="billing_city_error"></span>
    </div>
</div>
<div class="formRow">
    <label>
        <span class="Required">*</span>
        <span class="FormFieldLabel">Country:</span>
    </label>
    <div class="value">
        <!-- country-component -->  
             <?php if (isset($component)) { $__componentOriginalc09f45ae8d7885be35947834572c6aa413dc522b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Country::class, ['selectedCountryId' => $billing_address->countryId,'fieldname' => 'billing_countryId','classes' => 'country']); ?>
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
            <span class="text text-danger err-msg d-block pt-1" id="billing_countryId_error"></span>
        <!-- country-component -->  
    </div>
</div>
<div class="formRow">
    <label>
        <span class="Required" style="visibility: hidden;">*</span>
        <span class="FormFieldLabel">State/Province:</span>
    </label>
    <div class="value">
        <!-- state-component -->
           <?php if (isset($component)) { $__componentOriginalb2640b77c32d26ba10655579995102bd879c2ae6 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\State::class, ['selectedCountryId' => $billing_address->countryId,'selectedStateId' => $billing_address->stateId,'fieldname' => 'billing_stateId','classes' => 'state']); ?>
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
            <span class="text text-danger err-msg d-block pt-1" id="billing_stateId_error"></span>
         <!-- state-component -->
    </div>
</div>
<div class="formRow">
    <label>
        <span class="Required">*</span>
        <span class="FormFieldLabel">Zip/Postcode:</span>
    </label>
    <div class="value">
        <input type="text" class="" id="" name="billing_postcode" value="<?php echo e($billing_address->postcode); ?>">
        <span class="text text-danger err-msg d-block pt-1" id="billing_postcode_error"></span>
    </div>
</div>
<div class="formRow   " style="">
    <label class="label">
        <span class="Required" style="visibility: hidden">*</span>
    </label>
    <div class="value input-label">
        <label>
            <input type="checkbox" name="saveBillingAddress" value="1" class="input-checkbox">
            Save to customer's address book </label>
            <span class="text text-danger err-msg d-block pt-1" id="saveBillingAddress_error"></span>
    </div>
</div>
     
<?php /**PATH /home/megatanws/public_html/web/resources/views/admin/modules/order/form/billing_address_form.blade.php ENDPATH**/ ?>