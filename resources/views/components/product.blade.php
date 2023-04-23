<div class="owl-carousel owl-theme aside-slider">
    @foreach($products as $product)
    <div class="item">
        <div class="aside-slider_card">
            <figure>
                <a href="{{route('product.show',$product->slug)}}">
                    <img src="{{ imagepath($product->image) }}" class="img-fluid">
                </a>
                <div class="rating-star">
                    <ul>
                        <li><i class="fas fa-star"></i></li>
                        <li><i class="fas fa-star"></i></li>
                        <li><i class="fas fa-star"></i></li>
                        <li><i class="fas fa-star"></i></li>
                        <li><i class="fas fa-star"></i></li>
                    </ul>
                </div>
                <div class="aside_figure-links">
                    <ul>
                        <li>
                             <!-- add-to-cart -->
                               {!! addToCart($product,'main-btn','',false) !!}
                              <!-- add-to-cart -->
                        </li>
                        <li>
                            <!-- wishlist-btn -->
                               {!! wishlistbtn($product) !!}
                            <!-- wishlist-btn -->
                        </li>
                        <li>
                            <!-- compare-btn -->
                               {!! comparebtn($product,'campare-icon') !!}
                            <!-- compare-btn -->
                        </li>
                    </ul>
                </div>
            </figure>
            <figcaption>
                <div class="name"><a href="{{route('product.show',$product->slug)}}">{{$product->title ?? ''}}</a></div>
                <div class="price">
                    <div>
                        <span class="price-normal">{{priceFormat($product->price)}}</span>
                    </div>
                </div>
            </figcaption>
        </div>
    </div>
    @endforeach
</div>