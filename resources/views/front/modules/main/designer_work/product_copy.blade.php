@extends('front.layouts.layout')
@section('content')
<!--meta-data-end-->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item">
    <a href="">
        Product
    </a>
</li>
<li class="breadcrumb-item"><a href="">Product</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Product</span></h1>
@endcomponent
<!-- page-title  end-->
<!-- laoding-->

<!-- loading end -->
<section class="aside-sec">
    <div class="container">
        <div class="aside-_content">
            <div class="row">
                <aside class="side-column">
                    <div class="aside_links">
                        <h3 class="module-title">Categoriess</h3>
                        <ul>
                            <li>
                                <a href="javascript:void(0);" class="active">Melanotan 2</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">MT2 Starter Kits</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Melanotan Nasal Spray</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">MT2 Reseller Packs</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Tanning Injection Supplies</a>
                            </li>
                        </ul>
                        <!-- carousel -->
                        <div class="">
                            <!-- carousel -->
                            <div class="owl-carousel owl-theme aside-slider">
                                <div class="item">
                                    <div class="aside-slider_card">
                                        <figure>
                                            <a href="javascript:void(0);">
                                                <img src="{{ asset('front/images/megatan1.png') }}" class="img-fluid">
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
                                                        <a href="javascript:void(0);" class="shoppin-icon-cart" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wish List"><i class="fa fa-shopping-cart"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wish List"><i class="far fa-heart"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="campare-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Campare this Product"><i class="far fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </figure>
                                        <figcaption>
                                            <div class="name"><a href="javascript:void(0);">Melanotan 2 100mg (10 vials)</a></div>
                                            <div class="price">
                                                <div>
                                                    <span class="price-normal">£17.00</span>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="aside-slider_card">
                                        <figure>
                                            <a href="javascript:void(0);">
                                                <img src="{{ asset('front/images/megatan1.png') }}" class="img-fluid">
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
                                                        <a href="javascript:void(0);" class="shoppin-icon-cart" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wish List"><i class="fa fa-shopping-cart"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wish List"><i class="far fa-heart"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="campare-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Campare this Product"><i class="far fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </figure>
                                        <figcaption>
                                            <div class="name"><a href="javascript:void(0);">Melanotan 2 100mg (10 vials)</a></div>
                                            <div class="price">
                                                <div>
                                                    <span class="price-normal">£17.00</span>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="aside-slider_card">
                                        <figure>
                                            <a href="javascript:void(0);">
                                                <img src="{{ asset('front/images/megatan1.png') }}" class="img-fluid">
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
                                                        <a href="javascript:void(0);" class="shoppin-icon-cart" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wish List"><i class="fa fa-shopping-cart"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wish List"><i class="far fa-heart"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="campare-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Campare this Product"><i class="far fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </figure>
                                        <figcaption>
                                            <div class="name"><a href="javascript:void(0);">Melanotan 2 100mg (10 vials)</a></div>
                                            <div class="price">
                                                <div>
                                                    <span class="price-normal">£17.00</span>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="aside-slider_card">
                                        <figure>
                                            <a href="javascript:void(0);">
                                                <img src="{{ asset('front/images/megatan1.png') }}" class="img-fluid">
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
                                                        <a href="javascript:void(0);" class="shoppin-icon-cart" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wish List"><i class="fa fa-shopping-cart"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wish List"><i class="far fa-heart"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="campare-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Campare this Product"><i class="far fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </figure>
                                        <figcaption>
                                            <div class="name"><a href="javascript:void(0);">Melanotan 2 100mg (10 vials)</a></div>
                                            <div class="price">
                                                <div>
                                                    <span class="price-normal">£17.00</span>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </div>
                                </div>
                            </div>
                            <!-- carousel end-->
                        </div>
                        <!-- carousel end -->
                    </div>
                </aside>
                <div class="right-content">
                    <!-- content -->
                    <div class="product-info has-extra-button ">
                        <div class="product-left">
                            <div class="product-image">
                                <div class="feature_card zoom-card">
                                    <figure class="zoom" style="background-image: url('https://dev.megatan.ws/image/cache/catalog/products/10mg_melanotan_2.fw__04614_zoom__39902_zoom-1000x1000w.png');">
                                        <img src="https://dev.megatan.ws/image/cache/catalog/products/10mg_melanotan_2.fw__04614_zoom__39902_zoom-550x550w.png" class="img-fluid">
                                        <div class="product-labels">
                                            <span class="product-label"><b>New</b></span>
                                            <span class="product-label product-label-2"><b>Hot</b></span>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="product-right">
                            <div id="product" class="product-details">
                                <div class="product-blocks blocks-top"> </div>
                                <div class="rating rating-page">
                                    <div class="rating-star">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="review-links"> <a href="javascript:void(0);">Based on 52 reviews.</a> <b>-</b> <a href="javascript:void(0);">Write a review</a> </div>
                                </div>
                                <div class="product-price-group">
                                    <div class="price-wrapper">
                                        <div class="price-group">
                                            <div class="product-price">£17.00</div>
                                        </div>
                                        <div class="product-tax">Ex Tax: £17.00</div>
                                        <div class="product-points">Price in reward points: 1700</div>
                                    </div>
                                    <div class="product-stats">
                                        <ul class="list-unstyled">
                                            <li class="product-stock in-stock"><b>Stock:</b> <span>In Stock</span></li>
                                            <li class="product-reward"><b>Reward Points:</b> <span>17</span></li>
                                            <li class="product-model"><b>Model:</b> <span>mt210mg</span></li>
                                        </ul>
                                        <div class="brand-image product-manufacturer">
                                            <a href="">
                                                <img src="https://dev.megatan.ws/image/cache/catalog/logo-60x60w.png" srcset="https://dev.megatan.ws/image/cache/catalog/logo-60x60w.png 1x, https://dev.megatan.ws/image/cache/catalog/logo-120x120w.png 2x" alt="MEGATAN" width="60" height="60"> <span>MEGATAN</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="button-group-page">
                                    <div class="buttons-wrapper">
                                        <div class="stepper-group cart-group">
                                            <div class="stepper">
                                                <label class="control-label" for="product-quantity">Qty</label>
                                                <input id="product-quantity" type="text" name="quantity" value="1" data-minimum="1" class="form-control">
                                                <input id="product-id" type="hidden" name="product_id" value="50"> <span>
                                                    <i class="fa fa-angle-up"></i>
                                                    <i class="fa fa-angle-down"></i>
                                                </span>
                                            </div>
                                            <a id="button-cart" data-loading-text="<span class='btn-text'>Add to Cart</span>" class="btn btn-cart loading-btn"><span class="btn-text">Add to Cart</span></a>
                                            <div class="extra-group">
                                                <a class="btn btn-extra btn-extra-46 btn-1-extra">
                                                    <span class="btn-text"><i class="fas fa-dollar-sign"></i>Buy Now</span>
                                                </a>
                                                <a class="btn btn-extra btn-extra-93 btn-2-extra" data-toggle="tooltip" data-tooltip-class="extra-tooltip pp-extra-tooltip" data-placement="top" title="" href="javascript:open_popup(22)" data-product_id="50" data-loading-text="<span class='btn-text'>Question</span>" data-original-title="Question">
                                                    <i class="far fa-question-circle"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="wishlist-compare">
                                            <a class="btn btn-wishlist"><span class="btn-text">Add to Wish List</span></a>
                                            <a class="btn btn-compare"><span class="btn-text">Compare this Product</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-blocks blocks-bottom">
                                <div class="product-blocks-bottom product-blocks-58 grid-rows">
                                    <div class="grid-row grid-row-58-1">
                                        <div class="grid-cols">
                                            <div class="grid-col grid-col-58-1-1">
                                                <div class="grid-items">
                                                    <div class="grid-item grid-item-58-1-1-1">
                                                        <div class="module module-blocks module-blocks-57 blocks-grid">
                                                            <div class="module-body">
                                                                <div class="module-item module-item-1 no-expand">
                                                                    <div class="block-body expand-block">
                                                                        <div class="block-wrapper">
                                                                            <div class="block-content  block-text">
                                                                                <script async="" type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-515eafff0432cf38"></script>
                                                                                <div class="addthis_inline_share_toolbox" data-url="https://dev.megatan.ws/melanotan-2-10mg-1-vial-mt210mg" data-title="Melanotan 2 10mg (1 vial)" data-description="Contents&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1 x Melanotan 2 10mg (1 vial)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1 x Injectable Water (2ml vial)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1 x Syringe (for mixing your solution)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1 x Alcohol Wipe (for mixing your solution)Originally developed with a view to treat skin cancer,&nbsp;Melanotan 2&nbsp;is presently being used as an effective melanogenesis or in" style="clear: both;">
                                                                                    <div id="atstbx" class="at-resp-share-element at-style-responsive addthis-smartlayers addthis-animated at4-show" aria-labelledby="at-af2285cf-59f0-46ea-ae99-3a0b89243a8f" role="region"><span id="at-af2285cf-59f0-46ea-ae99-3a0b89243a8f" class="at4-visually-hidden">AddThis Sharing Buttons</span>
                                                                                        <div class="at-share-btn-elements"><a role="button" tabindex="0" class="at-icon-wrapper at-share-btn at-svc-facebook" style="background-color: rgb(59, 89, 152); border-radius: 2px;"><span class="at4-visually-hidden">Share to Facebook</span><span class="at-icon-wrapper" style="line-height: 16px; height: 16px; width: 16px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-facebook-1" style="fill: rgb(255, 255, 255); width: 16px; height: 16px;" class="at-icon at-icon-facebook">
                                                                                                        <title id="at-svg-facebook-1">Facebook</title>
                                                                                                        <g>
                                                                                                            <path d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z" fill-rule="evenodd"></path>
                                                                                                        </g>
                                                                                                    </svg></span><span class="at-label" style="font-size: 10.2px; line-height: 16px; height: 16px; color: rgb(255, 255, 255);">Facebook</span></a><a role="button" tabindex="0" class="at-icon-wrapper at-share-btn at-svc-twitter" style="background-color: rgb(29, 161, 242); border-radius: 2px;"><span class="at4-visually-hidden">Share to Twitter</span><span class="at-icon-wrapper" style="line-height: 16px; height: 16px; width: 16px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-twitter-2" style="fill: rgb(255, 255, 255); width: 16px; height: 16px;" class="at-icon at-icon-twitter">
                                                                                                        <title id="at-svg-twitter-2">Twitter</title>
                                                                                                        <g>
                                                                                                            <path d="M27.996 10.116c-.81.36-1.68.602-2.592.71a4.526 4.526 0 0 0 1.984-2.496 9.037 9.037 0 0 1-2.866 1.095 4.513 4.513 0 0 0-7.69 4.116 12.81 12.81 0 0 1-9.3-4.715 4.49 4.49 0 0 0-.612 2.27 4.51 4.51 0 0 0 2.008 3.755 4.495 4.495 0 0 1-2.044-.564v.057a4.515 4.515 0 0 0 3.62 4.425 4.52 4.52 0 0 1-2.04.077 4.517 4.517 0 0 0 4.217 3.134 9.055 9.055 0 0 1-5.604 1.93A9.18 9.18 0 0 1 6 23.85a12.773 12.773 0 0 0 6.918 2.027c8.3 0 12.84-6.876 12.84-12.84 0-.195-.005-.39-.014-.583a9.172 9.172 0 0 0 2.252-2.336" fill-rule="evenodd"></path>
                                                                                                        </g>
                                                                                                    </svg></span><span class="at-label" style="font-size: 10.2px; line-height: 16px; height: 16px; color: rgb(255, 255, 255);">Twitter</span></a><a role="button" tabindex="0" class="at-icon-wrapper at-share-btn at-svc-pinterest_share" style="background-color: rgb(203, 32, 39); border-radius: 2px;"><span class="at4-visually-hidden">Share to Pinterest</span><span class="at-icon-wrapper" style="line-height: 16px; height: 16px; width: 16px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-pinterest_share-3" style="fill: rgb(255, 255, 255); width: 16px; height: 16px;" class="at-icon at-icon-pinterest_share">
                                                                                                        <title id="at-svg-pinterest_share-3">Pinterest</title>
                                                                                                        <g>
                                                                                                            <path d="M7 13.252c0 1.81.772 4.45 2.895 5.045.074.014.178.04.252.04.49 0 .772-1.27.772-1.63 0-.428-1.174-1.34-1.174-3.123 0-3.705 3.028-6.33 6.947-6.33 3.37 0 5.863 1.782 5.863 5.058 0 2.446-1.054 7.035-4.468 7.035-1.232 0-2.286-.83-2.286-2.018 0-1.742 1.307-3.43 1.307-5.225 0-1.092-.67-1.977-1.916-1.977-1.692 0-2.732 1.77-2.732 3.165 0 .774.104 1.63.476 2.336-.683 2.736-2.08 6.814-2.08 9.633 0 .87.135 1.728.224 2.6l.134.137.207-.07c2.494-3.178 2.405-3.8 3.533-7.96.61 1.077 2.182 1.658 3.43 1.658 5.254 0 7.614-4.77 7.614-9.067C26 7.987 21.755 5 17.094 5 12.017 5 7 8.15 7 13.252z" fill-rule="evenodd"></path>
                                                                                                        </g>
                                                                                                    </svg></span><span class="at-label" style="font-size: 10.2px; line-height: 16px; height: 16px; color: rgb(255, 255, 255);">Pinterest</span></a><a role="button" tabindex="0" class="at-icon-wrapper at-share-btn at-svc-email" style="background-color: rgb(132, 132, 132); border-radius: 2px;"><span class="at4-visually-hidden">Share to Email</span><span class="at-icon-wrapper" style="line-height: 16px; height: 16px; width: 16px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-email-4" style="fill: rgb(255, 255, 255); width: 16px; height: 16px;" class="at-icon at-icon-email">
                                                                                                        <title id="at-svg-email-4">Email</title>
                                                                                                        <g>
                                                                                                            <g fill-rule="evenodd"></g>
                                                                                                            <path d="M27 22.757c0 1.24-.988 2.243-2.19 2.243H7.19C5.98 25 5 23.994 5 22.757V13.67c0-.556.39-.773.855-.496l8.78 5.238c.782.467 1.95.467 2.73 0l8.78-5.238c.472-.28.855-.063.855.495v9.087z"></path>
                                                                                                            <path d="M27 9.243C27 8.006 26.02 7 24.81 7H7.19C5.988 7 5 8.004 5 9.243v.465c0 .554.385 1.232.857 1.514l9.61 5.733c.267.16.8.16 1.067 0l9.61-5.733c.473-.283.856-.96.856-1.514v-.465z"></path>
                                                                                                        </g>
                                                                                                    </svg></span><span class="at-label" style="font-size: 10.2px; line-height: 16px; height: 16px; color: rgb(255, 255, 255);">Email</span></a><a role="button" tabindex="0" class="at-icon-wrapper at-share-btn at-svc-compact" style="background-color: rgb(255, 101, 80); border-radius: 2px;"><span class="at4-visually-hidden">Share to More</span><span class="at-icon-wrapper" style="line-height: 16px; height: 16px; width: 16px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-addthis-5" style="fill: rgb(255, 255, 255); width: 16px; height: 16px;" class="at-icon at-icon-addthis">
                                                                                                        <title id="at-svg-addthis-5">AddThis</title>
                                                                                                        <g>
                                                                                                            <path d="M18 14V8h-4v6H8v4h6v6h4v-6h6v-4h-6z" fill-rule="evenodd"></path>
                                                                                                        </g>
                                                                                                    </svg></span><span class="at-label" style="font-size: 10.2px; line-height: 16px; height: 16px; color: rgb(255, 255, 255);">More</span></a></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="block-footer"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content end -->
                    <div class="Description-tab-sec">
                        <!-- card -->
                        <ul id="tabs" class="nav nav-tabs">
                            <li class="nav-item"><a href="" data-target="#Products-1" data-toggle="tab" class="nav-link small text-uppercase active">Description</a></li>
                            <li class="nav-item"><a href="" data-target="#Products-2" data-toggle="tab" class="nav-link small text-uppercase">Reviews</a></li>
                        </ul>
                        <br>
                        <div id="tabsContent" class="tab-content">
                            <div id="Products-1" class="tab-pane fade active show">
                                <div class="blocks_content">
                                    <p><b>Contents</b></p>
                                    <span class="blocks_content-inner">
                                        <p> 1 x Melanotan 2 10mg (1 vial)</p>
                                        <p> 1 x Injectable Water (2ml vial)</p>
                                        <p> 1 x Injectable Water (2ml vial)</p>
                                        <p>1 x Alcohol Wipe (for mixing your solution)</p>
                                    </span>
                                    <p>Originally developed with a view to treat skin cancer, <b>Melanotan 2 </b>is presently being used as an effective melanogenesis or in simple terms, tanning peptide. It is a synthetic analogue of the naturally occurring alpha-melanocyte stimulating hormone. Due to the presence of metabolite Bremelanotide in Melanotan 2 has powerful magic libido and sexual performance enhancing capabilities. This is primarily because of its aphrodisiac effect on the hypothalamus of user.</p>
                                    <p>Besides the above mentioned benefits, it is supposed to contain effective fat loss properties. It acts on your body so as to reduce appetite, by targeting the appetite-suppression receptors in brain. And eventually, it results in weight reduction. Over years, Melanotan II has become one of the most popular sunless tanning peptide in the market.</p>
                                </div>
                            </div>
                            <div id="Products-2" class="tab-pane fade">
                                <form class="form-horizontal" id="form-review">
                                    <div id="review">
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 50%;"><strong>Victoria</strong></td>
                                                    <td class="text-right">30/11/-0001</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Does exactly what it's supposed to do, very impressed with this product as well as the service I received... I will be using this supplier again... Thank you megatan from a very happy customer... :-)</p>
                                                        <div class="rating-star">
                                                            <ul>
                                                                <li><i class="fas fa-star"></i></li>
                                                                <li><i class="fas fa-star"></i></li>
                                                                <li><i class="fas fa-star"></i></li>
                                                                <li><i class="fas fa-star"></i></li>
                                                                <li><i class="fas fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 50%;"><strong>Scarlett</strong></td>
                                                    <td class="text-right">30/11/-0001</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>im naturally pale and this got me dark, love it, will buy again</p>
                                                        <div class="rating">
                                                            <div class="rating-star">
                                                                <ul>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 50%;"><strong>Michelle x</strong></td>
                                                    <td class="text-right">30/11/-0001</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Like many, I was sceptical when reading about MT2. I done plenty of research about the affects of it, how to use it, side effects etc. I bought a starter kit and received it 4 days later. A week later my skin is glowing, I am AMAZED at how quick I have tanned. Definitely a must have for anyone (like myself) not wanting to rely on sunbeds for a tan! :) xx</p>
                                                        <div class="rating">
                                                            <div class="rating-star">
                                                                <ul>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 50%;"><strong>Unknown</strong></td>
                                                    <td class="text-right">30/11/-0001</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>I have type 1 Irish skin, just finished 1 10mg viral and am looking extremely brown. I have been injecting 6 units everyday for a month,however legs are not as brown as face and chest, This is strong stuff so be careful and don't overtoo! Otherwise great product, quick delivery</p>
                                                        <div class="rating">
                                                            <div class="rating-star">
                                                                <ul>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 50%;"><strong></strong></td>
                                                    <td class="text-right">30/11/-0001</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Once again, excellent product after just finishing my last lot I ordered 3 more vials, they arrived in just three days, can't fault these guys, I'm also dark golden brown :-) would recommend...</p>
                                                        <div class="rating">
                                                            <div class="rating-star">
                                                                <ul>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="pagination-results">
                                        <div class="text-left">
                                            <ul class="pagination">
                                                <li class="active"><span>1</span></li>
                                                <li><a href="javascript:void(0);">2</a></li>
                                                <li><a href="javascript:void(0);">3</a></li>
                                                <li><a href="javascript:void(0);" class="next">&gt;</a></li>
                                                <li><a href="javascript:void(0);">&gt;|</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="review-form-inner">
                                        <h4>Write a review</h4>
                                        <div class="form-group required">
                                            <label class="col-sm-2 control-label" for="input-name">Your Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" value="" id="input-name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label class="col-sm-2 control-label" for="input-review">Your Review</label>
                                            <div class="col-sm-10">
                                                <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                                                <div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label class="col-sm-2 control-label">Rating</label>
                                            <div class="col-sm-10 rate">
                                                <span>Bad</span>
                                                <input type="radio" name="rating" value="1">
                                                <input type="radio" name="rating" value="2">
                                                <input type="radio" name="rating" value="3">
                                                <input type="radio" name="rating" value="4">
                                                <input type="radio" name="rating" value="5">
                                                <span>Good</span>
                                            </div>
                                        </div>
                                        <div class="buttons clearfix">
                                            <div class="pull-right">
                                                <button type="button" id="button-review" data-loading-text="Loading..." class="btn btn-primary">Continue</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- card end -->
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
<div id="overlay">
  <div class="cv-spinner">
    <span class="spinner"></span>
  </div>
</div>
<!-- Starter Kits END  -->
@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function() {

    $(".zoom").mousemove(function(e) {
        zoom(e);
    });

    function zoom(e) {
        var x, y;
        var zoomer = e.currentTarget;
        if (e.offsetX) {
            offsetX = e.offsetX;
        } else {
            offsetX = e.touches[0].pageX;
        }

        if (e.offsetY) {
            offsetY = e.offsetY;
        } else {
            offsetX = e.touches[0].pageX;
        }
        x = offsetX / zoomer.offsetWidth * 100;
        y = offsetY / zoomer.offsetHeight * 100;
        zoomer.style.backgroundPosition = x + '% ' + y + '%';
    }
});

jQuery(function($) {
    $(document).ajaxSend(function() {
        $("#overlay").fadeIn(300);
    });

    $('#button').click(function() {
        $.ajax({
            type: 'GET',
            success: function(data) {
                console.log(data);
            }
        }).done(function() {
            setTimeout(function() {
                $("#overlay").fadeOut(300);
            }, 500);
        });
    });
});
</script>
@endsection