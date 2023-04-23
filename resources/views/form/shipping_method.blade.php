<form method="post" action="{{route('checkout.shipping_method_save')}}" id="shipping_method_save" onsubmit="checkout.shipping_method_save(this)">
    @csrf
    @method('post')
    <p>Please select the preferred shipping method to use on this order.</p>
    <p><strong>Total-Based Shipping</strong></p>
    <div class="radio">
        @foreach($shippingmethods as $index => $shippingmethod)
            <label> 
            <input type="radio" name="shipping_method" value="{{base64_encode($shippingmethod->_id)}}" @if($index==0) {{'checked'}} @endif >
                {{$shippingmethod->methodname}} - {!! priceFormat(calShippingMethodCost($shippingmethod->_id)) !!}
            </label>
            <br>
        @endforeach
        <span class="text text-danger err-msg" id="shipping_method_error"></span>
    </div>
    <p><strong>Add Comments About Your Delivery</strong></p>
    <p>
        <textarea name="shipping_method_comment" rows="8" class="form-control" placeholder="Write here..."></textarea>
    </p>
    <div class="buttons">
        <div class="pull-right">
            <button type="submit" id="button-shipping-method" data-loading-text="Loading..." class="btn btn-primary"><span>Continue</span></button>
        </div>
    </div>
</form>
