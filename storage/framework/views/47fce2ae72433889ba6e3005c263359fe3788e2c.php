<!-- about us -->
<section class="about-us-sec">
	<div class="container">
		<div class="about-us_content">
			<div class="head text-center">
				<h1>What are people saying about us</h1>
				<div class="title-divider"></div>		
			</div>
			<!-- card -->
			<!-- carousel -->
				<div class="owl-carousel owl-theme about-us-slider">
					<?php if(isset($product_reviews)): ?>
					  <?php $__currentLoopData = $product_reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="item">
							<div class="about-us_card">
								<div class="block-header">
									<img src="<?php echo e(asset('front/images/quotes.png')); ?>" class="img-fluid">
								</div>
								<div class="block-content block-text"><?php echo $product_review->review; ?></div>
								<div class="block-footer">- <?php echo ucwords($product_review->posted_by); ?></div>
								
							</div>
						</div>
					  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
				</div>
			<!-- carousel end-->
			<!-- card end -->
		</div>
	</div>
</section>
<!-- about us end --><?php /**PATH E:\GIT\Laravel\Ecommerce\resources\views/components/people-about-us.blade.php ENDPATH**/ ?>