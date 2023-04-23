<div class="owl-carousel owl-theme aside-slider">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="item">
        <div class="aside-slider_card">
            <figure>
                <a href="<?php echo e(route('product.show',$product->slug)); ?>">
                    <img src="<?php echo e(imagepath($product->image)); ?>" class="img-fluid">
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
                             <!-- add-to-cart -->
                               <?php echo addToCart($product,'main-btn','',false); ?>

                              <!-- add-to-cart -->
                        </li>
                        <li>
                            <!-- wishlist-btn -->
                               <?php echo wishlistbtn($product); ?>

                            <!-- wishlist-btn -->
                        </li>
                        <li>
                            <!-- compare-btn -->
                               <?php echo comparebtn($product,'campare-icon'); ?>

                            <!-- compare-btn -->
                        </li>
                    </ul>
                </div>
            </figure>
            <figcaption>
                <div class="name"><a href="<?php echo e(route('product.show',$product->slug)); ?>"><?php echo e($product->title ?? ''); ?></a></div>
                <div class="price">
                    <div>
                        <span class="price-normal"><?php echo e(priceFormat($product->price)); ?></span>
                    </div>
                </div>
            </figcaption>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH E:\Projects\resources\views/components/product.blade.php ENDPATH**/ ?>