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
        <a href="javascript:void(0);" class="mobile-search"><i class="fas fa-search"></i>
            <!-- <div class="header-search">
                <div class="search-categories dropdown drop-menu">
                    <div class="search-categories-button dropdown-toggle" data-toggle="" aria-expanded="false">All</div>
                    <div class="dropdown-menu j-dropdown">
                        <ul class="j-menu">
                            <li>
                                <a href="javascript:void(0);">All</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Melanotan</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">MT2 Starter Kits</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Melanotan Nasal Spray</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">MT2 Reseller Packs</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Tanning Injections Supplies</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <form class="inner-wrap">
                    <input type="text" placeholder="Search here..." name="search2">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div> -->

        </a>
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
                    <ul>
                        @if(Cart::count() > 0)
                        @else
                        <li class="cart-empty-msg text-center">Your cart is empty!</li>
                        @endif
                        <li class="cart-products">
                            <table class="table">
                                <tbody>
                                    @foreach(Cart::content() as $item)
                                        <tr>
                                            <td class="text-center td-image"> 
                                                <a href="{{route('product.show',base64_encode($item->model->_id))}}">
                                                    <img src="{{imagePath($item->model->image)}}" alt="{{$item->model->title}}" title="{{$item->model->title}}">
                                                </a>
                                            </td>
                                            <td class="text-left td-name">
                                                <a href="{{route('product.show',base64_encode($item->model->_id))}}">{{$item->model->title}}</a><br> 
                                            </td>
                                            <td class="text-right td-qty">x {{$item->qty}}</td>
                                            <td class="text-right td-total">{{priceFormat($item->model->price * $item->qty)}}</td>
                                            <td class="text-center td-remove">
                                                <form method="post" action="{{route('cart.destroy',$item->rowId)}}" onsubmit="return cart.remove(this)">
                                                    <span class="input-group-btn">
                                                        @csrf
                                                        @method('delete')
                                                       <button type="submit" onclick="" title="Remove" class="cart-remove"><i class="fa fa-times-circle"></i></button>
                                                    </span>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </li>
                        <li class="cart-totals">
                            <div>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-right td-total-title">Sub-Total</td>
                                            <td class="text-right td-total-text">{{appendCurrency(Cart::subtotal())}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right td-total-title">Total</td>
                                            <td class="text-right td-total-text">{{appendCurrency(Cart::total())}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="cart-buttons">
                                    <a class="btn-cart btn" href="{{route('cart.index')}}"><i class="fa"></i><span>View Cart</span></a>
                                    <a class="btn-checkout btn" href="{{route('checkout.index')}}"><i class="fa"></i><span>Checkout</span></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </a>
    </li>
</ul>