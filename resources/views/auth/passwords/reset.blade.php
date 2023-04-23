@extends('front.layouts.layout',['pageslug' => 'Password|Reset','pagetitle'=>'Password|Reset'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{Request::url()}}">Reset Password</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Reset Your Password</span></h1>
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
                        <div class="well">
                           <form method="POST" action="{{ route('password.update') }}" name="reset_password">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <label class="form-label">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus readonly>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>     
                                <div class="buttons mt-4">
                                    <div class="pull-right">
                                        <button type="submit" class="btn main-btn">{{ __('Reset Password') }}</button>
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

