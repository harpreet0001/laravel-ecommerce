@foreach($shippingmethods as $index => $shippingmethod)
	<label> 
		@php( $shippingmethod_cost = calShippingMethodCost($shippingmethod->_id))
	<input type="radio" name="shipping_method" value="{{base64_encode($shippingmethod->_id)}}" data-shipping-cost="{{$shippingmethod_cost}}" @if($index==0) {{'checked'}} @endif >
	    {{$shippingmethod->methodname}} - {!! priceFormat($shippingmethod_cost) !!}
	</label>
	<br>
@endforeach