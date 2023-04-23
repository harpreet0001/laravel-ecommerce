@extends('front.layouts.layout',['pageslug' => 'checkout/cart'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">checkout</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>checkout</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-9">
                <div class="cart-page">
                    <form class="cart-table">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="text-center td-image">Image</td>
                                        <td class="text-left td-name">Product Name</td>
                                        <td class="text-center td-model">Model</td>
                                        <td class="text-center td-qty">Quantity</td>
                                        <td class="text-center td-price">Unit Price</td>
                                        <td class="text-center td-total">Total</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center td-image"> <a href="https://dev.megatan.ws/melanotan-2-20mg-2-vials-mt220mg"><img src="https://dev.megatan.ws/image/cache/catalog/products/20mg_melanotan_2.fw__21465_zoom__23898_zoom-60x60.png" alt="Melanotan 2 20mg (2 vials)" title="Melanotan 2 20mg (2 vials)"></a> </td>
                                        <td class="text-left td-name"><a href="https://dev.megatan.ws/melanotan-2-20mg-2-vials-mt220mg">Melanotan 2 20mg (2 vials)</a> <br>
                                            <small>Reward Points: 160</small> </td>
                                        <td class="text-center td-model">mt220mg</td>
                                        <td class="text-center td-qty">
                                            <div class="input-group btn-block">
                                                <div class="stepper">
                                                    <input type="text" name="quantity[9231]" value="5" size="1" class="form-control">
                                                    <span>
                                                        <i class="fa fa-angle-up"></i>
                                                        <i class="fa fa-angle-down"></i>
                                                    </span>
                                                </div>
                                                <span class="input-group-btn">
                                                    <button type="submit" data-toggle="tooltip" title="" class="btn btn-update" data-original-title="Update"><i class="fa fa-refresh"></i></button>
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-remove" data-original-title="Remove"><i class="fa fa-times-circle"></i></button>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="text-center td-price">£32.00</td>
                                        <td class="text-center td-total">£160.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center td-image"> <a href="javascript:void(0);"><img src="https://dev.megatan.ws/image/cache/catalog/products/50mg_melanotan_2.fw__47361_zoom__53391_zoom-60x60.png" alt="Melanotan 2 50mg (5 vials)" title="Melanotan 2 50mg (5 vials)"></a> </td>
                                        <td class="text-left td-name"><a href="javascript:void(0);">Melanotan 2 50mg (5 vials)</a> <br>
                                            <small>Reward Points: 75</small> </td>
                                        <td class="text-center td-model">mt250mg</td>
                                        <td class="text-center td-qty">
                                            <div class="input-group btn-block">
                                                <div class="stepper">
                                                    <input type="text" name="quantity[9229]" value="1" size="1" class="form-control">
                                                    <span>
                                                        <i class="fa fa-angle-up"></i>
                                                        <i class="fa fa-angle-down"></i>
                                                    </span>
                                                </div>
                                                <span class="input-group-btn">
                                                    <button type="submit" data-toggle="tooltip" title="" class="btn btn-update" data-original-title="Update"><i class="fa fa-refresh"></i></button>
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-remove" onclick="if (!window.__cfRLUnblockHandlers) return false; cart.remove('9229');" data-original-title="Remove"><i class="fa fa-times-circle"></i></button>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="text-center td-price">£75.00</td>
                                        <td class="text-center td-total">£75.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
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
                                            <div class="panel-body form-group">
                                                <label class="control-label" for="input-coupon">Enter your coupon here</label>
                                                <div class="input-group">
                                                    <input type="text" name="coupon" value="" placeholder="Enter your coupon here" id="input-coupon" class="form-control">
                                                    <span class="input-group-btn">
                                                        <input type="button" value="Apply Coupon" id="button-coupon" data-loading-text="Loading..." class="btn btn-primary">
                                                    </span>
                                                </div>
                                     
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default panel-shipping">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a href="#collapse-shipping" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">Estimate Shipping &amp; Taxes <i class="fa fa-caret-down"></i></a></h4>
                                        </div>
                                        <div id="collapse-shipping" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>Enter your destination to get a shipping estimate.</p>
                                                <div class="form-horizontal">
                                                    <div class="form-group required">
                                                        <label class="col-sm-2 control-label" for="input-country">Country</label>
                                                        <div class="col-sm-10">
                                                            <select name="country_id" id="input-country" class="form-control">
                                                                <option value=""> --- Please Select --- </option>
                                                                <option value="244">Aaland Islands</option>
                                                                <option value="1">Afghanistan</option>
                                                                <option value="2">Albania</option>
                                                                <option value="3">Algeria</option>
                                                                <option value="4">American Samoa</option>
                                                                <option value="5">Andorra</option>
                                                                <option value="6">Angola</option>
                                                                <option value="7">Anguilla</option>
                                                                <option value="8">Antarctica</option>
                                                                <option value="9">Antigua and Barbuda</option>
                                                                <option value="10">Argentina</option>
                                                                <option value="11">Armenia</option>
                                                                <option value="12">Aruba</option>                                                      
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="col-sm-2 control-label" for="input-zone">Region / State</label>
                                                        <div class="col-sm-10">
                                                            <select name="zone_id" id="input-zone" class="form-control">
                                                                <option value=""> --- Please Select --- </option>
                                                                <option value="3513">Aberdeen</option>
                                                                <option value="3514">Aberdeenshire</option>
                                                                <option value="3515">Anglesey</option>
                                                                <option value="3516">Angus</option>
                                                                <option value="3517">Argyll and Bute</option>
                                                                <option value="3518">Bedfordshire</option>
                                                                <option value="3519">Berkshire</option>
                                                                <option value="3520">Blaenau Gwent</option>
                                                                <option value="3521">Bridgend</option>
                                                                <option value="3522">Bristol</option>
                                                                <option value="3523">Buckinghamshire</option>
                                                                <option value="3524">Caerphilly</option>
                                                                <option value="3525">Cambridgeshire</option>
                                                                <option value="3526">Cardiff</option>
                                                                <option value="3527" selected="selected">Carmarthenshire</option>
                                                                <option value="3528">Ceredigion</option>                                                 
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group required">
                                                        <label class="col-sm-2 control-label" for="input-postcode">Post Code</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="postcode" value="pumptester" placeholder="Post Code" id="input-postcode" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="buttons">
                                                        <div class="pull-right">
                                                            <button type="button" id="button-quote" data-loading-text="Loading..." class="btn btn-primary">Get Quotes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default panel-voucher">
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
                                    </div>
                                </div>
                            </div>
                            <div class="cart-total">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-right"><strong>Sub-Total:</strong></td>
                                            <td class="text-right">£235.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><strong>Total:</strong></td>
                                            <td class="text-right">£235.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="buttons clearfix">
                            <div class="pull-left"><a href="javascript:void(0);" class="btn btn-default"><span>Continue Shopping</span></a></div>
                            <div class="pull-right"><a href="javascript:void(0);" class="btn btn-primary"><span>Checkout</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Starter Kits -->
<section class="starter-kits-sec People-Bought-sec">
    <div class="container">
        <div class="starter-kits_content">
            <div class="item_content">
                <div class="item-head">
                    <a href="javascript:void(0);">People Also Bought</a>
                </div>
            </div>
            <!-- row -->
            <div class="starter-wrapper">
                <div class="starter-col-2">
                    <!-- carousel -->
                    <div class="owl-carousel owl-theme People-Bought-slider">
                        <div class="item">
                            <div class="starter-card">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('front/images/starter-kits-1.png') }}">
                                        <div class="product-labels">
                                            <span class="product-label"><b>New</b></span>
                                        </div>
                                    </a>
                                    <div class="quickview-button">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                                            <div class="quickview_i" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quickview">
                                                <i class="fas fa-search-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                </figure>
                                <figcaption>
                                    <div class="wrapper">
                                        <div class="name">
                                            <a href="javascript:void(0);">Melanotan 2 50mg Starter Kit (5 vials)</a>
                                        </div>
                                        <div class="price">
                                            <p>£18.95</p>
                                        </div>
                                        <div class="buttons-wrapper">
                                            <div class="cart-group">
                                                <a href="javascript:void" class="btn mini-btn">Add to Cart</a>
                                            </div>
                                            <div class="wish-group">
                                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wish List"><i class="far fa-heart"></i></a>
                                                <a href="javascript:void(0);" class="campare-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Campare this Product"><i class="far fa-heart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </figcaption>
                            </div>
                        </div>
                        <div class="item">
                            <div class="starter-card">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('front/images/starter-kits-2.png') }}">
                                        <div class="product-labels">
                                            <span class="product-label"><b>New</b></span>
                                        </div>
                                    </a>
                                    <div class="quickview-button">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                                            <div class="quickview_i" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quickview">
                                                <i class="fas fa-search-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                </figure>
                                <figcaption>
                                    <div class="wrapper">
                                        <div class="name">
                                            <a href="javascript:void(0);">Melanotan 2 50mg Starter Kit (5 vials)</a>
                                        </div>
                                        <div class="price">
                                            <p>£18.95</p>
                                        </div>
                                        <div class="buttons-wrapper">
                                            <div class="cart-group">
                                                <a href="javascript:void" class="btn mini-btn">Add to Cart</a>
                                            </div>
                                            <div class="wish-group">
                                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wish List"><i class="far fa-heart"></i></a>
                                                <a href="javascript:void(0);" class="campare-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Campare this Product"><i class="far fa-heart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </figcaption>
                            </div>
                        </div>
                        <div class="item">
                            <div class="starter-card">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('front/images/starter-kits-3.png') }}">
                                        <div class="product-labels">
                                            <span class="product-label"><b>New</b></span>
                                            <span class="product-label product-label-2"><b>Hot</b></span>
                                        </div>
                                    </a>
                                    <div class="quickview-button">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                                            <div class="quickview_i" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quickview">
                                                <i class="fas fa-search-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                </figure>
                                <figcaption>
                                    <div class="wrapper">
                                        <div class="name">
                                            <a href="javascript:void(0);">Melanotan 2 50mg Starter Kit (5 vials)</a>
                                        </div>
                                        <div class="price">
                                            <p>£18.95</p>
                                        </div>
                                        <div class="buttons-wrapper">
                                            <div class="cart-group">
                                                <a href="javascript:void" class="btn mini-btn">Add to Cart</a>
                                            </div>
                                            <div class="wish-group">
                                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wish List"><i class="far fa-heart"></i></a>
                                                <a href="javascript:void(0);" class="campare-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Campare this Product"><i class="far fa-heart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </figcaption>
                            </div>
                        </div>
                        <div class="item">
                            <div class="starter-card">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('front/images/starter-kits-4.png') }}">
                                        <div class="product-labels">
                                            <span class="product-label"><b>New</b></span>
                                            <span class="product-label product-label-2"><b>Hot</b></span>
                                        </div>
                                    </a>
                                    <div class="quickview-button">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                                            <div class="quickview_i" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quickview">
                                                <i class="fas fa-search-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                </figure>
                                <figcaption>
                                    <div class="wrapper">
                                        <div class="name">
                                            <a href="javascript:void(0);">Melanotan 2 50mg Starter Kit (5 vials)</a>
                                        </div>
                                        <div class="price">
                                            <p>£18.95</p>
                                        </div>
                                        <div class="buttons-wrapper">
                                            <div class="cart-group">
                                                <a href="javascript:void" class="btn mini-btn">Add to Cart</a>
                                            </div>
                                            <div class="wish-group">
                                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wish List"><i class="far fa-heart"></i></a>
                                                <a href="javascript:void(0);" class="campare-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Campare this Product"><i class="far fa-heart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </figcaption>
                            </div>
                        </div>
                    </div>
                    <!-- carousel end-->
                </div>
            </div>
            <!-- row end -->
        </div>
    </div>
</section>
<!-- Starter Kits END  -->
@endsection