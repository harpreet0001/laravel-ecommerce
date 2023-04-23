<?php $__env->startSection('meta-data'); ?>
 <meta name="description" content="Place your order with UK’s most trusted Melanotan 2 injections suppliers today. We assure quality deliveries with Melanotan 2 injections, nasal spray and kits." />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
									<img src="<?php echo e(asset('front/images/banner1.jpg')); ?>" class="img-fluid">
								</figure>
								<div class="content-img">
									<p>Welcome to MEGATAN</p>
									<a href="<?php echo e(route('shop','')); ?>" class="btn banner-btn-content">SHOP NOW <i class="fas fa-arrow-right"></i></a>
								</div>					
								</a>			
							</div>						
						</div>	
						<div class="item">					
							<div class="banner_card banner-img-2">
								<a href="javascript:void(0);">
								<figure>
									<img src="<?php echo e(asset('front/images/banner2.jpg')); ?>" class="img-fluid">
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
									<img src="<?php echo e(asset('front/images/banner3.jpg')); ?>" class="img-fluid">
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
					<a href="<?php echo e(route('shop','')); ?>" class="btn main-btn">Top Categories</a>
				</div>
				<!-- CARD -->
				<!-- carousel -->
				    <?php if (isset($component)) { $__componentOriginal809405b023101837100c67be2ea9ee822e697b6d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TopCategory::class, []); ?>
