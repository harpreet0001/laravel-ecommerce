<!-- HEADER CODE -->
<header class="main-header">
    <div class="header-top">
        <div class="container">
            <ul>
                <li>
                    <a href="<?php echo e(route('home')); ?>"><i class="fas fa-home"></i> Home</a>
                </li>
                <li>
                    <a href="<?php echo e(route('how-to-use-tanning-injections')); ?>" class="top-menu-item-2"><i class="fas fa-home"></i> Using Melanotan 2</a>
                </li>
                <?php if(Route::has('contact_form')): ?>
                <li>
                    <a href="<?php echo e(Route('contact_form')); ?>"><i class="far fa-envelope"></i> Contact</a>
                </li>
                <?php endif; ?>
                <?php if(Route::has('faq')): ?>
                <li>
                    <a href="<?php echo e(Route('faq')); ?>"><i class="far fa-question-circle"></i> FAQ</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <!-- CENTER -->
    <div class="mobile-top-bar">
        <div class="mobile-top-menu-wrapper">
            <div class="top-menu">
                <ul class="j-menu">
                    <?php if(!auth()->check()): ?>
                    <li class="top-menu-item top-menu-item-1">
                        <a href="<?php echo e(route('login')); ?>"><span><i class="fas fa-user-circle"></i></span>Login</a>
                    </li>
                    <li class="top-menu-item top-menu-item-2">
                        <a href="<?php echo e(route('register')); ?>"><span><i class="far fa-compass"></i></span>Register</a>
                    </li>
                    <?php else: ?>
                    <li class="top-menu-item top-menu-item-1">
                        <a href="javascript:void(0);"> <span><i class="fas fa-user-circle"></i></span>Account</a>
                    </li>
                    <li class="top-menu-item top-menu-item-3">
                        <a href="javascript:void(0);" onclick="document.getElementById('logout-form').submit()"><span><i class="far fa-compass"></i></span>Logout</a>
                    </li>
                    <form method="post" id="logout-form" action="<?php echo e(route('logout')); ?>" style="display: none;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('post'); ?>
                    </form>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="center-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
                    <img src="<?php echo e(asset('front/images/header-logo.png')); ?>">
                </a>
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>
                <!-- HEADER SEARCH -->
                    <?php if (isset($component)) { $__componentOriginal9723b2c7022225b49cd5324ec05ff7d17901446a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\HeaderSearch::class, []); ?>
<?php $component->withName('header-search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal9723b2c7022225b49cd5324ec05ff7d17901446a)): ?>
<?php $component = $__componentOriginal9723b2c7022225b49cd5324ec05ff7d17901446a; ?>
<?php unset($__componentOriginal9723b2c7022225b49cd5324ec05ff7d17901446a); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                <!-- HEADER SEARCH END -->
                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <?php if(auth()->guest()): ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>"><span class="login-icon"><i class="fas fa-user-circle"></i></span> Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('register')); ?>"><span class="regitr-icon"><i class="fas fa-user-circle"></i></span>Rigister</a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo e(route('account.home')); ?>"><span class="account-icon"><i class="fas fa-user-circle"></i></span> Account</a>
                            <div class="dropdown-menu j-dropdown">
                                <ul class="j-menu">
                                    <li class="menu-item">
                                        <a href="<?php echo e(route('account.home')); ?>" class="header-edit-icon"><span class="links-text">Edit Account</span></a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="<?php echo e(route('account.order-history')); ?>" class="my-order-icon"><span class="links-text">My Orders</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" onclick="document.getElementById('logout-form').submit()"><span class="logout-icon"><i class="fas fa-user-circle"></i></span>Logout</a>
                        </li>
                        <form method="post" id="logout-form" action="<?php echo e(route('logout')); ?>" style="display: none;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('post'); ?>
                        </form>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('wishlist.show')); ?>">
                                <span><i class="far fa-heart"></i></span> Wish lists
                                <span class="wishlist-total">
                                    <?php echo wishlistProductCount(); ?>

                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('compare.show')); ?>">
                                <span class="campare-icon"><i class="fas fa-user-circle"></i>
                                </span> Compare
                                <span class="compare-total"><?php echo compareProductCount(); ?></span>
                            </a>
                        </li>
                    </ul>
                    <!-- cart -->
                    <div class="cart-wrap ">
                        <div class="cart-inner-wrap">
                            <a href="<?php echo e(route('cart.index')); ?>">
                                <span class="cart-info"><?php echo e(Cart::count()); ?> item(s) - <?php echo e(appendCurrency(Cart::total())); ?></span>
                                <span class="cart-wrapper show-cart-count">                                  
                                <i class="fas fa-shopping-cart "></i>
                                <?php if(Cart::count() > 0): ?>
                                <span class="cart-total"><span class="count-badge cart-badge"><?php echo e(Cart::count()); ?></span></span>
                                <?php endif; ?>
                                </span>
                            </a>
                            <div  class="dropdown-menu cart-content j-dropdown cart-wrap-content">
                              <?php echo $__env->make('front.includes.cart_wrap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>      
                    </div>
                    <!-- cart end -->
                </div>
            </nav>
            <!-- mobile -->
            <div class="mobile-menu">
                <ul>
                    <li>
                        <a href="<?php echo e(route('home')); ?>">
                            <img src="<?php echo e(asset('front/images/header-logo.png')); ?>">
                        </a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="javascript:void(0);" class="side-menu">
                            <i class="fas fa-bars"></i>
                        </a>
                    </li>
                    <li id="mobile-search-icon">
                        <a href="javascript:void(0);" class="mobile-search"><i class="fas fa-search"></i></a>
                        <!-- HEADER SEARCH -->
                            <?php if (isset($component)) { $__componentOriginal9723b2c7022225b49cd5324ec05ff7d17901446a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\HeaderSearch::class, []); ?>
<?php $component->withName('header-search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal9723b2c7022225b49cd5324ec05ff7d17901446a)): ?>
<?php $component = $__componentOriginal9723b2c7022225b49cd5324ec05ff7d17901446a; ?>
<?php unset($__componentOriginal9723b2c7022225b49cd5324ec05ff7d17901446a); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                        <!-- HEADER SEARCH END -->
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="shopping-card-right">
                            <i class="fas fa-shopping-cart"></i>
                            <div class="header-bottom cart-sidebar">
                                <div class="container">
                                    <div class="mobile-wrapper-header">
                                        <span>YOUR CART</span>
                                        <a class="x active"><i class="fas fa-times"></i></a>
                                    </div>
                                    <!-- cart -->
                                    <div class="cart-wrap cart-wrap-content">
                                        <?php echo $__env->make('front.includes.cart_wrap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                    <!-- cart end -->
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- mobile -->
        </div>
    </div>
    <!-- BOTTOM -->
    <div class="header-bottom left-slider">
        <div class="container">
            <div class="mobile-wrapper-header">
                <span>Menu</span>
                <a class="x"><i class="fas fa-times"></i></a>
            </div>
            <?php echo $__env->make('front.includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</header>
<!-- HEADER CODE END HERE--><?php /**PATH E:\Projects\resources\views/front/includes/header.blade.php ENDPATH**/ ?>