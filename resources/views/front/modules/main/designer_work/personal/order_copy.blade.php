@extends('front.layouts.layout',['pageslug' => 'Order','pagetitle'=>'Order'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Order</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Order</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content" class=" col-sm-9">
                <div class="order-page-sec">
                    <div class="order-page_content">
                        <ul>
                            <li>
                                <div class="order-page_card">
                                    <div class="order-page_card_ctnt">                                        
                                    <h3>Order #304268</h3>
                                    <p class="Meta">
                                        Order Date: 8th Jun 2021
                                    </p>
                                    <p>This order is marked as <strong><em>Cancelled</em></strong></p>
                                    <strong>Your Order Contains:</strong>
                                    <ul class="OrderItemList">
                                        <li>
                                            1 x Melanotan 2 10mg (1 vial)
                                            <span class="ExpectedReleaseDate"></span>
                                        </li>
                                        <li>
                                            5 x Melanotan 2 10mg (1 vial)
                                            <span class="ExpectedReleaseDate"></span>
                                        </li>
                                        <li>
                                            15 x Melanotan 2 10mg (1 vial)
                                            <span class="ExpectedReleaseDate"></span>
                                        </li>
                                        <li>
                                            20 x Melanotan 2 10mg (1 vial)
                                            <span class="ExpectedReleaseDate"></span>
                                        </li>
                                    </ul>
                                    </div>
                                    <div class="order-page-buttons">
                                        <a href="javascript:void(0);" class="btn main-btn">VIEW ORDER DETAILS</a>
                                        <form>
                                            <button class="btn main-btn">REORDER</button>
                                        </form>
                                    </div>
                                </div>
                                <hr>
                            </li>
                            <li>
                                <div class="order-page_card">
                                    <div class="order-page_card_ctnt">                                        
                                    <h3>Order #304268</h3>
                                    <p class="Meta">
                                        Order Date: 8th Jun 2021
                                    </p>
                                    <p>This order is marked as <strong><em>Cancelled</em></strong></p>
                                    <strong>Your Order Contains:</strong>
                                    <ul class="OrderItemList">
                                        <li>
                                            1 x Melanotan 2 10mg (1 vial)
                                            <span class="ExpectedReleaseDate"></span>
                                        </li>
                                    </ul>
                                    </div>
                                    <div class="order-page-buttons">
                                        <a href="javascript:void(0);" class="btn main-btn">VIEW ORDER DETAILS</a>
                                        <form>
                                            <button class="btn main-btn">REORDER</button>
                                        </form>
                                    </div>
                                </div>
                                <hr>
                            </li>
                            <li>
                                <div class="order-page_card">
                                    <div class="order-page_card_ctnt">                                        
                                    <h3>Order #304268</h3>
                                    <p class="Meta">
                                        Order Date: 8th Jun 2021
                                    </p>
                                    <p>This order is marked as <strong><em>Cancelled</em></strong></p>
                                    <strong>Your Order Contains:</strong>
                                    <ul class="OrderItemList">
                                        <li>
                                            1 x Melanotan 2 10mg (1 vial)
                                            <span class="ExpectedReleaseDate"></span>
                                        </li>
                                    </ul>
                                    </div>
                                    <div class="order-page-buttons">
                                        <a href="javascript:void(0);" class="btn main-btn">VIEW ORDER DETAILS</a>
                                        <form>
                                            <button class="btn main-btn">REORDER</button>
                                        </form>
                                    </div>
                                </div>
                                <hr>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            @include('front.includes.aside',['activelink' => 'account'])
        </div>
    </div>
</section>
@endsection