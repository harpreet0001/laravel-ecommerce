<?php $__env->startSection('meta-data'); ?>
 <meta name="description" content="<?php echo e($selectedCategory->metadescription ?? ''); ?>">
 <meta name="keywords" content="<?php echo e($selectedCategory->metakeywords ?? ''); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- breadcrumb -->
<?php $__env->startComponent('front.includes.breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="<?php echo e(route('shop',$selectedCategory->slug)); ?>"><?php echo e($selectedCategory->title ?? ''); ?></a></li>
<?php if (isset($__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941)): ?>
<?php $component = $__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941; ?>
<?php unset($__componentOriginal51f861061480651aff74bcdcdf58b9fe92494941); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<!-- breadcrumb end-->
<!-- page-title -->
<?php $__env->startComponent('front.includes.page_title'); ?>
<h1 class="title page-title"><span><?php echo e($selectedCategory->title ?? ''); ?></span></h1>
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
                    <figure class="aside-top_img">
                        <img src="<?php echo e(isset($products[0]->image) ? imagePath($products[0]->image) : imagePath('no-image')); ?>">
                    </figure>
                    <div class="aside_links">
                        <h3 class="module-title">Categories</h3>
                        <!--sidebar category component-->
                         <?php if (isset($component)) { $__componentOriginal7dcb15db1c0ecaf75c67d2975e2425805c9dc802 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Category::class, ['selectedCategory' => $selectedCategory]); ?>
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
                        <!--sidebar category component end-->
                        <?php if($products->count() > 0): ?>
                        <!-- products-filters-right-up-->
                        <?php echo $__env->make('front.modules.main.shop.filters.filter_left_down', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!-- products-filters-right-up end-->
                        <?php endif; ?>
                    </div>
                </aside>
                <div class="right-content">
                    <div class="top-heading">
                        <h2><?php echo e($selectedCategory->title ?? ''); ?></h2>
                    </div>
                    <!-- products-filter -->
                    <?php if($products->count() > 0): ?>
                    <div class="products-filters">
                        <div class="grid-list">
                            <button class="btn-grid-view view-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Grid" data-view="product-grid">
                            </button>
                            <button class="btn-list-view view-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="List" data-view="product-list">
                            </button>
                            <a href="<?php echo e(route('compare.show')); ?>">
                                <span> Product Compare </span>
                                <span class="compare-total"><?php echo compareProductCount(); ?></span>
                            </a>
                        </div>
                        <!-- products-filters-right-up-->
                        <?php echo $__env->make('front.modules.main.shop.filters.filter_right_up', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!-- products-filters-right-up end-->
                    </div>
                    <?php endif; ?>
                    <!-- products-filter end -->
                    <!-- content -->
                    <!-- 	<div class="main-products"> -->
                    <div class="main-products">
                        <?php echo $__env->make('front.modules.main.shop.product_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- </div> -->
                    <!-- content end -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- comment: need to add -->
<!-- mobile filter btn -->
<div class="bottom-menu bottom-menu-266">
    <ul>
        <li class="menu-item bottom-menu-item bottom-menu-item-1">
            <a href="javascript:void(0);"><span class="links-text">Home</span></a>
        </li>
        <li class="menu-item bottom-menu-item bottom-menu-item-2">
            <a href="javascript:void(0);"><span class="links-text">Wishlist</span><span class="count-badge wishlist-badge">3</span></a>
        </li>
        <li class="menu-item bottom-menu-item bottom-menu-item-3">
            <a href="javascript:void(0);"><span class="links-text">Compare</span><span class="count-badge compare-badge count-zero">0</span></a>
        </li>
        <li class="menu-item bottom-menu-item bottom-menu-item-4">
            <a href="javascript:void(0);"><span class="links-text">Email</span></a>
        </li>
        <li class="menu-item bottom-menu-item bottom-menu-item-5">
            <a href="javascript:void(0);"><span class="links-text">Call us</span></a>
        </li>
    </ul>
</div>
<a class="mobile-filter-trigger btn">More Products</a>
<!-- mobile flilter btn end  -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.layout',['pageslug' => 'shop' ,'pageTitle' => $selectedCategory->pagetitle ?? '' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\GIT\Laravel\Ecommerce\resources\views/front/modules/main/shop/shop.blade.php ENDPATH**/ ?>