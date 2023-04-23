<div class="owl-carousel owl-theme feature-slider">
	@if(isset($products) && count($products->toArray()) > 0)
	 @foreach($products as $product)
	   	<div class="item">					
		       <div class="feature_card">
        <figure>
            <a href="{{route('product.show',$product->slug)}}">
                <img src="{{productImage($product->image)}}" class="img-fluid">
                <div class="product-labels">
                  <!-- calling-helper-function -->
                  @if(isset($product->showcondition) && $product->showcondition)
                   {!! getCondition($product->condition) !!} 
                  @endif 
                  <!-- calling-helper-function end-->
                </div>
            </a>
            <div class="quickview-button">
                <a href="{{route('product-quick-view',base64_encode($product->_id))}}" data-toggle="modal"  data-product-id="{{base64_encode($product->_id)}}" class="quickview_show">
                    <div class="quickview_i" data-toggle="tooltip" data-placement="top" title="Quickview" >
                        <i class="fas fa-search-plus"></i>
                    </div>
                </a>
            </div>
            <div class="rating-star-i">
                 {!! starRating($product) !!}
            </div>
        </figure>
        <figcaption>
            <div class="top">
                <a href="{{route('product.show',$product->slug)}}" >{{ $product->title ?? '' }}</a>
                <span>
                    {{$product->weight}}gm
                </span>
            </div>
            
            <div class="wrapper">
                <div class="name">
                    <a href="{{route('product.show',$product->slug)}}" >{{$product->title}}</a>
                </div>
                <div class="description"></div>
                <div class="price">
                    <div><span class="price-normal">{{priceFormat($product->price)}}</span></div>
                </div>
                <div class="buttons-wrapper">
                    <div class="cart-group">
                       <!-- add-to-cart -->
                       {!! addToCart($product,'main-btn','ADD TO CART') !!}
                       <!-- add-to-cart -->
                    </div>
                    <div class="wish-group">
                        <!-- wishlist-btn -->
                        {!! wishlistbtn($product) !!}
                        <!-- wishlist-btn -->
                        <!-- compare-btn -->
                        {!! comparebtn($product,'campare-icon') !!}
                        <!-- compare-btn -->
                    </div>
                </div>
            </div>
            <div class="bottom">
                  <!-- buy-now -->
                  {!! buyNow($product,'buy-now-button','Buy Now') !!}
                  <!-- buy-now -->
                <!-- <a href="javascript:void(0);" data-toggle="modal" data-target="#Question-modal"><i class="far fa-question-circle"></i> Question</a> -->
            </div>
        </figcaption>
    </div>
	    </div>
	 @endforeach
	@else
	@endif

</div>