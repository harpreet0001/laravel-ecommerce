<!-- loop over products-->
@forelse($products as $product) 
  @php($starRatingVal = starRating($product))
<div class="product-layout">
    <div class="feature_card">
        <?php
             
             if(is_null($selectedCategory))
             {
                 $selectedCategory = $product->categoryList()->first();
             }
        ?>
        <figure>
            <a href="{{route('product.show',$product->slug)}}?cId={{base64_encode($selectedCategory->_id)}}">
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
                {!! $starRatingVal !!}
            </div>
        </figure>
        <figcaption>
            <div class="top">
                <a href="{{route('product.show',$product->slug)}}" >{{ $product->title ?? '' }}</a>
                <span>
                    {{$product->weight}}gm
                </span>
            </div>
            <div class="stats">
                <?php
                    $brand_product_route = '';
                    $brand = $product->getProductBrand;
                ?>
                @if(!is_null($brand))
                    @php($brand_product_route = route('brand.products',base64_encode($brand->_id)).'?cId='.base64_encode($selectedCategory->_id))  
                <span class="stat-1"><span class="stats-label">Brand:</span> <span><a href="{{$brand_product_route}}">{{$product->getProductBrand->title ?? ''}}</a></span></span>
                @endif
                @if(!is_null($selectedCategory))
                  <span class="stat-2"><span class="stats-label">Category:</span> <span>{{$selectedCategory->title ?? ''}}</span></span>
                @endif
            </div>
            <div class="rating-star">
                {!! $starRatingVal !!}
            </div>
            <div class="wrapper">
                <div class="name">
                    <a href="{{route('product.show',$product->slug)}}" >{{$product->title}}</a>
                </div>
                <div class="description">{!! $product->description !!}</div>
                <div class="price">
                    <div><span class="price-normal">{{priceFormat($product->price)}}</span></div>
                    <p>{{priceFormat($product->price)}}</p>
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
                 <!-- <a href="javascript:void(0);" data-toggle="modal" data-target="#Question-modal"><i class="far fa-question-circle"></i> Question </a> -->
            </div>
        </figcaption>
    </div>
</div>
@empty
  <div>There are no products to list in this category.</div>   
@endforelse
<!--pagination-->
<div class="ias-noneleft" style="text-align: center;" id="ias_noneleft_1623054297859">{{ $products->appends(request()->input())->links() }}</div>
<!--pagination end-->
