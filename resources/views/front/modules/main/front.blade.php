@extends('front.layouts.layout',['pageslug' => 'home','pageTitle' => 'Melanotan 2 Injections UK Suppliers | Melanotan 2 |Megatan'])

@section('meta-data')
 <meta name="description" content="Place your order with UK’s most trusted Melanotan 2 injections suppliers today. We assure quality deliveries with Melanotan 2 injections, nasal spray and kits." />
@endsection

@section('content')
<!-- BANNER SECTION CODE -->
	<section class="banner-sec">
		<div class="container">
			<div class="banner_content">
				<!-- carousel -->
					<div class="owl-carousel owl-theme banner-slider">
						<div class="item">					
							<div class="banner_card banner-img-1">
								<a href="javascript:void(0);">
								<figure>
									<img src="{{ asset('front/images/banner1.jpg') }}" class="img-fluid">
								</figure>
								<div class="content-img">
									<p>Welcome to MEGATAN</p>
									<a href="{{route('shop','')}}" class="btn banner-btn-content">SHOP NOW <i class="fas fa-arrow-right"></i></a>
								</div>					
								</a>			
							</div>						
						</div>	
						<div class="item">					
							<div class="banner_card banner-img-2">
								<a href="javascript:void(0);">
								<figure>
									<img src="{{ asset('front/images/banner2.jpg') }}" class="img-fluid">
								</figure>
								<div class="content-img">
									<p>Welcome to MEGATAN</p>
									<a href="javascript:void(0);" class="btn banner-btn-content">LEARN MORE <i class="fas fa-arrow-right"></i></a>
								</div>						
								</a>			
							</div>						
						</div>					
						<div class="item">					
							<div class="banner_card banner-img-3">
								<a href="javascript:void(0);">
								<figure>
									<img src="{{ asset('front/images/banner3.jpg') }}" class="img-fluid">
								</figure>
								<div class="content-img">
									<p>FREE shipping on all orders over £10</p>
								</div>					
								</a>			
							</div>						
						</div>	
					</div>
				<!-- carousel end-->
			</div>
		</div>
	</section>
	<!-- BANNER SECTION END CODE-->

    <!-- CARD DETAILS -->
    <section class="card-detail-sec">
    	<div class="container">
    		<div class="card-detail_content">
    			<ul class="">
    				<li>
    					<div class="info-block">
    						<span class="truck-icon">							
    							<i class="fas fa-truck-moving"></i>
    						</span>
    					</div>
    					<div class="info-block-content">
    						<h6>Free Shipping</h6>
    						<p>Free delivery over £10*</p>
    					</div>
    				</li>
    				<li>
    					<div class="info-block">
    						<span class="euro-icon">							
    							<i class="fas fa-truck-moving"></i>
    						</span>
    					</div>
    					<div class="info-block-content">
    						<h6>Free Returns</h6>
    						<p>Highest quality but lowest prices</p>
    					</div>
    				</li>
    				<li>
    					<div class="info-block">
    						<span class="bag-icon">							
    							<i class="fas fa-truck-moving"></i>
    						</span>
    					</div>
    					<div class="info-block-content">
    						<h6>Secure Shopping</h6>
    						<p>SHA-2 and 2048-bit encryption</p>
    					</div>
    				</li>
    				<li>
    					<div class="info-block">
    						<span>    							
    							<i class="fas fa-credit-card"></i>
    						</span>
    					</div>
    					<div class="info-block-content">
    						<h6>Credit & Debit Cards</h6>
    						<p>All major cards accepted</p>
    					</div>
    				</li>
    			</ul>
    		</div>
    	</div>
    </section>
	<!-- CARD DETAILS END -->

	<!-- MEGATAN -->
	<section class="megatan-sec">
		<div class="container">
			<div class="megatan_content">

				<div class="head text-center">
					<h1>Melanotan 2 from MEGATAN</h1>
					<div class="title-divider"></div>
					<p>MEGATAN is Europe's #1 supplier of the highest grade of Melanotan 2 tanning injections, but unlike other greedy competitors will not charge you a premium...</p>
					<a href="{{route('shop','')}}" class="btn main-btn">Top Categories</a>
				</div>
				<!-- CARD -->
				<!-- carousel -->
				   <x-top-category/>
				<!-- carousel end-->
				<!-- CARD END -->
			</div>
		</div>
	</section>
	<!-- MEGATAN END -->

	<!-- Featured Products -->
	<section class="feature-product-sec">
		<div class="container">
			<div class="feature-product_content">
				<div class="head text-center">
					<h1>Featured Products</h1>
					<div class="title-divider"></div>
					<p>Whether you are a dedicated Melanotan 2 tanning injection user or just starting out, then you will everything you need at MEGATAN. We also supply many other suppliers thanks to our fantastic bulk prices, if you want a quantity not listed then just get in touch.</p>
				</div>
				<!-- card -->

		            <ul id="tabs" class="nav nav-tabs">
		                <li class="nav-item"><a href="" data-target="#Products-1" data-toggle="tab" class="nav-link small text-uppercase active">Featured Products</a></li>
		                <li class="nav-item"><a href="" data-target="#Products-2" data-toggle="tab" class="nav-link small text-uppercase">Bestsellers</a></li>
		            </ul>
		            <br>
		            <div id="tabsContent" class="tab-content">
		                <div id="Products-1" class="tab-pane fade active show">
		       				<!-- carousel -->
                                <x-feature-product/>
				            <!-- carousel end-->
		                </div>
		                <div id="Products-2" class="tab-pane fade">
					        <!-- carousel -->
				               <x-best-seller-product/>
							<!-- carousel end-->
		                </div>
		            </div>				
				<!-- carousel -->
					
				<!-- carousel end-->
				<!-- card end -->
				<div class="feature-button">
					<a href="{{route('shop','')}}" class="btn main-btn">See all products <i class="fas fa-long-arrow-alt-right"></i></a>
				</div>
			</div>
		</div>
	</section>
	<!-- Featured Products END -->

    <!-- Starter Kits -->
       <x-category-product/>
	<!-- Starter Kits END  -->

	<!-- MEGATAN GALLERY -->
	<section class="megatan-gallery-sec">
		<div class="container">
			<div class="megatan-gallery_content">
				<div class="head text-center">
					<h1>Before & After Using Melanotan 2 From MEGATAN</h1>
					<div class="title-divider"></div>
					<p>Don't just take our word for it, take a look at just a small selection of customers who have got the tan of their dreams by using Melanotan 2 tanning injections from MEGATAN. If you would like to share your before and after pictures then please do get in contact and we will be happy to give you a Melanotan 2 10mg Starter Kit to say thanks.</p>					
				</div>
				<div class="cont">
			  <div class="page-head">
			  <div class="demo-gallery">
			    <ul id="lightgallery">
			      <li data-responsive="{{ asset('front/images/gallery-1.jpeg') }}" data-src="{{ asset('front/images/gallery-1.jpeg') }}">
			        <a href="">
			          <img class="img-responsive" src="{{ asset('front/images/gallery-1.jpeg') }}">
			          <div class="demo-gallery-poster">
			           <i class="fas fa-plus"></i>
			          </div>
			        </a>
			      </li>
			      <li data-responsive="{{ asset('front/images/gallery-2.jpeg') }}" data-src="{{ asset('front/images/gallery-2.jpeg') }}">
			        <a href="">
			          <img class="img-responsive" src="{{ asset('front/images/gallery-2.jpeg') }}">
			          <div class="demo-gallery-poster">
			           <i class="fas fa-plus"></i>
			          </div>
			        </a>
			      </li>
			      <li data-responsive="{{ asset('front/images/gallery-3.jpeg') }}" data-src="{{ asset('front/images/gallery-3.jpeg') }}">
			        <a href="">
			          <img class="img-responsive" src="{{ asset('front/images/gallery-3.jpeg') }}">
			          <div class="demo-gallery-poster">
			           <i class="fas fa-plus"></i>
			          </div>
			        </a>
			      </li>
			      <li data-responsive="{{ asset('front/images/gallery-4.jpeg') }}" data-src="{{ asset('front/images/gallery-4.jpeg') }}">
			        <a href="">
			          <img class="img-responsive" src="{{ asset('front/images/gallery-4.jpeg') }}">
			          <div class="demo-gallery-poster">
			           <i class="fas fa-plus"></i>
			          </div>
			        </a>
			      </li>
			      <li data-responsive="{{ asset('front/images/gallery-5.jpeg') }}" data-src="{{ asset('front/images/gallery-5.jpeg') }}">
			        <a href="">
			          <img class="img-responsive" src="{{ asset('front/images/gallery-5.jpeg') }}">
			          <div class="demo-gallery-poster">
			           <i class="fas fa-plus"></i>
			          </div>
			        </a>
			      </li>
			      <li data-responsive="{{ asset('front/images/gallery-6.jpeg') }}" data-src="{{ asset('front/images/gallery-6.jpeg') }}">
			        <a href="">
			          <img class="img-responsive" src="{{ asset('front/images/gallery-6.jpeg') }}">
			          <div class="demo-gallery-poster">
			           <i class="fas fa-plus"></i>
			          </div>
			        </a>
			      </li>
			      <li data-responsive="{{ asset('front/images/gallery-7.jpg') }}" data-src="{{ asset('front/images/gallery-7.jpg') }}">
			        <a href="">
			          <img class="img-responsive" src="{{ asset('front/images/gallery-7.jpg') }}">
			          <div class="demo-gallery-poster">
			           <i class="fas fa-plus"></i>
			          </div>
			        </a>
			      </li>
			      <li data-responsive="{{ asset('front/images/gallery-8.jpg') }}" data-src="{{ asset('front/images/gallery-8.jpg') }}">
			        <a href="">
			          <img class="img-responsive" src="{{ asset('front/images/gallery-8.jpg') }}">
			         <div class="demo-gallery-poster">
			           <i class="fas fa-plus"></i>
			          </div>
			        </a>
			      </li>
			      <li data-responsive="{{ asset('front/images/gallery-9.jpg') }}" data-src="{{ asset('front/images/gallery-9.jpg') }}">
			        <a href="">
			          <img class="img-responsive" src="{{ asset('front/images/gallery-9.jpg') }}">
			          <div class="demo-gallery-poster">
			           <i class="fas fa-plus"></i>
			          </div>
			        </a>
			      </li>
			    </ul>			    
			  </div>
			</div>
			</div>
		</div>
	</section>
	<!-- MEGATAN GALLERY END -->

	<!-- MEGATAN BLOG -->
        <x-blog/>
	<!-- MEGATAN BLOG END -->

	<!-- PEOPLE ABOUT US -->
        <x-people-about-us/>
	<!-- PEOPLE ABOUT US END -->
  
@endsection
