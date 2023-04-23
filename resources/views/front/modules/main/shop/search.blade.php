@extends('front.layouts.layout',['pageslug' => 'Search' ,'pageTitle' => 'Search'])
@section('content')

    <!-- breadcrumb -->
    @component('front.includes.breadcrumb')
      <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
      <li class="breadcrumb-item"><a href="{{Request::url()}}">Search</a></li>
    @endcomponent
    <!-- breadcrumb end-->

    <!-- page-title -->
    @component('front.includes.page_title')
     <h1 class="title page-title">Search - {{request()->search ?? ''}}</h1>
    @endcomponent
    <!-- page-title  end-->

    <section class="aside-sec">
        <div class="container">
            <div class="aside-_content">
                <div class="row">
                    <aside class="side-column">
                        <figure class="aside-top_img">
                            <img src="{{isset($products[0]->image) ? imagePath($products[0]->image) : imagePath('no-image')}}">
                        </figure>
                        <div class="aside_links">
                            <h3 class="module-title">Categories</h3>

                            <!--sidebar category component-->
                              <x-category :selectedCategory="$selectedCategory" routename="search"/>
                            <!--sidebar category component end-->

                            @if($products->count() > 0)
                            <!-- products-filters-right-up-->
                             @include('front.modules.main.shop.filters.filter_left_down')
                            <!-- products-filters-right-up end-->
                            @endif

                        </div>
                    </aside>
                    <div class="right-content">
                        <!-- search-form start -->
                    <div class="search-form-wrapper">
                        <form method="GET">
                            <div class="search-form">
                                <div class="inputs">
                                    <input type="text" name="search" value="{{request()->search ?? ''}}" placeholder="Keywords" id="input-search" class="form-control">
                                    <select name="cId" class="form-control">
                                        @if(isset($categories))
                                            <option value=""> All</option>
                                            @foreach($categories as $category)
                                                <option value="{{base64_encode($category->_id)}}"  @if(isset(request()->cId) && request()->cId == base64_encode($category->_id)) {{'selected'}} @endif >{{$category->title}}</option>
                                            @endforeach
                                        @endif
                                   </select>
                                </div>
                                <div class="checkbox">
                                    <label class="checkbox-inline">
                                    <input type="checkbox" name="description" value="1" id="description" @if(isset(request()->description) && request()->description == '1')) {{'checked'}} @endif>
                                        Search in product descriptions</label>
                                </div>
                            </div>
                            <div class="buttons clearfix">
                                <div class="pull-right">
                                    <button id="button-search" type="submit" class="btn btn-primary"><span>Search</span></button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                    <!-- search-form end -->
                        <div class="top-heading">
                            <h2>{{$selectedCategory->title ?? ''}}</h2>
                        </div>
                        <!-- products-filter -->
                        @if($products->count() > 0)
                        <div class="products-filters">
                            <div class="grid-list">
                                <button class="btn-grid-view view-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Grid" data-view="product-grid" >
                                    
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
                        <!--    <div class="main-products"> -->
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
@endsection
