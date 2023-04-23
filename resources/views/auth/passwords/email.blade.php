@extends('front.layouts.layout',['pageslug' => 'Password|Forgot','pagetitle'=>'Password|Forgot'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{Request::url()}}">Forgotten Password</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Forgot Your Password?</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content001" class="account-page col-sm-9">
                @include('message.error')
                @include('message.success')
                @if(session('status'))
                     <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                         {{Session::get('status')}}
                     </div>
                 @endif
                <div class="row login-box">
                    <div class="col-lg-8">
                        <p class="mb-4">Enter the e-mail address associated with your account. Click submit to have a password reset link e-mailed to you.</p>
                        <div class="well">
                            <h2 class="title title-inn">Your E-Mail Address</h2>
                            <form method="POST" action="{{ route('password.email') }}" name="reset_email">
                                @csrf      
                                <div class="form-group required">
                                    <label class="control-label">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-Mail Address">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="btn-grp mt-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="buttons">                                       
                                                <a href="{{route('login')}}" class="btn main-btn w-100">Back</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="buttons">                                       
                                                <button type="submit" class="btn main-btn w-100">
                                                    Continue
                                                </button>                                       
                                            </div>
                                        </div>
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
