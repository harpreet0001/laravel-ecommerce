<form class="form-horizontal" method="post" id="payment_address_save" action="{{route('checkout.payment_address_save')}}" onsubmit="checkout.payment_address_save(this)">
    @csrf
    @method('post')
    <div class="radio">
        <label>
            <input type="radio" name="payment_address" value="existing" checked="checked">
            I want to use an existing address</label>
    </div>
    <div id="payment-existing">
        <select name="addressId" class="form-control">
             <option value="">--Please Select--</option>
            @foreach($addressbooks as $addressbook)
              <option value="{{$addressbook->_id}}" 
                @if(!is_null(session()->get('order.billingId')) && session()->get('order.billingId') == $addressbook->_id)
                     {{'selected'}}
                @else
                   @if($addressbook->default == '1'){{'selected'}} @endif
                @endif>
                    {{$addressbook->firstname}} {{$addressbook->lastname}} {{$addressbook->company}} {{$addressbook->city}} {{$addressbook->postcode}}
             </option>
            @endforeach
        </select>
        <span class="text text-danger error-msg" id="addressId_error"></span>
    </div>
    <div class="radio">
        <label>
            <input type="radio" name="payment_address" value="new">
            I want to use a new address</label>
    </div>
    <br>
    <div id="payment-new" style="display: none;">
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-payment-firstname">First Name</label>
            <div class="col-sm-10">
                <input type="text" name="firstname" value="" placeholder="First Name" id="input-payment-firstname" class="form-control">
                <span class="text text-danger error-msg" id="firstname_error"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-payment-lastname">Last Name</label>
            <div class="col-sm-10">
                <input type="text" name="lastname" value="" placeholder="Last Name" id="input-payment-lastname" class="form-control">
                <span class="text text-danger error-msg" id="lastname_error"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="input-payment-company">Company</label>
            <div class="col-sm-10">
                <input type="text" name="company" value="" placeholder="Company" id="input-payment-company" class="form-control">
                <span class="text text-danger error-msg" id="company_error"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-payment-address-1">Address 1</label>
            <div class="col-sm-10">
                <input type="text" name="address_1" value="" placeholder="Address 1" id="input-payment-address-1" class="form-control">
                <span class="text text-danger error-msg" id="address_1_error"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="input-payment-address-2">Address 2</label>
            <div class="col-sm-10">
                <input type="text" name="address_2" value="" placeholder="Address 2" id="input-payment-address-2" class="form-control">
                <span class="text text-danger error-msg" id="address_2_error"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-payment-city">City</label>
            <div class="col-sm-10">
                <input type="text" name="city" value="" placeholder="City" id="input-payment-city" class="form-control">
                <span class="text text-danger error-msg" id="city_error"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-payment-postcode">Post Code</label>
            <div class="col-sm-10">
                <input type="text" name="postcode" value="" placeholder="Post Code" id="input-payment-postcode" class="form-control">
                <span class="text text-danger error-msg" id="postcode_error"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-payment-country">Country</label>
            <div class="col-sm-10">
                <x-country/>
                <span class="text text-danger error-msg" id="countryId_error"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-payment-zone">Region / State</label>
            <div class="col-sm-10">
                <x-state/>
               <span class="text text-danger error-msg" id="stateId_error"></span>
            </div>
        </div>
    </div>
    <div class="buttons clearfix">
        <div class="pull-right">
            <button type="submit" id="button-payment-address" data-loading-text="Loading..." class="btn btn-primary"><span>Continue</span></button>
        </div>
    </div>
</form>