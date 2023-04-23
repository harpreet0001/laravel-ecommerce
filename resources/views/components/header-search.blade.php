<div class="header-search-wrap mobile-search-div">
    <div class="header-search">
        <form method="get" action="{{route('search')}}">
            <div class="custom-select-header">
                <select class="js-example-basic-single" name="cId">
                    @if(isset($categories))
                        <option value=""> All</option>
                        @foreach($categories as $category)
                            <option value="{{base64_encode($category->_id)}}"  @if(isset($selectedCategory->_id) && $selectedCategory->_id == $category->_id) {{'selected'}}@elseif(isset(request()->cId) && request()->cId == base64_encode($category->_id)) {{'selected'}} @endif >{{$category->title}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="inner-wrap">
                <input type="text" placeholder="Search here..." name="search" data-search-url="{{route('search-query')}}" value="{{$search ?? (request()->search ?? '')}}" autocomplete="OFF" />
                <button type="submit"><i class="fa fa-search"></i></button>
                <div class="tt-menu .tt-empty" style="display: none">
                    <div class="tt-dataset tt-dataset-0">
                        <div class="search-result tt-suggestion tt-selectable">
                            @if(isset($products) && $products->count() > 0)
                            @foreach($products as $product)
                            <a href="{{route('product.show',$product->slug)}}">
                                <img src="{{imagePath($product->image)}}">
                                <span class="">
                                    <span class="product-name">{{$product->title}}</span>
                                    <span class="price">{{priceFormat($product->price)}}</span>
                                </span>
                            </a>
                            @endforeach
                            @else
                            <p>Search result empty</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>