@extends('front.layouts.layout',['pageslug' => 'Account','pagetitle'=>'Account|Order-Details'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{route('account.home')}}">Account</a></li>
<li class="breadcrumb-item"><a href="{{Request::url()}}">Order Detail</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Order-Details</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content" class=" col-sm-9">
                <div class="AccountOrder">
                    <h2>MEGATAN - Order #{{$order->unique_order_id}}</h2>
                    <div class="BlockContent">
                        <p class="InfoMessage">
                            Your order details are shown below.
                        </p>
                        <p class="Meta">
                            <span style="display: ">
                                <strong>Order Status:</strong> {!! ucwords(orderstatusVal($order->orderstatus)) !!}<br>
                            </span>
                            <strong>Order Date:</strong> {!! fnDateTimeFormat($order->created_at) !!}<br>
                            <strong>Order Total: {!! priceFormat($order->total) !!}</strong>
                        </p>
                        <hr>
                        <div class="Billing-wrapper">
                            <div class="BillingDetails">
                                @php($billingaddress = $order->billing_address_details)
                                <h3>Billing Details</h3>
                                <strong>{{$billingaddress->firstname}} {{$billingaddress->lastname}}</strong><br>
                                {!! getCountryName($billingaddress->countryId) !!} {!! getStateName($billingaddress->stateId) !!} {{$billingaddress->city}} {{$billingaddress->company}} <br>
                                {{$billingaddress->address_1}}<br>
                                {{$billingaddress->address_2}}
                                
                            </div>
                            <div class="ShippingDetails" style="">
                                @php($shippingaddress = $order->shipping_address_details)
                                <h3>Shipping Details</h3>
                                <strong>{{$shippingaddress->firstname}} {{$shippingaddress->lastname}}</strong><br>
                                {!! getCountryName($shippingaddress->countryId) !!} {!! getStateName($shippingaddress->stateId) !!} {{$shippingaddress->city}} {{$shippingaddress->company}} <br>
                                {{$shippingaddress->address_1}}<br>
                                {{$shippingaddress->address_2}}
                            </div>
                        </div>
                        <hr class="Clear">
                        <form>
                            <div class="table-responsive">
                                <h3>Order #{{$order->unique_order_id}} Contained the Following Items:</h3>
                                <table class="table table-bordered order-detail_table">
                                    <thead>
                                        <tr>
                                            <tr>Product Image</tr>
                                            <td class="text-left td-details">Item Details</td>
                                            <td class="text-right td-price">Price</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($order->orderitems as $orderitem)
                                           <tr>
                                                <td class="OrderItem">
                                                    <img src="{{imagePath($orderitem->product->image)}}" width="60">
                                                    <!-- <input type="checkbox"> -->
                                                    {{$orderitem->quantity}} x
                                                    <a href="{{route('product.show',$orderitem->product->slug)}}">{{$orderitem->product->title}}</a>
                                                </td>
                                                <td class="OrderItem" align="right"><em class="ProductPrice">{!! priceFormat($orderitem->price) !!}</em></td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                    <tfoot>
                                        <tr class="SubTotal" align="right">
                                            <td>Subtotal:</td>
                                            <td><em class="ProductPrice">{!! priceFormat($order->subtotal) !!}</em></td>
                                        </tr>
                                        @if(!empty($order->discount) && $order->discount != 0)
                                        <tr class="SubTotal" align="right">
                                            <td>Discount:</td>
                                            <td><em class="ProductPrice">-{!! priceFormat($order->discount) !!}</em></td>
                                        </tr>
                                        @endif
                                        <tr class="Shipping" align="right">
                                            <?php 
                                                 
                                                $shipping_method_details = $order->shipping_method_details; 
                                            ?>
                                            <td>Shipping({{$shipping_method_details->methodname}}):</td>
                                            <td><em class="ProductPrice">+ {!! priceFormat($order->shipping) !!}</em></td>
                                        </tr>
                                        <tr class="Tax" align="right">
                                            <td>Tax:</td>
                                            <td><em class="ProductPrice">+ {!! priceFormat($order->tax) !!}</em></td>
                                        </tr>
                                        <tr class="SubTotal" align="right">
                                            <td>Grand Total:</td>
                                            <td><em class="ProductPrice">{!! priceFormat($order->total) !!}</em></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="order-page-buttons">
                                <!-- <button class="btn main-btn">REORDER</button> -->
                            </div>
                        </form>
                        <!-- <div class="order-comments">
                            <hr class="Clear">
                            <h3>Order Instructions/Comments</h3>
                            <div class="">
                                <p>
                                    Testing order by Deftsoft team
                                </p>
                            </div>
                        </div> -->
                        <hr class="Clear">
                        <?php 
                                $order_shipment = $order->ordershipment;
                        ?>
                        @if(!is_null($order_shipment))
                        <h3>Shipments for Order #{{$order->unique_order_id}}</h3>
                            <div class="table-responsive">                               
                                <table class="table table-bordered OrderShipments">
                                    <thead>
                                        <tr>
                                            <th class="DateShipped">Date Shipped</th>
                                            <th class="ShippingMethod">Shipping Method</th>
                                            <th class="TrackingNumber">Tracking Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td class="DateShipped">{{$order_shipment->created_at}}</td>
                                        <td class="ShippingMethod"><span style=""> ({{$order_shipment->shipping_methodname}})</span></td>
                                        <td class="TrackingNumber">{{$order_shipment->shipping_trackno}}</td>
                                    </tbody>
                                </table>
                            </div> 
                         @endif                              
                    </div>
                </div>
            </div>
            @include('front.includes.aside',['activelink' => 'order-history'])
        </div>
    </div>
</section>
@endsection