<ul class="main-menu">
    <li>
		<a href="<?php echo e(route('home')); ?>" class="<?php if(isset($pageslug) && $pageslug == 'home'): ?><?php echo e('active'); ?><?php endif; ?>">Home</a>
	</li>
	<li>
		<a href="<?php echo e(route('shop','')); ?>" class="<?php if(isset($pageslug) && $pageslug == 'shop'): ?><?php echo e('active'); ?><?php endif; ?>">Melanotan 2</a>
	</li>
	<li>
		<a href="<?php echo e(route('how-to-use-tanning-injections')); ?>" class="<?php if(isset($pageslug) && $pageslug == 'how-to-use-tanning-injections'): ?><?php echo e('active'); ?><?php endif; ?>">Using Tanning Injections</a>
	</li>
	<li>
		<a href="<?php echo e(route('faq')); ?>" class="<?php if(isset($pageslug) && $pageslug == 'faq'): ?><?php echo e('active'); ?><?php endif; ?>">FAQ's</a>
	</li>
	<li>
		<a href="<?php echo e(route('shipping-returns')); ?>" class="<?php if(isset($pageslug) && $pageslug == 'shipping-returns'): ?><?php echo e('active'); ?><?php endif; ?>">Shipping & Returns</a>
	</li>
	<li>
		<a href="<?php echo e(route('contact_form')); ?>" class="<?php if(isset($pageslug) && $pageslug == 'contact-us'): ?><?php echo e('active'); ?><?php endif; ?>">Contact</a>
	</li> 
</ul>
<ul class="main-menu-2"> 
  <li>
	<a href="<?php echo e(route('blogs')); ?>"><i class="far fa-comment-alt" class="<?php if(isset($pageslug) && $pageslug == 'blogs'): ?><?php echo e('active'); ?><?php endif; ?>"></i>BLOG</a>
  </li>
</ul><?php /**PATH /home/megatanws/public_html/web/resources/views/front/includes/navbar.blade.php ENDPATH**/ ?>