<!-- HEADER CODE -->
<header class="main-header">
    <div class="header-top">
        <div class="container">
            <ul>
                <li>
                    <a href="{{route('home')}}"><i class="fas fa-home"></i> Home</a>
                </li>
                <li>
                    <a href="{{route('how-to-use-tanning-injections')}}" class="top-menu-item-2"><i class="fas fa-home"></i> Using Melanotan 2</a>
                </li>
                @if(Route::has('contact_form'))
                <li>
                    <a href="{{Route('contact_form')}}"><i class="far fa-envelope"></i> Contact</a>
                </li>
                @endif
                @if(Route::has('faq'))
                <li>
                    <a href="{{Route('faq')}}"><i class="far fa-question-circle"></i> FAQ</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
    <!-- CENTER -->
    <div class="mobile-top-bar">
        <div class="mobile-top-menu-wrapper">
            <div class="top-menu">
                <ul class="j-menu">
                    @if(!auth()->check())
                    <li class="top-menu-item top-menu-item-1">
                        <a href="{{ route('login') }}"><span><i class="fas fa-user-circle"></i></span>Login</a>
                    </li>
                    <li class="top-menu-item top-menu-item-2">
                        <a href="{{ route('register') }}"><span><i class="far fa-compass"></i></span>Register</a>
                    </li>
                    @else
                    <li class="top-menu-item top-menu-item-1">
                        <a href="javascript:void(0);"> <span><i class="fas fa-user-circle"></i></span>Account</a>
                    </li>
                    <li class="top-menu-item top-menu-item-3">
                        <a href="javascript:void(0);" onclick="document.getElementById('logout-form').submit()"><span><i class="far fa-compass"></i></span>Logout</a>
                    </li>
                    <form method="post" id="logout-form" action="{{route('logout')}}" style="display: none;">
                        @csrf
                        @method('post')
                    </form>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="center-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img src="{{ asset('front/images/header-logo.png') }}">
                </a>
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>
                <!-- HEADER SEARCH -->
                   <x-header-search/>
                <!-- HEADER SEARCH END -->
                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        @if(auth()->guest())
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('login') }}"><span class="login-icon"><i class="fas fa-user-circle"></i></span> Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><span class="regitr-icon"><i class="fas fa-user-circle"></i></span>Rigister</a>
                        </li>
                        @else
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('account.home')}}"><span class="account-icon"><i class="fas fa-user-circle"></i></span> Account</a>
                            <div class="dropdown-menu j-dropdown">
                                <ul class="j-menu">
                                    <li class="menu-item">
                                        <a href="{{route('account.home')}}" class="header-edit-icon"><span class="links-text">Edit Account</span></a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{route('account.order-history')}}" class="my-order-icon"><span class="links-text">My Orders</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" onclick="document.getElementById('logout-form').submit()"><span class="logout-icon"><i class="fas fa-user-circle"></i></span>Logout</a>
                        </li>
                        <form method="post" id="logout-form" action="{{route('logout')}}" style="display: none;">
                            @csrf
                            @method('post')
                        </form>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('wishlist.show')}}">
                                <span><i class="far fa-heart"></i></span> Wish lists
                                <span class="wishlist-total">
                                    {!! wishlistProductCount() !!}
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('compare.show')}}">
                                <span class="campare-icon"><i class="fas fa-user-circle"></i>
                                </span> Compare
                                <span class="compare-total">{!!compareProductCount()!!}</span>
                            </a>
                        </li>
                    </ul>
                    <!-- cart -->
                    <div class="cart-wrap ">
                        <div class="cart-inner-wrap">
                            <a href="{{route('cart.index')}}">
                                <span class="cart-info">{{Cart::count()}} item(s) - {{appendCurrency(Cart::total())}}</span>
                                <span class="cart-wrapper show-cart-count">                                  
                                <i class="fas fa-shopping-cart "></i>
                                @if(Cart::count() > 0)
                                <span class="cart-total"><span class="count-badge cart-badge">{{Cart::count()}}</span></span>
                                @endif
                                </span>
                            </a>
                            <div  class="dropdown-menu cart-content j-dropdown cart-wrap-content">
                              @include('front.includes.cart_wrap')
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
                        <a href="{{route('home')}}">
                            <img src="{{ asset('front/images/header-logo.png') }}">
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
                           <x-header-search/>
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
                                        @include('front.includes.cart_wrap')
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
            @include('front.includes.navbar')
        </div>
    </div>
</header>
<!-- HEADER CODE END HERE-->