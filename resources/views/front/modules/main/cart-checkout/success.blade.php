@extends('front.layouts.layout',['pageslug' => 'Cart'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="">Order</a></li>
@endcomponent
<!-- breadcrumb end-->
<div class="successfull-sec">
    <div class="container">    	
        <h2>Thank You! Your order has been successfully placed.</h2>
        <div class="mt-3 text-center">
        	We have sent you email regarding your order details.
        </div>
        <div class="mt-3 text-center">
        	Please visit our product <a href="{{route('home')}}" class="btn btn-success">Click Here</a>
        </div>
    </div>
</div>
@endsection