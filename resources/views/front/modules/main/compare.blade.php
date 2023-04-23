@extends('front.layouts.layout',['pageslug' => 'Compare'])
@section('content')
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{route('compare.show')}}">Compare</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
    <!-- page-title -->
@component('front.includes.page_title')
 <h1 class="title page-title"><span>Compare</span></h1>
@endcomponent
    <!-- page-title  end-->

<div id="product-compare" class="container">
    <div class="row">
        <div id="content" class="col-sm-12">
            @if(isset($products) && $products->count() > 0)
                   <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td colspan="5"><strong>Product Details</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            @php($count_of_products = $products->count())
                            <tr class="compare-name">
                                <td>Product</td>
                                @for($i=0;$i<$count_of_products;$i++)
                                  <td><a href="{{route('product.show',$products[$i]->slug)}}"><strong>{{$products[$i]->title}}</strong></a></td>
                                @endfor
                            </tr>
                            <tr class="compare-image">
                                <td>Image</td>
                                @for($i=0;$i<$count_of_products;$i++)
                                  <td class="text-left">
                                    <img src="{{imagePath($products[$i]->image)}}"  title="{{$products[$i]->title}}" class="img-thumbnail">
                                </td>
                                @endfor
                            </tr>
                            <tr class="compare-price">
                                <td>Price</td>
                                @for($i=0;$i<$count_of_products;$i++)
                                   <td class="">{{priceFormat($products[$i]->price)}}</td>
                                @endfor
                            </tr>
                            <tr class="compare-model">
                                <td>Model</td>
                                @for($i=0;$i<$count_of_products;$i++)
                                   <td class="">{{$products[$i]->model ?? ''}}</td>
                                @endfor
                            </tr>
                            <tr class="compare-manufacturer">
                                <td>Brand</td>
                                @for($i=0;$i<$count_of_products;$i++)
                                   <td class="">{{$products[$i]->brand ?? ''}}</td>
                                @endfor
                            </tr>
                            <tr class="compare-availability product-stats">
                                <td>Availability</td>
                                @for($i=0;$i<$count_of_products;$i++)
                                   <td class=""><ul class="list-unstyled">{!! getStockLevel($products[$i]) !!}</ul></td>
                                @endfor
                            </tr>
                            <tr class="compare-rating">
                                <td>Rating</td>
                                @for($i=0;$i<$count_of_products;$i++)
                                    <td>
                                        <div class="rating-star">
                                            <ul>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                        </div>
                                        Based on 52 reviews.
                                    </td>
                                @endfor
                            </tr>
                            <tr class="compare-summary">
                                <td>Summary</td>
                                @for($i=0;$i<$count_of_products;$i++)
                                   <td class="description">{!! $products[$i]->description ?? '' !!}</td>
                                @endfor
                            </tr>
                            <tr class="compare-weight">
                                <td>Weight</td>
                                @for($i=0;$i<$count_of_products;$i++)
                                   <td class="description">{!! $products[$i]->weight ?? '' !!}</td>
                                @endfor
                            </tr>
                            <tr class="compare-dimensions">
                                <td>Dimensions (L x W x H)</td>
                                @for($i=0;$i<$count_of_products;$i++)
                                   <td class="description">{{$products[$i]->depth}} x {{$products[$i]->depth}} x {{$products[$i]->depth}}</td>
                                @endfor
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                @for($i=0;$i<$count_of_products;$i++)
                                   <td class=" out-of-stock">
                                    <div class="compare-buttons">
                                        <!-- add-to-cart -->
                                           {!! addToCart($products[0],'btn main-btn add-to_cart-btn','ADD TO CART',false) !!}
                                           <!-- add-to-cart -->
                                        <a href="{{route('compare.remove',base64_encode($products[0]->_id))}}" class="btn main-btn btn-danger btn-remove"><span>Remove</span></a>
                                    </div>
                                </td>
                                @endfor
                            </tr>
                        </tfoot>
                    </table>
                </div>
            @else
             <div class="compare-add-div">
                <p>You have not chosen any products to compare.</p>
                <div class="buttons">
                    <div class="pull-right"><a href="{{route('home')}}" class="btn btn-default"><span>Continue</span></a></div>
                </div>
             </div>
            @endif

            
        </div>
    </div>
</div>
<!-- page-title  end-->
@endsection