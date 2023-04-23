<section class="megatan-blog-sec">
	<div class="container">
		<div class="megatan-blog_content">
			<div class="head text-center">
				<h1>The MEGATAN Blog</h1>
				<div class="title-divider"></div>
				<p>The MEGATAN blog is home to all news from MEGATAN, whether it be news, updates, competitions or even paid advertising from other suppliers or retailers.</p>	
			</div>
			<!-- card -->

	            <ul id="tabs" class="nav nav-tabs">
	                <li class="nav-item"><a href="" data-target="#megatan-id-1" data-toggle="tab" class="nav-link small text-uppercase">Latest Posts</a></li>
	                <li class="nav-item"><a href="" data-target="#megatan-id-2" data-toggle="tab" class="nav-link small text-uppercase active">Most READ</a></li>
	            </ul>
	            <br>
	            <div id="tabsContent" class="tab-content">
	                <div id="megatan-id-1" class="tab-pane fade">
	        <!-- carousel -->
				<div class="owl-carousel owl-theme megatan-blog-slider-1 owl-loaded owl-drag owl-hidden">
					
					
					
				<div class="owl-stage-outer">
				  <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1265px;">
					<?php $__currentLoopData = $latestBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestBlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="owl-item active" style="width: 406.664px; margin-right: 15px;">
						<div class="item">
						    <div class="megatan-blog-card">
							    <figure>
								    <span class="p-date p-date-image"><?php echo blogDateFormat($latestBlog->created_at); ?></span>
								    <a href="<?php echo e(route('blog-detail',$latestBlog->slug)); ?>">
									   <img src="<?php echo e(imagePath($latestBlog->image)); ?>" class="img-fluid">
								    </a>
									<div class="post-stats">
										<span class="p-author">Admin</span>
										<span class="p-comment">0</span>
									</div>
								</figure>
								<figcaption>
									<h2 class="text-center">
										<a href="javascript:void(0);"><?php echo e($latestBlog->title); ?></a>
									</h2>
									<p><?php echo substr($latestBlog->content,0,50); ?></p>
									<a href="<?php echo e(route('blog-detail',$latestBlog->slug)); ?>" class="btn read-more-btn">Read more<i class="fas fa-arrow-right"></i></a>
								</figcaption>
						</div>		
					  </div>
				    </div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev disabled"><i class="fas fa-chevron-left"></i></button><button type="button" role="presentation" class="owl-next disabled"><i class="fas fa-chevron-right"></i></button></div><div class="owl-dots disabled"></div></div>
			<!-- carousel end-->
	                </div>
	                <div id="megatan-id-2" class="tab-pane fade active show">
	            <!-- carousel -->
				<div class="owl-carousel owl-theme megatan-blog-slider owl-loaded owl-drag">
					
					
					
				<div class="owl-stage-outer">
					<div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1265px;">
						<?php $__currentLoopData = $mostReadableBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mostReadableBlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="owl-item active" style="width: 406.664px; margin-right: 15px;">
								<div class="item">
						        	<div class="megatan-blog-card">
									   <figure>
											<span class="p-date p-date-image"><?php echo blogDateFormat($mostReadableBlog->created_at); ?></span>
											<a href="<?php echo e(route('blog-detail',$mostReadableBlog->slug)); ?>">
												<img src="<?php echo e(imagePath($mostReadableBlog->image)); ?>" class="img-fluid">
											</a>
											<div class="post-stats">
												<span class="p-author">Admin</span>
												<span class="p-comment"></i>0</span>
											</div>
									   </figure>
										<figcaption>
											<h2 class="text-center">
												<a href="javascript:void(0);"><?php echo e($mostReadableBlog->title); ?></a>
											</h2>
											<p><?php echo substr($mostReadableBlog->content,0,50); ?></p>
											<a href="<?php echo e(route('blog-detail',$mostReadableBlog->slug)); ?>" class="btn read-more-btn">Read more<i class="fas fa-arrow-right"></i></a>
										</figcaption>
							        </div>		
						        </div>
					        </div>
				        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
					<div class="owl-nav disabled">
						<button type="button" role="presentation" class="owl-prev disabled"><i class="fas fa-chevron-left"></i></button>
						<button type="button" role="presentation" class="owl-next disabled"><i class="fas fa-chevron-right"></i></button>
					</div>
				<div class="owl-dots disabled"></div>
			</div>
			<!-- carousel end-->
	        </div>
	      </div>				
		</div>
	</div>
</section><?php /**PATH E:\GIT\Laravel\Ecommerce\resources\views/components/blog.blade.php ENDPATH**/ ?>