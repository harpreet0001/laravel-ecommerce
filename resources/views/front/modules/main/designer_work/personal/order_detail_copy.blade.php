@extends('front.layouts.layout',['pageslug' => 'Order Detail','pagetitle'=>'Order Detail'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Order Detail</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Order Detail</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content" class=" col-sm-9">
                <div class="AccountOrder">
                    <h2>MEGATAN - Order #303735</h2>
                    <div class="BlockContent">
                        <p class="InfoMessage">
                            Your order details are shown below.
                        </p>
                        <p class="Meta">
                            <span style="display: ">
                                <strong>Order Status:</strong> Cancelled<br>
                            </span>
                            <strong>Order Date:</strong> 28th May 2021 @ 10:33 AM<br>
                            <strong>Order Total: £1,329.70 GBP</strong>
                        </p>
                        <hr>
                        <div class="Billing-wrapper">
                            <div class="BillingDetails">
                                <h3>Billing Details</h3>
                                <strong>Amarjeet Singh</strong>
                                <br>Deftsoft team
                                <br>
                                Mohali<br>Mohalii<br>
                                Mohali, Suffolk CO10 8BZ<br>
                                United Kingdom
                                <div></div>
                            </div>
                            <div class="ShippingDetails" style="">
                                <h3>Shipping Details</h3>
                                <strong>Amarjeet Singh</strong>
                                <br>Deftsoft
                                <br>
                                Mohali<br>MOhaliii<br>
                                Mohali, Suffolk CO10 8BZ<br>
                                United Kingdom
                                <div></div>
                            </div>
                        </div>
                        <hr class="Clear">
                        <form>
                            <div class="table-responsive">
                                <h3>Order #303735 Contained the Following Items:</h3>
                                <table class="table table-bordered order-detail_table">
                                    <thead>
                                        <tr>
                                            <td class="text-left td-details">Item Details</td>
                                            <td class="text-right td-price">Price</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="OrderItem1">
                                                <input type="checkbox">
                                                6 x
                                                <a href="javascript:void(0);" target="_blank">Melanotan 2 Nasal Spray 20mg (2 vials)</a>
                                            </td>
                                            <td class="OrderItem1" align="right"><em class="ProductPrice">£209.70</em></td>
                                        </tr>
                                        <tr>
                                            <td class="OrderItem2">
                                                <input type="checkbox">
                                                5 x
                                                <a href="javascript:void(0);">2 x Melanotan 2 Nasal Spray 20mg (£33.40 each)</a>
                                            </td>
                                            <td class="OrderItem2" align="right"><em class="ProductPrice">£334.00</em></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="SubTotal" align="right">
                                            <td>Subtotal:</td>
                                            <td><em class="ProductPrice">£1,329.70</em></td>
                                        </tr>
                                        <tr class="SubTotal" align="right">
                                            <td>Shipping:</td>
                                            <td><em class="ProductPrice">£0.00</em></td>
                                        </tr>
                                        <tr class="SubTotal" align="right">
                                            <td>Grand Total:</td>
                                            <td><em class="ProductPrice">£1,329.70</em></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="order-page-buttons">
                                <button class="btn main-btn">REORDER</button>
                            </div>
                        </form>
                        <div class="order-comments">
                            <hr class="Clear">
                            <h3>Order Instructions/Comments</h3>
                            <div class="">
                                <p>
                                    Testing order by Deftsoft team
                                </p>
                            </div>
                        </div>
                        <hr class="Clear">
                        <form>
                        <h3>Shipments for Order #303735</h3>
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
                                        <td class="DateShipped">28th May 2021</td>
                                        <td class="ShippingMethod">Ship by Order Total<span style=""> (Royal Mail 1st Class Signed For)</span></td>
                                        <td class="TrackingNumber">2222test</td>
                                    </tbody>
                                </table>
                            </div>                            
                        </form>
                    </div>
                </div>
            </div>
            @include('front.includes.aside',['activelink' => 'account'])
        </div>
    </div>
</section>
@endsection