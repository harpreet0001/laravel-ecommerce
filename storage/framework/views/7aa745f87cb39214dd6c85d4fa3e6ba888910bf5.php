<ul>
	<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li>
      	<a href="<?php echo e(route($routename,$category->slug)); ?>"
      		class="<?php if(isset($selectedCategory) && $selectedCategory->_id == $category->_id): ?><?php echo e('active'); ?><?php endif; ?>">
      		<?php echo e($category->title); ?>

      	</a>
      </li>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH E:\GIT\Laravel\Ecommerce\resources\views/components/category.blade.php ENDPATH**/ ?>