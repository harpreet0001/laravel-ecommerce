@extends('front.layouts.layout',['pageslug' => $brand->title ?? '' ,'pageTitle' => $brand->title ?? '' ])
@section('content')
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{Request::url()}}">{{$brand->title ?? ''}}</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>{{$brand->title}}</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="aside-sec brand-products">
    <div class="container">
        <div class="aside-_content">
            <div class="row">
                <div class="right-content">
                    <div class="top-heading">
                        <h2>{{$selectedCategory->title ?? ''}}</h2>
                    </div>
                    <!-- products-filter -->
                    @if($products->count() > 0)
                    <div class="products-filters">
                        <div class="grid-list">
                            <button class="btn-grid-view view-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Grid" data-view="product-grid">
                            </button>
                            <button class="btn-list-view view-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="List" data-view="product-list">
                            </button>
                            <a href="{{route('compare.show')}}">
                                <span> Product Compare </span>
                                <span class="compare-total">{!!compareProductCount()!!}</span>
                            </a>
                        </div>
                        <!-- products-filters-right-up-->
                        @include('front.modules.main.shop.filters.filter_right_up')
                        <!-- products-filters-right-up end-->
                    </div>
                    @endif
                    <!-- products-filter end -->
                    <!-- content -->
                    <!-- 	<div class="main-products"> -->
                    <div class="main-products">
                        @include('front.modules.main.shop.product_list')
                    </div>
                    <!-- </div> -->
                    <!-- content end -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- comment: need to add -->
<!-- mobile filter btn -->
<div class="bottom-menu bottom-menu-266">
    <ul>
        <li class="menu-item bottom-menu-item bottom-menu-item-1">
            <a href="javascript:void(0);"><span class="links-text">Home</span></a>
        </li>
        <li class="menu-item bottom-menu-item bottom-menu-item-2">
            <a href="javascript:void(0);"><span class="links-text">Wishlist</span><span class="count-badge wishlist-badge">3</span></a>
        </li>
        <li class="menu-item bottom-menu-item bottom-menu-item-3">
            <a href="javascript:void(0);"><span class="links-text">Compare</span><span class="count-badge compare-badge count-zero">0</span></a>
        </li>
        <li class="menu-item bottom-menu-item bottom-menu-item-4">
            <a href="javascript:void(0);"><span class="links-text">Email</span></a>
        </li>
        <li class="menu-item bottom-menu-item bottom-menu-item-5">
            <a href="javascript:void(0);"><span class="links-text">Call us</span></a>
        </li>
    </ul>
</div>
<a class="mobile-filter-trigger btn">Filter Products</a>
<!-- mobile flilter btn end  -->
@endsection