@extends('front.layouts.layout',['pageTitle' => $product->pagetitle])
@section('content')
    <!--meta-data-->
    @section('meta-data')
        <meta name="description" content="{{$product->metadescription}}">
        <meta name="keywords" content="{{$product->metakeywords}}">
    @endsection
    <!--meta-data-end-->
	<!-- breadcrumb -->
	@component('front.includes.breadcrumb')
	  <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
	  <li class="breadcrumb-item">
	  	<a href="{{route('shop',$selectedCategory->slug)}}">
	  		{{$selectedCategory->title ?? ''}}
	  	</a>
	  </li>
      <li class="breadcrumb-item"><a href="{{route('product.show',$product->slug)}}">{{$selectedCategory->title ?? ''}}</a></li>
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
                    <div class="aside_links">
                        <h3 class="module-title">Categories</h3>
                        <!--sidebar category component-->
							  <x-category :selectedCategory="$selectedCategory"/>
						<!--sidebar category component end-->
                        <!-- carousel -->
                        <div class="">
                            <!-- carousel -->
                                <x-product :categoryId="$selectedCategory->_id"/>
                            <!-- carousel end-->
                        </div>
                        <!-- carousel end -->
                    </div>
                </aside>
                <div class="right-content">
                    <!-- content -->
                    <div class="product-info has-extra-button">
                        <div class="product-left">
                            <div class="product-image">
                                <div class="feature_card zoom-card">
                                    <figure class="zoom" style="background-image: url({{imagePath($product->image)}});">
                                        <img src="{{imagePath($product->image)}}" class="img-fluid">
                                        <div class="product-labels">
                                            {!! getCondition($product->condition) !!}
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="product-right">
                            <div id="product" class="product-details">
                                <div class="product-blocks blocks-top"> </div>
                                <div class="rating rating-page">
                                    @php($no_of_reviews = $product->reviews()->count())
                                    <div class="rating-star">
                                        <div class="all-star-rating">
                                            <span class="inner-star_spans">
                                                <div class="star-ratings">
                                                    <div class="fill-ratings" style="width:{{fnPercentage($product->reviews()->sum('rating'),$no_of_reviews*5)}}%">
                                                      <span>🟊🟊🟊🟊🟊</span>
                                                    </div>
                                                    <div class="empty-ratings">
                                                      <span>🟊🟊🟊🟊🟊</span>
                                                    </div>
                                                </div>
                                            </span>
                                        </div>   
                                    </div>
                                    <div class="review-links">
                                     <a href="javascript:void(0);" id="list-all-reviews">Based on {{$no_of_reviews}} reviews.</a> <b>-</b> <a href="#" id="write-review-link">Write a review</a> </div>
                                </div>
                                <div class="product-price-group">
                                    <div class="price-wrapper">
                                        <div class="price-group">
                                            <div class="product-price">{{priceFormat($product->price)}}</div>
                                        </div>
                                        <div class="product-tax">weight: {{$product->weight}}gm</div>
                                    </div>
                                    <div class="product-stats">
                                        <ul class="list-unstyled">
                                        	{!! getStockLevel($product) !!}
                                        </ul>
                                        <div class="brand-image product-manufacturer">
                                            <?php
                                                  $brand_product_route = '';

                                                  $brand = $product->getProductBrand;
                                            ?>      

                                            @if(!is_null($brand))

                                               @php($brand_product_route = route('brand.products',base64_encode($brand->_id)).'?cId='.base64_encode($selectedCategory->_id))

                                            <a href="{{$brand_product_route}}">
                                               <!--  <img src="https://dev.megatan.ws/image/cache/catalog/logo-60x60w.png" srcset="https://dev.megatan.ws/image/cache/catalog/logo-60x60w.png 1x, https://dev.megatan.ws/image/cache/catalog/logo-120x120w.png 2x" alt="MEGATAN" width="60" height="60"> --> 
                                                <span>{{$brand->title}}</span>   
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="button-group-page">
                                    <div class="buttons-wrapper">
                                        <div class="stepper-group cart-group">
                                           <!-- add-to-cart -->
                                           {!! addToCart($product,'','ADD TO CART') !!}
                                           <!-- add-to-cart -->
                                            
                                            <div class="extra-group">
                                                 {!! buyNow($product,'btn btn-extra btn-extra-46 btn-1-extra','Buy Now') !!}
                                            </div>
                                        </div>
                                        <div class="wishlist-compare">
                                            <!-- wishlist-btn -->
                                                {!! wishlistbtn($product,"btn btn-wishlist","Add to Wish List") !!}      
                                                <!-- wishlist-btn -->
                                            <!-- compare-btn -->
                                                {!! comparebtn($product,"btn btn-compare","Compare this Product") !!}
                                            <!-- compare-btn -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--social link-->
                                @component('components.social-share')@endcomponent 
                            <!-- social link end -->
                        </div>
                    </div>
                    <!-- content end -->
                    <div class="Description-tab-sec">
                        <!-- card -->
                        <ul id="tabs" class="nav nav-tabs">
                            <li class="nav-item"><a href="" data-target="#Products-1" data-toggle="tab" class="nav-link small text-uppercase active">Description</a></li>
                            <li class="nav-item"><a href="#all-review-link" data-target="#Products-2" data-toggle="tab" class="nav-link small text-uppercase" >Reviews</a></li>
                        </ul>
                        <br>
                        <div id="tabsContent" class="tab-content">
                            <div id="Products-1" class="tab-pane fade active show">
                                <div class="blocks_content">
                                    <!-- <p><b>Contents</b></p> -->
                                    <span class="blocks_content-inner">
                                        {!! $product->description !!}
                                    </span>
                                </div>
                            </div>
                            <div id="Products-2" class="tab-pane fade">
                                <!--product-review component-->
                                 <x-product-review :productId="$product->_id" />
                                 <!--product-review component End-->
                            </div>
                        </div>
                    </div>
                    <!-- card end -->
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<x-people-also-bought :categoryId="$selectedCategory->_id"/>

@endsection

@section('js')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {

        recentlyviewedproducts.add("{{base64_encode($product->_id)}}","{{route('product.incrementviewcount')}}");
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){

        $(".zoom").mousemove(function(e){
            zoom(e);
        });

        function zoom(e){
            var x, y;
            var zoomer = e.currentTarget;
            if(e.offsetX) {
                offsetX = e.offsetX;
            } else {
                offsetX = e.touches[0].pageX;
            }

            if(e.offsetY) {
                offsetY = e.offsetY;
            } else {
                offsetX = e.touches[0].pageX;
            }
            x = offsetX/zoomer.offsetWidth*100;
            y = offsetY/zoomer.offsetHeight*100;
            zoomer.style.backgroundPosition = x+'% '+y+'%';
        }
});
</script>
@endsection