<!-- Starter Kits -->
<section class="starter-kits-sec People-Bought-sec">
    <div class="container">
        <div class="starter-kits_content">
            <div class="item_content">
                <div class="item-head">
                    <a href="{{Request::url()}}">People Also Bought</a>
                </div>
            </div>
            <!-- row -->
            <div class="starter-wrapper">
                <div class="starter-col-2">
                    <!-- carousel -->
                    <div class="owl-carousel owl-theme People-Bought-slider">
                        @forelse($products as $product)
                            <div class="item">
                                <div class="starter-card">
                                    <figure>
                                        <a href="{{route('product.show',$product->slug)}}">
                                            <img src="{{imagePath($product->image)}}">
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
                                    </figure>
                                    <figcaption>
                                        <div class="wrapper">
                                            <div class="name">
                                               <a href="{{route('product.show',$product->slug)}}" >{{ $product->title ?? '' }}</a>
                                            </div>
                                            <div class="price">
                                                <p>{{priceFormat($product->price)}}</p>
                                            </div>
											<div class="wrapper-button">
                                            <div class="buttons-wrapper">
                                                <div class="cart-group">
                                                    <!-- add-to-cart -->
                                                    {!! addToCart($product,'mini-btn','ADD TO CART',false,'') !!}
                                                     <!-- add-to-cart -->
                                                </div>
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
                                    </figcaption>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    <!-- carousel end-->
                </div>
            </div>
            <!-- row end -->
        </div>
    </div>
</section>
<!-- Starter Kits END  -->