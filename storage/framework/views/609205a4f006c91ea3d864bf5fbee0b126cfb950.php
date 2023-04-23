<?php $__env->startSection('meta-data'); ?>
 <meta name="description" content="<?php echo e($data->metadescription ?? ''); ?>">
 <meta name="keywords" content="<?php echo e($data->metakeywords ?? ''); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- breadcrumb -->
<?php $__env->startComponent('front.includes.breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="<?php echo e(Request::url()); ?>"><?php echo e($data->title ?? ''); ?></a></li>
<?php if (isset($__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941)): ?>
<?php $component = $__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941; ?>
<?php unset($__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<!-- breadcrumb end-->
<!-- page-title -->
<?php $__env->startComponent('front.includes.page_title'); ?>
<h1 class="title page-title"><span><?php echo e($data->title ?? ''); ?></span></h1>
<?php if (isset($__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a)): ?>
<?php $component = $__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a; ?>
<?php unset($__componentOriginal17f7f66bd76df7bfec2291f526049d667ec3084a); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<!-- page-title  end-->
<section class="aside-sec">
    <div class="container">
        <div class="aside-_content">
            <div class="row">
                <aside class="side-column">
                    <!-- mobile sec -->
                    <div class="mobile-wrapper-header">
                        <span>Filters</span>
                        <a class="x"><i class="fas fa-times"></i></a>
                    </div>
                    <!-- mobile sec end -->
                   
                    <div class="aside_links">
                        <h3 class="module-title">Categories</h3>
                        <!--sidebar category component-->
                         <?php if (isset($component)) { $__componentOriginal7dcb15db1c0ecaf75c67d2975e2425805c9dc802 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Category::class, []); ?>
<?php $component->withName('category'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal7dcb15db1c0ecaf75c67d2975e2425805c9dc802)): ?>
<?php $component = $__componentOriginal7dcb15db1c0ecaf75c67d2975e2425805c9dc802; ?>
<?php unset($__componentOriginal7dcb15db1c0ecaf75c67d2975e2425805c9dc802); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>  
                    </div>
                </aside>
                <div class="right-content">
                    <div class="top-heading">
                        <h2><?php echo e($data->title ?? ''); ?></h2>
                    </div>
                    <div class="main-products"> 
                     <?php echo $data->content; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<a class="mobile-filter-trigger btn">Filter Products</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.layout',['pageslug' => $data->slug ?? '' ,'pageTitle' => $data->pagetitle ?? '' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Projects\resources\views/front/modules/main/dynamic_pages.blade.php ENDPATH**/ ?>