@extends('front.layouts.layout',['pageslug' => 'Account'])
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
                        <li class="edit-info"><a href="javascript:void(0);">Edit your account information</a></li>
                        <li class="edit-pass"><a href="javascript:void(0);">Change your password</a></li>
                        <li class="edit-address"><a href="javascript:void(0);">Modify your address book entries</a></li>
                        <li class="edit-wishlist"><a href="javascript:void(0);">Modify your wish list</a></li>
                    </ul>
                </div>
                <div class="my-orders">
                    <h2 class="title">My Orders</h2>
                    <ul class="list-unstyled account-list">
                        <li class="edit-order"><a href="javascript:void(0);">View your order history</a></li>
                        <li class="edit-downloads"><a href="javascript:void(0);">Downloads</a></li>
                        <li class="edit-rewards"><a href="javascript:void(0);">Your Reward Points</a></li>
                        <li class="edit-returns"><a href="javascript:void(0);">View your return requests</a></li>
                        <li class="edit-transactions"><a href="javascript:void(0);">Your Transactions</a></li>
                        <li class="edit-recurring"><a href="javascript:void(0);">Recurring payments</a></li>
                    </ul>
                </div>
                <div class="my-affiliates">
                    <h2 class="title">My Affiliate Account</h2>
                    <ul class="list-unstyled account-list">
                        <li class="affiliate-add"><a href="javascript:void(0);">Register for an affiliate account</a></li>
                    </ul>
                </div>
                <div class="my-newsletter">
                    <h2 class="title">Newsletter</h2>
                    <ul class="list-unstyled account-list">
                        <li><a href="javascript:void(0);">Subscribe / unsubscribe to newsletter</a></li>
                    </ul>
                </div>
            </div>
            <aside id="column-right" class="side-column">
                <div class="grid-rows">
                    <div class="grid-row grid-row-column-right-1">
                        <div class="grid-cols">
                            <div class="grid-col grid-col-column-right-1-1">
                                <div class="grid-items">
                                    <div class="grid-item grid-item-column-right-1-1-1">
                                        <div class="accordion-menu accordion-menu-126">
                                            <ul class="j-menu">
                                                <li class="menu-item accordion-menu-item accordion-menu-item-1">
                                                    <a href="javascript:void(0);">
                                                        <span class="links-text">My Account</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item accordion-menu-item accordion-menu-item-2">
                                                    <a href="https://dev.megatan.ws/index.php?route=account/address">
                                                        <span class="links-text">Address Book</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item accordion-menu-item accordion-menu-item-3">
                                                    <a href="javascript:void(0);">
                                                        <span class="links-text">Wishlist</span><span class="count-badge wishlist-badge">3</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item accordion-menu-item accordion-menu-item-4">
                                                    <a href="javascript:void(0);">
                                                        <span class="links-text">Order History</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item accordion-menu-item accordion-menu-item-5">
                                                    <a href="javascript:void(0);">
                                                        <span class="links-text">Downloads</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item accordion-menu-item accordion-menu-item-6">
                                                    <a href="javascript:void(0);">
                                                        <span class="links-text">Recurring Payments</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item accordion-menu-item accordion-menu-item-7">
                                                    <a href="javascript:void(0);">
                                                        <span class="links-text">Reward Points</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item accordion-menu-item accordion-menu-item-8">
                                                    <a href="javascript:void(0);">
                                                        <span class="links-text">Returns</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item accordion-menu-item accordion-menu-item-9">
                                                    <a href="javascript:void(0);">
                                                        <span class="links-text">Transactions</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item accordion-menu-item accordion-menu-item-10">
                                                    <a href="javascript:void(0);">
                                                        <span class="links-text">Newsletter</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item accordion-menu-item accordion-menu-item-11 ">
                                                    <a>
                                                        <span class="links-text">Custom Menus</span>
                                                        <span class="open-menu collapsed" data-toggle="collapse" data-target="#collapse-611a0cccd7345" role="heading"><i class="fa fa-plus"></i></span>
                                                    </a>
                                                    <div class="collapse " id="collapse-611a0cccd7345">
                                                        <ul class="j-menu">
                                                            <li class="menu-item accordion-menu-item-12">
                                                                <a>
                                                                    <span class="links-text">All Menus Are</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item accordion-menu-item-13">
                                                                <a>
                                                                    <span class="links-text">Fully Customizable</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item accordion-menu-item-14">
                                                                <a>
                                                                    <span class="links-text">Add/Remove Links</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item accordion-menu-item-15">
                                                                <a>
                                                                    <span class="links-text">As Needed</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection