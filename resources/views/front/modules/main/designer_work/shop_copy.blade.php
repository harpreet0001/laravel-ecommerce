@extends('front.layouts.layout',['pageslug' => 'shop'])
@section('content')
<!-- breadcrumb -->
<section class="breadcrumb-sec">
    <div class="container">
        <div class="breadcrumb_content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Melanotan 2</a></li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!-- breadcrumb end-->
<!-- page-title -->
<section class="page-title-sec">
    <div class="container">
        <h1 class="title page-title"><span>Melanotan 2</span></h1>
    </div>
</section>
<!-- page-title  end-->
<section class="aside-sec">
    <div class="container">
        <div class="aside-_content">
            <div class="row">
                <aside class="side-column">
                    <div class="mobile-wrapper-header">
                        <span>Filters</span>
                        <a class="x"><i class="fas fa-times"></i></a>
                    </div>
                    <figure class="aside-top_img">
                        <img src="images/megatan3.jpg">
                    </figure>
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
                        <h3 class="module-title">Filter <span>
                                <button class="reset-filter-btn">
                                    Clear
                                </button>
                            </span> </h3>
                        <div class="accordion-sec">
                            <div id="accordion" class="accordion">
                                <div class="card mb-0">
                                    <div class="card-header" data-toggle="collapse" href="#collapseOne">
                                        <a class="card-title">
                                            Price
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            <input type="text" class="js-range-slider" name="my_range" value="" data-skin="round" data-type="double" data-min="0" data-max="1000" data-grid="false" />
                                            <div class="range-input">
                                                <span>£</span>
                                                <input type="number" maxlength="4" value="0" class="from" />
                                                <span>£</span>
                                                <input type="number" maxlength="4" value="1000" class="to" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        <a class="card-title">
                                            Availability
                                        </a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">In Stock</label>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="card-header" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                        <a class="card-title">
                                            Brands
                                        </a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            <ul>
                                                <li>
                                                    <div class="accordion-images">
                                                        <figure>
                                                            <img src="images/accordion-img.png">
                                                        </figure>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <div class="right-content">
                    <div class="top-heading">
                        <h2>Melanotan 2</h2>
                    </div>
                    <!-- products-filter -->
                    <div class="products-filters">
                        <div class="grid-list">
                            <button class="btn-grid-view view-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Grid" data-view="product-grid"> </button>
                            <button class="btn-list-view view-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="List" data-view="product-list"> </button>
                            <a href="javascript:void(0);"> <span> Product Compare </span></a>
                        </div>
                        <div class="select-group">
                            <div class="input-group input-group-sm sort-by">
                                <label>Sort By:</label>
                                <select class="form-select form-control" aria-label="Default select example">
                                    <option selected>Default</option>
                                    <option value="1">Name (A - Z)</option>
                                    <option value="2">Name (Z - A)</option>
                                    <option value="3">Price (Low &gt; High)</option>
                                    <option value="4">Price (High &gt; Low)</option>
                                    <option value="5">Rating (Highest)</option>
                                    <option value="6">Rating (Lowest)</option>
                                    <option value="7">Model (A - Z)</option>
                                    <option value="8">Model (Z - A)</option>
                                </select>
                            </div>
                            <div class="input-group input-group-sm per-page">
                                <label>Show:</label>
                                <select class="form-select form-control" aria-label="Default select example">
                                    <option value="1">12</option>
                                    <option value="2">25</option>
                                    <option value="3">50</option>
                                    <option value="3">75</option>
                                    <option value="3">100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- products-filter end -->
                    <!-- content -->
                    <!--    <div class="main-products"> -->
                    <div class="main-products">
                        <div class="product-layout">
                            <div class="feature_card">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img src="https://dev.megatan.ws/image/cache/catalog/products/20mg_melanotan_2.fw__21465_zoom__23898_zoom-250x250w.png" class="img-fluid">
                                        <div class="product-labels">
                                            <span class="product-label"><b>New</b></span>
                                            <span class="product-label product-label-2"><b>Hot</b></span>
                                        </div>
                                    </a>
                                    <div class="quickview-button">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                                            <div class="quickview_i" data-toggle="tooltip" data-placement="top" title="Quickview">
                                                <i class="fas fa-search-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="rating-star-i">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                </figure>
                                <figcaption>
                                    <div class="top">
                                        <a href="javascript:void(0);">MEGATAN</a>
                                        <span>
                                            mt210mgsk
                                        </span>
                                    </div>
                                    <div class="stats">
                                        <span class="stat-1"><span class="stats-label">Brand:</span> <span><a href="https://dev.megatan.ws/MEGATAN">MEGATAN</a></span></span>
                                        <span class="stat-2"><span class="stats-label">Model:</span> <span>mt230mg</span></span>
                                    </div>
                                    <div class="rating-star">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="wrapper">
                                        <div class="name">
                                            <a href="javascript:void(0);">Melanotan 2 10mg Starter Kit (1 vial)</a>
                                        </div>
                                        <div class="description">Contents&nbsp;&nbsp;&nbsp;&nbsp; 2 x Melanotan 2 10mg (2 vials)&nbsp; &nbsp; &nbsp;2 x Injectable Water (2ml vial)&nbsp;&nbsp;&nbsp;&nbsp; 2 x Syringe (for mixing your solution)&nbsp;&nbsp;&nbsp;&nbsp; 2 x Alcohol Wipe (for mixing your solution)An analogue of naturally existing alpha-melanocyte hormone, Melanotan 2 is one of the most innovative tanning peptides presently a..</div>
                                        <div class="price">
                                            <div><span class="price-normal">£47.00</span></div>
                                            <p>£18.95</p>
                                        </div>
                                        <div class="buttons-wrapper">
                                            <div class="cart-group">
                                                <!--  -->
                                                <div class="quantity-input">
                                                    <span class="input-number-decrement"><i class="fas fa-chevron-down"></i></span><input class="input-number" type="text" value="1" min="0" max="10"><span class="input-number-increment"><i class="fas fa-chevron-up"></i></span>
                                                </div>
                                                <!--  -->
                                                <a href="javascript:void" class="btn main-btn shopping-web-icon">Add to Cart</a>
                                                <a href="javascript:void(0);" class="mobile-shopping-icon">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="wish-group">
                                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wish List"><i class="far fa-heart"></i></a>
                                                <a href="javascript:void(0);" class="campare-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Campare this Product">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bottom">
                                        <a href="javascript:void(0);"><i class="fas fa-dollar-sign"></i> Buy Now
                                        </a>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#Question-modal"><i class="far fa-question-circle"></i> Question
                                        </a>
                                    </div>
                                </figcaption>
                            </div>
                        </div>
                        <div class="product-layout">
                            <div class="feature_card">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img src="https://dev.megatan.ws/image/cache/catalog/products/20mg_melanotan_2.fw__21465_zoom__23898_zoom-250x250w.png" class="img-fluid">
                                        <div class="product-labels">
                                            <span class="product-label"><b>New</b></span>
                                            <span class="product-label product-label-2"><b>Hot</b></span>
                                        </div>
                                    </a>
                                    <div class="quickview-button">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                                            <div class="quickview_i" data-toggle="tooltip" data-placement="top" title="Quickview">
                                                <i class="fas fa-search-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="rating-star-i">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                </figure>
                                <figcaption>
                                    <div class="top">
                                        <a href="javascript:void(0);">MEGATAN</a>
                                        <span>
                                            mt210mgsk
                                        </span>
                                    </div>
                                    <div class="stats">
                                        <span class="stat-1"><span class="stats-label">Brand:</span> <span><a href="https://dev.megatan.ws/MEGATAN">MEGATAN</a></span></span>
                                        <span class="stat-2"><span class="stats-label">Model:</span> <span>mt230mg</span></span>
                                    </div>
                                    <div class="rating-star">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="wrapper">
                                        <div class="name">
                                            <a href="javascript:void(0);">Melanotan 2 10mg Starter Kit (1 vial)</a>
                                        </div>
                                        <div class="description">Contents&nbsp;&nbsp;&nbsp;&nbsp; 2 x Melanotan 2 10mg (2 vials)&nbsp; &nbsp; &nbsp;2 x Injectable Water (2ml vial)&nbsp;&nbsp;&nbsp;&nbsp; 2 x Syringe (for mixing your solution)&nbsp;&nbsp;&nbsp;&nbsp; 2 x Alcohol Wipe (for mixing your solution)An analogue of naturally existing alpha-melanocyte hormone, Melanotan 2 is one of the most innovative tanning peptides presently a..</div>
                                        <div class="price">
                                            <div><span class="price-normal">£47.00</span></div>
                                            <p>£18.95</p>
                                        </div>
                                        <div class="buttons-wrapper">
                                            <div class="cart-group">
                                                <!--  -->
                                                <div class="quantity-input">
                                                    <span class="input-number-decrement"><i class="fas fa-chevron-down"></i></span><input class="input-number" type="text" value="1" min="0" max="10"><span class="input-number-increment"><i class="fas fa-chevron-up"></i></span>
                                                </div>
                                                <!--  -->
                                                <a href="javascript:void" class="btn main-btn shopping-web-icon">Add to Cart</a>
                                                <a href="javascript:void(0);" class="mobile-shopping-icon">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="wish-group">
                                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wish List"><i class="far fa-heart"></i></a>
                                                <a href="javascript:void(0);" class="campare-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Campare this Product">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bottom">
                                        <a href="javascript:void(0);"><i class="fas fa-dollar-sign"></i> Buy Now
                                        </a>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#Question-modal"><i class="far fa-question-circle"></i> Question
                                        </a>
                                    </div>
                                </figcaption>
                            </div>
                        </div>
                        <div class="product-layout">
                            <div class="feature_card">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img src="https://dev.megatan.ws/image/cache/catalog/products/20mg_melanotan_2.fw__21465_zoom__23898_zoom-250x250w.png" class="img-fluid">
                                        <div class="product-labels">
                                            <span class="product-label"><b>New</b></span>
                                            <span class="product-label product-label-2"><b>Hot</b></span>
                                        </div>
                                    </a>
                                    <div class="quickview-button">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                                            <div class="quickview_i" data-toggle="tooltip" data-placement="top" title="Quickview">
                                                <i class="fas fa-search-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="rating-star-i">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                </figure>
                                <figcaption>
                                    <div class="top">
                                        <a href="javascript:void(0);">MEGATAN</a>
                                        <span>
                                            mt210mgsk
                                        </span>
                                    </div>
                                    <div class="stats">
                                        <span class="stat-1"><span class="stats-label">Brand:</span> <span><a href="https://dev.megatan.ws/MEGATAN">MEGATAN</a></span></span>
                                        <span class="stat-2"><span class="stats-label">Model:</span> <span>mt230mg</span></span>
                                    </div>
                                    <div class="rating-star">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="wrapper">
                                        <div class="name">
                                            <a href="javascript:void(0);">Melanotan 2 10mg Starter Kit (1 vial)</a>
                                        </div>
                                        <div class="description">Contents&nbsp;&nbsp;&nbsp;&nbsp; 2 x Melanotan 2 10mg (2 vials)&nbsp; &nbsp; &nbsp;2 x Injectable Water (2ml vial)&nbsp;&nbsp;&nbsp;&nbsp; 2 x Syringe (for mixing your solution)&nbsp;&nbsp;&nbsp;&nbsp; 2 x Alcohol Wipe (for mixing your solution)An analogue of naturally existing alpha-melanocyte hormone, Melanotan 2 is one of the most innovative tanning peptides presently a..</div>
                                        <div class="price">
                                            <div><span class="price-normal">£47.00</span></div>
                                            <p>£18.95</p>
                                        </div>
                                        <div class="buttons-wrapper">
                                            <div class="cart-group">
                                                <!--  -->
                                                <div class="quantity-input">
                                                    <span class="input-number-decrement"><i class="fas fa-chevron-down"></i></span><input class="input-number" type="text" value="1" min="0" max="10"><span class="input-number-increment"><i class="fas fa-chevron-up"></i></span>
                                                </div>
                                                <!--  -->
                                                <a href="javascript:void" class="btn main-btn shopping-web-icon">Add to Cart</a>
                                                <a href="javascript:void(0);" class="mobile-shopping-icon">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="wish-group">
                                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wish List"><i class="far fa-heart"></i></a>
                                                <a href="javascript:void(0);" class="campare-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Campare this Product">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bottom">
                                        <a href="javascript:void(0);"><i class="fas fa-dollar-sign"></i> Buy Now
                                        </a>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#Question-modal"><i class="far fa-question-circle"></i> Question
                                        </a>
                                    </div>
                                </figcaption>
                            </div>
                        </div>
                        <div class="product-layout">
                            <div class="feature_card">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img src="https://dev.megatan.ws/image/cache/catalog/products/20mg_melanotan_2.fw__21465_zoom__23898_zoom-250x250w.png" class="img-fluid">
                                        <div class="product-labels">
                                            <span class="product-label"><b>New</b></span>
                                            <span class="product-label product-label-2"><b>Hot</b></span>
                                        </div>
                                    </a>
                                    <div class="quickview-button">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                                            <div class="quickview_i" data-toggle="tooltip" data-placement="top" title="Quickview">
                                                <i class="fas fa-search-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="rating-star-i">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                </figure>
                                <figcaption>
                                    <div class="top">
                                        <a href="javascript:void(0);">MEGATAN</a>
                                        <span>
                                            mt210mgsk
                                        </span>
                                    </div>
                                    <div class="stats">
                                        <span class="stat-1"><span class="stats-label">Brand:</span> <span><a href="https://dev.megatan.ws/MEGATAN">MEGATAN</a></span></span>
                                        <span class="stat-2"><span class="stats-label">Model:</span> <span>mt230mg</span></span>
                                    </div>
                                    <div class="rating-star">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="wrapper">
                                        <div class="name">
                                            <a href="javascript:void(0);">Melanotan 2 10mg Starter Kit (1 vial)</a>
                                        </div>
                                        <div class="description">Contents&nbsp;&nbsp;&nbsp;&nbsp; 2 x Melanotan 2 10mg (2 vials)&nbsp; &nbsp; &nbsp;2 x Injectable Water (2ml vial)&nbsp;&nbsp;&nbsp;&nbsp; 2 x Syringe (for mixing your solution)&nbsp;&nbsp;&nbsp;&nbsp; 2 x Alcohol Wipe (for mixing your solution)An analogue of naturally existing alpha-melanocyte hormone, Melanotan 2 is one of the most innovative tanning peptides presently a..</div>
                                        <div class="price">
                                            <div><span class="price-normal">£47.00</span></div>
                                            <p>£18.95</p>
                                        </div>
                                        <div class="buttons-wrapper">
                                            <div class="cart-group">
                                                <!--  -->
                                                <div class="quantity-input">
                                                    <span class="input-number-decrement"><i class="fas fa-chevron-down"></i></span><input class="input-number" type="text" value="1" min="0" max="10"><span class="input-number-increment"><i class="fas fa-chevron-up"></i></span>
                                                </div>
                                                <!--  -->
                                                <a href="javascript:void" class="btn main-btn shopping-web-icon">Add to Cart</a>
                                                <a href="javascript:void(0);" class="mobile-shopping-icon">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="wish-group">
                                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wish List"><i class="far fa-heart"></i></a>
                                                <a href="javascript:void(0);" class="campare-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Campare this Product">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bottom">
                                        <a href="javascript:void(0);"><i class="fas fa-dollar-sign"></i> Buy Now
                                        </a>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#Question-modal"><i class="far fa-question-circle"></i> Question
                                        </a>
                                    </div>
                                </figcaption>
                            </div>
                        </div>
                        <div class="product-layout">
                            <div class="feature_card">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img src="https://dev.megatan.ws/image/cache/catalog/products/20mg_melanotan_2.fw__21465_zoom__23898_zoom-250x250w.png" class="img-fluid">
                                        <div class="product-labels">
                                            <span class="product-label"><b>New</b></span>
                                            <span class="product-label product-label-2"><b>Hot</b></span>
                                        </div>
                                    </a>
                                    <div class="quickview-button">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                                            <div class="quickview_i" data-toggle="tooltip" data-placement="top" title="Quickview">
                                                <i class="fas fa-search-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="rating-star-i">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                </figure>
                                <figcaption>
                                    <div class="top">
                                        <a href="javascript:void(0);">MEGATAN</a>
                                        <span>
                                            mt210mgsk
                                        </span>
                                    </div>
                                    <div class="stats">
                                        <span class="stat-1"><span class="stats-label">Brand:</span> <span><a href="https://dev.megatan.ws/MEGATAN">MEGATAN</a></span></span>
                                        <span class="stat-2"><span class="stats-label">Model:</span> <span>mt230mg</span></span>
                                    </div>
                                    <div class="rating-star">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="wrapper">
                                        <div class="name">
                                            <a href="javascript:void(0);">Melanotan 2 10mg Starter Kit (1 vial)</a>
                                        </div>
                                        <div class="description">Contents&nbsp;&nbsp;&nbsp;&nbsp; 2 x Melanotan 2 10mg (2 vials)&nbsp; &nbsp; &nbsp;2 x Injectable Water (2ml vial)&nbsp;&nbsp;&nbsp;&nbsp; 2 x Syringe (for mixing your solution)&nbsp;&nbsp;&nbsp;&nbsp; 2 x Alcohol Wipe (for mixing your solution)An analogue of naturally existing alpha-melanocyte hormone, Melanotan 2 is one of the most innovative tanning peptides presently a..</div>
                                        <div class="price">
                                            <div><span class="price-normal">£47.00</span></div>
                                            <p>£18.95</p>
                                        </div>
                                        <div class="buttons-wrapper">
                                            <div class="cart-group">
                                                <!--  -->
                                                <div class="quantity-input">
                                                    <span class="input-number-decrement"><i class="fas fa-chevron-down"></i></span><input class="input-number" type="text" value="1" min="0" max="10"><span class="input-number-increment"><i class="fas fa-chevron-up"></i></span>
                                                </div>
                                                <!--  -->
                                                <a href="javascript:void" class="btn main-btn shopping-web-icon">Add to Cart</a>
                                                <a href="javascript:void(0);" class="mobile-shopping-icon">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="wish-group">
                                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wish List"><i class="far fa-heart"></i></a>
                                                <a href="javascript:void(0);" class="campare-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Campare this Product">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bottom">
                                        <a href="javascript:void(0);"><i class="fas fa-dollar-sign"></i> Buy Now
                                        </a>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#Question-modal"><i class="far fa-question-circle"></i> Question
                                        </a>
                                    </div>
                                </figcaption>
                            </div>
                        </div>
                        <div class="product-layout">
                            <div class="feature_card">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img src="https://dev.megatan.ws/image/cache/catalog/products/20mg_melanotan_2.fw__21465_zoom__23898_zoom-250x250w.png" class="img-fluid">
                                        <div class="product-labels">
                                            <span class="product-label"><b>New</b></span>
                                            <span class="product-label product-label-2"><b>Hot</b></span>
                                        </div>
                                    </a>
                                    <div class="quickview-button">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                                            <div class="quickview_i" data-toggle="tooltip" data-placement="top" title="Quickview">
                                                <i class="fas fa-search-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="rating-star-i">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                </figure>
                                <figcaption>
                                    <div class="top">
                                        <a href="javascript:void(0);">MEGATAN</a>
                                        <span>
                                            mt210mgsk
                                        </span>
                                    </div>
                                    <div class="stats">
                                        <span class="stat-1"><span class="stats-label">Brand:</span> <span><a href="https://dev.megatan.ws/MEGATAN">MEGATAN</a></span></span>
                                        <span class="stat-2"><span class="stats-label">Model:</span> <span>mt230mg</span></span>
                                    </div>
                                    <div class="rating-star">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="wrapper">
                                        <div class="name">
                                            <a href="javascript:void(0);">Melanotan 2 10mg Starter Kit (1 vial)</a>
                                        </div>
                                        <div class="description">Contents&nbsp;&nbsp;&nbsp;&nbsp; 2 x Melanotan 2 10mg (2 vials)&nbsp; &nbsp; &nbsp;2 x Injectable Water (2ml vial)&nbsp;&nbsp;&nbsp;&nbsp; 2 x Syringe (for mixing your solution)&nbsp;&nbsp;&nbsp;&nbsp; 2 x Alcohol Wipe (for mixing your solution)An analogue of naturally existing alpha-melanocyte hormone, Melanotan 2 is one of the most innovative tanning peptides presently a..</div>
                                        <div class="price">
                                            <div><span class="price-normal">£47.00</span></div>
                                            <p>£18.95</p>
                                        </div>
                                        <div class="buttons-wrapper">
                                            <div class="cart-group">
                                                <!--  -->
                                                <div class="quantity-input">
                                                    <span class="input-number-decrement"><i class="fas fa-chevron-down"></i></span><input class="input-number" type="text" value="1" min="0" max="10"><span class="input-number-increment"><i class="fas fa-chevron-up"></i></span>
                                                </div>
                                                <!--  -->
                                                <a href="javascript:void" class="btn main-btn shopping-web-icon">Add to Cart</a>
                                                <a href="javascript:void(0);" class="mobile-shopping-icon">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="wish-group">
                                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wish List"><i class="far fa-heart"></i></a>
                                                <a href="javascript:void(0);" class="campare-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Campare this Product">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bottom">
                                        <a href="javascript:void(0);"><i class="fas fa-dollar-sign"></i> Buy Now
                                        </a>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#Question-modal"><i class="far fa-question-circle"></i> Question
                                        </a>
                                    </div>
                                </figcaption>
                            </div>
                        </div>
                        <div class="ias-noneleft" style="text-align: center;" id="ias_noneleft_1623054297859">You have reached the end of the list.</div>
                        <!-- full width div card -->
                        <div class="product-layout">
                            <div class="feature_card">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img src="https://dev.megatan.ws/image/cache/catalog/products/20mg_melanotan_2.fw__21465_zoom__23898_zoom-250x250w.png" class="img-fluid">
                                        <div class="product-labels">
                                            <span class="product-label"><b>New</b></span>
                                            <span class="product-label product-label-2"><b>Hot</b></span>
                                        </div>
                                    </a>
                                    <div class="quickview-button">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                                            <div class="quickview_i" data-toggle="tooltip" data-placement="top" title="Quickview">
                                                <i class="fas fa-search-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="rating-star-i">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                </figure>
                                <figcaption>
                                    <div class="top">
                                        <a href="javascript:void(0);">MEGATAN</a>
                                        <span>
                                            mt210mgsk
                                        </span>
                                    </div>
                                    <div class="stats">
                                        <span class="stat-1"><span class="stats-label">Brand:</span> <span><a href="https://dev.megatan.ws/MEGATAN">MEGATAN</a></span></span>
                                        <span class="stat-2"><span class="stats-label">Model:</span> <span>mt230mg</span></span>
                                    </div>
                                    <div class="rating-star">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="wrapper">
                                        <div class="name">
                                            <a href="javascript:void(0);">Melanotan 2 10mg Starter Kit (1 vial)</a>
                                        </div>
                                        <div class="description">Contents&nbsp;&nbsp;&nbsp;&nbsp; 2 x Melanotan 2 10mg (2 vials)&nbsp; &nbsp; &nbsp;2 x Injectable Water (2ml vial)&nbsp;&nbsp;&nbsp;&nbsp; 2 x Syringe (for mixing your solution)&nbsp;&nbsp;&nbsp;&nbsp; 2 x Alcohol Wipe (for mixing your solution)An analogue of naturally existing alpha-melanocyte hormone, Melanotan 2 is one of the most innovative tanning peptides presently a..</div>
                                        <div class="price">
                                            <div><span class="price-normal">£47.00</span></div>
                                            <p>£18.95</p>
                                        </div>
                                        <div class="buttons-wrapper">
                                            <div class="cart-group">
                                                <!--  -->
                                                <div class="quantity-input">
                                                    <span class="input-number-decrement"><i class="fas fa-chevron-down"></i></span><input class="input-number" type="text" value="1" min="0" max="10"><span class="input-number-increment"><i class="fas fa-chevron-up"></i></span>
                                                </div>
                                                <!--  -->
                                                <a href="javascript:void" class="btn main-btn shopping-web-icon">Add to Cart</a>
                                                <a href="javascript:void(0);" class="mobile-shopping-icon">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="wish-group">
                                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wish List"><i class="far fa-heart"></i></a>
                                                <a href="javascript:void(0);" class="campare-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Campare this Product">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bottom">
                                        <a href="javascript:void(0);"><i class="fas fa-dollar-sign"></i> Buy Now
                                        </a>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#Question-modal"><i class="far fa-question-circle"></i> Question
                                        </a>
                                    </div>
                                </figcaption>
                            </div>
                        </div>
                        <!-- full width div card end-->
                    </div>
                    <!-- </div> -->
                    <!-- content end -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade modal-center quickview_modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="inner-modal">
                    <div class="modal-left-img product-left">
                        <figure>
                            <img src="images/megatan4.png" class="img-fluid">
                        </figure>
                    </div>
                    <div id="product" class="product-details product-right">
                        <div class="title page-title">Melanotan 2 100mg (10 vials)</div>
                        <div class="description ">
                            <div class="expand-block">
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
                                <div class="block-expand-overlay"><a class="block-expand btn"></a></div>
                            </div>
                        </div>
                        <div class="product-stats">
                            <ul class="list-unstyled">
                                <li class="product-stock in-stock"><b>Stock:</b> <span>In Stock</span></li>
                                <li class="product-manufacturer"><b>Brand:</b> <a href="https://dev.megatan.ws/MEGATAN" target="_blank">MEGATAN</a></li>
                                <li class="product-reward"><b>Reward Points:</b> <span>140</span></li>
                            </ul>
                        </div>
                        <div class="product-price-group">
                            <div class="price-wrapper">
                                <div class="price-group">
                                    <div class="product-price">£140.00</div>
                                </div>
                                <div class="product-tax">Ex Tax: £140.00</div>
                                <div class="product-points">Price in reward points: 14000</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal -->
            </div>
            <div class="modal-footer">
                <div class="button-group-page">
                    <div class="buttons-wrapper">
                        <div class="stepper-group cart-group">
                            <div class="stepper">
                                <div class="quantity-input">
                                    <span class="input-number-decrement"><i class="fas fa-chevron-down"></i></span><input class="input-number" type="text" value="1" min="0" max="10"><span class="input-number-increment"><i class="fas fa-chevron-up"></i></span>
                                </div>
                            </div>
                            <a id="button-cart" data-loading-text="<span class='btn-text'>Add to Cart</span>" class="btn btn-cart"><span class="btn-text">Add to Cart</span></a>
                        </div>
                        <div class="wishlist-compare">
                            <a class="btn btn-wishlist" data-toggle="tooltip" data-tooltip-class="pp-wishlist-tooltip" data-placement="top" title="" onclick="if (!window.__cfRLUnblockHandlers) return false; parent.wishlist.add(54);" data-original-title="Add to Wish List"><span class="btn-text">Add to Wish List</span></a>
                            <a class="btn btn-compare" data-toggle="tooltip" data-tooltip-class="pp-compare-tooltip" data-placement="top" title="" onclick="if (!window.__cfRLUnblockHandlers) return false; parent.compare.add(54);" data-original-title="Compare this Product"><span class="btn-text">Compare this Product</span></a>
                            <a class="btn btn-more-details" href="https://dev.megatan.ws/melanotan-2-100mg-10-vials-mt2100mg" target="_top" data-toggle="tooltip" data-tooltip-class="more-details-tooltip" data-placement="top" title="" data-original-title="More Details"><span class="btn-text">More Details</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end-->
