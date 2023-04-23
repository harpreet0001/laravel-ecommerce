<div class="header-search-wrap mobile-search-div">
    <div class="header-search">
        <form method="get" action="<?php echo e(route('search')); ?>">
            <div class="custom-select-header">
                <select class="js-example-basic-single" name="cId">
                    <?php if(isset($categories)): ?>
                        <option value=""> All</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e(base64_encode($category->_id)); ?>"  <?php if(isset($selectedCategory->_id) && $selectedCategory->_id == $category->_id): ?> <?php echo e('selected'); ?><?php elseif(isset(request()->cId) && request()->cId == base64_encode($category->_id)): ?> <?php echo e('selected'); ?> <?php endif; ?> ><?php echo e($category->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="inner-wrap">
                <input type="text" placeholder="Search here..." name="search" data-search-url="<?php echo e(route('search-query')); ?>" value="<?php echo e($search ?? (request()->search ?? '')); ?>" autocomplete="OFF" />
                <button type="submit"><i class="fa fa-search"></i></button>
                <div class="tt-menu .tt-empty" style="display: none">
                    <div class="tt-dataset tt-dataset-0">
                        <div class="search-result tt-suggestion tt-selectable">
                            <?php if(isset($products) && $products->count() > 0): ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('product.show',$product->slug)); ?>">
                                <img src="<?php echo e(imagePath($product->image)); ?>">
                                <span class="">
                                    <span class="product-name"><?php echo e($product->title); ?></span>
                                    <span class="price"><?php echo e(priceFormat($product->price)); ?></span>
                                </span>
                            </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <p>Search result empty</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div><?php /**PATH /home/megatanws/public_html/web/resources/views/components/header-search.blade.php ENDPATH**/ ?>