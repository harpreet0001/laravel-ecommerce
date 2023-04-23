@extends('front.layouts.layout',['pageslug' => 'Return Add','pagetitle'=>'Account|Return Add'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{Request::url()}}">Return Add</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Return Add </span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-9">
                <p>Please complete the form below to request an RMA number.</p>
                <form class="form-horizontal">
                    <fieldset>
                        <legend>Order Information</legend>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="firstname" value="pumptester" placeholder="First Name" id="input-firstname" class="form-control">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="lastname" value="pumptester" placeholder="Last Name" id="input-lastname" class="form-control">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" value="pumtester@gmail.com" placeholder="E-Mail" id="input-email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-telephone">Telephone</label>
                            <div class="col-sm-10">
                                <input type="text" name="telephone" value="01372434844" placeholder="Telephone" id="input-telephone" class="form-control">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-order-id">Order ID</label>
                            <div class="col-sm-10">
                                <input type="text" name="order_id" value="" placeholder="Order ID" id="input-order-id" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-date-ordered">Order Date</label>
                            <div class="col-sm-3">
                                <div class="input-group date">
                                    <input type="text" name="date_ordered" value="" placeholder="Order Date" data-date-format="YYYY-MM-DD" id="input-date-ordered" class="form-control">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                                    </span></div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Product Information</legend>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-product">Product Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="product" value="" placeholder="Product Name" id="input-product" class="form-control">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-model">Product Code</label>
                            <div class="col-sm-10">
                                <input type="text" name="model" value="" placeholder="Product Code" id="input-model" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-quantity">Quantity</label>
                            <div class="col-sm-10">
                                <input type="text" name="quantity" value="1" placeholder="Quantity" id="input-quantity" class="form-control">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label">Reason for Return</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="return_reason_id" value="1">
                                        Dead On Arrival</label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="return_reason_id" value="4">
                                        Faulty, please supply details</label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="return_reason_id" value="3">
                                        Order Error</label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="return_reason_id" value="5">
                                        Other, please supply details</label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="return_reason_id" value="2">
                                        Received Wrong Item</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label">Product is opened</label>
                            <div class="col-sm-10">
                                <label class="radio-inline"> <input type="radio" name="opened" value="1">
                                    Yes</label>
                                <label class="radio-inline"> <input type="radio" name="opened" value="0" checked="checked">
                                    No</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-comment">Faulty or other details</label>
                            <div class="col-sm-10">
                                <textarea name="comment" rows="10" placeholder="Faulty or other details" id="input-comment" class="form-control"></textarea>
                            </div>
                        </div>
                    </fieldset>
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