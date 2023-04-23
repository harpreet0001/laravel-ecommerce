@extends('admin.layouts.layout')
@section('content')
<?php 

   $shipping_method_details = $order->shipping_method_details;
   $billing_address         = $order->billing_address_details;
   $shipping_address        = $order->shipping_address_details;
   $card_details            = $order->card_details;
?>
<div class="content-wrapper p-4">
    <div class="content-card">
        <div class="card">
          @include('admin.layouts.CardHeader')
            <div class="card-body">
                <div class="tab-content p-0">
                   @include('msg')
                  <div class="row">
                      <div class="col-lg-9 col-md-8 col-sm-6 col-12">
                          <div class="edit-order_card">

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

                            <div class="row">
                              <div class="col-6">
                                  <div class="verticalFormContainer">
                                      <div class="header">
                                          Customer Billing Details
                                      </div>
                                      <div class="formRow formRowUnlabeled" style="">
                                          <div class="value">
                                              <!-- <div class="detailsHeading">Billing To:</div> -->
                                              <div class="detailsAddress">
                                                  <div><span>Name:</span>{{$billing_address->firstname}} {{$billing_address->lastname}}</div>
                                                  <div><span>Company:</span>{{$billing_address->company}}</div>
                                                  <div><span>Postcode:</span>{{$billing_address->postcode}}</div>
                                                  <div><span>City:</span>{{$billing_address->city}}</div>
                                                  <div><span>Country:</span>{{getCountryName($billing_address->countryId)}} </div>
                                                  <div><span>State:</span>{{getStateName($billing_address->stateId)}}</div>
                                                  <div><span>Address1:</span>{!! $billing_address->address_1 ?? '' !!}</div>
                                                  <div><span>Address2</span>{!! $billing_address->address_2 ?? '' !!}</div>
                                              </div>                                              
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-6">
                                  <div class="verticalFormContainer" >
                                      <div class="header">
                                          Shipping Details
                                      </div>
                                      <div class="formRow formRowUnlabeled  " style="">
                                          <div class="value">
                                              <!-- <div class="detailsHeading">Shipping To:</div> -->
                                              <div class="detailsAddress">
                                                  <div><span>Name:</span>{{$shipping_address->firstname}} {{$shipping_address->lastname}}</div>
                                                  <div><span>Company:</span>{{$shipping_address->company}}</div>
                                                  <div><span>Postcode:</span>{{$shipping_address->postcode}}</div>
                                                  <div><span>City:</span>{{$shipping_address->city}}</div>
                                                  <div><span>Country:</span>{{getCountryName($shipping_address->countryId)}} </div>
                                                  <div><span>State:</span>{{getStateName($shipping_address->stateId)}}</div>
                                                  <div><span>Address1:</span>{!! $shipping_address->address_1 ?? '' !!}</div>
                                                  <div><span>Address2</span>{!! $shipping_address->address_2 ?? '' !!}</div>
                                                  <div class="mt-4 mb-1">
                                                    <span class="font-weight-bold">Shipping Comments:</span>
                                                    <p>
                                                        {{$order->shipping_method_comment}}
                                                    </p>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>

                            <div class="row">
                               <div class="col-12">
                                 <div class="verticalFormContainer "> 
                                  <div class="value">
                                     <table class="table table-bordered cstm-data-table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">
                                                    Products shipped to {{getCountryName($shipping_address->countryId)}} {{getStateName($shipping_address->stateId)}}</th>
                                                <th class="quoteItemQuantity">Qty</th>
                                                <th class="quoteItemPrice">Item Price</th>
                                                <th class="quoteItemTotal">Item Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($order->orderitems)
                                               @foreach($order->orderitems as $key => $item)
                                                  <tr class="itemRow" id="itemId_{{$item->id}}">
                                                    <td class="quoteItemImage"><img src="{{imagePath($item->product->image)}}" alt=""></td>
                                                    <td><div>{{$item->product->title}}</div> </td>
                                                    <td> {{$item->quantity}}</td>
                                                    <td>{!! priceFormat($item->price)!!}</td>
                                                    <td><span>{{priceFormat($item->price * $item->quantity)}}</span></td>
                                                  </tr>
                                               @endforeach
                                               <tr><td colspan="4">Subtotal</td><td>{{priceFormat($order->subtotal)}}</td></tr>
                                               <tr><td colspan="4">Discount</td><td>- {{priceFormat($order->discount ?? 0)}}</td></tr>
                                               <tr><td colspan="4">Tax</td><td>+ {{priceFormat($order->discount ?? 0)}}</td></tr>
                                               <tr><td colspan="4">Total</td><td>+ {{priceFormat($order->total ?? 0)}}</td></tr>
                                            @endif
                                        </tbody>
                                    </table>
                                  </div>          
                                </div>
                               </div>
                            </div>
                            
                            <form  method="post" action="{{route('ordershipment-save',base64_encode($order->_id))}}"  onsubmit="return SubmitOrderShipment.create(this)">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="verticalFormContainer">
                                        <div class="header">
                                           Shipment Options
                                        </div>
                                        <div class="value">
                                            <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                    <label>Shipping Method: </label>
                                                    <?php 

                                                          $selected_shipping_methodmodule = $order->ordershipment->shipping_methodmodule ?? null;
                                                    ?>
                                                    <select class="form-control" id="shipping_methodmodule" name="shipping_methodmodule">
                                                       <option value="">-select-</option>
                                                      @foreach(shippingMethodModules() as $index => $value)
                                                        <option value="{{$index}}" @if($selected_shipping_methodmodule == $index) {{'selected'}} @endif>{{$value}}</option>
                                                      @endforeach
                                                    </select>
                                                     <span id="shipping_methodmodule_error" class="text text-danger err-msg"></span>
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                <label>Shipping Method Name: </label>
                                                <div class="form-group">
                                                    <input type="text" name="shipping_methodname" id="shipping_methodname" class="form-control" value="{{$order->ordershipment->shipping_methodname ?? ($order->shipping_method_details->methodname ?? '')}}">
                                                    <span id="shipping_methodname_error" class="text text-danger err-msg"></span>
                                                  </div>
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col-md-12">
                                                <div class="form-group">
                                                  <label>Tracking No:</label>
                                                  <input type="text" name="shipping_trackno" id="shipping_trackno" class="form-control" value="{{$order->ordershipment->shipping_trackno ?? ''}}">
                                                  <span id="shipping_trackno_error" class="text text-danger err-msg"></span>
                                                </div>
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col-md-12">
                                                <div class="form-group">
                                                  <label>Shipment Comment:</label>
                                                  <textarea class="form-control" id="shipping_comment" name="shipping_comment">{{$order->ordershipment->shipping_comment ?? ''}}</textarea>
                                                  <span id="shipping_comment_error" class="text text-danger err-msg"></span>
                                                </div> 
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><input type="checkbox" name="orderstatus" value="1" checked="checked"> Update the status of this order to partially shipped/shipped</label>
                                                </div> 
                                              </div>
                                            </div>

                                             <div class="row">
                                              <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><input type="checkbox" name="emailInvoiceToCustomer" value="1" checked> Notify Customer</label>
                                                </div> 
                                              </div>
                                            </div>

                                            <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Create shipment">

                                        </div>
                                    </div>
                                </div>
                              </div>
                            </form> 

                            <div class="row">
                              <div class="col-md-12">
                                <div class="verticalFormContainer">
                                      <div class="header">
                                         Card Details
                                      </div>
                                      <div class="value">
                                          <p><span>Card Owner:</span>{{isset($card_details->cc_owner) ? base64_decode($card_details->cc_owner) : ''}}</p>
                                          <p><span>Card Number:</span>{{isset($card_details->cc_number) ? base64_decode($card_details->cc_number) : ''}}</p>
                                          <p><span>Card CVV2:</span>{{isset($card_details->cc_cvv2) ? base64_decode($card_details->cc_cvv2) : ''}}</p>
                                          <p><span>Card Expire Date:</span>
                                              {{isset($card_details->cc_expire_date_month) ? base64_decode($card_details->cc_expire_date_month) : ''}},
                                              {{isset($card_details->cc_expire_date_year)  ? base64_decode($card_details->cc_expire_date_year) : ''}}
                                          </p>
                                      </div>
                                  </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                <div class="verticalFormContainer ">
                                  <div class="header">
                                      Order Comments
                                  </div>
                                  <div class="formRow formRowUnlabeled  formRowLast" style="">
                                      <div class="value">
                                        {{$order->ordercomment ?? ''}}
                                      </div>
                                  </div>
                                </div>
                              </div>
                            </div>  

                          </div>
                      </div>
                      <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                          <div class="edit-order_card order-summary-wrapper">                                        
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
                                                              Shipping <br>
                                                             ({{$shipping_method_details->methodname ?? 'Not Found'}})
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
                              <div class="verticalFormContainer ">
                                  <div class="header">
                                      Payment Details
                                  </div>
                                  <div class="formRow formRowUnlabeled  " style="">
                                      <div class="value">
                                          <strong>Credit Card / Debit Cards</strong>
                                        </div>
                                  </div>
                              </div>
                              <div class="verticalFormContainer ">
                                  <div class="header">
                                      Payment Method Comment
                                  </div>
                                  <div class="formRow formRowUnlabeled  " style="">
                                      <div class="value">
                                          <strong>{{$order->payment_method_comment ?? 'NA'}}</strong>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection