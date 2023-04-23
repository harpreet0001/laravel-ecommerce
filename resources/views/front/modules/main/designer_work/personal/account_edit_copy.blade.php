@extends('front.layouts.layout',['pageslug' => 'Account','pagetitle'=>'Account'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Account</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Account</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content" class="login-page col-sm-9">
                <form action="https://dev.megatan.ws/index.php?route=account/edit" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div id="account">
                        <legend>Your Personal Details</legend>
                        <div class="form-group required account-firstname">
                            <label class="col-sm-2 control-label" for="input-firstname">First Name </label>
                            <div class="col-sm-10">
                                <input type="text" name="firstname" value="pumptester" placeholder="First Name" id="input-firstname" class="form-control">
                            </div>
                        </div>
                        <div class="form-group required account-lastname">
                            <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="lastname" value="pumptester" placeholder="Last Name" id="input-lastname" class="form-control">
                            </div>
                        </div>
                        <div class="form-group required account-email">
                            <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" value="pumtester@gmail.com" placeholder="E-Mail" id="input-email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group required account-telephone">
                            <label class="col-sm-2 control-label" for="input-telephone">Telephone</label>
                            <div class="col-sm-10">
                                <input type="tel" name="telephone" value="01372434844" placeholder="Telephone" id="input-telephone" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="buttons clearfix">
                        <div class="pull-left"><a href="javascript:void(0);" class="btn btn-default">Back</a></div>
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