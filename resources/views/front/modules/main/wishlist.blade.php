@extends('front.layouts.layout',['pageslug' => 'Wishlist'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Wish Lists</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Wish Lists</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-9">
                @if(!is_null($userwishlistproducts) && $userwishlistproducts->count() > 0)
                <div class="table-responsive wishlist-table">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td class="text-center td-image">Image</td>
                                <td class="text-left td-name">Product Name</td>
                                <td class="text-center td-model">Brand</td>
                                <td class="text-center td-stock">Stock</td>
                                <td class="text-center td-price">Unit Price</td>
                                <td class="text-center td-action">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userwishlistproducts as $userwishlistproduct)
                            <tr class="">
                                <td class="text-center td-image">
                                    <a href="{{route('product.show',$userwishlistproduct->product->slug)}}">
                                     <img src="{{imagePath($userwishlistproduct->product->image)}}">
                                    </a>
                                </td>
                                <td class="text-left td-name">
                                    <a href="{{route('product.show',$userwishlistproduct->product->slug)}}">{{$userwishlistproduct->product->title}}</a>
                                </td>
                                <td class="text-center td-model">{{$userwishlistproduct->product->getProductBrand->title ?? ''}}</td>
                                <td class="text-center td-stock in-stock">
                                    <ul class="list-unstyled product-stats">{!! getStockLevel($userwishlistproduct->product) !!}</ul>
                                </td>
                                <td class="text-center td-price">
                                    <div class="price"> {{priceFormat($userwishlistproduct->product->price)}}
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="td-action">
                                        {!! addToCart($userwishlistproduct->product,'btn btn-primary','',false) !!}
                                        <a href="{{route('wishlist.remove',base64_encode($userwishlistproduct->_id))}}" data-toggle="tooltip" title="" class="btn btn-danger btn-remove" data-original-title="Remove">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="empty-list"><p>Your wish list is empty.</p></div>             
                @endif
                <div class="buttons clearfix">
                    <div class="pull-right"><a href="{{route('shop')}}" class="btn btn-primary">Continue</a></div>
                </div>
            </div>
           @include('front.includes.aside',['activelink' => 'wishlist'])
        </div>
    </div>
</section>
@endsection