@extends('front.layouts.layout',['pageslug' => 'Address Book','pagetitle' => 'Address Book|Edit'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="javascript::void(0)">Account</a></li>
<li class="breadcrumb-item"><a href="{{route('account.addressbook.index')}}">Address Book List</a></li>
<li class="breadcrumb-item"><a href="javascript::void(0)">Edit Address Book</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Edit Address Book</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-9">
                <!-- #################################################### -->
              <form action="{{route('account.addressbook.update',base64_encode($addressbook->_id))}}" method="post" enctype="multipart/form-data" class="form-horizontal addressbook-edit-form" onsubmit="addressbook.update(this)">
                  @csrf
                  @method('patch')
                <div id="address">  
                    <div class="form-group required address-firstname">
                        <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="firstname" value="{{$addressbook->firstname ?? ''}}" placeholder="First Name" id="input-firstname" class="form-control">
                            <span class="text text-danger error-msg" id="firstname_error"></span>
                        </div>
                    </div>

                    <div class="form-group required address-lastname">
                        <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="lastname" value="{{$addressbook->lastname ?? ''}}" placeholder="Last Name" id="input-lastname" class="form-control">
                            <span class="text text-danger error-msg" id="lastname_error"></span>
                        </div>
                    </div>

                    <div class="form-group  address-company">
                        <label class="col-sm-2 control-label" for="input-company">Company</label>
                        <div class="col-sm-10">
                          <input type="text" name="company" value="{{$addressbook->company ?? ''}}" placeholder="Company" id="input-company" class="form-control">
                          <span class="text text-danger error-msg" id="company_error"></span>
                        </div>
                    </div>

                    <div class="form-group required address-address-1">
                        <label class="col-sm-2 control-label" for="input-address-1">Address 1</label>
                        <div class="col-sm-10">
                          <input type="text" name="address_1" value="{{$addressbook->address_1 ?? ''}}" placeholder="Address 1" id="input-address-1" class="form-control">
                          <span class="text text-danger error-msg" id="address_1_error"></span>
                        </div>
                    </div>

                    <div class="form-group  address-address-2">
                        <label class="col-sm-2 control-label" for="input-address-2">Address 2</label>
                        <div class="col-sm-10">
                           <input type="text" name="address_2" value="{{$addressbook->address_2 ?? ''}}" placeholder="Address 2" id="input-address-2" class="form-control">
                           <span class="text text-danger error-msg" id="address_2_error"></span>
                        </div>
                    </div>

                    <div class="form-group required address-city">
                        <label class="col-sm-2 control-label" for="input-city">Town/City</label>
                        <div class="col-sm-10">
                           <input type="text" name="city" value="{{$addressbook->city ?? ''}}" placeholder="Town/City" id="input-city" class="form-control">
                           <span class="text text-danger error-msg" id="city_error"></span>
                        </div>
                    </div>

                    <div class="form-group required address-postcode">
                        <label class="col-sm-2 control-label" for="input-postcode">Post Code</label>
                        <div class="col-sm-10">
                          <input type="text" name="postcode" value="{{$addressbook->postcode ?? ''}}" placeholder="Post Code" id="input-postcode" class="form-control">
                          <span class="text text-danger error-msg" id="postcode_error"></span>
                        </div>
                    </div>

                    <div class="form-group required address-country">
                        <label class="col-sm-2 control-label" for="input-country">Country</label>
                        <div class="col-sm-10">
                           <!-- country-component -->  
                             <x-country :selectedCountryId="$addressbook->countryId"/>
                           <!-- country-component -->  
                            <span class="text text-danger error-msg" id="countryId_error"></span>
                        </div>
                    </div>

                    <div class="form-group required address-state">
                        <label class="col-sm-2 control-label" for="input-state">Region / State</label>
                        <div class="col-sm-10">
                            <!-- state-component -->
                              <x-state :selectedCountryId="$addressbook->countryId" :selectedStateId="$addressbook->stateId"/>
                             <!-- state-component -->
                            <span class="text text-danger error-msg" id="stateId_error"></span>
                        </div>
                    </div>

                    <div class="form-group required address-phone">
                            <label class="col-sm-2 control-label" for="input-phone">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone" value="{{$addressbook->phone ?? ''}}" placeholder="Phone" id="input-phone" class="form-control">
                                <span class="text text-danger error-msg" id="phone_error"></span>
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Default Address</label>
                        <div class="col-sm-10"> 
                            <label class="radio-inline"><input type="radio" name="default" value="1" @if($addressbook->default == '1'){{'checked'}}@endif >Yes</label>
                            <label class="radio-inline"><input type="radio" name="default" value="0" @if($addressbook->default == '0'){{'checked'}}@endif>No</label>
                            <span class="text text-danger error-msg" id="default_error"></span>
                        </div>
                    </div>
                </div>

                <div class="buttons clearfix">
                    <div class="pull-left">
                        <a href="{{route('account.addressbook.index')}}" class="btn btn-default">Back</a>
                    </div>
                    <div class="pull-right">
                       <button type="submit" class="btn btn-primary"><span>Continue</span></button>
                    </div>
                </div>
                </form>
                <!-- #################################################### -->
            </div>
            @include('front.includes.aside')
        </div>
    </div>
</section>
@endsection
