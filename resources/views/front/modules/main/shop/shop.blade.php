@extends('front.layouts.layout',['pageslug' => 'shop' ,'pageTitle' => $selectedCategory->pagetitle ?? '' ])

@section('meta-data')
 <meta name="description" content="{{$selectedCategory->metadescription ?? ''}}">
 <meta name="keywords" content="{{$selectedCategory->metakeywords ?? ''}}" />
@endsection

@section('content')
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{route('shop',$selectedCategory->slug)}}">{{$selectedCategory->title ?? ''}}</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>{{$selectedCategory->title ?? ''}}</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="aside-sec">
    <div class="container">
        <div class="aside-_content">
            <div class="row">
                <aside class="side-column">
                    <!-- mobile sec -->
                    <div class="mobile-wrapper-header">
                        <span>Filters</span>
                        <a class="x"><i class="fas fa-times"></i></a>
                    </div>
                    <!-- mobile sec end -->
                    <figure class="aside-top_img">
                        <img src="{{isset($products[0]->image) ? imagePath($products[0]->image) : imagePath('no-image')}}">
                    </figure>
                    <div class="aside_links">
                        <h3 class="module-title">Categories</h3>
                        <!--sidebar category component-->
                        <x-category :selectedCategory="$selectedCategory" />
                        <!--sidebar category component end-->
                        @if($products->count() > 0)
                        <!-- products-filters-right-up-->
                        @include('front.modules.main.shop.filters.filter_left_down')
                        <!-- products-filters-right-up end-->
                        @endif
                    </div>
                </aside>
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
<a class="mobile-filter-trigger btn">More Products</a>
<!-- mobile flilter btn end  -->
@endsection