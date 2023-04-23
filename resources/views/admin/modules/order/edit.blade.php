@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
    <div class="content-card">
        <div class="card">
            <div class="card-body">
                <div class="tab-content p-0">
                    @include('msg')
                    <div class="edit-order-sec">
                        <div class="edit-order_content">
                          <form id="orderForm" method="post" action="{{route('admin.order.orderUpdate',base64_encode($order->id))}}" onsubmit="OrderForm.orderUpdate(this);return false;">
                            @csrf
                            @method('post')  
                            <div class="row">
                                <div class="col-lg-9 col-md-8 col-sm-6 col-12">
                                    <div class="edit-order_card">
                                        <div class="orderFormLeftColumn">

                                            <div class="row">
                                              <div class="col-md-12">
                                                <div class="verticalFormContainer">
                                                      <div class="header">
                                                         Order #{{$order->unique_order_id}} <span style="float:right;">{{$order->orderuser->email}}</span>
                                                      </div>
                                                      <div class="value order-status">
                                                            <p><span>Order Status:</span> {{orderstatusVal($order->orderstatus)}}</p>
                                                            <p><span>Order Date:</span> {{fnDateFormat($order->created_at)}}</p>
                                                      </div>
                                                  </div>
                                              </div>
                                            </div>

                                            @php($billing_address = $order->billing_address_details)

                                            <!--###################-->
                                            <div class="orderBillingDetailsContainer">
                                                <div class="verticalFormContainer">
                                                    <div class="header">
                                                        Customer Billing Details
                                                    </div>
                                                    <div class="formRow formRowUnlabeled" style="">
                                                        <div class="value">
                                                            <div class="detailsHeading">Billing To: <a href="#" class="orderBillingDetailsChangeLink">Change</a></div>
                                                            <div class="detailsAddress">
                                                                <div>{{$billing_address->firstname}} {{$billing_address->lastname}}</div>
                                                                <div>{{$billing_address->company}}</div>
                                                                <div>{{$billing_address->postcode}}</div>
                                                                <div>{{$billing_address->city}}</div>
                                                                <div>{{getCountryName($billing_address->countryId)}} {{getStateName($billing_address->stateId)}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--###################-->

                                            <!--###################-->
                                            <div class="horizontalFormContainer" id="orderFormBillingDetailsContainer" style="display:none">
                                                <div class="header">
                                                     Billing Address
                                                </div>
                                                <div class="Billing-Address-wrapper">
                                                    <div id="orderFormBillingDetails">
                                                       @include('admin.modules.order.form.billing_address_form')
                                                    </div>
                                                    <div>  
                                                    @include('admin.modules.order.form.existingAddressbook',['existingAddress' => 'billing'])
                                                    </div>
                                                </div>
                                            </div>
                                            <!--###################-->

                                            @php($shipping_address = $order->shipping_address_details)
                                            
                                            <!--###################-->
                                            <div class="orderShippingDetailsContainer">
                                                <div class="verticalFormContainer" >
                                                    <div class="header">
                                                        Shipping Details
                                                    </div>
                                                    <div class="formRow formRowUnlabeled  " style="">
                                                        <div class="value">
                                                            <div class="detailsHeading">Shipping To: <a href="#" class="orderShippingDetailsChangeLink">Change</a></div>
                                                            <div class="detailsAddress">
                                                                 <div>{{$shipping_address->firstname}} {{$shipping_address->lastname}}</div>
                                                                <div>{{$shipping_address->company}}</div>
                                                                <div>{{$shipping_address->postcode}}</div>
                                                                <div>{{$shipping_address->city}}</div>
                                                                <div>{{getCountryName($shipping_address->countryId)}}  {{getStateName($shipping_address->stateId)}}</div>
                                                            </div>
                                                            <div class="detailsHeading">Shipping Method: <a href="#" class="orderShippingDetailsChangeLink">Change</a></div>
                                                            <div class="detailsShippingMethod">
                                                                Royal Mail 1st Class Signed For: £0.00
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--###################-->
                                            
                                            <!--###################-->
                                            <div id="orderFormShippingDetailsContainer" style="display: none;">
                                                
                                                <div class="showByValue_shipItemsTo showByValue_shipItemsTo_single">
                                                    <div class="horizontalFormContainer ">
                                                        <div class="header">
                                                            Shipping Address
                                                        </div>
                                                        <div class="Billing-Address-wrapper Shipping-Address">
                                                            <div id="orderFormShippingDetails">
                                                               @include('admin.modules.order.form.shipping_address_form')
                                                            </div>
                                                            <div>
                                                               @include('admin.modules.order.form.existingAddressbook',['existingAddress' => 'shipping'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 @include('admin.modules.order.form.shipping_method_form')
                                            </div>


                                            <div class="">
                                                <div class="verticalFormContainer" >
                                                    <div class="header">
                                                        Comments
                                                    </div>
                                                    <div class="formRow formRowUnlabeled  " style="">
                                                        <div class="value">
                                                            <div class="detailsAddress">
                                                                 <div class="detailsHeading">Payment Comment</div>
                                                                 <p>{{$order->payment_method_comment}}</p>
                                                            </div>
                                                            <div class="detailsAddress">
                                                                 <div class="detailsHeading">Shippping Comment</div>
                                                                 <p>{{$order->shipping_method_comment}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--###################-->

                                            <!--###################-->  
                                            <div class="">
                                                <div class="verticalFormContainer"> 
                                                    <div class="formRow formRowUnlabeled  " style="">
                                                        <div class="value">
                                                            <div class="quoteItemsGrid quoteItemsGridInteractive">
                                                                <table class="table table-bordered cstm-data-table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th colspan="2">
                                                                                Products shipped to {{getCountryName($shipping_address->countryId)}} {{getStateName($shipping_address->stateId)}}</th>
                                                                            <th class="quoteItemQuantity">Qty</th>
                                                                            <th class="quoteItemPrice">Item Price</th>
                                                                            <th class="quoteItemTotal">Item Total</th>
                                                                            <!-- <th class="quoteItemAction">Action</th> -->
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if($order->orderitems)
                                                                           @foreach($order->orderitems as $key => $item)
                                                                             <tr class="itemRow" id="itemId_{{$item->id}}">
                                                                                <input type="hidden" name="itemid[]" value="{{$item->id}}">
                                                                                <td class="quoteItemImage">
                                                                                    <img src="{{imagePath($item->product->image)}}" alt="">
                                                                                </td>
                                                                                <td>
                                                                                    <div class="quoteItemName">{{$item->product->title}}</div>
                                                                                    <div class="quoteItemConfiguration">
                                                                                    </div>
                                                                                </td>
                                                                                <td class="quoteItemQuantity">
                                                                                    <input type="number" name="quantity[]" value="{{$item->quantity}}" class="quantityChange" id="qty_{{$item->_id}}" data-url="{{route('admin.order.orderUpdateItemQuantityPrice',$item->_id)}}">
                                                                                    <span class="text text-danger d-block" id="quantity.{{$key}}_error"></span>
                                                                                </td>
                                                                                <td class="quoteItemPrice">
                                                                                    {!! priceFormat($item->price)!!}
                                                                                    <input type="hidden" name="price[]" value="{{$item->price}}" class="" id="price_{{$item->_id}}"> 
                                                                                </td>
                                                                                <td class="quoteItemTotal"><span>{{priceFormat($item->price * $item->quantity)}}</span></td>
                                                                               <!--  <td class="quoteItemAction">
                                                                                    <a href="#" class="deleteItemLink">Delete</a>
                                                                                </td> -->
                                                                            </tr>
                                                                           @endforeach
                                                                           <tr><td colspan="4">Subtotal</td><td>{{priceFormat($order->subtotal)}}</td></tr>
                                                                        @endif
                                                                       
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--###################-->

                                            <!--###################-->
                                            <div class="verticalFormContainer ">
                                                <div class="header">
                                                    Order Comments (Visible to Customers)
                                                </div>
                                                <div class="formRow formRowUnlabeled  formRowLast" style="">
                                                    <div class="value">
                                                        <textarea name="ordercomment" class="Field100pct" rows="6">{{$order->ordercomment ?? ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--###################-->

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                    <div class="edit-order_card order-summary-wrapper">
                                        <div class="greenFormContainer">
                                            <div class="header">
                                                Finalize Order
                                            </div>
                                            <div class="greenForm-inner">
                                                <div class="value">
                                                    <label class="row">
                                                        <input type="checkbox" name="emailInvoiceToCustomer" value="1"> Email Invoice to Customer?
                                                    </label>
                                                    <div class="billingEmailAddressContainer">(<span class="billingEmailAddress">{{$order->orderuser->email}}</span>)</div>
                                                    <button type="submit" class="orderMachineSaveButton mini-btn" accesskey="s"><span class="accesskey">S</span>ave »</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="verticalFormContainer orderSummaryContainer">
                                            <div class="header">
                                                Order Summary
                                            </div>
                                            <div class="formRow formRowUnlabeled  " style="">
                                                <div class="value">
                                                    <div class="orderFormSummaryOrderSummaryContainer">
                                                        <table cellspacing="0" class="orderFormSummaryTable">
                                                            <tbody>
                                                                <tr class="orderFormSummaryTable-subtotal ">
                                                                    <th>
                                                                        Subtotal
                                                                    </th>
                                                                    <td valign="top">{{priceFormat($order->subtotal)}}</td>
                                                                </tr>
                                                                <tr class="orderFormSummaryTable-discount ">
                                                                    <th>
                                                                        Discount
                                                                    </th>
                                                                    <td valign="top">-{{priceFormat($order->discount)}}</td>
                                                                </tr>
                                                                <tr class="orderFormSummaryTable-shipping ">
                                                                    <th>
                                                                        Shipping
                                                                    </th>
                                                                    <td valign="top">+{{priceFormat($order->shipping ?? 0)}}</td>
                                                                </tr>
                                                                <tr class="orderFormSummaryTable-total ">
                                                                    <th>
                                                                        Grand Total
                                                                    </th>
                                                                    <td valign="top">{{priceFormat($order->total)}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
             <!--                            <div class="verticalFormContainer applyDiscountContainer">
                                            <div class="header">
                                                Apply Discount
                                            </div>
                                            <div class="formRow formRowUnlabeled  " style="">
                                                <div class="value">
                                                    £ <input name="discountAmount" type="text" value="0.00" class="Field100">
                                                    <input type="button" class="mini-btn" value="Apply">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="verticalFormContainer couponGiftCertificateContainer">
                                            <div class="header">
                                                Apply Coupon or Gift Certificate
                                            </div>
                                            <div class="formRow formRowUnlabeled  " style="">
                                                <div class="value">
                                                    <input name="couponGiftCertificate" type="text" value="" class="Field120">
                                                    <input type="button" class="mini-btn" value="Apply">
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="verticalFormContainer ">
                                            <div class="header">
                                                Payment Method
                                            </div>
                                            <div class="formRow formRowUnlabeled  " style="">
                                                <div class="value">
                                                    <strong>Credit Card / Debit Cards</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection