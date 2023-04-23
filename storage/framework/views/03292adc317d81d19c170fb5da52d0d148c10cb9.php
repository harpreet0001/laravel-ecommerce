<!-- Starter Kits -->
<section class="starter-kits-sec People-Bought-sec">
    <div class="container">
        <div class="starter-kits_content">
            <div class="item_content">
                <div class="item-head">
                    <a href="<?php echo e(Request::url()); ?>">People Also Bought</a>
                </div>
            </div>
            <!-- row -->
            <div class="starter-wrapper">
                <div class="starter-col-2">
                    <!-- carousel -->
                    <div class="owl-carousel owl-theme People-Bought-slider">
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="item">
                                <div class="starter-card">
                                    <figure>
                                        <a href="<?php echo e(route('product.show',$product->slug)); ?>">
                                            <img src="<?php echo e(imagePath($product->image)); ?>">
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
                                    </figure>
                                    <figcaption>
                                        <div class="wrapper">
                                            <div class="name">
                                               <a href="<?php echo e(route('product.show',$product->slug)); ?>" ><?php echo e($product->title ?? ''); ?></a>
                                            </div>
                                            <div class="price">
                                                <p><?php echo e(priceFormat($product->price)); ?></p>
                                            </div>
											<div class="wrapper-button">
                                            <div class="buttons-wrapper">
                                                <div class="cart-group">
                                                    <!-- add-to-cart -->
                                                    <?php echo addToCart($product,'mini-btn','ADD TO CART',false,''); ?>

                                                     <!-- add-to-cart -->
                                                </div>
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
                                    </figcaption>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </div>
                    <!-- carousel end-->
                </div>
            </div>
            <!-- row end -->
        </div>
    </div>
</section>
<!-- Starter Kits END  --><?php /**PATH E:\Projects\resources\views/components/people-also-bought.blade.php ENDPATH**/ ?>