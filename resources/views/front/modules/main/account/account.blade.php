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
            <div id="content" class="account-page col-sm-9">
                <div class="my-account">
                    <h2 class="title">My Account</h2>
                    <ul class="list-unstyled account-list">
                        <li class="edit-info"><a href="{{route('account.edit-account-details')}}">Edit your account information</a></li>
                        <li class="edit-pass"><a href="{{route('account.edit-account-password')}}">Change your password</a></li>
                        <li class="edit-address"><a href="{{route('account.addressbook.index')}}">Modify your address book entries</a></li>
                        <li class="edit-wishlist"><a href="{{route('wishlist.show')}}">Modify your wish list</a></li>
                    </ul>
                </div>
                <div class="my-orders">
                    <h2 class="title">My Orders</h2>
                    <ul class="list-unstyled account-list">
                        <li class="edit-order"><a href="{{route('account.order-history')}}">View your order history</a></li>
                        <!-- <li class="edit-downloads"><a href="javascript:void(0);">Downloads</a></li> -->
                        <!-- <li class="edit-rewards"><a href="javascript:void(0);">Your Reward Points</a></li>
                        <li class="edit-returns"><a href="javascript:void(0);">View your return requests</a></li>
                        <li class="edit-transactions"><a href="javascript:void(0);">Your Transactions</a></li>
                        <li class="edit-recurring"><a href="javascript:void(0);">Recurring payments</a></li> -->
                    </ul>
                </div>
                <!-- <div class="my-affiliates">
                    <h2 class="title">My Affiliate Account</h2>
                    <ul class="list-unstyled account-list">
                        <li class="affiliate-add"><a href="javascript:void(0);">Register for an affiliate account</a></li>
                    </ul>
                </div> -->
                <div class="my-newsletter">
                    <h2 class="title">Newsletter</h2>
                    <ul class="list-unstyled account-list">
                        <li><a href="{{route('account.newsletter')}}">Subscribe / unsubscribe to newsletter</a></li>
                    </ul>
                </div>
            </div>
          @include('front.includes.aside',['activelink' => 'account'])
        </div>
    </div>
</section>
@endsection