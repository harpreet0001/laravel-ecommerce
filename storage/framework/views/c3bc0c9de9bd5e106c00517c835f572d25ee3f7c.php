<section class="starter-kits-sec">
	<div class="container">
		<div class="starter-kits_content">
			<div class="head text-center">
				<h1><?php echo e($category->title); ?></h1>
				<div class="title-divider"></div>
				<p><?php echo $category->description; ?></p>					
			</div>
			<!-- row -->
			<div class="starter-wrapper">
				<div class="starter-col-1">
					<div class="starter-card">

						<div class="item_content">
							<div class="item-head">
								<a href="javascript:void(0);">
									<?php echo e($category->title); ?>

								</a>
							</div>
						<figure>
							<a href="<?php echo e(route('shop',$category->slug)); ?>">
								<img src="<?php echo imagePath($category->image); ?>" class="img-fluid">
							</a>
						</figure>	
						</div>
					</div>
				</div>
				<div class="starter-col-2">
				<!-- carousel -->
					<div class="owl-carousel owl-theme Starter-slider">
						<?php if(isset($products) && count($products->toArray()) > 0): ?>
						    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="item">
									<div class="starter-card">
										<figure>
											<a href="<?php echo e(route('product.show',$product->slug)); ?>">
												<img src="<?php echo e(productImage($product->image)); ?>">
											<div class="product-labels">
												<?php if(isset($product->showcondition) && $product->showcondition): ?>
								                   <?php echo getCondition($product->condition); ?> 
								                <?php endif; ?> 				
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
												<div class="buttons-wrapper">
													<div class="cart-group">
														 <!-- add-to-cart -->
									                       <?php echo addToCart($product,'btn mini-btn','ADD TO CART',false); ?>

									                       <!-- add-to-cart -->
														<!-- <a href="javascript:void" class="btn mini-btn">Add to Cart</a> -->
													</div>
													<div class="wish-group">
														<!-- wishlist-btn -->
								                         <?php echo wishlistbtn($product); ?>

								                        <!-- wishlist-btn -->
								                        <!-- compare-btn -->
								                         <?php echo comparebtn($product,'campare-icon'); ?>

								                        <!-- compare-btn -->
														<!-- <a href="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wish List"><i class="far fa-heart"></i></a>
														<a href="javascript:void(0);" class="campare-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Campare this Product"><i class="far fa-heart"></i></a> -->
													</div>
												</div>
											</div>
										</figcaption>
									</div>
								</div>
						    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						    <?php else: ?>
						<?php endif; ?>
					</div>
			   <!-- carousel end-->	
				</div>
			</div>
			<!-- row end -->
		</div>
	</div>
</section><?php /**PATH /home/megatanws/public_html/web/resources/views/components/category-product.blade.php ENDPATH**/ ?>