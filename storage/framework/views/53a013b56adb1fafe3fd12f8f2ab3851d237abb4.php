<div class="owl-carousel owl-theme megatan-slider">
	<?php if(isset($topcategories) && count($topcategories->toArray()) > 0): ?>
	 <?php $__currentLoopData = $topcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	  	<div class="item">					
			<div class="megatan_card">
				<figure>
					<a href="<?php echo e(route('shop',$topcategory->slug)); ?>">
						<img src="<?php echo e(productImage($topcategory->image)); ?>" class="img-fluid">
					</a>
					<div class="megatan-btn">
						<a href="<?php echo e(route('shop',$topcategory->slug)); ?>"><?php echo e($topcategory->title); ?></a>
					</div>
				</figure>
			</div>				
		</div>
	 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
</div><?php /**PATH E:\GIT\Laravel\Ecommerce\resources\views/components/top-category.blade.php ENDPATH**/ ?>