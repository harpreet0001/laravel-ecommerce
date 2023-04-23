@extends('front.layouts.layout',['pageslug' => 'Wishlist'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Wishlist</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Wishlist</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-9">
                <div class="table-responsive wishlist-table">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td class="text-center td-image">Image</td>
                                <td class="text-left td-name">Product Name</td>
                                <td class="text-center td-model">Model</td>
                                <td class="text-center td-stock">Stock</td>
                                <td class="text-center td-price">Unit Price</td>
                                <td class="text-center td-action">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td class="text-center td-image"><a href="javascript:void(0);"><img src="https://dev.megatan.ws/image/cache/catalog/products/10mg_melanotan_2_sk.fw__74826_zoom__58063_zoom-60x60.png"></a></td>
                                <td class="text-left td-name"><a href="javascript:void(0);">Melanotan 2 10mg Starter Kit (1 vial)</a></td>
                                <td class="text-center td-model">mt210mgsk</td>
                                <td class="text-center td-stock in-stock">In Stock</td>
                                <td class="text-center td-price">
                                    <div class="price"> £18.95
                                    </div>
                                </td>
                                <td class="text-center td-action">
                                    <button type="button" data-toggle="tooltip" class="btn btn-primary" data-loading-text="<i class='fa fa-shopping-cart'></i>" data-original-title="Add to Cart"><i class="fa fa-shopping-cart"></i></button>
                                    <a href="javascript:void(0);" data-toggle="tooltip" title="" class="btn btn-danger btn-remove" data-original-title="Remove"><i class="fa fa-times"></i></a></td>
                            </tr>
                            <tr class="">
                                <td class="text-center td-image">
                                  <a href="javascript:void(0);">
                                    <img src="https://dev.megatan.ws/image/cache/catalog/products/20mg_melanotan_2_sk.fw__30581_zoom__53990_zoom-60x60.png">
                                  </a></td>
                                <td class="text-left td-name">
                                  <a href="javascript:void(0);">Melanotan 2 20mg Starter Kit (2 vials)</a></td>
                                <td class="text-center td-model">mt220mgsk</td>
                                <td class="text-center td-stock in-stock">In Stock</td>
                                <td class="text-center td-price">
                                    <div class="price"> £34.85
                                    </div>
                                </td>
                                <td class="text-center td-action">
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-primary" data-loading-text="<i class='fa fa-shopping-cart'></i>" data-original-title="Add to Cart"><i class="fa fa-shopping-cart"></i></button>
                                    <a href="javascript:void(0);" data-toggle="tooltip" title="" class="btn btn-danger btn-remove" data-original-title="Remove"><i class="fa fa-times"></i></a></td>
                            </tr>
                            <tr class="">
                                <td class="text-center td-image"><a href="javascript:void(0);"><img src="https://dev.megatan.ws/image/cache/catalog/products/nasalspray__28747_zoom__34972_zoom-60x60.jpg" alt="Melanotan 2 Nasal Spray 20mg (2 vials)" title="Melanotan 2 Nasal Spray 20mg (2 vials)"></a></td>
                                <td class="text-left td-name"><a href="javascript:void(0);">Melanotan 2 Nasal Spray 20mg (2 vials)</a></td>
                                <td class="text-center td-model">mt220mgns</td>
                                <td class="text-center td-stock in-stock">In Stock</td>
                                <td class="text-center td-price">
                                    <div class="price"> £34.95
                                    </div>
                                </td>
                                <td class="text-center td-action">
                                    <button type="button"  data-toggle="tooltip" title="" class="btn btn-primary" data-loading-text="<i class='fa fa-shopping-cart'></i>" data-original-title="Add to Cart"><i class="fa fa-shopping-cart"></i></button>
                                    <a href="javascript:void(0);" data-toggle="tooltip" title="" class="btn btn-danger btn-remove" data-original-title="Remove"><i class="fa fa-times"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="buttons clearfix">
                    <div class="pull-right"><a href="javascript:void(0);" class="btn btn-primary">Continue</a></div>
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