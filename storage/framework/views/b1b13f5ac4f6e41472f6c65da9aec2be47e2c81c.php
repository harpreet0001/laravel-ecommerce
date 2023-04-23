<!-- Melanotan  -->
 <?php if (isset($component)) { $__componentOriginalf92b5a44b14781d92d493ab0c74190b03ac22860 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ViewedProduct::class, []); ?>
<?php $component->withName('viewed-product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalf92b5a44b14781d92d493ab0c74190b03ac22860)): ?>
<?php $component = $__componentOriginalf92b5a44b14781d92d493ab0c74190b03ac22860; ?>
<?php unset($__componentOriginalf92b5a44b14781d92d493ab0c74190b03ac22860); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<!-- Melanotan end  -->

<!-- FOOTER SEC -->
<footer class="main-footer">
	<div class="footer-top">
		<div class="container">
			<ul class="footer-social-icon">
				<li>
					<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Facebook">
						<i class="fab fa-facebook-f"></i>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="twitter">
						<i class="fab fa-twitter"></i>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="instagram">
						<i class="fab fa-instagram"></i>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="linkedin">
						<i class="fab fa-linkedin-in"></i>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="youtube">
						<i class="fab fa-youtube"></i>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="skype">
						<i class="fab fa-skype"></i>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="google">
						<i class="fab fa-google-plus-g"></i>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="footer-menu">
		<div class="container">
			<div class="footer-menu_content">
				<!-- row -->
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-12 col-12 menu-border">
						<div class="footer-ul-wrap">
							<h6>About Us</h6>
							<ul>
								<?php
								$s = \App\Models\Page::where('status',1)->get();
								?>
								<?php $__currentLoopData = $s; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li>
									<a href="<?php echo e(route($value->slug)); ?>" class="<?php if(isset($pageslug) && $pageslug == $value->slug): ?><?php echo e('active'); ?><?php endif; ?>"><?php echo e($value->title); ?></a>
								</li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12 col-12 menu-border">
						<div class="footer-ul-wrap">
							<h6>Customer Service</h6>
							<ul>
								<li>
									<a href="<?php echo e(Route('contact_form')); ?>">Contact</a>
								</li>
								<!-- <li>
									<a href="<?php echo e(Route('return')); ?>">Returns</a>
								</li> -->
								<!-- <li>
									<a href="javascript:void(0);">Site Map</a>
								</li> -->
								<li>
									<a href="<?php echo e(route('brand.list')); ?>">Brands</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12 col-12 menu-border">
						<div class="footer-ul-wrap">
							<h6>My Account</h6>
							<ul>
								<li>
									<a href="<?php echo e(route('account.home')); ?>">My Account</a>
								</li>
								<li>
									<a href="<?php echo e(route('account.order-history')); ?>">Order History</a>
								</li>								
								<li>
									<a href="<?php echo e(route('account.newsletter')); ?>">Newsletter</a>
								</li>
								<!-- <li>
									<a href="javascript:void(0);">Gift Certificates</a>
								</li> -->
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12 col-12 menu-border">
						<div class="footer-ul-wrap">
							<h6>Newsletter</h6>
							<p>Stay up to date with news and promotions by signing up for our newsletter</p>
							<form id="newsletter-subscription-form" method="post" action="<?php echo e(route('newsletter.subscription')); ?>" onsubmit="newsletter.subscribe(this)">
								<?php echo csrf_field(); ?>
								<?php echo method_field('post'); ?>
								<div class="form-group">
									<div class="footer-input-wrapper">

										<input type="email" class="form-control" name="email" id="email" placeholder="Your email">
										<span class="footer-input-btn">
											<button type="submit" class="btn main-btn Send-btn"><i class="far fa-envelope"></i> Send</button>
											<!-- <a href="javascript:void(0);" class="btn main-btn Send-btn"><i class="far fa-envelope"></i> Send</a> -->
										</span>
									</div>
									<span class="text text-danger error-msg" id="email_error"></span>
								</div>
								<div class="form-check">
									<label class="form-check-label">
										<input type="checkbox" class="form-check-input" value="1" name="agree">
										I have read and agree to the <a href="<?php echo e(route('privacy-policy')); ?>">Privacy Policy</a>
									</label>
									<span class="text text-danger error-msg" id="agree_error"></span>
								</div>
							</form>

						</div>
					</div>
				</div>
				<!-- row end-->
			</div>
		</div>
	</div>
	<div class="copy-right-sec">
		<div class="container">
			<div class="copy-right_content">
				<div class="copy-right_left">
					<p>Copyright © 2014-2021, MEGATAN, All Rights Reserved</p>
				</div>
				<div class="copy-right_right">
					<ul>
						<li>
							<a href="javascript:void(0);" class="copy-right-icon-1">
								<i class="fab fa-facebook-f"></i>
							</a>
						</li>
						<li>
							<a href="javascript:void(0);" class="copy-right-icon-2">
								<i class="fab fa-facebook-f"></i>
							</a>
						</li>
						<li>
							<a href="javascript:void(0);" class="copy-right-icon-3">
								<i class="fab fa-facebook-f"></i>
							</a>
						</li>
						<li>
							<a href="javascript:void(0);" class="copy-right-icon-4">
								<i class="fab fa-facebook-f"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>

<div class="cookies" style="display: none;">
	<div>
		<p>We use cookies and other similar technologies to improve your browsing experience and the functionality of our site.<a href="<?php echo e(route('privacy-policy')); ?>"> Privacy Policy.</a> </p>
		<a href="javascript:void(0);" class="ok accept-cookies" >Ok</a>
	</div>
</div>
<!-- FOOTER SEC END -->
<?php /**PATH E:\Ecommerce\resources\views/front/includes/footer.blade.php ENDPATH**/ ?>