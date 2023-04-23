<form method="post" action="{{route('checkout.checkout_register_save')}}" onsubmit="checkout.account_billing_register(this)" id="account_billing_form">
    @method('post')
    @csrf
    <div class="row register-page">
        <div class="col-sm-6">
            <fieldset id="account">
                <legend>Your Personal Details</legend>
                <div class="form-group required">
                    <label class="control-label" for="input-payment-firstname">First Name</label>
                    <div>                        
                    <input type="text" name="firstname" value="" placeholder="First Name" id="input-payment-firstname" class="form-control">
                    <span class="text text-danger error-msg" id="firstname_error"></span>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="control-label" for="input-payment-lastname">Last Name</label>
                    <div>                        
                    <input type="text" name="lastname" value="" placeholder="Last Name" id="input-payment-lastname" class="form-control">
                    <span class="text text-danger error-msg" id="lastname_error"></span>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="control-label" for="input-payment-email">E-Mail</label>
                    <div>                        
                    <input type="text" name="email" value="" placeholder="E-Mail" id="input-payment-email" class="form-control">
                    <span class="text text-danger error-msg" id="email_error"></span>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="control-label" for="input-payment-contact">contact</label>
                    <div>                        
                    <input type="text" name="contact" value="" placeholder="contact" id="input-payment-contact" class="form-control">
                    <span class="text text-danger error-msg" id="contact_error"></span>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Your Password</legend>
                <div class="form-group required">
                    <label class="control-label" for="input-payment-password">Password</label>
                    <div>                        
                    <input type="password" name="password" value="" placeholder="Password" id="input-payment-password" class="form-control">
                    <span class="text text-danger error-msg" id="password_error"></span>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="control-label" for="input-payment-confirm">Password Confirm</label>
                    <div>                        
                    <input type="password" name="password_confirmation" value="" placeholder="Password Confirm" id="input-payment-confirm" class="form-control">
                    <span class="text text-danger error-msg" id="password_confirmation_error"></span>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="col-sm-6">
            <fieldset id="address">
                <legend>Your Address</legend>
                <div class="form-group">
                    <label class="control-label" for="input-payment-company">Company</label>
                    <div>                        
                    <input type="text" name="company" value="" placeholder="Company" id="input-payment-company" class="form-control">
                    <span class="text text-danger error-msg" id="company_error"></span>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="control-label" for="input-payment-address-1">Address 1</label>
                    <div>                        
                    <input type="text" name="address_1" value="" placeholder="Address 1" id="input-payment-address-1" class="form-control">
                    <span class="text text-danger error-msg" id="address_1_error"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="input-payment-address-2">Address 2</label>
                    <div>                        
                    <input type="text" name="address_2" value="" placeholder="Address 2" id="input-payment-address-2" class="form-control">
                    <span class="text text-danger error-msg" id="address_2_error"></span>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="control-label" for="input-payment-city">Town/City</label>
                    <div>                        
                    <input type="text" name="city" value="" placeholder="Town/City" id="input-payment-city" class="form-control">
                    <span class="text text-danger error-msg" id="city_error"></span>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="control-label" for="input-payment-postcode">Post Code</label>
                    <div>                        
                    <input type="text" name="postcode" value="" placeholder="Post Code" id="input-payment-postcode" class="form-control">
                    <span class="text text-danger error-msg" id="postcode_error"></span>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="control-label" for="input-payment-country">Country</label>
                    <!-- country-component -->
                      <div>                          
                      <x-country/>
                    <!-- country-component --> 
                    <span class="text text-danger error-msg" id="countryId_error"></span>
                      </div>
                </div>
                <div class="form-group required">
                    <label class="control-label" for="input-payment-zone">Region / State</label>
                     <!-- state-component -->
                       <div>                           
                       <x-state/>
                     <!-- state-component -->
                    <span class="text text-danger error-msg" id="stateId_error"></span>
                       </div>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="checkbox">
        <label for="newsletter">
            <input type="checkbox" name="newsletter" value="1" id="newsletter">
            I wish to subscribe to the MEGATAN newsletter.</label>
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="shipping_address" value="1" checked="checked">
            My delivery and billing addresses are the same.</label>
    </div>
    <div class="buttons clearfix register-page-privacy">
        <div class="pull-right">I have read and agree to the <a href="{{route('privacy-policy')}}" class="agree"><b>Privacy Policy</b></a>
            &nbsp;
            <input type="checkbox" name="agree" value="1">
            <span class="text text-danger error-msg" id="agree_error"></span>
            <button type="submit" id="button-register" data-loading-text="Loading..." class="btn btn-primary"><span>Continue</span></button>
        </div>
    </div>  
</form>