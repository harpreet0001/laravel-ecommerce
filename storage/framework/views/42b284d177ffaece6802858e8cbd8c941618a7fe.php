<?php $__env->startSection('content'); ?>
    <!--meta-data-->
    <?php $__env->startSection('meta-data'); ?>
        <meta name="description" content="<?php echo e($product->metadescription); ?>">
        <meta name="keywords" content="<?php echo e($product->metakeywords); ?>">
    <?php $__env->stopSection(); ?>
    <!--meta-data-end-->
	<!-- breadcrumb -->
	<?php $__env->startComponent('front.includes.breadcrumb'); ?>
	  <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i></a></li>
	  <li class="breadcrumb-item">
	  	<a href="<?php echo e(route('shop',$selectedCategory->slug)); ?>">
	  		<?php echo e($selectedCategory->title ?? ''); ?>

	  	</a>
	  </li>
      <li class="breadcrumb-item"><a href="<?php echo e(route('product.show',$product->slug)); ?>"><?php echo e($selectedCategory->title ?? ''); ?></a></li>
	<?php if (isset($__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941)): ?>
<?php $component = $__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941; ?>
<?php unset($__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
	<!-- breadcrumb end-->

	<!-- page-title -->
	<?php $__env->startComponent('front.includes.page_title'); ?>
	 <h1 class="title page-title"><span><?php echo e($selectedCategory->title ?? ''); ?></span></h1>
	<?php if (isset($__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a)): ?>
<?php $component = $__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a; ?>
<?php unset($__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
	<!-- page-title  end-->

<section class="aside-sec">
    <div class="container">
        <div class="aside-_content">
            <div class="row">
                <aside class="side-column">
                    <div class="aside_links">
                        <h3 class="module-title">Categories</h3>
                        <!--sidebar category component-->
							   <?php if (isset($component)) { $__componentOriginal7dcb15db1c0ecaf75c67d2975e2425805c9dc802 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Category::class, ['selectedCategory' => $selectedCategory]); ?>
<?php $component->withName('category'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal7dcb15db1c0ecaf75c67d2975e2425805c9dc802)): ?>
<?php $component = $__componentOriginal7dcb15db1c0ecaf75c67d2975e2425805c9dc802; ?>
<?php unset($__componentOriginal7dcb15db1c0ecaf75c67d2975e2425805c9dc802); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
						<!--sidebar category component end-->
                        <!-- carousel -->
                        <div class="">
                            <!-- carousel -->
                                 <?php if (isset($component)) { $__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Product::class, ['categoryId' => $selectedCategory->_id]); ?>
<?php $component->withName('product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0)): ?>
<?php $component = $__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0; ?>
<?php unset($__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                            <!-- carousel end-->
                        </div>
                        <!-- carousel end -->
                    </div>
                </aside>
                <div class="right-content">
                    <!-- content -->
                    <div class="product-info has-extra-button">
                        <div class="product-left">
                            <div class="product-image">
                                <div class="feature_card zoom-card">
                                    <figure class="zoom" style="background-image: url(<?php echo e(imagePath($product->image)); ?>);">
                                        <img src="<?php echo e(imagePath($product->image)); ?>" class="img-fluid">
                                        <div class="product-labels">
                                            <?php echo getCondition($product->condition); ?>

                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="product-right">
                            <div id="product" class="product-details">
                                <div class="product-blocks blocks-top"> </div>
                                <div class="rating rating-page">
                                    <?php ($no_of_reviews = $product->reviews()->count()); ?>
                                    <div class="rating-star">
                                        <div class="all-star-rating">
                                            <span class="inner-star_spans">
                                                <div class="star-ratings">
                                                    <div class="fill-ratings" style="width:<?php echo e(fnPercentage($product->reviews()->sum('rating'),$no_of_reviews*5)); ?>%">
                                                      <span>🟊🟊🟊🟊🟊</span>
                                                    </div>
                                                    <div class="empty-ratings">
                                                      <span>🟊🟊🟊🟊🟊</span>
                                                    </div>
                                                </div>
                                            </span>
                                        </div>   
                                    </div>
                                    <div class="review-links">
                                     <a href="javascript:void(0);" id="list-all-reviews">Based on <?php echo e($no_of_reviews); ?> reviews.</a> <b>-</b> <a href="#" id="write-review-link">Write a review</a> </div>
                                </div>
                                <div class="product-price-group">
                                    <div class="price-wrapper">
                                        <div class="price-group">
                                            <div class="product-price"><?php echo e(priceFormat($product->price)); ?></div>
                                        </div>
                                        <div class="product-tax">weight: <?php echo e($product->weight); ?>gm</div>
                                    </div>
                                    <div class="product-stats">
                                        <ul class="list-unstyled">
                                        	<?php echo getStockLevel($product); ?>

                                        </ul>
                                        <div class="brand-image product-manufacturer">
                                            <?php
                                                  $brand_product_route = '';

                                                  $brand = $product->getProductBrand;
                                            ?>      

                                            <?php if(!is_null($brand)): ?>

                                               <?php ($brand_product_route = route('brand.products',base64_encode($brand->_id)).'?cId='.base64_encode($selectedCategory->_id)); ?>

                                            <a href="<?php echo e($brand_product_route); ?>">
                                               <!--  <img src="https://dev.megatan.ws/image/cache/catalog/logo-60x60w.png" srcset="https://dev.megatan.ws/image/cache/catalog/logo-60x60w.png 1x, https://dev.megatan.ws/image/cache/catalog/logo-120x120w.png 2x" alt="MEGATAN" width="60" height="60"> --> 
                                                <span><?php echo e($brand->title); ?></span>   
                                            </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="button-group-page">
                                    <div class="buttons-wrapper">
                                        <div class="stepper-group cart-group">
                                           <!-- add-to-cart -->
                                           <?php echo addToCart($product,'','ADD TO CART'); ?>

                                           <!-- add-to-cart -->
                                            
                                            <div class="extra-group">
                                                 <?php echo buyNow($product,'btn btn-extra btn-extra-46 btn-1-extra','Buy Now'); ?>

                                            </div>
                                        </div>
                                        <div class="wishlist-compare">
                                            <!-- wishlist-btn -->
                                                <?php echo wishlistbtn($product,"btn btn-wishlist","Add to Wish List"); ?>      
                                                <!-- wishlist-btn -->
                                            <!-- compare-btn -->
                                                <?php echo comparebtn($product,"btn btn-compare","Compare this Product"); ?>

                                            <!-- compare-btn -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--social link-->
                                <?php $__env->startComponent('components.social-share'); ?><?php if (isset($__componentOriginalb2e70f3d5ccc576ac7ca13df3a0054eaed26ef43)): ?>
<?php $component = $__componentOriginalb2e70f3d5ccc576ac7ca13df3a0054eaed26ef43; ?>
<?php unset($__componentOriginalb2e70f3d5ccc576ac7ca13df3a0054eaed26ef43); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?> 
                            <!-- social link end -->
                        </div>
                    </div>
                    <!-- content end -->
                    <div class="Description-tab-sec">
                        <!-- card -->
                        <ul id="tabs" class="nav nav-tabs">
                            <li class="nav-item"><a href="" data-target="#Products-1" data-toggle="tab" class="nav-link small text-uppercase active">Description</a></li>
                            <li class="nav-item"><a href="#all-review-link" data-target="#Products-2" data-toggle="tab" class="nav-link small text-uppercase" >Reviews</a></li>
                        </ul>
                        <br>
                        <div id="tabsContent" class="tab-content">
                            <div id="Products-1" class="tab-pane fade active show">
                                <div class="blocks_content">
                                    <!-- <p><b>Contents</b></p> -->
                                    <span class="blocks_content-inner">
                                        <?php echo $product->description; ?>

                                    </span>
                                </div>
                            </div>
                            <div id="Products-2" class="tab-pane fade">
                                <!--product-review component-->
                                  <?php if (isset($component)) { $__componentOriginald6569bd720352641a70c39b9df29af70642c4421 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ProductReview::class, ['productId' => $product->_id]); ?>
<?php $component->withName('product-review'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginald6569bd720352641a70c39b9df29af70642c4421)): ?>
<?php $component = $__componentOriginald6569bd720352641a70c39b9df29af70642c4421; ?>
<?php unset($__componentOriginald6569bd720352641a70c39b9df29af70642c4421); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                                 <!--product-review component End-->
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

 <?php if (isset($component)) { $__componentOriginal4c5ba0fa3d47366552f211bfb72867d65e113e20 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PeopleAlsoBought::class, ['categoryId' => $selectedCategory->_id]); ?>
<?php $component->withName('people-also-bought'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal4c5ba0fa3d47366552f211bfb72867d65e113e20)): ?>
<?php $component = $__componentOriginal4c5ba0fa3d47366552f211bfb72867d65e113e20; ?>
<?php unset($__componentOriginal4c5ba0fa3d47366552f211bfb72867d65e113e20); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {

        recentlyviewedproducts.add("<?php echo e(base64_encode($product->_id)); ?>","<?php echo e(route('product.incrementviewcount')); ?>");
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){

        $(".zoom").mousemove(function(e){
            zoom(e);
        });

        function zoom(e){
            var x, y;
            var zoomer = e.currentTarget;
            if(e.offsetX) {
                offsetX = e.offsetX;
            } else {
                offsetX = e.touches[0].pageX;
            }

            if(e.offsetY) {
                offsetY = e.offsetY;
            } else {
                offsetX = e.touches[0].pageX;
            }
            x = offsetX/zoomer.offsetWidth*100;
            y = offsetY/zoomer.offsetHeight*100;
            zoomer.style.backgroundPosition = x+'% '+y+'%';
        }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.layout',['pageTitle' => $product->pagetitle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/front/modules/main/product.blade.php ENDPATH**/ ?>