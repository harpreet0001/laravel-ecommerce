<div class="owl-carousel owl-theme feature-slider">
	<?php if(isset($products) && count($products->toArray()) > 0): ?>
	 <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	   	<div class="item">					
		       <div class="feature_card">
        <figure>
            <a href="<?php echo e(route('product.show',$product->slug)); ?>">
                <img src="<?php echo e(productImage($product->image)); ?>" class="img-fluid">
                <div class="product-labels">
                  <!-- calling-helper-function -->
                  <?php if(isset($product->showcondition) && $product->showcondition): ?>
                   <?php echo getCondition($product->condition); ?> 
                  <?php endif; ?> 
                  <!-- calling-helper-function end-->
                </div>
            </a>
            <div class="quickview-button">
                <a href="<?php echo e(route('product-quick-view',base64_encode($product->_id))); ?>" data-toggle="modal"  data-product-id="<?php echo e(base64_encode($product->_id)); ?>" class="quickview_show">
                    <div class="quickview_i" data-toggle="tooltip" data-placement="top" title="Quickview" >
                        <i class="fas fa-search-plus"></i>
                    </div>
                </a>
            </div>
            <div class="rating-star-i">
                 <?php echo starRating($product); ?>

            </div>
        </figure>
        <figcaption>
            <div class="top">
                <a href="<?php echo e(route('product.show',$product->slug)); ?>" ><?php echo e($product->title ?? ''); ?></a>
                <span>
                    <?php echo e($product->weight); ?>gm
                </span>
            </div>
            
            <div class="wrapper">
                <div class="name">
                    <a href="<?php echo e(route('product.show',$product->slug)); ?>" ><?php echo e($product->title); ?></a>
                </div>
                <div class="description"></div>
                <div class="price">
                    <div><span class="price-normal"><?php echo e(priceFormat($product->price)); ?></span></div>
                </div>
                <div class="buttons-wrapper">
                    <div class="cart-group">
                       <!-- add-to-cart -->
                       <?php echo addToCart($product,'main-btn','ADD TO CART'); ?>

                       <!-- add-to-cart -->
                    </div>
                    <div class="wish-group">
                        <!-- wishlist-btn -->
                        <?php echo wishlistbtn($product); ?>

                        <!-- wishlist-btn -->
                        <!-- compare-btn -->
                        <?php echo comparebtn($product,'campare-icon'); ?>

                        <!-- compare-btn -->
                    </div>
                </div>
            </div>
            <div class="bottom">
                  <!-- buy-now -->
                  <?php echo buyNow($product,'buy-now-button','Buy Now'); ?>

                  <!-- buy-now -->
                <!-- <a href="javascript:void(0);" data-toggle="modal" data-target="#Question-modal"><i class="far fa-question-circle"></i> Question</a> -->
            </div>
        </figcaption>
    </div>
	    </div>
	 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
	<?php endif; ?>

</div><?php /**PATH E:\Projects\resources\views/components/best-seller-product.blade.php ENDPATH**/ ?>