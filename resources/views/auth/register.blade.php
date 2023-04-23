@extends('front.layouts.layout',['pageslug' => 'Account','pagetitle'=>'Account|Register'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{ route('register') }}" >Register</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Register Account</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content" class="account-page col-sm-9 register-page">
                    @include('message.error')
                    @include('message.success')
                    <p>If you already have an account with us, please login at the <a href="{{ route('login') }}">login page</a>.</p>
                        <form method="POST" action="{{ route('register') }}" name="register" class="register-form form-horizontal">
                            @csrf
                            <div id="account">
                                <h2 class="title">Your Personal Details</h2>
                            <div class="form-group required account-firstname">
                                <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
                                <div class="col-sm-10">
                               <div class="form-control-wrap">
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}"  autocomplete="firstname" autofocus placeholder="First Name">

                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                </div>
                            </div>
                            <div class="form-group required account-lastname">
                                <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
                                <div class="col-sm-10">
                                    <div class="form-control-wrap">
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}"  autocomplete="lastname" autofocus placeholder="Last Name">

                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                </div>
                            </div>
                            <div class="form-group required account-email">
                                <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                                <div class="col-sm-10">
                                    <div class="form-control-wrap">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" placeholder="E-Mail">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                </div>
                            </div>
                            <div class="form-group required account-telephone">
                                <label class="col-sm-2 control-label" for="input-telephone">Telephone</label>
                                <div class="col-sm-10">
                                    <div class="form-control-wrap">
                                    <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}"  autocomplete="contact" autofocus placeholder="Telephone">

                                    @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                </div>
                            </div>
                        </div>
                        <fieldset>
                            <legend>Your Password</legend>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label account-pass" for="input-password">Password</label>
                                <div class="col-sm-10">
                                    <div class="form-control-wrap">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                  </div>
                                </div>
                            </div>
                            <div class="form-group required account-pass2">
                                <label class="col-sm-2 control-label" for="input-confirm">Password Confirm</label>
                                <div class="col-sm-10">
                                    <div class="form-control-wrap">
                                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" placeholder="Password Confirm"> 
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Newsletter</legend>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Subscribe</label>
                                <div class="col-sm-10"> <label class="radio-inline">
                                    <input type="radio" name="newsletter" value="1">
                                Yes</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="newsletter" value="0" checked="checked">
                                    No</label>
                                </div>
                            </div>
                    </fieldset>
                    <div class="buttons">
                        <div class="pull-left">I have read and agree to the 
                            @if(Route::has('privacy-policy'))
                            <a href="{{Route('privacy-policy')}}" class="agree @error('agree') is-invalid @enderror""><b>Privacy Policy</b></a>
                            @else
                            <a href="javascript:void(0)" class="agree @error('agree') is-invalid @enderror""><b>Privacy Policy</b></a>
                            @endif
                            <input type="checkbox" name="agree" value="1" >
                            @error('agree')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <button type="submit" class="btn btn-primary" data-loading-text="<span>Continue</span>"><span>Continue</span></button>
                            
                        </div>
                    </div>
                </form>
            </div>
          @include('front.includes.aside',['activelink' => 'register'])
        </div>
    </div>
</section>
@endsection