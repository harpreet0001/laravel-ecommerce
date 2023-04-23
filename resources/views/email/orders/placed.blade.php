@extends('email.layouts.layout')
@section('content')
 	@php($user                    = $order->orderuser)
    @php($billing_details         = $order->billing_address_details)
    @php($shipping_details        = $order->shipping_address_details)
    @php($orderitems              = $order->orderItems)
    @php($shipping_method_details = $order->shipping_method_details)
 <div style="padding: 0 20px 20px;"> 
    <h2 style="font-size:22px;height:30px;color:#cc6600;border-bottom:dashed 1px gray">Thanks for Your Order!</h2>
    <div style="padding:10px;background-color:#fff4ea">
        <img src="https://ci6.googleusercontent.com/proxy/vovAzbTKxIX18WmmAOcFEJE7Y_VBEIGNi7iGFV5-18mOdTrQQxIHVW1ZuP-dNIXQAqOYZVk6nOBgXoT-Q7w2cMv_lN7-EZ1cW72o05jr=s0-d-e1-ft#https://megatan.ws/templates/megatan/images/InfoMessage.gif" class="CToWUd">&nbsp;
        Your order ID is <strong>#{{$order->unique_order_id}}</strong>. A summary of your order is
        shown below. To view the status of your order <a href="{{route('account.order-details',$order->_id)}}">click here</a>.
    </div>
    <br>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td id="" width="50%" valign="top">
                    <h3 style="font-family:Arial;font-size:18px">Shipping Address</h3>
                    <div style="font-family:Arial;font-size:12px">
                    	@if(isset($billing_details))
		                    <strong>{{$billing_details->firstname}} {{$billing_details->lastname}}</strong>
			                <br>{{$billing_details->company}}
			                <br>
			                {{$billing_details->city}},{!! getStateName($billing_details->stateId) !!},{!! getCountryName($billing_details->countryId) !!} <br>
			                {{$billing_details->address_1}}<br>
			                {{$billing_details->address_2}}
			                {{$user->phone}}<br>
			                {{$user->email ?? ''}}
                        @endif
                </td>
                <td id="" width="50%" valign="top">
                    <h3 style="font-family:Arial;font-size:18px">Billing Address</h3>
                    <div style="font-family:Arial;font-size:12px">
                    	 @if(isset($shipping_details))
		                    <strong>{{$shipping_details->firstname}} {{$shipping_details->lastname}}</strong>
			                <br>{{$shipping_details->company}}
			                <br>
			                {{$shipping_details->city}},{!! getStateName($shipping_details->stateId) !!},{!! getCountryName($shipping_details->countryId) !!}<br>
			                {{$shipping_details->address_1}}<br>
			                {{$shipping_details->address_2}}
			                {{$user->phone}}<br>
			                {{$user->email ?? ''}}
		                @endif
                </td>
            </tr>
        </tbody>
    </table>
    <br><br>
    <div style="font-size:12px">
        <h3 style="font-size:18px">Your Payment Comments:</h3>{{$order->payment_method_comment ?? 'NA'}}
    </div>
    <div style="font-size:12px">
        <h3 style="font-size:18px">Your Shipping Comments:</h3>{{$order->shipping_method_comment ?? 'NA'}}
    </div>
    <br><br>
    <div style="font-size:12px">
        <h3 style="font-size:18px">Payment Method:</h3>{{$order->payment_method ?? 'NA'}}
    </div>

    <h3 style="font-size:18px">Your Order Contains...</h3>
    <table width="100%" id="" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td style="font-family:Arial;font-size:12px;background-color:#020b6f;color:white;padding:5px;font-weight:bold" nowrap="">Cart Items</td>
                <td style="font-family:Arial;font-size:12px;background-color:#020b6f;color:white;padding:5px;font-weight:bold" nowrap="" width="100">Qty</td>
                <td style="font-size:12px;background-color:#020b6f;color:white;padding:5px;font-weight:bold" nowrap="" width="150">Item
                    Price</td>
                <td style="font-family:Arial;font-size:12px;background-color:#020b6f;color:white;padding:5px;font-weight:bold" nowrap="" width="200" align="right">Item Total</td>
            </tr>
        </tbody>
    </table>
    <table width="100%" cellspacing="0" cellpadding="0" style="border:1px solid #c7d7db">
        <tbody>
        	@if(isset($orderitems))
					@foreach($orderitems as $orderitem)
		                <tr>
		                    <td style="padding:5px;font-size:12px;border-bottom:solid 1px #cacaca">
		                        <strong>{{$orderitem->product->title}}</strong>
		                        <br>
		                        <table style="font-family:Arial;font-size:11px"></table>
		                    </td>
		                    <td style="padding:5px;font-size:12px;border-bottom:solid 1px #cacaca" width="100">{{$orderitem->quantity}}</td>
		                    <td style="padding:5px;font-size:12px;border-bottom:solid 1px #cacaca" width="150">{{priceFormat($orderitem->price)}}</td>
		                    <td style="padding:5px;font-size:12px;border-bottom:solid 1px #cacaca" align="right" width="200"><strong>{{priceFormat($orderitem->price * $orderitem->quantity)}}</strong></td>
		                </tr>
					@endforeach
				@endif   
        </tbody>
    </table>
    <table width="100%" id="" cellspacing="0" cellpadding="4">
        <tbody>
            <tr>
                <td align="right" style="font-family:Arial;font-size:12px"><strong>Subtotal:</strong></td>
                <td width="100" align="right" style="font-family:Arial;font-size:12px"><strong>{!! priceFormat($order->subtotal) !!}</strong></td>
            </tr>
        </tbody>
    </table>
     @if(!empty($order->discount) && $order->discount != 0)
     <table width="100%" id="" cellspacing="0" cellpadding="4">
        <tbody>
            <tr>
                <td align="right" style="font-family:Arial;font-size:12px"><strong>Discount:</strong></td>
                <td width="100" align="right" style="font-family:Arial;font-size:12px"><strong>-{!! priceFormat($order->discount ?? 0) !!}</strong></td>
            </tr>
        </tbody>
    </table>
    @endif
    <table width="100%" id="" cellspacing="0" cellpadding="4">
        <tbody>
            <tr>
                <td align="right" style="font-family:Arial;font-size:12px"><strong>Shipping({{$shipping_method_details->methodname ?? ''}}):</strong></td>
                <td width="100" align="right" style="font-family:Arial;font-size:12px"><strong>{!! priceFormat($order->shipping ?? 0) !!}</strong></td>
            </tr>
        </tbody>
    </table>
    <table width="100%" id="" cellspacing="0" cellpadding="4">
        <tbody>
            <tr>
                <td align="right" style="font-family:Arial;font-size:12px"><strong>Tax:</strong></td>
                <td width="100" align="right" style="font-family:Arial;font-size:12px"><strong>{!! priceFormat($order->tax ?? 0) !!}</strong></td>
            </tr>
        </tbody>
    </table>
    <table width="100%" id="" cellspacing="0" cellpadding="4">
        <tbody>
            <tr>
                <td align="right" style="font-family:Arial;font-size:12px"><strong>Grand Total:</strong></td>
                <td width="100" align="right" style="font-family:Arial;font-size:12px"><strong>{!! priceFormat($order->total) !!}</strong></td>
            </tr>
        </tbody>
    </table>
        <p style="margin-top:12px;margin-top: 12px;padding: 10px;background: #ececec;">
            <strong><span class="il">{{ config('app.name') }}</span></strong>
            <br>
            <a href="{{env('APP_URL')}}">{{env('APP_URL')}}</a>
        </p>
</div>    
@endsection