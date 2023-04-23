<?php $__env->startSection('content'); ?>
<!-- breadcrumb -->
<?php $__env->startComponent('front.includes.breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="<?php echo e(route('compare.show')); ?>">Compare</a></li>
<?php if (isset($__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941)): ?>
<?php $component = $__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941; ?>
<?php unset($__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<!-- breadcrumb end-->
<!-- page-title -->
    <!-- page-title -->
<?php $__env->startComponent('front.includes.page_title'); ?>
 <h1 class="title page-title"><span>Compare</span></h1>
<?php if (isset($__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a)): ?>
<?php $component = $__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a; ?>
<?php unset($__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
    <!-- page-title  end-->

<div id="product-compare" class="container">
    <div class="row">
        <div id="content" class="col-sm-12">
            <?php if(isset($products) && $products->count() > 0): ?>
                   <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td colspan="5"><strong>Product Details</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php ($count_of_products = $products->count()); ?>
                            <tr class="compare-name">
                                <td>Product</td>
                                <?php for($i=0;$i<$count_of_products;$i++): ?>
                                  <td><a href="<?php echo e(route('product.show',$products[$i]->slug)); ?>"><strong><?php echo e($products[$i]->title); ?></strong></a></td>
                                <?php endfor; ?>
                            </tr>
                            <tr class="compare-image">
                                <td>Image</td>
                                <?php for($i=0;$i<$count_of_products;$i++): ?>
                                  <td class="text-left">
                                    <img src="<?php echo e(imagePath($products[$i]->image)); ?>"  title="<?php echo e($products[$i]->title); ?>" class="img-thumbnail">
                                </td>
                                <?php endfor; ?>
                            </tr>
                            <tr class="compare-price">
                                <td>Price</td>
                                <?php for($i=0;$i<$count_of_products;$i++): ?>
                                   <td class=""><?php echo e(priceFormat($products[$i]->price)); ?></td>
                                <?php endfor; ?>
                            </tr>
                            <tr class="compare-model">
                                <td>Model</td>
                                <?php for($i=0;$i<$count_of_products;$i++): ?>
                                   <td class=""><?php echo e($products[$i]->model ?? ''); ?></td>
                                <?php endfor; ?>
                            </tr>
                            <tr class="compare-manufacturer">
                                <td>Brand</td>
                                <?php for($i=0;$i<$count_of_products;$i++): ?>
                                   <td class=""><?php echo e($products[$i]->brand ?? ''); ?></td>
                                <?php endfor; ?>
                            </tr>
                            <tr class="compare-availability product-stats">
                                <td>Availability</td>
                                <?php for($i=0;$i<$count_of_products;$i++): ?>
                                   <td class=""><ul class="list-unstyled"><?php echo getStockLevel($products[$i]); ?></ul></td>
                                <?php endfor; ?>
                            </tr>
                            <tr class="compare-rating">
                                <td>Rating</td>
                                <?php for($i=0;$i<$count_of_products;$i++): ?>
                                    <td>
                                        <div class="rating-star">
                                            <ul>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                        </div>
                                        Based on 52 reviews.
                                    </td>
                                <?php endfor; ?>
                            </tr>
                            <tr class="compare-summary">
                                <td>Summary</td>
                                <?php for($i=0;$i<$count_of_products;$i++): ?>
                                   <td class="description"><?php echo $products[$i]->description ?? ''; ?></td>
                                <?php endfor; ?>
                            </tr>
                            <tr class="compare-weight">
                                <td>Weight</td>
                                <?php for($i=0;$i<$count_of_products;$i++): ?>
                                   <td class="description"><?php echo $products[$i]->weight ?? ''; ?></td>
                                <?php endfor; ?>
                            </tr>
                            <tr class="compare-dimensions">
                                <td>Dimensions (L x W x H)</td>
                                <?php for($i=0;$i<$count_of_products;$i++): ?>
                                   <td class="description"><?php echo e($products[$i]->depth); ?> x <?php echo e($products[$i]->depth); ?> x <?php echo e($products[$i]->depth); ?></td>
                                <?php endfor; ?>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <?php for($i=0;$i<$count_of_products;$i++): ?>
                                   <td class=" out-of-stock">
                                    <div class="compare-buttons">
                                        <!-- add-to-cart -->
                                           <?php echo addToCart($products[0],'btn main-btn add-to_cart-btn','ADD TO CART',false); ?>

                                           <!-- add-to-cart -->
                                        <a href="<?php echo e(route('compare.remove',base64_encode($products[0]->_id))); ?>" class="btn main-btn btn-danger btn-remove"><span>Remove</span></a>
                                    </div>
                                </td>
                                <?php endfor; ?>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            <?php else: ?>
             <div class="compare-add-div">
                <p>You have not chosen any products to compare.</p>
                <div class="buttons">
                    <div class="pull-right"><a href="<?php echo e(route('home')); ?>" class="btn btn-default"><span>Continue</span></a></div>
                </div>
             </div>
            <?php endif; ?>

            
        </div>
    </div>
</div>
<!-- page-title  end-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.layout',['pageslug' => 'Compare'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/front/modules/main/compare.blade.php ENDPATH**/ ?>