<section class="melanotan-tab-sec">
	<div class="container">
		<div class="Melanotan-tab_content">
	            <ul id="tabs" class="nav nav-tabs">
	            	<?php if(!is_null($recentlyviewedproducts)): ?>
	                <li class="nav-item"><a href="" data-target="#recently-viewd" data-toggle="tab" class="nav-link small text-uppercase <?php if(!is_null(!$recentlyviewedproducts)): ?> <?php echo e('active'); ?> <?php endif; ?>">Recently Viewed</a></li>
	                <?php endif; ?>
	                <?php if(!is_null($mostviewedproducts)): ?>
	                <li class="nav-item"><a href="" data-target="#most-viewed" data-toggle="tab" class="nav-link small text-uppercase <?php if(is_null($recentlyviewedproducts)): ?> <?php echo e('active'); ?> <?php endif; ?>">Most Viewed</a></li>
	                <?php endif; ?>
	            </ul>
	            <br>
	            <div id="tabsContent" class="tab-content">
	            	<?php if(!is_null($recentlyviewedproducts)): ?>
	                <div id="recently-viewd" class="tab-pane fade <?php if(!is_null($recentlyviewedproducts)): ?> <?php echo e('active show'); ?> <?php endif; ?>">
	                <!-- carousel -->
				 <div class="owl-carousel owl-theme megatan-tab-slider">
				 	<?php if($recentlyviewedproducts->count() > 0): ?>
				 	<?php $__currentLoopData = $recentlyviewedproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentlyviewedproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="item">
						<!-- card -->
						<div class="melanotan_card mini-card">
							<div class="img">
								<figure>
									<a href="<?php echo e(route('product.show',$recentlyviewedproduct->slug)); ?>">
										<img src="<?php echo e(productImage($recentlyviewedproduct->image)); ?>">

									</a>
									<div class="quickview-button">
									 <a href="<?php echo e(route('product-quick-view',base64_encode($recentlyviewedproduct->_id))); ?>" data-toggle="modal"  data-product-id="<?php echo e(base64_encode($recentlyviewedproduct->_id)); ?>" class="quickview_show">
						                    <div class="quickview_i" data-toggle="tooltip" data-placement="top" title="Quickview" >
						                        <i class="fas fa-search-plus"></i>
						                    </div>
						                </a>
									<!-- <span>Quickview</span> -->
								</div>
								</figure>
							</div>
							<div class="melanotan_content">
								<div class="name">
									<a href="<?php echo e(route('product.show',$recentlyviewedproduct->slug)); ?>">
										<?php echo e($recentlyviewedproduct->title ?? ''); ?>

									</a>
								</div>
								<div class="price">
									<p><?php echo e(priceFormat($recentlyviewedproduct->price)); ?></p>
								</div>
								<div class="rating-star">
									<?php echo starRating($recentlyviewedproduct); ?>

								</div>
								<div class="button-group">
									<ul>
										<li>
											<?php echo addToCart($recentlyviewedproduct,'shopping-icon','',false); ?>

										</li>
										<li>
											 <?php echo wishlistbtn($recentlyviewedproduct); ?>

										</li>
										<li>
											<?php echo comparebtn($recentlyviewedproduct,'campare-icon'); ?>

										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- card end-->		
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
				</div>
		    	<!-- carousel end-->
	                </div>
	               <?php endif; ?> 
	               <?php if(!is_null($mostviewedproducts)): ?>
	                <div id="most-viewed" class="tab-pane fade <?php if(is_null($recentlyviewedproducts)): ?> <?php echo e('active show'); ?> <?php endif; ?>">
	                    <!-- carousel -->
						<div class="owl-carousel owl-theme megatan-tab-slider-1">
		                    <?php if($mostviewedproducts->count() > 0): ?>
						 	<?php $__currentLoopData = $mostviewedproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mostviewedproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="item">
								<!-- card -->
								<div class="melanotan_card mini-card">
									<div class="img">
										<figure>
											<a href="<?php echo e(route('product.show',$mostviewedproduct->slug)); ?>">
												<img src="<?php echo e(productImage($mostviewedproduct->image)); ?>">

											</a>
											<div class="quickview-button">
											 <a href="<?php echo e(route('product-quick-view',base64_encode($mostviewedproduct->_id))); ?>" data-toggle="modal"  data-product-id="<?php echo e(base64_encode($mostviewedproduct->_id)); ?>" class="quickview_show">
								                    <div class="quickview_i" data-toggle="tooltip" data-placement="top" title="Quickview" >
								                        <i class="fas fa-search-plus"></i>
								                    </div>
								                </a>
											<!-- <span>Quickview</span> -->
										</div>
										</figure>
									</div>
									<div class="melanotan_content">
										<div class="name">
											<a href="<?php echo e(route('product.show',$mostviewedproduct->slug)); ?>">
												<?php echo e($mostviewedproduct->title ?? ''); ?>

											</a>
										</div>
										<div class="price">
											<p><?php echo e(priceFormat($mostviewedproduct->price)); ?></p>
										</div>
										<div class="rating-star">
											<?php echo starRating($mostviewedproduct); ?>

										</div>
										<div class="button-group">
											<ul>
												<li>
													<?php echo addToCart($mostviewedproduct,'shopping-icon','',false); ?>

												</li>
												<li>
													 <?php echo wishlistbtn($mostviewedproduct); ?>

												</li>
												<li>
													<?php echo comparebtn($mostviewedproduct,'campare-icon'); ?>

												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- card end-->		
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
						</div>
			           <!-- carousel end-->
	                </div>
	                <?php endif; ?>
	            </div>				
		</div>
	</div>
</section>
<?php /**PATH E:\GIT\Laravel\Ecommerce\resources\views/components/viewed-product.blade.php ENDPATH**/ ?>