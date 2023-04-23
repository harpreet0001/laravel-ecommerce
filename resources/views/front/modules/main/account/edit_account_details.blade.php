@extends('front.layouts.layout',['pageslug' => 'Account','pagetitle'=>'Account|Details'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{route('account.home')}}">Account</a></li>
<li class="breadcrumb-item"><a href="{{Request::url()}}">Edit Information</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>My Account Information</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content" class="login-page col-sm-9">
                @include('message.success')
                @include('message.error')
                <form action="{{route('account.update-account-details')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div id="account">
                        <legend>Your Personal Details</legend>
                        <div class="form-group required account-firstname">
                            <label class="col-sm-2 control-label" for="input-firstname">First Name </label>
                            <div class="col-sm-10">
                                <input type="text" name="firstname" value="{{auth()->user()->firstname}}" placeholder="First Name" id="firstname" class="form-control">
                                @error('firstname')
                                <span class="error error-msg text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group required account-lastname">
                            <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="lastname" value="{{auth()->user()->lastname}}" placeholder="Last Name" id="lastname" class="form-control">
                                @error('lastname')
                                <span class="error error-msg text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group required account-email">
                            <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                            <div class="col-sm-10">
                               <input type="tel" name="email" value="{{auth()->user()->email}}" placeholder="email" id="email" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group required account-contact">
                            <label class="col-sm-2 control-label" for="input-contact">Contact</label>
                            <div class="col-sm-10">
                                <input type="tel" name="contact" value="{{auth()->user()->contact}}" placeholder="contact" id="contact" class="form-control">
                                @error('contact')
                                <span class="error error-msg text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
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