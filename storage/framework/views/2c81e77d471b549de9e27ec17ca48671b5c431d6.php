<div class="select-group">
	<div class="input-group input-group-sm sort-by">
		<label>Sort By:</label>
			<?php ($sortFiledArr = ['' => 'select','alpha-asc' => 'Alphabetical: A to Z', 'alpha-desc' => 'Alphabetical: Z to A','price-asc' => 'Price: Low to High','price-desc' => 'Price: High to Low']); ?>

		 <select name="sort" id="sort" class="form-select form-control" aria-label="Default select example" >
		   	<?php $__currentLoopData = $sortFiledArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sortFieldVal => $sortFiledTitle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		   	  <option value="<?php echo e(base64_encode($sortFieldVal)); ?>" <?php if(isset(request()->sort) && base64_decode(request()->sort) == $sortFieldVal): ?><?php echo e('selected'); ?> <?php endif; ?> ><?php echo e($sortFiledTitle); ?></option>
		   	 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</select>
	</div>
	<div class="input-group input-group-sm per-page">
		<label>Show:</label>
		 <select id="limit" name="limit" class="form-select form-control" aria-label="Default select example" >
		   <option value="10"  <?php if(isset(request()->limit) && request()->limit == 10): ?><?php echo e('selected'); ?> <?php endif; ?> >10</option>

		   <option value="25" <?php if(isset(request()->limit) && request()->limit == 25): ?><?php echo e('selected'); ?> <?php endif; ?> >25</option>

		   <option value="50" <?php if(isset(request()->limit) && request()->limit == 50): ?><?php echo e('selected'); ?> <?php endif; ?> >50</option>

		   <option value="75" <?php if(isset(request()->limit) && request()->limit == 75): ?><?php echo e('selected'); ?> <?php endif; ?> >75</option>

		   <option value="100" <?php if(isset(request()->limit) && request()->limit == 100): ?><?php echo e('selected'); ?> <?php endif; ?> >100</option>
		 </select>	   
	</div>
</div><?php /**PATH /home/megatanws/public_html/web/resources/views/front/modules/main/shop/filters/filter_right_up.blade.php ENDPATH**/ ?>