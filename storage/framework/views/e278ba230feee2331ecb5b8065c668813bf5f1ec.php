<!-- loop over products-->
<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
  <?php ($starRatingVal = starRating($product)); ?>
<div class="product-layout">
    <div class="feature_card">
        <?php
             
             if(is_null($selectedCategory))
             {
                 $selectedCategory = $product->categoryList()->first();
             }
        ?>
        <figure>
            <a href="<?php echo e(route('product.show',$product->slug)); ?>?cId=<?php echo e(base64_encode($selectedCategory->_id)); ?>">
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
                <?php echo $starRatingVal; ?>

            </div>
        </figure>
        <figcaption>
            <div class="top">
                <a href="<?php echo e(route('product.show',$product->slug)); ?>" ><?php echo e($product->title ?? ''); ?></a>
                <span>
                    <?php echo e($product->weight); ?>gm
                </span>
            </div>
            <div class="stats">
                <?php
                    $brand_product_route = '';
                    $brand = $product->getProductBrand;
                ?>
                <?php if(!is_null($brand)): ?>
                    <?php ($brand_product_route = route('brand.products',base64_encode($brand->_id)).'?cId='.base64_encode($selectedCategory->_id)); ?>  
                <span class="stat-1"><span class="stats-label">Brand:</span> <span><a href="<?php echo e($brand_product_route); ?>"><?php echo e($product->getProductBrand->title ?? ''); ?></a></span></span>
                <?php endif; ?>
                <?php if(!is_null($selectedCategory)): ?>
                  <span class="stat-2"><span class="stats-label">Category:</span> <span><?php echo e($selectedCategory->title ?? ''); ?></span></span>
                <?php endif; ?>
            </div>
            <div class="rating-star">
                <?php echo $starRatingVal; ?>

            </div>
            <div class="wrapper">
                <div class="name">
                    <a href="<?php echo e(route('product.show',$product->slug)); ?>" ><?php echo e($product->title); ?></a>
                </div>
                <div class="description"><?php echo $product->description; ?></div>
                <div class="price">
                    <div><span class="price-normal"><?php echo e(priceFormat($product->price)); ?></span></div>
                    <p><?php echo e(priceFormat($product->price)); ?></p>
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
                 <!-- <a href="javascript:void(0);" data-toggle="modal" data-target="#Question-modal"><i class="far fa-question-circle"></i> Question </a> -->
            </div>
        </figcaption>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
  <div>There are no products to list in this category.</div>   
<?php endif; ?>
<!--pagination-->
<div class="ias-noneleft" style="text-align: center;" id="ias_noneleft_1623054297859"><?php echo e($products->appends(request()->input())->links()); ?></div>
<!--pagination end-->
<?php /**PATH E:\Projects\resources\views/front/modules/main/shop/product_list.blade.php ENDPATH**/ ?>