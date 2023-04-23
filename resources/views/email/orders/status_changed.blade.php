@extends('email.layouts.layout')
@section('content')
    <?php 
     	   $user             = $order->orderuser;
           $billing_details  = $order->billing_address_details;
           $ordershipment    = $order->ordershipment;
    ?>
 <div style="padding: 0 20px 20px;"> 
    <h2 style="font-size:22px;height:30px;color:#cc6600;border-bottom:dashed 1px gray">Order Status Changed</h2>
        <p>Hi {{$billing_details->firstname ?? ''}} {{$billing_details->lastname ?? ''}}</p>
        <p>An order you recently placed on our website has had its status changed.</p>
        <p>The status of order #{{$order->unique_order_id}} is now <strong>{{orderstatusVal($order->orderstatus)}}</strong></p>
        <h3 style="font-size:13px;color:#cc6600">Order Details</h3>
        <table width="100%">
            <tbody>
                <tr>
                    <td style="font-family:Arial;font-size:13px;font-weight:bold" nowrap="" valign="top" width="25%">Order Total:</td>
                    <td style="font-family:Arial;font-size:13px">{!! priceFormat($order->total) !!}</td>
                </tr>
                <tr>
                    <td style="font-family:Arial;font-size:13px;font-weight:bold" nowrap="" valign="top" width="25%">Date Placed:</td>
                    <td style="font-family:Arial;font-size:13px">{!! fnDateFormat($order->created_at) !!}</td>
                </tr>
                <tr>
                    <td style="font-family:Arial;font-size:13px;font-weight:bold" nowrap="" valign="top" width="25%">Payment Method:</td>
                    <td style="font-family:Arial;font-size:13px">{{$order->payment_method}}</td>
                </tr>
            </tbody>
        </table>
        <h3 style="font-size:13px;color:#cc6600">Shipment Tracking Numbers /
            Links</h3>
        @if(is_null($ordershipment))
            No tracking numbers are assigned to your order yet.
        @else
            <table width="100%">
            <tbody>
                <tr>
                    <td style="font-family:Arial;font-size:13px;font-weight:bold" nowrap="" valign="top" width="25%">Shipping Method Name:</td>
                    <td style="font-family:Arial;font-size:13px">{!! $ordershipment->shipping_methodname ?? '' !!}</td>
                </tr>
                <tr>
                    <td style="font-family:Arial;font-size:13px;font-weight:bold" nowrap="" valign="top" width="25%">Shipping Tracking Number:</td>
                    <td style="font-family:Arial;font-size:13px">{!! $ordershipment->shipping_trackno ?? '' !!}</td>
                </tr>
                <tr>
                    <td style="font-family:Arial;font-size:13px;font-weight:bold" nowrap="" valign="top" width="25%">Shipping Date Number:</td>
                    <td style="font-family:Arial;font-size:13px">{{ fnDateTimeFormat($ordershipment->updated_at) }}</td>
                </tr>
                <tr>
                    <td style="font-family:Arial;font-size:13px;font-weight:bold" nowrap="" valign="top" width="25%">Comment:</td>
                    <td style="font-family:Arial;font-size:13px">{{$order->shipping_comment ?? ''}}</td>
                </tr>
            </tbody>
        </table>
        @endif
        <p><a href="{{route('account.order-history')}}">Click here to view the status of your order</a></p>
        <p style="margin-top:12px;margin-top: 12px;padding: 10px;background: #ececec;">
            <strong><span class="il">{{ config('app.name') }}</span></strong>
            <br>
            <a href="{{env('APP_URL')}}">{{env('APP_URL')}}</a>
        </p>
</div>    
@endsection