@extends('front.layouts.layout',['pageslug' => 'Affiliate','pagetitle'=>'Affiliate'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Affiliate</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Affiliate</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content" class=" col-sm-9">
                <form class="form-horizontal">
                    <fieldset>
                        <legend>My Affiliate Account</legend>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-company">Company</label>
                            <div class="col-sm-10">
                                <input type="text" name="company" value="" placeholder="Company" id="input-company" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-website">Web Site</label>
                            <div class="col-sm-10">
                                <input type="text" name="website" value="" placeholder="Web Site" id="input-website" class="form-control">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Payment Information</legend>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-tax">Tax ID</label>
                            <div class="col-sm-10">
                                <input type="text" name="tax" value="" placeholder="Tax ID" id="input-tax" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Payment Method</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label> <input type="radio" name="payment" value="cheque" checked="checked">
                                        Cheque</label>
                                </div>
                                <div class="radio">
                                    <label> <input type="radio" name="payment" value="paypal">
                                        PayPal</label>
                                </div>
                                <div class="radio">
                                    <label> <input type="radio" name="payment" value="bank">
                                        Bank Transfer</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group payment" id="payment-cheque" style="display: flex;">
                            <label class="col-sm-2 control-label" for="input-cheque">Cheque Payee Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="cheque" value="" placeholder="Cheque Payee Name" id="input-cheque" class="form-control">
                            </div>
                        </div>
                        <div class="form-group payment" id="payment-paypal" style="display: none;">
                            <label class="col-sm-2 control-label" for="input-paypal">PayPal Email Account</label>
                            <div class="col-sm-10">
                                <input type="text" name="paypal" value="" placeholder="PayPal Email Account" id="input-paypal" class="form-control">
                            </div>
                        </div>
                        <div class="payment" id="payment-bank" style="display: none;">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-bank-name">Bank Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="bank_name" value="" placeholder="Bank Name" id="input-bank-name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-bank-branch-number">ABA/BSB number (Branch Number)</label>
                                <div class="col-sm-10">
                                    <input type="text" name="bank_branch_number" value="" placeholder="ABA/BSB number (Branch Number)" id="input-bank-branch-number" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-bank-swift-code">SWIFT Code</label>
                                <div class="col-sm-10">
                                    <input type="text" name="bank_swift_code" value="" placeholder="SWIFT Code" id="input-bank-swift-code" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-bank-account-name">Account Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="bank_account_name" value="" placeholder="Account Name" id="input-bank-account-name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-bank-account-number">Account Number</label>
                                <div class="col-sm-10">
                                    <input type="text" name="bank_account_number" value="" placeholder="Account Number" id="input-bank-account-number" class="form-control">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="buttons clearfix">
                        <div class="pull-right">I have read and agree to the <a href="javascript:void(0);" class="agree"><b>How to Use Tanning Injections</b></a>
                            <input type="checkbox" name="agree" value="1">
                            &nbsp;
                            <button type="submit" class="btn btn-primary"><span>Continue</span></button>
                        </div>
                    </div>
                </form>
            </div>
            @include('front.includes.aside',['activelink' => 'account'])
        </div>
    </div>
</section>
@endsection