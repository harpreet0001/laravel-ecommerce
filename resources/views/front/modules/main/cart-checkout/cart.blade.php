@extends('front.layouts.layout',['pageslug' => 'Cart'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{route('cart.index')}}">Cart</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Cart</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec cart-detail-sec">
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-9">
                 @include('message.success')
                 @include('message.error')
                <div class="cart-page">
                    <div class="cart-table">
                      @if(Cart::count() >0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="text-center td-image">Image</td>
                                        <td class="text-left td-name">Product Name</td>
                                        <td class="text-center td-model">Category</td>
                                        <td class="text-center td-qty">Quantity</td>
                                        <td class="text-center td-price">Unit Price</td>
                                        <td class="text-center td-total">Total</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(Cart::content() as $item)
                                        <tr>
                                            <td class="text-center td-image">
                                             <a href="{{route('product.show',$item->model->slug)}}">
                                                <img src="{{imagePath($item->model->image)}}" alt="" title=""></a> 
                                            </td>
                                            <td class="text-left td-name">
                                                <a href="{{route('product.show',$item->model->slug)}}">{{$item->model->title}}</a><br>
                                            </td>
                                            <td class="text-center td-model">{{$item->model->getCategory->title ?? ''}}</td>
                                            <td class="text-center td-qty">
                                                <div class="input-group btn-block">

                                                    <form method="post" action="{{route('cart.update',$item->rowId)}}">   
                                                        @csrf
                                                        @method('patch')
                                                        <!-- Quantity-inc-dec-btn -->
                                                        {!! quantityIncDecInput("stepper",$item->qty,$item->model->currentstock)!!}
                                                         <!-- Quantity-inc-dec-btn -->
                                                        <span class="input-group-btn">
                                                         <input type="hidden" name="productId" value="{{base64_encode($item->model->_id)}}">
                                                          <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-update" data-original-title="Update"><i class="fa fa-refresh"></i></button>
                                                        </span>
                                                    </form>

                                                    <form method="post" action="{{route('cart.destroy',$item->rowId)}}">
                                                        <span class="input-group-btn">
                                                            @csrf
                                                            @method('delete')

                                                            <button type="submit" data-toggle="tooltip" title="Remove" class="btn btn-remove" data-original-title="Remove"><i class="fa fa-times-circle"></i></button>
															
                                                        </span>
														
                                                    </form>
                                                    
                                                </div>
												<div class="range"><span>Min:{{productMinPurchaseQty($item->model)}}</span><span>Max:{{productMaxPurchaseQty($item->model)}}</span></div>
											</td>
                                            <td class="text-center td-price">{{priceFormat($item->model->price)}}</td>
                                            <td class="text-center td-total">{{priceFormat($item->model->price * $item->qty)}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                      <p>Your cart is empty</p>
                    @endif
                </div>
                    @if(Cart::count() > 0)
                    <div class="cart-bottom">
                        <div class="panels-total">
                            <div class="cart-panels">
                                <h2 class="title">What would you like to do next?</h2>
                                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default panel-coupon">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a href="#collapse-coupon" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">Use Coupon Code <i class="fa fa-caret-down"></i></a></h4>
                                        </div>
                                        <div id="collapse-coupon" class="panel-collapse collapse">
                                            @if(!session()->get('coupon-'.$_SERVER['REMOTE_ADDR']))
                                            <form  method="POST" action="{{route('coupon.apply')}}" onsubmit="coupons.apply(this);">
                                                    @csrf
                                                    @method('post')
                                                    <input type="hidden" name="redirect_url" value="{{Request::url()}}">
                                                    <input type="hidden" name="page" value="cart">
                                                <div class="panel-body form-group">
                                                    <label class="control-label" for="input-coupon">Enter your coupon here</label>
                                                    <div class="input-group">
                                                        <input type="text" name="coupon" value="" placeholder="Enter your coupon here" id="input-coupon" class="form-control">
                                                        <span class="input-group-btn">
                                                                <button type="submit" class="btn main-btn Send-btn"><i class="far fa-envelope"></i>Apply</button>
                                                        </span>
                                                    </div>
                                                    <span class="text text-danger err-msg" id="coupon_error"></span>
                                                </div>
                                            </form>
                                            @else
                                             <div class="after-add-coupon">
                                                    <p>Coupon name:<span> {{$coupon['name']}} </span></p>
                                                    <p>discount :<span> {{priceFormat($coupon['discount'])}} </span></p>

                                                    <form method="post" action="{{route('coupon.deleteApplyCoupon')}}" onsubmit="coupons.delete(this);">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="hidden" name="redirect_url" value="{{Request::url()}}">
                                                        <input type="hidden" name="page" value="cart">
                                                        <input type="hidden" name="redirect_url" value="{{Request::url()}}">
                                                        <button type="submit" class="btn btn-danger btn-xs">remove</button>
                                                    </form>
                                             </div>
                                            @endif
                                        </div>
                                    </div>
                                    
<!--                                     <div class="panel panel-default panel-voucher">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a href="#collapse-voucher" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle">Use Gift Certificate <i class="fa fa-caret-down"></i></a></h4>
                                        </div>
                                        <div id="collapse-voucher" class="panel-collapse collapse">
                                            <div class="panel-body form-group">
                                                <label class="control-label" for="input-voucher">Enter your gift certificate code here</label>
                                                <div class="input-group">
                                                    <input type="text" name="voucher" value="" placeholder="Enter your gift certificate code here" id="input-voucher" class="form-control">
                                                    <span class="input-group-btn">
                                                        <input type="submit" value="Apply Gift Certificate" id="button-voucher" data-loading-text="Loading..." class="btn btn-primary">
                                                    </span> </div>
                                               
                                            </div>
                                        </div>
                                    </div> -->

                                </div>
                            </div>
                            <div class="cart-total">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-right"><strong>Sub-Total:</strong></td>
                                            <td class="text-right">{{appendCurrency(Cart::subtotal())}}</td>
                                        </tr>
                                        @if(session()->get('coupon-'.$_SERVER['REMOTE_ADDR']))
                                        <tr>
                                            <td class="text-right"><strong>Coupon({{$coupon['name']}}):</strong></td>
                                            <td class="text-right">-{{priceFormat($coupon['discount'])}}</td>
                                        </tr>
                                        <!-- <tr>
                                            <td class="text-right"><strong>New Sub-Total::</strong></td>
                                            <td class="text-right">{{priceFormat($newSubtotal)}}</td>
                                        </tr> -->
                                        <tr>
                                            <td class="text-right"><strong>New Total:</strong></td>
                                            <td class="text-right">{{priceFormat($newTotal)}}</td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td class="text-right"><strong>Total:</strong></td>
                                            <td class="text-right">{{priceFormat($newTotal)}}</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="buttons clearfix">
                            <div class="pull-left"><a href="{{route('shop','')}}" class="btn btn-default"><span>Continue Shopping</span></a></div>
                            <div class="pull-right"><a href="{{route('checkout.index')}}" class="btn btn-primary"><span>Checkout</span></a></div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<x-people-also-bought/>
@endsection