<div class="formRow">
    <label>
        <span class="Required">*</span>
        <span class="FormFieldLabel">First Name:</span>
    </label>
    <div class="value">
        <input type="text" class="" id="" name="billing_firstname" value="{{$billing_address->firstname}}">
        <span class="text text-danger err-msg d-block pt-1" id="billing_firstname_error"></span>
    </div>
</div>
<div class="formRow">
    <label>
        <span class="Required">*</span>
        <span class="FormFieldLabel">Last Name:</span>
    </label>
    <div class="value">
        <input type="text" class="" id="" name="billing_lastname" value="{{$billing_address->lastname}}">
        <span class="text text-danger err-msg d-block pt-1" id="billing_lastname_error"></span>
    </div>
</div>
<div class="formRow">
    <label>
        <span class="Required" style="visibility: hidden;">*</span>
        <span class="FormFieldLabel">Company Name:</span>
    </label>
    <div class="value">
        <input type="text" class="" id="" name="billing_company" value="{{$billing_address->company}}">
        <span class="text text-danger err-msg d-block pt-1" id="billing_company_error"></span>
    </div>
</div>
<div class="formRow">
    <label>
        <span class="Required">*</span>
        <span class="FormFieldLabel">Address Line 1:</span>
    </label>
    <div class="value">
        <input type="text" class="" id="" name="billing_address_1" value="{{$billing_address->address_1}}">
        <span class="text text-danger err-msg d-block pt-1" id="billing_address_1_error"></span>
    </div>
</div>
<div class="formRow">
    <label>
        <span class="Required" style="visibility: hidden;">*</span>
        <span class="FormFieldLabel">Address Line 2:</span>
    </label>
    <div class="value">
         <input type="text" class="" id="" name="billing_address_2" value="{{$billing_address->address_2}}">
         <span class="text text-danger err-msg d-block pt-1" id="billing_address_2_error"></span>
    </div>
</div>
<div class="formRow">
    <label>
        <span class="Required">*</span>
        <span class="FormFieldLabel">City:</span>
    </label>
    <div class="value">
        <input type="text" class="" id="" name="billing_city" value="{{$billing_address->city}}">
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
            <x-country :selectedCountryId="$billing_address->countryId" fieldname="billing_countryId" classes="country"/>
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
          <x-state :selectedCountryId="$billing_address->countryId" :selectedStateId="$billing_address->stateId" fieldname="billing_stateId" classes="state"/>
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
        <input type="text" class="" id="" name="billing_postcode" value="{{$billing_address->postcode}}">
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
     
