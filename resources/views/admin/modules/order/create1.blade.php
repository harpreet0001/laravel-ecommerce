@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
  <div class="content-card">
      <div class="card">
         @include('admin.layouts.CardHeader')
         <div class="card-body">
            <div class="tab-content p-0">
              <!--accordion-->
              <form onsubmit="Order_Form.placeOrder(this)" method="post" action="{{route('placeOrder')}}" id="order_placed_form" >
                @csrf
                @method('post')
                <div class="accordion" id="faq">
                  <!--customer conatiner start step:1-->
                  <div class="card"> 
                      <div class="card-header" id="customer_detail_header">
                          <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#customer_detail"
                          aria-expanded="true" aria-controls="customer_detail" data-step-name="customerStepDone">Step1: Customer Details</a>
                          <span id="customer_detail_span"></span>
                      </div>

                    <div id="customer_detail" class="collapse show" aria-labelledby="customer_detail_header" data-parent="#faq">
                        <div class="card-body customer_detail_body"><!--body-->
                          
                          <div class="row">
                            <div class="col-md-3">
                              <label>Order For:</label>
                            </div>
                            <div class="col-md-9">
                               
                              <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="existing" name="orderFor" value="existing" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="existing">Search my existing customer list</label>
                                    <span class="text text-danger err-msg" id="customerId_error"></span>
                                </div>

                                <div class="form-group orderForToggle orderForToggleExisting" style="display:none;">
                                   <input type="text" name="orderForSearch" id="orderForSearch" class="form-control"   placeholder="type a customer name,email address" data-search-customer="{{route('search-customer')}}" autocomplete="nope" />

                                   <input type="hidden" name="customerId" id="customerId" value="">      
                                   <div class="orderCustomerSearchResult"></div>
                                  
                                </div>

                                <div class="custom-control custom-radio">
                                    <input type="radio" id="new" name="orderFor" value="new" class="custom-control-input" >
                                    <label class="custom-control-label" for="new">A new customer or in-store purchase</label>
                                </div>
                              </div>

                            </div>
                          </div>

                          <div class="row orderForToggle orderForToggleNew" style="display:none;">
                            <div class="col-md-12">
                                <label>Account Details</label>
                                  <div class="form-group">
                                    <label class="form-label">Customer Firstname:</label>
                                    <input type="text" class="form-control " placeholder="Customer Firstname" name="customerFirstname" value="" autofocus="">
                                    <span id="customerFirstname_error" class="error text text-danger error-msg"></span>
                                  </div>
                                  <div class="form-group">
                                    <label class="form-label">Customer Lastname:</label>
                                    <input type="text" class="form-control " placeholder="Customer Lastname" name="customerLastname" value="" autofocus="">
                                    <span id="customerLastname_error" class="error text text-danger error-msg"></span>
                                  </div>
                                  <div class="form-group">
                                    <label class="form-label">Customer Email:</label>
                                    <input type="email" class="form-control " placeholder="Customer Email" name="customerEmail" value="" autofocus="">
                                    <span id="customerEmail_error" class="error text text-danger error-msg"></span>
                                  </div>
                                  <div class="form-group">
                                    <label class="form-label">Customer Password:</label>
                                    <input type="text" class="form-control " placeholder="Customer Password" name="customerPassword" value="" autofocus="">
                                    <span id="customerPassword_error" class="error text text-danger error-msg"></span>
                                  </div>
                                  <div class="form-group">
                                    <label class="form-label">Customer Contact:</label>
                                    <input type="number" class="form-control " placeholder="Customer Contact" name="customerContact" value="" autofocus="">
                                    <span id="customerContact_error" class="error text text-danger error-msg"></span>
                                  </div>
                              </div>
                          </div>

                          <div>
                            <button type="button" id="customer_detail_btn" class="btn btn-primary" onclick="Order_Form.checkCustomerDetail()">Continue</button>
                          </div>

                          <span class="text text-danger err-msg" id="orderFor_error"></span>

                        </div> <!--body end-->
                    </div>
                  </div>
                  <!--customer conatiner end step:1-->

                  <!--billingAddress start step:2-->
                   <div class="card"> 
                      <div class="card-header" id="billing_address_header">
                          <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#billing_address"
                          aria-expanded="true" aria-controls="billing_address" data-step-name="billingStepDone">Step2: Biling Details</a>
                          <span id="billing_address_span"></span>
                      </div>

                    <div id="billing_address" class="collapse" aria-labelledby="billing_address_header" data-parent="#faq">
                        <div class="card-body billing_address_body"><!--body-->
                          
                             <div class="row">
                               <div class="col-md-12">
                                 <div class="form-group">

                                    <div class="custom-control custom-radio">
                                        <input id="existingBillingFor" type="radio" name="billingFor" value="existing" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="existingBillingFor">I want to use an existing address</label>
                                    </div>

                                    <div class="billingToggle billingToggleExisting" style="display:none;">
                                        <select id="billingId" name="billingId" class="form-control addressList" onChange="Order_Form.setBillingAddress(this)">
                                             <option value="">--Please Select--</option>
                                        </select>
                                        <span class="text text-danger error-msg" id="billingId_error"></span>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input id="newBillingFor" type="radio" name="billingFor" value="new" class="custom-control-input" >
                                        <label class="custom-control-label" for="newBillingFor">I want to use a new address</label>
                                    </div>

                                    <span class="text text-danger" id="billingFor_error"></span>

                                    <div class="billingToggle billingToggleNew" style="display:none;">
                                        
                                          <!--billing Form -->
                                          <div class="form-group">
                                              <label class="form-label">First Name:</label>
                                              <input type="text" class="form-control " placeholder="Firstname" name="billingFirstname" value="" autofocus="">
                                              <span id="billingFirstname_error" class="error text text-danger error-msg"></span>
                                          </div>

                                          <div class="form-group">
                                              <label class="form-label">Last Name:</label>
                                              <input type="text" class="form-control " placeholder="Billing Lastname" name="billingLastname" value="" autofocus="">
                                              <span id="billingLastname_error" class="error text text-danger error-msg"></span>
                                          </div>

                                           <div class="form-group">
                                              <label class="form-label">Company:</label>
                                              <input type="text" class="form-control " placeholder="Company" name="billingCompnay" value="" autofocus="">
                                              <span id="billingCompnay_error" class="error text text-danger error-msg"></span>
                                          </div>

                                           <div class="form-group">
                                              <label class="form-label">Address 1:</label>
                                              <input type="text" class="form-control " placeholder="Address1" name="billingAddress1" value="" autofocus="">
                                              <span id="billingAddress1_error" class="error text text-danger error-msg"></span>
                                          </div>

                                           <div class="form-group">
                                              <label class="form-label">Address 2:</label>
                                              <input type="text" class="form-control " placeholder="Address2" name="billingAddress2" value="" autofocus="">
                                              <span id="billingAddress2_error" class="error text text-danger error-msg"></span>
                                          </div>

                                          <div class="form-group">
                                              <label class="form-label">Phone:</label>
                                              <input type="number" class="form-control " placeholder="Phone" name="billingPhone" value="" autofocus="">
                                              <span id="billingPhone_error" class="error text text-danger error-msg"></span>
                                          </div>

                                          <div class="form-group">
                                              <label class="form-label">City:</label>
                                              <input type="text" class="form-control " placeholder="City" name="BillingCity" value="" autofocus="">
                                              <span id="BillingCity_error" class="error text text-danger error-msg"></span>
                                          </div>

                                          <div class="form-group">
                                              <label class="form-label">Postcode:</label>
                                              <input type="text" class="form-control " placeholder="Postcode" name="billingPostcode" value="" autofocus="">
                                              <span id="billingPostcode_error" class="error text text-danger error-msg"></span>
                                          </div>

                                          <div class="form-group required">
                                              <label class="control-label">Country</label>
                                              <div class="">
                                                  <x-country fieldname="billingCountryId" classes="country form-control"/>
                                                  <span class="text text-danger error-msg" id="billingCountryId_error"></span>
                                              </div>
                                          </div>

                                          <div class="form-group required">
                                              <label class="control-label">Region / State</label>
                                              <div class="">
                                                  <x-state fieldname="billingStateId" classes="state form-control"/>
                                                  <span class="text text-danger error-msg" id="billingStateId_error"></span>
                                              </div>
                                         </div>

                                        

                                        <!--billing Form End-->
                                    </div>

                                  </div>

                                  <div>
                                    <button type="button" id="billing_detail_btn" class="btn btn-primary" onclick="Order_Form.checkBillingDetail()">Continue</button>
                                  </div>
                               </div>
                             </div>

                        </div> <!--body end-->
                    </div>
                  </div>
                  <!--billingAddress End step:2-->

                   <!--searchProducts start step:3-->
                   <div class="card"> 
                      <div class="card-header" id="search_product_header">
                          <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#search_product"
                          aria-expanded="true" aria-controls="search_product" data-step-name="searchProductStepDone">Step3: Search Products</a>
                          <span id="search_product_span"></span>
                      </div>

                    <div id="search_product" class="collapse" aria-labelledby="search_product_header" data-parent="#faq">
                        <div class="card-body search_product_body"><!--body-->
                          
                           <!--custom-product-search-->
                            <div class="quoteItemSearch">
                              <div class="form-group">
                                 <label class="form-label">Search Items:</label>
                                 <input type="text" name="search_product" class="form-control" placeholder="Type a product name,sku" autofocus="nope">
                              </div>
                           </div>
                           <div class="quoteItemSearchResult"></div>
                           <span class="text text-danger" id="search_product_error"></span>

                           <div class="quoteItemSearchProductList"></div>

                            <div>
                                <button type="button" id="search_product_btn" class="btn btn-primary" onclick="Order_Form.checkSearchProduct()">Continue</button>
                            </div>
                           <!--custom-product-search end-->

                        </div> <!--body end-->
                    </div>
                  </div>
                  <!--searchProducts End step:3-->

                  <!--shippingAddress start step:4-->
                   <div class="card"> 
                      <div class="card-header" id="shipping_address_header">
                          <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#shipping_address"
                          aria-expanded="true" aria-controls="shipping_address" data-step-name="shippingStepDone">Step4: Shipping Address</a>
                          <span id="shipping_address_span"></span>
                      </div>

                    <div id="shipping_address" class="collapse" aria-labelledby="shipping_address_header" data-parent="#faq">
                        <div class="card-body shipping_address_body"><!--body-->
                          
                             <!--shipping address-->
                                <div class="form-group">

                                  <div class="custom-control custom-radio">
                                      <input id="existingshippingTo" type="radio" name="shippingTo" value="existing" class="custom-control-input" checked>
                                      <label class="custom-control-label" for="existingshippingTo">I want to use an existing address</label>
                                  </div>

                                  <div class="shippingToggle shippingToggleExisting" style="display:none;">
                                    <select name="shippingId" class="form-control addressList" onChange="Order_Form.setShippingAddress(this)">
                                        <option value="">--Please Select--</option>
                                    </select>
                                    <span class="text text-danger error-msg" id="shippingId_error"></span>
                                  </div>

                                  <div class="custom-control custom-radio">
                                      <input id="newshippingTo" type="radio" name="shippingTo" value="new" class="custom-control-input" >
                                      <label class="custom-control-label" for="newshippingTo">I want to use a new address</label>
                                  </div>

                                  <span class="text text-danger" id="shippingTo_error"></span>

                                  <div class="shippingToggle shippingToggleNew" style="display:none;">
                                    <!--shipping Form -->
                                    <div class="form-group">
                                        <label class="form-label">First Name:</label>
                                        <input type="text" class="form-control " placeholder="Firstname" name="shippingFirstname" value="" autofocus="">
                                        <span id="shippingFirstname_error" class="error text text-danger error-msg"></span>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Last Name:</label>
                                        <input type="text" class="form-control " placeholder="shipping Lastname" name="shippingLastname" value="" autofocus="">
                                        <span id="shippingLastname_error" class="error text text-danger error-msg"></span>
                                    </div>

                                     <div class="form-group">
                                        <label class="form-label">Company:</label>
                                        <input type="text" class="form-control " placeholder="Company" name="shippingCompnay" value="" autofocus="">
                                        <span id="shippingCompnay_error" class="error text text-danger error-msg"></span>
                                    </div>

                                     <div class="form-group">
                                        <label class="form-label">Address 1:</label>
                                        <input type="text" class="form-control " placeholder="Address1" name="shippingAddress1" value="" autofocus="">
                                        <span id="shippingAddress1_error" class="error text text-danger error-msg"></span>
                                    </div>

                                     <div class="form-group">
                                        <label class="form-label">Address 2:</label>
                                        <input type="text" class="form-control " placeholder="Address2" name="shippingAddress2" value="" autofocus="">
                                        <span id="shippingAddress2_error" class="error text text-danger error-msg"></span>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Phone:</label>
                                        <input type="number" class="form-control " placeholder="Phone" name="shippingPhone" value="" autofocus="">
                                        <span id="shippingPhone_error" class="error text text-danger error-msg"></span>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">City:</label>
                                        <input type="text" class="form-control " placeholder="City" name="shippingCity" value="" autofocus="">
                                        <span id="shippingCity_error" class="error text text-danger error-msg"></span>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Postcode:</label>
                                        <input type="text" class="form-control " placeholder="Postcode" name="shippingPostcode" value="" autofocus="">
                                        <span id="shippingPostcode_error" class="error text text-danger error-msg"></span>
                                    </div>

                                    <div class="form-group required">
                                        <label class="control-label">Country</label>
                                        <div class="">
                                            <x-country fieldname="shippingCountryId" classes="country form-control"/>
                                            <span class="text text-danger error-msg" id="shippingCountryId_error"></span>
                                        </div>
                                    </div>

                                    <div class="form-group required">
                                        <label class="control-label">Region / State</label>
                                        <div class="">
                                            <x-state fieldname="shippingStateId" classes="state form-control"/>
                                            <span class="text text-danger error-msg" id="shippingStateId_error"></span>
                                        </div>
                                   </div>
                                  <!--shipping Form End-->
                              </div>
                            </div>

                             <!--shipping address-->
                            <div>
                                <button type="button" id="billing_detail_btn" class="btn btn-primary" onclick="Order_Form.checkShippingDetail()">Continue</button>
                            </div>

                        </div> <!--body end-->
                    </div>
                  </div>
                  <!--shippingAddress End step:4-->

                  <!--shippingMethod start-->
                   <div class="card"> 
                      <div class="card-header" id="shipping_method_header">
                          <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#shipping_method"
                          aria-expanded="true" aria-controls="shipping_method" data-step-name="shippingMethodStepDone">Step5: Shipping Method</a>
                          <span id="shipping_method_span"></span>
                      </div>

                    <div id="shipping_method" class="collapse" aria-labelledby="shipping_method_header" data-parent="#faq">
                        <div class="card-body shipping_method_body"><!--body-->
                          
                            <div class="shippingMethodList"></div>

                            <div>
                                <button type="button" id="shipping_method_btn" class="btn btn-primary" onclick="Order_Form.checkShippingMethodDetail()">Continue</button>
                            </div>

                        </div> <!--body end-->
                    </div>
                  </div>
                  <!--shippingMethod End-->

                  <!--Confirm Order start-->
                   <div class="card"> 
                      <div class="card-header" id="confirm_order_header">
                          <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confirm_order"
                          aria-expanded="true" aria-controls="confirm_order" data-step-name="confirmOrderStepDone">Step6: Confirm Order</a>
                          <span id="confirm_order_span"></span>
                      </div>

                    <div id="confirm_order" class="collapse" aria-labelledby="confirm_order_header" data-parent="#faq">
                        <div class="card-body confirm_order_body"><!--body-->
                          
                          <div class="saveOrderDetails"></div>

                        </div> <!--body end-->
                    </div>
                  </div>
                  <!--Confirm Order End-->

                </div> <!--accordion end-->
              </form>  
              </div> 
            </div>
         </div>
      </div>
   </div>
@endsection
@section('js')
<script type="text/javascript">
  
  let customRoutes = {
                          'check-email-availability' : "{{route('check-email-availability')}}" ,
                          'get-address-list'         : "{{route('get-address-list')}}",
                          'search-products'          : "{{route('search-products')}}" ,
                          'add-product'              : "{{route('add-product')}}",
                          'delete-product'           : "{{route('delete-product')}}",
                          'get-shipping-methods'     : "{{route('get-shipping-methods')}}",
                          'save-order-detail'        : "{{route('save-order-detail')}}"
                     };
</script>
<script type="text/javascript" src="{{asset('sadmin/js/order_create1.js')}}"></script>
@endsection