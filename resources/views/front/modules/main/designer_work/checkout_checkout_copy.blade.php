@extends('front.layouts.layout',['pageslug' => 'checkout/checkout'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">checkout/checkout</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>checkout/checkout</span></h1>
@endcomponent
<div id="checkout-checkout" class="container">
    <div class="row">
        <div id="content" class="col-sm-12">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#collapse-checkout-option" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle collapsed" aria-expanded="false">Step 1: Checkout Options <i class="fa fa-caret-down"></i></a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapse-checkout-option" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <div class="row login-box">
                                <div class="col-sm-6">
                                    <div class="well">
                                        <h2 class="title">New Customer</h2>
                                        <p>Checkout Options:</p>
                                        <div class="radio">
                                            <label> <input type="radio" name="account" value="register" checked="checked">
                                                Register Account</label>
                                        </div>
                                        <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                                        <div class="buttons">
                                            <div class="pull-right">
                                                <button type="button" id="button-account" data-loading-text="Loading..." class="btn btn-primary"><span>Continue</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="well">
                                        <h2 class="title">Returning Customer</h2>
                                        <p>I am a returning customer</p>
                                        <div class="form-group">
                                            <label class="control-label" for="input-email">E-Mail</label>
                                            <input type="text" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="input-password">Password</label>
                                            <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">
                                            <a href="https://dev.megatan.ws/index.php?route=account/forgotten">Forgotten Password</a></div>
                                        <div class="buttons">
                                            <div class="pull-right">
                                                <button type="button" id="button-login" data-loading-text="Loading..." class="btn btn-primary"><span>Login</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#collapse-payment-address" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle collapsed" aria-expanded="false">Step 2: Billing Details <i class="fa fa-caret-down"></i></a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapse-payment-address" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <form class="form-horizontal">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="payment_address" value="existing" checked="checked">
                                        I want to use an existing address</label>
                                </div>
                                <div id="payment-existing">
                                    <select name="address_id" class="form-control">
                                        <option value="2166" selected="selected">pumptester pumptester, pumptester, pumptester, Carmarthenshire, United Kingdom</option>
                                    </select>
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
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-payment-lastname">Last Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="lastname" value="" placeholder="Last Name" id="input-payment-lastname" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-payment-company">Company</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="company" value="" placeholder="Company" id="input-payment-company" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-payment-address-1">Address 1</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="address_1" value="" placeholder="Address 1" id="input-payment-address-1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-payment-address-2">Address 2</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="address_2" value="" placeholder="Address 2" id="input-payment-address-2" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-payment-city">City</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="city" value="" placeholder="City" id="input-payment-city" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-payment-postcode">Post Code</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="postcode" value="" placeholder="Post Code" id="input-payment-postcode" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-payment-country">Country</label>
                                        <div class="col-sm-10">
                                            <select name="country_id" id="input-payment-country" class="form-control">
                                                <option value=""> --- Please Select --- </option>
                                                <option value="244">Aaland Islands</option>
                                                <option value="1">Afghanistan</option>
                                                <option value="2">Albania</option>
                                                <option value="3">Algeria</option>
                                                <option value="4">American Samoa</option>
                                                <option value="5">Andorra</option>
                                                <option value="6">Angola</option>
                                                <option value="7">Anguilla</option>
                                                <option value="8">Antarctica</option>
                                                <option value="9">Antigua and Barbuda</option>
                                                <option value="10">Argentina</option>
                                                <option value="11">Armenia</option>
                                                <option value="12">Aruba</option>
                                                <option value="252">Ascension Island (British)</option>
                                                <option value="13">Australia</option>
                                                <option value="14">Austria</option>
                                                <option value="15">Azerbaijan</option>
                                                <option value="16">Bahamas</option>
                                                <option value="17">Bahrain</option>
                                                <option value="18">Bangladesh</option>
                                                <option value="19">Barbados</option>
                                                <option value="20">Belarus</option>
                                                <option value="21">Belgium</option>
                                                <option value="22">Belize</option>
                                                <option value="23">Benin</option>
                                                <option value="24">Bermuda</option>
                                                <option value="25">Bhutan</option>
                                                <option value="26">Bolivia</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-payment-zone">Region / State</label>
                                        <div class="col-sm-10">
                                            <select name="zone_id" id="input-payment-zone" class="form-control">
                                                <option value=""> --- Please Select --- </option>
                                                <option value="3513">Aberdeen</option>
                                                <option value="3514">Aberdeenshire</option>
                                                <option value="3515">Anglesey</option>
                                                <option value="3516">Angus</option>
                                                <option value="3517">Argyll and Bute</option>
                                                <option value="3518">Bedfordshire</option>
                                                <option value="3519">Berkshire</option>
                                                <option value="3520">Blaenau Gwent</option>
                                                <option value="3521">Bridgend</option>
                                                <option value="3522">Bristol</option>
                                                <option value="3523">Buckinghamshire</option>
                                                <option value="3524">Caerphilly</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="buttons clearfix">
                                    <div class="pull-right">
                                        <button type="button" id="button-payment-address" data-loading-text="Loading..." class="btn btn-primary"><span>Continue</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="panel-body">
                            <div class="row register-page">
                                <div class="col-sm-6">
                                    <fieldset id="account">
                                        <legend>Your Personal Details</legend>
                                        <div class="form-group" style="display:  none ;">
                                            <label class="control-label">Customer Group</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="customer_group_id" value="1" checked="checked">
                                                    Default</label>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-payment-firstname">First Name</label>
                                            <input type="text" name="firstname" value="" placeholder="First Name" id="input-payment-firstname" class="form-control">
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-payment-lastname">Last Name</label>
                                            <input type="text" name="lastname" value="" placeholder="Last Name" id="input-payment-lastname" class="form-control">
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-payment-email">E-Mail</label>
                                            <input type="text" name="email" value="" placeholder="E-Mail" id="input-payment-email" class="form-control">
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-payment-telephone">Telephone</label>
                                            <input type="text" name="telephone" value="" placeholder="Telephone" id="input-payment-telephone" class="form-control">
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <legend>Your Password</legend>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-payment-password">Password</label>
                                            <input type="password" name="password" value="" placeholder="Password" id="input-payment-password" class="form-control">
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-payment-confirm">Password Confirm</label>
                                            <input type="password" name="confirm" value="" placeholder="Password Confirm" id="input-payment-confirm" class="form-control">
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-sm-6">
                                    <fieldset id="address">
                                        <legend>Your Address</legend>
                                        <div class="form-group">
                                            <label class="control-label" for="input-payment-company">Company</label>
                                            <input type="text" name="company" value="" placeholder="Company" id="input-payment-company" class="form-control">
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-payment-address-1">Address 1</label>
                                            <input type="text" name="address_1" value="" placeholder="Address 1" id="input-payment-address-1" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="input-payment-address-2">Address 2</label>
                                            <input type="text" name="address_2" value="" placeholder="Address 2" id="input-payment-address-2" class="form-control">
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-payment-city">City</label>
                                            <input type="text" name="city" value="" placeholder="City" id="input-payment-city" class="form-control">
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-payment-postcode">Post Code</label>
                                            <input type="text" name="postcode" value="" placeholder="Post Code" id="input-payment-postcode" class="form-control">
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-payment-country">Country</label>
                                            <select name="country_id" id="input-payment-country" class="form-control">
                                                <option value=""> --- Please Select --- </option>
                                                <option value="244">Aaland Islands</option>
                                                <option value="1">Afghanistan</option>
                                                <option value="2">Albania</option>
                                                <option value="3">Algeria</option>
                                                <option value="4">American Samoa</option>
                                                <option value="5">Andorra</option>
                                                <option value="6">Angola</option>
                                                <option value="7">Anguilla</option>
                                                <option value="8">Antarctica</option>
                                                <option value="9">Antigua and Barbuda</option>
                                                <option value="10">Argentina</option>
                                                <option value="11">Armenia</option>
                                                <option value="12">Aruba</option>
                                                <option value="252">Ascension Island (British)</option>
                                                <option value="13">Australia</option>
                                                <option value="14">Austria</option>
                                                <option value="15">Azerbaijan</option>
                                                <option value="16">Bahamas</option>
                                                <option value="17">Bahrain</option>
                                                <option value="18">Bangladesh</option>
                                                <option value="19">Barbados</option>
                                                <option value="20">Belarus</option>
                                                <option value="21">Belgium</option>
                                                <option value="22">Belize</option>
                                                <option value="23">Benin</option>
                                                <option value="24">Bermuda</option>
                                                <option value="25">Bhutan</option>
                                                <option value="26">Bolivia</option>
                                            </select>
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-payment-zone">Region / State</label>
                                            <select name="zone_id" id="input-payment-zone" class="form-control">
                                                <option value=""> --- Please Select --- </option>
                                                <option value="3513">Aberdeen</option>
                                                <option value="3514">Aberdeenshire</option>
                                                <option value="3515">Anglesey</option>
                                                <option value="3516">Angus</option>
                                                <option value="3517">Argyll and Bute</option>
                                                <option value="3518">Bedfordshire</option>
                                                <option value="3519">Berkshire</option>
                                                <option value="3520">Blaenau Gwent</option>
                                                <option value="3521">Bridgend</option>
                                                <option value="3522">Bristol</option>
                                                <option value="3523">Buckinghamshire</option>
                                                <option value="3524">Caerphilly</option>
                                            </select>
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
                                <div class="pull-right">I have read and agree to the <a href="https://dev.megatan.ws/index.php?route=information/information/agree&amp;information_id=3" class="agree"><b>Privacy Policy</b></a>
                                    &nbsp;
                                    <input type="checkbox" name="agree" value="1">
                                    <button type="button" id="button-register" data-loading-text="Loading..." class="btn btn-primary"><span>Continue</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#collapse-shipping-address" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle" aria-expanded="true">Step 3: Delivery Details <i class="fa fa-caret-down"></i></a></h4>
                    </div>
                    <div class="panel-collapse collapse in" id="collapse-shipping-address" aria-expanded="true" style="">
                        <div class="panel-body">
                            <form class="form-horizontal">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="shipping_address" value="existing" checked="checked">
                                        I want to use an existing address</label>
                                </div>
                                <div id="shipping-existing">
                                    <select name="address_id" class="form-control">
                                        <option value="2166" selected="selected">pumptester pumptester, pumptester, pumptester, Carmarthenshire, United Kingdom</option>
                                    </select>
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
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-shipping-lastname">Last Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="lastname" value="" placeholder="Last Name" id="input-shipping-lastname" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-shipping-company">Company</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="company" value="" placeholder="Company" id="input-shipping-company" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-shipping-address-1">Address 1</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="address_1" value="" placeholder="Address 1" id="input-shipping-address-1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-shipping-address-2">Address 2</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="address_2" value="" placeholder="Address 2" id="input-shipping-address-2" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-shipping-city">City</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="city" value="" placeholder="City" id="input-shipping-city" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-shipping-postcode">Post Code</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="postcode" value="pumptester" placeholder="Post Code" id="input-shipping-postcode" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-shipping-country">Country</label>
                                        <div class="col-sm-10">
                                            <select name="country_id" id="input-shipping-country" class="form-control">
                                                <option value=""> --- Please Select --- </option>
                                                <option value="244">Aaland Islands</option>
                                                <option value="1">Afghanistan</option>
                                                <option value="2">Albania</option>
                                                <option value="3">Algeria</option>
                                                <option value="4">American Samoa</option>
                                                <option value="5">Andorra</option>
                                                <option value="6">Angola</option>
                                                <option value="7">Anguilla</option>
                                                <option value="8">Antarctica</option>
                                                <option value="9">Antigua and Barbuda</option>
                                                <option value="10">Argentina</option>
                                                <option value="11">Armenia</option>
                                                <option value="12">Aruba</option>
                                                <option value="252">Ascension Island (British)</option>
                                                <option value="13">Australia</option>
                                                <option value="14">Austria</option>
                                                <option value="15">Azerbaijan</option>
                                                <option value="16">Bahamas</option>
                                                <option value="17">Bahrain</option>
                                                <option value="18">Bangladesh</option>
                                                <option value="19">Barbados</option>
                                                <option value="20">Belarus</option>
                                                <option value="21">Belgium</option>
                                                <option value="22">Belize</option>
                                                <option value="23">Benin</option>
                                                <option value="24">Bermuda</option>
                                                <option value="25">Bhutan</option>
                                                <option value="26">Bolivia</option>
                                                <option value="245">Bonaire, Sint Eustatius and Saba</option>
                                                <option value="27">Bosnia and Herzegovina</option>
                                                <option value="28">Botswana</option>
                                                <option value="29">Bouvet Island</option>
                                                <option value="30">Brazil</option>
                                                <option value="31">British Indian Ocean Territory</option>
                                                <option value="32">Brunei Darussalam</option>
                                                <option value="33">Bulgaria</option>
                                                <option value="34">Burkina Faso</option>
                                                <option value="35">Burundi</option>
                                                <option value="36">Cambodia</option>
                                                <option value="37">Cameroon</option>
                                                <option value="38">Canada</option>
                                                <option value="251">Canary Islands</option>
                                                <option value="39">Cape Verde</option>
                                                <option value="40">Cayman Islands</option>
                                                <option value="41">Central African Republic</option>
                                                <option value="42">Chad</option>
                                                <option value="43">Chile</option>
                                                <option value="44">China</option>
                                                <option value="45">Christmas Island</option>
                                                <option value="46">Cocos (Keeling) Islands</option>
                                                <option value="47">Colombia</option>
                                                <option value="48">Comoros</option>
                                                <option value="49">Congo</option>
                                                <option value="50">Cook Islands</option>
                                                <option value="51">Costa Rica</option>
                                                <option value="52">Cote D'Ivoire</option>
                                                <option value="53">Croatia</option>
                                                <option value="54">Cuba</option>
                                                <option value="246">Curacao</option>
                                                <option value="55">Cyprus</option>
                                                <option value="56">Czech Republic</option>
                                                <option value="237">Democratic Republic of Congo</option>
                                                <option value="57">Denmark</option>
                                                <option value="58">Djibouti</option>
                                                <option value="59">Dominica</option>
                                                <option value="60">Dominican Republic</option>
                                                <option value="61">East Timor</option>
                                                <option value="62">Ecuador</option>
                                                <option value="63">Egypt</option>
                                                <option value="64">El Salvador</option>
                                                <option value="65">Equatorial Guinea</option>
                                                <option value="66">Eritrea</option>
                                                <option value="67">Estonia</option>
                                                <option value="68">Ethiopia</option>
                                                <option value="69">Falkland Islands (Malvinas)</option>
                                                <option value="70">Faroe Islands</option>
                                                <option value="71">Fiji</option>
                                                <option value="72">Finland</option>
                                                <option value="74">France, Metropolitan</option>
                                                <option value="75">French Guiana</option>
                                                <option value="76">French Polynesia</option>
                                                <option value="77">French Southern Territories</option>
                                                <option value="126">FYROM</option>
                                                <option value="78">Gabon</option>
                                                <option value="79">Gambia</option>
                                                <option value="80">Georgia</option>
                                                <option value="81">Germany</option>
                                                <option value="82">Ghana</option>
                                                <option value="83">Gibraltar</option>
                                                <option value="84">Greece</option>
                                                <option value="85">Greenland</option>
                                                <option value="86">Grenada</option>
                                                <option value="87">Guadeloupe</option>
                                                <option value="88">Guam</option>
                                                <option value="89">Guatemala</option>
                                                <option value="256">Guernsey</option>
                                                <option value="90">Guinea</option>
                                                <option value="91">Guinea-Bissau</option>
                                                <option value="92">Guyana</option>
                                                <option value="93">Haiti</option>
                                                <option value="94">Heard and Mc Donald Islands</option>
                                                <option value="95">Honduras</option>
                                                <option value="96">Hong Kong</option>
                                                <option value="97">Hungary</option>
                                                <option value="98">Iceland</option>
                                                <option value="99">India</option>
                                                <option value="100">Indonesia</option>
                                                <option value="101">Iran (Islamic Republic of)</option>
                                                <option value="102">Iraq</option>
                                                <option value="103">Ireland</option>
                                                <option value="254">Isle of Man</option>
                                                <option value="104">Israel</option>
                                                <option value="105">Italy</option>
                                                <option value="106">Jamaica</option>
                                                <option value="107">Japan</option>
                                                <option value="257">Jersey</option>
                                                <option value="108">Jordan</option>
                                                <option value="109">Kazakhstan</option>
                                                <option value="110">Kenya</option>
                                                <option value="111">Kiribati</option>
                                                <option value="253">Kosovo, Republic of</option>
                                                <option value="114">Kuwait</option>
                                                <option value="115">Kyrgyzstan</option>
                                                <option value="116">Lao People's Democratic Republic</option>
                                                <option value="117">Latvia</option>
                                                <option value="118">Lebanon</option>
                                                <option value="119">Lesotho</option>
                                                <option value="120">Liberia</option>
                                                <option value="121">Libyan Arab Jamahiriya</option>
                                                <option value="122">Liechtenstein</option>
                                                <option value="123">Lithuania</option>
                                                <option value="124">Luxembourg</option>
                                                <option value="125">Macau</option>
                                                <option value="127">Madagascar</option>
                                                <option value="128">Malawi</option>
                                                <option value="129">Malaysia</option>
                                                <option value="130">Maldives</option>
                                                <option value="131">Mali</option>
                                                <option value="132">Malta</option>
                                                <option value="133">Marshall Islands</option>
                                                <option value="134">Martinique</option>
                                                <option value="135">Mauritania</option>
                                                <option value="136">Mauritius</option>
                                                <option value="137">Mayotte</option>
                                                <option value="138">Mexico</option>
                                                <option value="139">Micronesia, Federated States of</option>
                                                <option value="140">Moldova, Republic of</option>
                                                <option value="141">Monaco</option>
                                                <option value="142">Mongolia</option>
                                                <option value="242">Montenegro</option>
                                                <option value="143">Montserrat</option>
                                                <option value="144">Morocco</option>
                                                <option value="145">Mozambique</option>
                                                <option value="146">Myanmar</option>
                                                <option value="147">Namibia</option>
                                                <option value="148">Nauru</option>
                                                <option value="149">Nepal</option>
                                                <option value="150">Netherlands</option>
                                                <option value="151">Netherlands Antilles</option>
                                                <option value="152">New Caledonia</option>
                                                <option value="153">New Zealand</option>
                                                <option value="154">Nicaragua</option>
                                                <option value="155">Niger</option>
                                                <option value="156">Nigeria</option>
                                                <option value="157">Niue</option>
                                                <option value="158">Norfolk Island</option>
                                                <option value="112">North Korea</option>
                                                <option value="159">Northern Mariana Islands</option>
                                                <option value="160">Norway</option>
                                                <option value="161">Oman</option>
                                                <option value="162">Pakistan</option>
                                                <option value="163">Palau</option>
                                                <option value="247">Palestinian Territory, Occupied</option>
                                                <option value="164">Panama</option>
                                                <option value="165">Papua New Guinea</option>
                                                <option value="166">Paraguay</option>
                                                <option value="167">Peru</option>
                                                <option value="168">Philippines</option>
                                                <option value="169">Pitcairn</option>
                                                <option value="170">Poland</option>
                                                <option value="171">Portugal</option>
                                                <option value="172">Puerto Rico</option>
                                                <option value="173">Qatar</option>
                                                <option value="174">Reunion</option>
                                                <option value="175">Romania</option>
                                                <option value="176">Russian Federation</option>
                                                <option value="177">Rwanda</option>
                                                <option value="178">Saint Kitts and Nevis</option>
                                                <option value="179">Saint Lucia</option>
                                                <option value="180">Saint Vincent and the Grenadines</option>
                                                <option value="181">Samoa</option>
                                                <option value="182">San Marino</option>
                                                <option value="183">Sao Tome and Principe</option>
                                                <option value="184">Saudi Arabia</option>
                                                <option value="185">Senegal</option>
                                                <option value="243">Serbia</option>
                                                <option value="186">Seychelles</option>
                                                <option value="187">Sierra Leone</option>
                                                <option value="188">Singapore</option>
                                                <option value="189">Slovak Republic</option>
                                                <option value="190">Slovenia</option>
                                                <option value="191">Solomon Islands</option>
                                                <option value="192">Somalia</option>
                                                <option value="193">South Africa</option>
                                                <option value="194">South Georgia &amp; South Sandwich Islands</option>
                                                <option value="113">South Korea</option>
                                                <option value="248">South Sudan</option>
                                                <option value="195">Spain</option>
                                                <option value="196">Sri Lanka</option>
                                                <option value="249">St. Barthelemy</option>
                                                <option value="197">St. Helena</option>
                                                <option value="250">St. Martin (French part)</option>
                                                <option value="198">St. Pierre and Miquelon</option>
                                                <option value="199">Sudan</option>
                                                <option value="200">Suriname</option>
                                                <option value="201">Svalbard and Jan Mayen Islands</option>
                                                <option value="202">Swaziland</option>
                                                <option value="203">Sweden</option>
                                                <option value="204">Switzerland</option>
                                                <option value="205">Syrian Arab Republic</option>
                                                <option value="206">Taiwan</option>
                                                <option value="207">Tajikistan</option>
                                                <option value="208">Tanzania, United Republic of</option>
                                                <option value="209">Thailand</option>
                                                <option value="210">Togo</option>
                                                <option value="211">Tokelau</option>
                                                <option value="212">Tonga</option>
                                                <option value="213">Trinidad and Tobago</option>
                                                <option value="255">Tristan da Cunha</option>
                                                <option value="214">Tunisia</option>
                                                <option value="215">Turkey</option>
                                                <option value="216">Turkmenistan</option>
                                                <option value="217">Turks and Caicos Islands</option>
                                                <option value="218">Tuvalu</option>
                                                <option value="219">Uganda</option>
                                                <option value="220">Ukraine</option>
                                                <option value="221">United Arab Emirates</option>
                                                <option value="222" selected="selected">United Kingdom</option>
                                                <option value="223">United States</option>
                                                <option value="224">United States Minor Outlying Islands</option>
                                                <option value="225">Uruguay</option>
                                                <option value="226">Uzbekistan</option>
                                                <option value="227">Vanuatu</option>
                                                <option value="228">Vatican City State (Holy See)</option>
                                                <option value="229">Venezuela</option>
                                                <option value="230">Viet Nam</option>
                                                <option value="231">Virgin Islands (British)</option>
                                                <option value="232">Virgin Islands (U.S.)</option>
                                                <option value="233">Wallis and Futuna Islands</option>
                                                <option value="234">Western Sahara</option>
                                                <option value="235">Yemen</option>
                                                <option value="238">Zambia</option>
                                                <option value="239">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-shipping-zone">Region / State</label>
                                        <div class="col-sm-10">
                                            <select name="zone_id" id="input-shipping-zone" class="form-control">
                                                <option value=""> --- Please Select --- </option>
                                                <option value="3513">Aberdeen</option>
                                                <option value="3514">Aberdeenshire</option>
                                                <option value="3515">Anglesey</option>
                                                <option value="3516">Angus</option>
                                                <option value="3517">Argyll and Bute</option>
                                                <option value="3518">Bedfordshire</option>
                                                <option value="3519">Berkshire</option>
                                                <option value="3520">Blaenau Gwent</option>
                                                <option value="3521">Bridgend</option>
                                                <option value="3522">Bristol</option>
                                                <option value="3523">Buckinghamshire</option>
                                                <option value="3524">Caerphilly</option>
                                                <option value="3525">Cambridgeshire</option>
                                                <option value="3526">Cardiff</option>
                                                <option value="3527" selected="selected">Carmarthenshire</option>
                                                <option value="3528">Ceredigion</option>
                                                <option value="3529">Cheshire</option>
                                                <option value="3530">Clackmannanshire</option>
                                                <option value="3531">Conwy</option>
                                                <option value="3532">Cornwall</option>
                                                <option value="3949">County Antrim</option>
                                                <option value="3950">County Armagh</option>
                                                <option value="3951">County Down</option>
                                                <option value="3952">County Fermanagh</option>
                                                <option value="3953">County Londonderry</option>
                                                <option value="3954">County Tyrone</option>
                                                <option value="3955">Cumbria</option>
                                                <option value="3533">Denbighshire</option>
                                                <option value="3534">Derbyshire</option>
                                                <option value="3535">Devon</option>
                                                <option value="3536">Dorset</option>
                                                <option value="3537">Dumfries and Galloway</option>
                                                <option value="3538">Dundee</option>
                                                <option value="3539">Durham</option>
                                                <option value="3540">East Ayrshire</option>
                                                <option value="3541">East Dunbartonshire</option>
                                                <option value="3542">East Lothian</option>
                                                <option value="3543">East Renfrewshire</option>
                                                <option value="3544">East Riding of Yorkshire</option>
                                                <option value="3545">East Sussex</option>
                                                <option value="3546">Edinburgh</option>
                                                <option value="3547">Essex</option>
                                                <option value="3548">Falkirk</option>
                                                <option value="3549">Fife</option>
                                                <option value="3550">Flintshire</option>
                                                <option value="3551">Glasgow</option>
                                                <option value="3552">Gloucestershire</option>
                                                <option value="3553">Greater London</option>
                                                <option value="3554">Greater Manchester</option>
                                                <option value="3555">Gwynedd</option>
                                                <option value="3556">Hampshire</option>
                                                <option value="3557">Herefordshire</option>
                                                <option value="3558">Hertfordshire</option>
                                                <option value="3559">Highlands</option>
                                                <option value="3560">Inverclyde</option>
                                                <option value="3561">Isle of Wight</option>
                                                <option value="3562">Kent</option>
                                                <option value="3563">Lancashire</option>
                                                <option value="3564">Leicestershire</option>
                                                <option value="3565">Lincolnshire</option>
                                                <option value="3566">Merseyside</option>
                                                <option value="3567">Merthyr Tydfil</option>
                                                <option value="3568">Midlothian</option>
                                                <option value="3569">Monmouthshire</option>
                                                <option value="3570">Moray</option>
                                                <option value="3571">Neath Port Talbot</option>
                                                <option value="3572">Newport</option>
                                                <option value="3573">Norfolk</option>
                                                <option value="3574">North Ayrshire</option>
                                                <option value="3575">North Lanarkshire</option>
                                                <option value="3576">North Yorkshire</option>
                                                <option value="3577">Northamptonshire</option>
                                                <option value="3578">Northumberland</option>
                                                <option value="3579">Nottinghamshire</option>
                                                <option value="3580">Orkney Islands</option>
                                                <option value="3581">Oxfordshire</option>
                                                <option value="3582">Pembrokeshire</option>
                                                <option value="3583">Perth and Kinross</option>
                                                <option value="3584">Powys</option>
                                                <option value="3585">Renfrewshire</option>
                                                <option value="3586">Rhondda Cynon Taff</option>
                                                <option value="3587">Rutland</option>
                                                <option value="3588">Scottish Borders</option>
                                                <option value="3589">Shetland Islands</option>
                                                <option value="3590">Shropshire</option>
                                                <option value="3591">Somerset</option>
                                                <option value="3592">South Ayrshire</option>
                                                <option value="3593">South Lanarkshire</option>
                                                <option value="3594">South Yorkshire</option>
                                                <option value="3595">Staffordshire</option>
                                                <option value="3596">Stirling</option>
                                                <option value="3597">Suffolk</option>
                                                <option value="3598">Surrey</option>
                                                <option value="3599">Swansea</option>
                                                <option value="3600">Torfaen</option>
                                                <option value="3601">Tyne and Wear</option>
                                                <option value="3602">Vale of Glamorgan</option>
                                                <option value="3603">Warwickshire</option>
                                                <option value="3604">West Dunbartonshire</option>
                                                <option value="3605">West Lothian</option>
                                                <option value="3606">West Midlands</option>
                                                <option value="3607">West Sussex</option>
                                                <option value="3608">West Yorkshire</option>
                                                <option value="3609">Western Isles</option>
                                                <option value="3610">Wiltshire</option>
                                                <option value="3611">Worcestershire</option>
                                                <option value="3612">Wrexham</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="buttons clearfix">
                                    <div class="pull-right">
                                        <button type="button" id="button-shipping-address" data-loading-text="Loading..." class="btn btn-primary"><span>Continue</span></button>
                                    </div>
                                </div>
                            </form>
                            <script type="text/javascript">
                            <!--
                            $('input[name=\'shipping_address\']').on('change', function() {
                                if (this.value == 'new') {
                                    $('#shipping-existing').hide();
                                    $('#shipping-new').show();
                                } else {
                                    $('#shipping-existing').show();
                                    $('#shipping-new').hide();
                                }
                            });
                            //-->
                            </script>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#collapse-shipping-method" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle" aria-expanded="true">Step 4: Delivery Method <i class="fa fa-caret-down"></i></a></h4>
                    </div>
                    <div class="panel-collapse collapse in" id="collapse-shipping-method" aria-expanded="true" style="">
                        <div class="panel-body">
                            <p>Please select the preferred shipping method to use on this order.</p>
                            <p><strong>Total-Based Shipping</strong></p>
                            <div class="radio">
                                <label> <input type="radio" name="shipping_method" value="total_based.total_based_0" checked="checked">
                                    Royal Mail First Class Recorded - £0.00</label>
                            </div>
                            <p><strong>Add Comments About Your Order</strong></p>
                            <p>
                                <textarea name="comment" rows="8" class="form-control"></textarea>
                            </p>
                            <div class="buttons">
                                <div class="pull-right">
                                    <button type="button" id="button-shipping-method" data-loading-text="Loading..." class="btn btn-primary"><span>Continue</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#collapse-payment-method" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle" aria-expanded="true">Step 5: Payment Method <i class="fa fa-caret-down"></i></a></h4>
                    </div>
                    <div class="panel-collapse collapse in" id="collapse-payment-method" aria-expanded="true" style="">
                        <div class="panel-body">
                            <div class="alert alert-warning alert-dismissible"><i class="fa fa-exclamation-circle"></i> Warning: No Payment options are available. Please <a href="https://dev.megatan.ws/index.php?route=information/contact">contact us</a> for assistance!</div>
                            <p><strong>Add Comments About Your Order</strong></p>
                            <p>
                                <textarea name="comment" rows="8" class="form-control">Add Comments About Your Order</textarea>
                            </p>
                            <div class="buttons">
                                <div class="pull-right">I have read and agree to the <a href="https://dev.megatan.ws/index.php?route=information/information/agree&amp;information_id=5" class="agree"><b>Terms &amp; Conditions</b></a>
                                    <input type="checkbox" name="agree" value="1">
                                    &nbsp;
                                    <button type="button" id="button-payment-method" data-loading-text="Loading..." class="btn btn-primary"><span>Continue</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#collapse-checkout-confirm" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle" aria-expanded="true">Step 6: Confirm Order <i class="fa fa-caret-down"></i></a></h4>
                    </div>
                    <div class="panel-collapse collapse in" id="collapse-checkout-confirm" aria-expanded="true" style="">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td class="text-left">Product Name</td>
                                            <td class="text-left">Model</td>
                                            <td class="text-right">Quantity</td>
                                            <td class="text-right">Unit Price</td>
                                            <td class="text-right">Total</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-left"><a href="https://dev.megatan.ws/melanotan-2-10mg-1-vial-mt210mg">Melanotan 2 10mg (1 vial)</a> </td>
                                            <td class="text-left">mt210mg</td>
                                            <td class="text-right">1</td>
                                            <td class="text-right">£17.00</td>
                                            <td class="text-right">£17.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><a href="https://dev.megatan.ws/melanotan-2-20mg-2-vials-mt220mg">Melanotan 2 20mg (2 vials)</a> </td>
                                            <td class="text-left">mt220mg</td>
                                            <td class="text-right">6</td>
                                            <td class="text-right">£32.00</td>
                                            <td class="text-right">£192.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><a href="https://dev.megatan.ws/melanotan-2-30mg-3-vials-mt230mg">Melanotan 2 30mg (3 vials)</a> </td>
                                            <td class="text-left">mt230mg</td>
                                            <td class="text-right">1</td>
                                            <td class="text-right">£47.00</td>
                                            <td class="text-right">£47.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><a href="https://dev.megatan.ws/melanotan-2-50mg-5-vials-mt250mg">Melanotan 2 50mg (5 vials)</a> </td>
                                            <td class="text-left">mt250mg</td>
                                            <td class="text-right">1</td>
                                            <td class="text-right">£75.00</td>
                                            <td class="text-right">£75.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><a href="https://dev.megatan.ws/melanotan-2-10mg-starter-kit-1-vial-mt210mgsk">Melanotan 2 10mg Starter Kit (1 vial)</a> </td>
                                            <td class="text-left">mt210mgsk</td>
                                            <td class="text-right">2</td>
                                            <td class="text-right">£18.95</td>
                                            <td class="text-right">£37.90</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" class="text-right"><strong>Sub-Total:</strong></td>
                                            <td class="text-right">£368.90</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right"><strong>Royal Mail First Class Recorded:</strong></td>
                                            <td class="text-right">£0.00</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right"><strong>Total:</strong></td>
                                            <td class="text-right">£368.90</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <form id="payment" class="form-horizontal">
                                <fieldset>
                                    <legend>Credit Card Details</legend>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-cc-owner">Card Owner</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="cc_owner" value="" placeholder="Card Owner" id="input-cc-owner" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-cc-number">Card Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="cc_number" value="" placeholder="Card Number" id="input-cc-number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-cc-expire-date">Card Expiry Date</label>
                                        <div class="col-sm-3">
                                            <select name="cc_expire_date_month" id="input-cc-expire-date" class="form-control">
                                                <option value="01">January</option>
                                                <option value="02">February</option>
                                                <option value="03">March</option>
                                                <option value="04">April</option>
                                                <option value="05">May</option>
                                                <option value="06">June</option>
                                                <option value="07">July</option>
                                                <option value="08">August</option>
                                                <option value="09">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <select name="cc_expire_date_year" class="form-control">
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                                <option value="2030">2030</option>
                                                <option value="2031">2031</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-cc-cvv2">Card Security Code (CVV2)</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="cc_cvv2" value="" placeholder="Card Security Code (CVV2)" id="input-cc-cvv2" class="form-control">
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                            <div class="buttons">
                                <div class="pull-right">
                                    <input type="button" value="Confirm Order" id="button-confirm" class="btn btn-primary">
                                </div>
                            </div>
                            <script type="text/javascript">
                            $('#button-confirm').on('click', function() {
                                $.ajax({
                                    url: 'index.php?route=extension/payment/offline_cc/send',
                                    type: 'post',
                                    data: $('#payment :input'),
                                    dataType: 'json',
                                    beforeSend: function() {
                                        $('#button-confirm').prop('disabled', true).button('loading');
                                    },
                                    complete: function() {
                                        $('#button-confirm').prop('disabled', false).button('reset');;
                                    },
                                    success: function(json) {
                                        if (json['error']) {
                                            alert(json['error']);
                                        }
                                        if (json['redirect']) {
                                            location = json['redirect'];
                                        }
                                    }
                                });
                            });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection