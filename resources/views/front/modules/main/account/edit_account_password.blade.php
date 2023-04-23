@extends('front.layouts.layout',['pageslug' => 'Account','pagetitle'=>'Account|Password'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{route('account.home')}}">Account</a></li>
<li class="breadcrumb-item"><a href="{{Request::url()}}">Change Password</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Change Password</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content" class="login-page col-sm-9">
                @include('message.error')
                @include('message.success')
                <form class="form-horizontal" method="post" action="{{route('account.update-account-password')}}">
                    @csrf
                    @method('post')
                    <fieldset>
                        <legend>Your Password</legend>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="password">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">
                                @error('password')
                                <span class="error error-msg text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-confirm">Password Confirm</label>
                            <div class="col-sm-10">
                                <input type="password" name="password_confirmation" value="" placeholder="Password Confirm" id="password_confirmation" class="form-control">
                                @error('password_confirmation')
                                <span class="error error-msg text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    <div class="buttons clearfix">
                        <div class="pull-left"><a href="{{route('account.home')}}" class="btn btn-default">Back</a></div>
                        <div class="pull-right">
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