<?php $component->withName('top-category'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal809405b023101837100c67be2ea9ee822e697b6d)): ?>
<?php $component = $__componentOriginal809405b023101837100c67be2ea9ee822e697b6d; ?>
<?php unset($__componentOriginal809405b023101837100c67be2ea9ee822e697b6d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
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
                                 <?php if (isset($component)) { $__componentOriginal1ba806f3a7a165423f92afa59756fd6d77c4d2ad = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FeatureProduct::class, []); ?>
<?php $component->withName('feature-product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal1ba806f3a7a165423f92afa59756fd6d77c4d2ad)): ?>
<?php $component = $__componentOriginal1ba806f3a7a165423f92afa59756fd6d77c4d2ad; ?>
<?php unset($__componentOriginal1ba806f3a7a165423f92afa59756fd6d77c4d2ad); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
				            <!-- carousel end-->
		                </div>
		                <div id="Products-2" class="tab-pane fade">
					        <!-- carousel -->
				                <?php if (isset($component)) { $__componentOriginal70b0264389f659fb7a02ae4011367cb5258eb7ef = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BestSellerProduct::class, []); ?>
<?php $component->withName('best-seller-product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal70b0264389f659fb7a02ae4011367cb5258eb7ef)): ?>
<?php $component = $__componentOriginal70b0264389f659fb7a02ae4011367cb5258eb7ef; ?>
<?php unset($__componentOriginal70b0264389f659fb7a02ae4011367cb5258eb7ef); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
							<!-- carousel end-->
		                </div>
		            </div>				
				<!-- carousel -->
					
				<!-- carousel end-->
				<!-- card end -->
				<div class="feature-button">
					<a href="<?php echo e(route('shop','')); ?>" class="btn main-btn">See all products <i class="fas fa-long-arrow-alt-right"></i></a>
				</div>
			</div>
		</div>
	</section>
	<!-- Featured Products END -->

    <!-- Starter Kits -->
        <?php if (isset($component)) { $__componentOriginal7e4ed43ae7dfb29d6c112f1a548548886217b57e = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CategoryProduct::class, []); ?>
<?php $component->withName('category-product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal7e4ed43ae7dfb29d6c112f1a548548886217b57e)): ?>
<?php $component = $__componentOriginal7e4ed43ae7dfb29d6c112f1a548548886217b57e; ?>
<?php unset($__componentOriginal7e4ed43ae7dfb29d6c112f1a548548886217b57e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
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
			      <li data-responsive="<?php echo e(asset('front/images/gallery-1.jpeg')); ?>" data-src="<?php echo e(asset('front/images/gallery-1.jpeg')); ?>">
			        <a href="">
			          <img class="img-responsive" src="<?php echo e(asset('front/images/gallery-1.jpeg')); ?>">
			          <div class="demo-gallery-poster">
			           <i class="fas fa-plus"></i>
			          </div>
			        </a>
			      </li>
			      <li data-responsive="<?php echo e(asset('front/images/gallery-2.jpeg')); ?>" data-src="<?php echo e(asset('front/images/gallery-2.jpeg')); ?>">
			        <a href="">
			          <img class="img-responsive" src="<?php echo e(asset('front/images/gallery-2.jpeg')); ?>">
			          <div class="demo-gallery-poster">
			           <i class="fas fa-plus"></i>
			          </div>
			        </a>
			      </li>
			      <li data-responsive="<?php echo e(asset('front/images/gallery-3.jpeg')); ?>" data-src="<?php echo e(asset('front/images/gallery-3.jpeg')); ?>">
			        <a href="">
			          <img class="img-responsive" src="<?php echo e(asset('front/images/gallery-3.jpeg')); ?>">
			          <div class="demo-gallery-poster">
			           <i class="fas fa-plus"></i>
			          </div>
			        </a>
			      </li>
			      <li data-responsive="<?php echo e(asset('front/images/gallery-4.jpeg')); ?>" data-src="<?php echo e(asset('front/images/gallery-4.jpeg')); ?>">
			        <a href="">
			          <img class="img-responsive" src="<?php echo e(asset('front/images/gallery-4.jpeg')); ?>">
			          <div class="demo-gallery-poster">
			           <i class="fas fa-plus"></i>
			          </div>
			        </a>
			      </li>
			      <li data-responsive="<?php echo e(asset('front/images/gallery-5.jpeg')); ?>" data-src="<?php echo e(asset('front/images/gallery-5.jpeg')); ?>">
			        <a href="">
			          <img class="img-responsive" src="<?php echo e(asset('front/images/gallery-5.jpeg')); ?>">
			          <div class="demo-gallery-poster">
			           <i class="fas fa-plus"></i>
			          </div>
			        </a>
			      </li>
			      <li data-responsive="<?php echo e(asset('front/images/gallery-6.jpeg')); ?>" data-src="<?php echo e(asset('front/images/gallery-6.jpeg')); ?>">
			        <a href="">
			          <img class="img-responsive" src="<?php echo e(asset('front/images/gallery-6.jpeg')); ?>">
			          <div class="demo-gallery-poster">
			           <i class="fas fa-plus"></i>
			          </div>
			        </a>
			      </li>
			      <li data-responsive="<?php echo e(asset('front/images/gallery-7.jpg')); ?>" data-src="<?php echo e(asset('front/images/gallery-7.jpg')); ?>">
			        <a href="">
			          <img class="img-responsive" src="<?php echo e(asset('front/images/gallery-7.jpg')); ?>">
			          <div class="demo-gallery-poster">
			           <i class="fas fa-plus"></i>
			          </div>
			        </a>
			      </li>
			      <li data-responsive="<?php echo e(asset('front/images/gallery-8.jpg')); ?>" data-src="<?php echo e(asset('front/images/gallery-8.jpg')); ?>">
			        <a href="">
			          <img class="img-responsive" src="<?php echo e(asset('front/images/gallery-8.jpg')); ?>">
			         <div class="demo-gallery-poster">
			           <i class="fas fa-plus"></i>
			          </div>
			        </a>
			      </li>
			      <li data-responsive="<?php echo e(asset('front/images/gallery-9.jpg')); ?>" data-src="<?php echo e(asset('front/images/gallery-9.jpg')); ?>">
			        <a href="">
			          <img class="img-responsive" src="<?php echo e(asset('front/images/gallery-9.jpg')); ?>">
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
         <?php if (isset($component)) { $__componentOriginalf8480ff2eba6623f695f3b1309bdbf4aa1fedfad = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Blog::class, []); ?>
<?php $component->withName('blog'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalf8480ff2eba6623f695f3b1309bdbf4aa1fedfad)): ?>
<?php $component = $__componentOriginalf8480ff2eba6623f695f3b1309bdbf4aa1fedfad; ?>
<?php unset($__componentOriginalf8480ff2eba6623f695f3b1309bdbf4aa1fedfad); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
	<!-- MEGATAN BLOG END -->

	<!-- PEOPLE ABOUT US -->
         <?php if (isset($component)) { $__componentOriginal626bd85aa88accc1587d1ba72ae21c7047303494 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PeopleAboutUs::class, []); ?>
<?php $component->withName('people-about-us'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal626bd85aa88accc1587d1ba72ae21c7047303494)): ?>
<?php $component = $__componentOriginal626bd85aa88accc1587d1ba72ae21c7047303494; ?>
<?php unset($__componentOriginal626bd85aa88accc1587d1ba72ae21c7047303494); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
	<!-- PEOPLE ABOUT US END -->
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.layout',['pageslug' => 'home','pageTitle' => 'Melanotan 2 Injections UK Suppliers | Melanotan 2 |Megatan'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\GIT\Laravel\Ecommerce\resources\views/front/modules/main/front.blade.php ENDPATH**/ ?>