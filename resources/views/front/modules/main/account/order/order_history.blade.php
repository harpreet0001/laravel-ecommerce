@extends('front.layouts.layout',['pageslug' => 'Account','pagetitle'=>'Account|Order-History'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{route('account.home')}}">Account</a></li>
<li class="breadcrumb-item"><a href="{{Request::url()}}">Order History</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Order History</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content" class=" col-sm-9">
                <div class="order-page-sec">
                    <div class="order-page_content">
                        <ul>
                            @if(!is_null($orders))
                             @foreach($orders as $order)
                                  <li>
                                    <div class="order-page_card">
                                        <div class="order-page_card_ctnt">                                        
                                        <h3>Order #{{$order->unique_order_id}}</h3>
                                        <p class="Meta">
                                            Order Date: {!! fnDateFormat($order->created_at) !!}
                                        </p>
                                        <p>This order is marked as <strong><em>{!! orderstatusVal($order->orderstatus) !!}</em></strong></p>
                                        <strong>Your Order Contains:</strong>
                                        <ul class="OrderItemList">
                                            @foreach($order->orderitems as $orderitem)
                                                <li>
                                                    {{$orderitem->quantity}} x {{$orderitem->product->title}}
                                                    <span class="ExpectedReleaseDate"></span>
                                                 </li>
                                            @endforeach
                                        </ul>
                                        </div>
                                        <div class="order-page-buttons">
                                            <a href="{{route('account.order-details',$order->_id)}}" class="btn main-btn">VIEW ORDER DETAILS</a>
                                        </div>
                                    </div>
                                    <hr>
                                 </li>
                             @endforeach
                            @else
                            @endif   
                        </ul>
                    </div>
                </div>
            </div>
            @include('front.includes.aside',['activelink' => 'account'])
        </div>
    </div>
</section>
@endsection