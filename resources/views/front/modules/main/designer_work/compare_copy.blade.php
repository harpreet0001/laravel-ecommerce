@extends('front.layouts.layout',['pageslug' => 'compare'])
@section('content')
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href=""><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="">Compare</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Compare</span></h1>
<div id="product-compare" class="container">
    <div class="row">
        <div id="content" class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td colspan="4"><strong>Product Details</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="compare-name">
                            <td>Product</td>
                            <td><a href="javascript:void(0);"><strong>Melanotan 2 10mg (1 vial)</strong></a></td>
                            <td><a href="javascript:void(0);"><strong>Melanotan 2 100mg (10 vials)</strong></a></td>
                            <td><a href="javascript:void(0);"><strong>Melanotan 2 30mg (3 vials)</strong></a></td>
                        </tr>
                        <tr class="compare-image">
                            <td>Image</td>
                            <td class="text-left">
                                <img src="https://dev.megatan.ws/image/cache/catalog/products/10mg_melanotan_2.fw__04614_zoom__39902_zoom-90x90.png" alt="Melanotan 2 10mg (1 vial)" title="Melanotan 2 10mg (1 vial)" class="img-thumbnail">
                            </td>
                            <td class="text-left">
                                <img src="https://dev.megatan.ws/image/cache/catalog/products/100mg_melanotan_2.fw__26238_std__14569_zoom-90x90.png" alt="Melanotan 2 100mg (10 vials)" title="Melanotan 2 100mg (10 vials)" class="img-thumbnail">
                            </td>
                            <td class="text-left">
                                <img src="https://dev.megatan.ws/image/cache/catalog/products/30mg_melanotan_2.fw__17246_zoom__67142_zoom-90x90.png" alt="Melanotan 2 30mg (3 vials)" title="Melanotan 2 30mg (3 vials)" class="img-thumbnail">
                            </td>
                        </tr>
                        <tr class="compare-price">
                            <td>Price</td>
                            <td class=""> £17.00
                            </td>
                            <td class=""> £140.00
                            </td>
                            <td class=""> £47.00
                            </td>
                        </tr>
                        <tr class="compare-model">
                            <td>Model</td>
                            <td>mt210mg</td>
                            <td>mt2100mg</td>
                            <td>mt230mg</td>
                        </tr>
                        <tr class="compare-manufacturer">
                            <td>Brand</td>
                            <td>MEGATAN</td>
                            <td>MEGATAN</td>
                            <td>MEGATAN</td>
                        </tr>
                        <tr class="compare-availability">
                            <td>Availability</td>
                            <td>In Stock</td>
                            <td>In Stock</td>
                            <td>In Stock</td>
                        </tr>
                        <tr class="compare-rating">
                            <td>Rating</td>
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
                        </tr>
                        <tr class="compare-summary">
                            <td>Summary</td>
                            <td class="description">Contents&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1 x Melanotan 2 10mg (1 vial)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1 x Injectable Water (2ml vial)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1 x Syringe (for mixing your solution)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1 x Alcohol Wipe (for mixing your solution)Originally developed with a..</td>
                            <td class="description">Contents&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10 x Melanotan 2 10mg (10 vials)&nbsp; &nbsp; &nbsp; &nbsp;10 x Injectable Water (2ml vials)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10 x Syringe (for mixing your solution)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10 x Alcohol Wipe (for mixing your solution)Melanotan II is ..</td>
                            <td class="description">Contents&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3 x Melanotan 2 10mg (3 vials)&nbsp; &nbsp; &nbsp; &nbsp; 3 x Injectable Water (2ml vials)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3 x Syringe (for mixing your solution)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3 x Alcohol Wipe (for mixing your solution)Melanotan II is a..</td>
                        </tr>
                        <tr class="compare-weight">
                            <td>Weight</td>
                            <td>0.00g</td>
                            <td>0.00g</td>
                            <td>0.00g</td>
                        </tr>
                        <tr class="compare-dimensions">
                            <td>Dimensions (L x W x H)</td>
                            <td>0.00cm x 0.00cm x 0.00cm</td>
                            <td>0.00cm x 0.00cm x 0.00cm</td>
                            <td>0.00cm x 0.00cm x 0.00cm</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td class=" out-of-stock">
                                <div class="compare-buttons">
                                    <button class="btn main-btn add-to_cart-btn"><span>Add to Cart</span></button>
                                    <a href="javascript:void(0);" class="btn main-btn btn-danger btn-remove"><span>Remove</span></a>
                                </div>
                            </td>
                            <td class=" out-of-stock">
                                <div class="compare-buttons">
                                    <button class="btn main-btn add-to_cart-btn"><span>Add to Cart</span></button>
                                    <a href="javascript:void(0);" class="btn main-btn btn-danger btn-remove"><span>Remove</span></a>
                                </div>
                            </td>
                            <td class=" out-of-stock">
                                <div class="compare-buttons">
                                    <button class="btn main-btn add-to_cart-btn"><span>Add to Cart</span></button>
                                    <a href="javascript:void(0);" class="btn main-btn btn-danger btn-remove"><span>Remove</span></a>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="compare-add-div">
                <p>You have not chosen any products to compare.</p>
                <div class="buttons">
                    <div class="pull-right"><a href="javascript:void(0);" class="btn btn-default"><span>Continue</span></a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endcomponent
<!-- page-title  end-->
@endsection