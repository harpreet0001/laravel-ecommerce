<?php
        $result = getNumbers(); //comment:helper function to get new tax,coupon discount,new subtotal,new total

        $coupon      = $result->get('coupon');
        $tax         = $result->get('tax');
        $shipping    = $result->get('shipping');
        $newSubtotal = $result->get('newSubtotal');
        $newTax      = $result->get('newTax');
        $newTotal    = $result->get('newTotal');
      
?>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <td class="text-left">Product Image</td>
                <td class="text-left">Product Name</td>
                <td class="text-left">Catgory</td>
                <td class="text-right">Quantity</td>
                <td class="text-right">Unit Price</td>
                <td class="text-right">Total</td>
            </tr>
        </thead>
        <tbody>
            @if(Cart::count() > 0)
              @foreach(Cart::content() as $item)
                <tr>
                    <td>
                        <div class="img">
                        <figure>
                            <a href="{{route('product.show',$item->model->slug)}}">
                                <img src="{{imagePath($item->model->image)}}" width="60">
                            </a>
                        </figure>
                        </div>
                    </td>
                    <td class="text-left"><a href="{{route('product.show',$item->model->slug)}}">{{$item->model->title}}</a> </td>
                    <td class="text-left">{{$item->model->getCategory->title ?? ''}}</td>
                    <td class="text-right">{{$item->qty}}</td>
                    <td class="text-right">{{priceFormat($item->price)}}</td>
                    <td class="text-right">{{priceFormat($item->price * $item->qty)}}</td>
                </tr>
              @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5"></td>
                <td colspan="1">
                    @if(!session()->get('coupon-'.$_SERVER['REMOTE_ADDR']))
                        <form method="POST" action="{{route('coupon.apply')}}" onsubmit="coupons.apply(this);">
                            @csrf
                            @method('post')      
                            <input type="hidden" name="page" value="checkout">                                       
                            <div class="input-group">
                                <input type="text" name="coupon" value="" placeholder="Enter your coupon here" id="input-coupon" class="form-control">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn main-btn Send-btn"><i class="far fa-envelope"></i>Apply</button>
                                </span>
                            </div>
                            <span class="text text-danger err-msg" id="coupon_error"></span>
                        </form>
                     @endif
                </td>
            </tr>
            <tr>
                <td colspan="5" class="text-right"><strong>Sub-Total:</strong></td>
                <td class="text-right">{{appendCurrency(Cart::subtotal())}}</td>
            </tr>
            @if(session()->get('coupon-'.$_SERVER['REMOTE_ADDR']))
            <tr>
                <td colspan="5" class="text-right">
                    <strong>Coupon({{$coupon['name']}}):</strong>
                    <form method="post" action="{{route('coupon.deleteApplyCoupon')}}" onsubmit="coupons.delete(this);">
                      @csrf
                      @method('delete')
                      <input type="hidden" name="page" value="checkout">  
                      <button type="submit" class="btn btn-danger btn-xs">remove</button>
                    </form>
                </td>
                <td class="text-right">-{{priceFormat($coupon['discount'])}}</td>
            </tr>
            @endif
            <tr>
                <?php   $shipping_method_detail = session()->get('order')['shippingMethodDetails']; ?>
                <td colspan="5" class="text-right"><strong>Shipping({{$shipping_method_detail['methodname']}}):</strong></td>
                <td class="text-right">+ {!! priceFormat($shipping) !!}</td>
            </tr>
            <tr>
                <td colspan="5" class="text-right"><strong>Tax:</strong></td>
                <td class="text-right">+ {{priceFormat($tax)}}</td>
            </tr>
            <tr>
                <td colspan="5" class="text-right"><strong>Total:</strong></td>
                <td class="text-right">{{priceFormat($newTotal+$shipping)}}</td>
            </tr>
        </tfoot>
    </table>
</div>