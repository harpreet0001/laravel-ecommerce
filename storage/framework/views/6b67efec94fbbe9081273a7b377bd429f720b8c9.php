<?php $__env->startSection('meta-data'); ?>
 <meta name="description" content="Check out our blog section to read about tips and tricks on using Melanotan 2 injections and nasal spray for a perfect tan. Get all the related information here.">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- breadcrumb -->
<?php $__env->startComponent('front.includes.breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Blog</a></li>
<?php if (isset($__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941)): ?>
<?php $component = $__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941; ?>
<?php unset($__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<!-- breadcrumb end-->
<!-- page-title -->
<?php $__env->startComponent('front.includes.page_title'); ?>
<h1 class="title page-title"><span>Blog</span></h1>
<?php if (isset($__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a)): ?>
<?php $component = $__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a; ?>
<?php unset($__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<!-- page-title  end-->
<section class="blog-sec">
    <div class="container">
        <div class="blog_content">
            <?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="megatan-blog-card">
                    <figure>
                        <span class="p-date p-date-image"><?php echo blogDateFormat($blog->created_at); ?></span>
                        <a href="<?php echo e(route('blog-detail',$blog->slug)); ?>">
                            <img src="<?php echo imagePath($blog->image); ?>" class="img-fluid">
                        </a>                    
                    </figure>
                    <figcaption>
                        <div class="post-stats">
                            <span class="p-author">Admin</span>
                            <span class="p-comment"><?php echo e($blog->comments()->where('active',1)->where('delete','!=',1)->count()); ?></span>
                        </div>
                        <div class="name">
                        	<a href="<?php echo e(route('blog-detail',$blog->slug)); ?>"><?php echo e($blog->title); ?></a>
                        </div>
                        <div class="description"><?php echo $blog->content; ?></div>                    
                        <a href="<?php echo e(route('blog-detail',$blog->slug)); ?>" class="btn read-more-btn main-btn">Read more<i class="fas fa-arrow-right"></i></a>
                    </figcaption>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.layout',['pageslug' => 'Blog','pageTitle'=>'Blog | Melanotan 2 Injections | Nasal Sprays | Megatan'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/megatanws/public_html/web/resources/views/front/modules/main/blog/bloglist.blade.php ENDPATH**/ ?>