<!-- question modal -->
<!-- The Modal -->
<div class="modal Question-modal" id="Question-modal">
    <div class="modal-dialog ">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <!-- <h1 class="modal-title">Modal Heading</h1> -->
                <h3 class="title module-title">Ask a Question About This Product</h3>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal">
                    <fieldset>
                        <div class="form-group custom-field required">
                            <label class="col-sm-2 control-label">Your Name</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="Your Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group custom-field required">
                            <label class="col-sm-2 control-label" for="field-6114cb3b071e5-2">Your Email</label>
                            <div class="col-sm-10">
                                <input type="email" placeholder="Your Email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group custom-field required">
                            <label class="col-sm-2 control-label">Topic</label>
                            <div class="col-sm-10">
                                <select name="item[3]" id="field-6114cb3b071e5-3" class="form-control">
                                    <option> --- Please Select --- </option>
                                    <option>How does it fit?</option>
                                    <option>How do you wash it?</option>
                                    <option>Customize this form with any fields...</option>
                                    <option>Product name is included in the email</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group custom-field ">
                            <label class="col-sm-2 control-label">Message</label>
                            <div class="col-sm-10">
                                <textarea name="item[4]" rows="5" placeholder="Message" id="field-6114cb3b071e5-4" class="form-control"></textarea>
                            </div>
                        </div>
                    </fieldset>
                    <div class="buttons">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary" data-loading-text="<span>Submit</span>"><span>Submit</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- question modal end -->

<!-- comment: need to add -->
<!-- mobile filter btn -->
<div class="bottom-menu bottom-menu-266">
    <ul>
        <li class="menu-item bottom-menu-item bottom-menu-item-1">
            <a href="javascript:void(0);"><span class="links-text">Home</span></a>
        </li>
        <li class="menu-item bottom-menu-item bottom-menu-item-2">
            <a href="javascript:void(0);"><span class="links-text">Wishlist</span><span class="count-badge wishlist-badge">3</span></a>
        </li>
        <li class="menu-item bottom-menu-item bottom-menu-item-3">
            <a href="javascript:void(0);"><span class="links-text">Compare</span><span class="count-badge compare-badge count-zero">0</span></a>
        </li>
        <li class="menu-item bottom-menu-item bottom-menu-item-4">
            <a href="javascript:void(0);"><span class="links-text">Email</span></a>
        </li>
        <li class="menu-item bottom-menu-item bottom-menu-item-5">
            <a href="javascript:void(0);"><span class="links-text">Call us</span></a>
        </li>
    </ul>
</div>
<a class="mobile-filter-trigger btn">Filter Products</a>
<!-- mobile flilter btn end  -->
@endsection
@section('js')
<script type="text/javascript">
    
</script>
@endsection