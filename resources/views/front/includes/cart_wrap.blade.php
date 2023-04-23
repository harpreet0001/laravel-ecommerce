
<ul>
     @if(Cart::count() > 0)
    <li class="cart-products">
        <table class="table">
            <tbody>
                @foreach(Cart::content() as $item)
                    <tr>
                        <td class="text-center td-image"> 
                            <a href="{{route('product.show',$item->model->slug)}}">
                                <img src="{{imagePath($item->model->image)}}" alt="{{$item->model->title}}" title="{{$item->model->title}}">
                            </a>
                        </td>
                        <td class="text-left td-name">
                            <a href="{{route('product.show',$item->model->slug)}}">{{$item->model->title}}</a><br> 
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
    @else
    <li class="cart-empty-msg">Your cart is empty!</li>
    @endif
</ul>

