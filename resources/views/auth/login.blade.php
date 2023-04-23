@extends('front.layouts.layout',['pageslug' => 'Account','pageTitle'=>'Track your Order History | Megatan'])

@section('meta-data')
 <meta name="description" content="Create an account on our website and get login details to shop faster, stay up to date on an order's status, and keep track of the orders you have previously made.">
 <meta name="keywords" content="" />
@endsection


@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{Request::url()}}">Login</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Account Login</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content001" class="account-page col-sm-9">
                @include('message.error')
                @include('message.success')
                <div class="row login-box">
                    <div class="col-sm-6">
                        <div class="well">
                            <h2 class="title">New Customer</h2>
                            <p><strong>Register Account</strong></p>
                            <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                            <div class="buttons">
                                <div class="pull-right">
                                    <a href="{{ route('register') }}" class="btn btn-primary">Continue</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="well">
                            <h2 class="title">Returning Customer</h2>
                            <p><strong>I am a returning customer</strong></p>
                            <form method="POST" action="{{ route('login') }}" name="login">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label" for="input-email">E-Mail Address</label>

                                    <input id="input-email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-Mail Address">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="input-password">Password</label>

                                    <input id="input-password" type="password"  placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror



                                    @if (Route::has('password.request'))
                                    <div><a href="{{ route('password.request') }}" target="_top">Forgotten Password</a></div>
                                    @endif
                                </div>
                                <div class="buttons">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary" data-loading-text="<span>Login</span>"><span>Login</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          @include('front.includes.aside',['activelink' => 'account'])
        </div>
    </div>
</section>
@endsection