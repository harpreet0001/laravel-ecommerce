@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
  <div class="content-card">
    <div class="card">
        <div class="card-header d-f j-c-s-b" style="cursor: move;">
       <h3 class="card-title">Order Create</h3>
          <div class="btn-wrap">
       </div>
    </div>
    <form onsubmit="Order_Form.placeOrder(this)" method="post" action="{{route('placeOrder')}}" id="order_placed_form" >
        @csrf
        @method('post')
      <div class="card-body">
         <div class="multistep-form-container">
           <!-- progressbar -->
           <section class="multi_step_form">  
            <ul id="progressbar" class="orderProgressLi">
              <li id="customer_li" class="active"> Customer Details</li>  
              <li id="billing_li">Biling Details</li> 
              <li id="product_li">Search Products</li>
              <li id="shipping_li">Shipping Address</li>
              <li id="shippingmethod_li"> Shipping Method</li>
              <li id="confirmorder_li">Confirm Order</li>
            </ul>
          </section>
            
            <div class="multistep-content">
              <!-- fieldsets -->
           <fieldset id="customerTab" class="multistep-tab active">
            <div class="form-head mb-4">
                <h3 class="step-title">Customer Details</h3>
              </div>
                <div class="radio-group mb-4">
              <div class="custom-control custom-radio">
                
                <input type="radio" id="orderForExisting" name="orderFor" value="existing" class="custom-control-input" checked>
                <label class="custom-control-label" for="orderForExisting">Search my existing customer list</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="orderForNew" name="orderFor" value="new" class="custom-control-input">
                <label class="custom-control-label" for="orderForNew">A new customer or in-store purchase</label>
              </div>
            </div>

            <div class="radio-content-area">
              <div class="search-field orderForToggle orderForToggleExisting" style="display: none;">
                <div class="form-group">
                  <input type="hidden" name="customerId" id="customerId" value="">
                  <span class="text text-danger err-msg" id="customerId_error"></span>
                  <input type="text" name="searchCustomer" data-search-customer-url="{{route('search-customer')}}" placeholder="type a customer name,email" class="form-control" autocomplete="nope">
                  <div class="search-result customerSearchResult">
                    <ul class="result-listing">

                    </ul>
                  </div>
                </div>
              </div>
              <div class="new-customer-block orderForToggle orderForToggleNew" style="display:none;">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-label">Customer Firstname:</label>
                      <input type="text" class="form-control " placeholder="Customer Firstname" name="customerFirstname" value="" autofocus="">
                      <span id="customerFirstname_error" class="error text text-danger error-msg"></span>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-label">Customer Lastname:</label>
                      <input type="text" class="form-control " placeholder="Customer Lastname" name="customerLastname" value="" autofocus="">
                      <span id="customerLastname_error" class="error text text-danger error-msg"></span>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-label">Customer Email:</label>
                      <input type="email" class="form-control " placeholder="Customer Email" name="customerEmail" value="" autofocus="">
                      <span id="customerEmail_error" class="error text text-danger error-msg"></span>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-label">Customer Password:</label>
                      <input type="text" class="form-control " placeholder="Customer Password" name="customerPassword" value="" autofocus="">
                      <span id="customerPassword_error" class="error text text-danger error-msg"></span>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-label">Customer Contact:</label>
                      <input type="number" class="form-control " placeholder="Customer Contact" name="customerContact" value="" autofocus="">
                      <span id="customerContact_error" class="error text text-danger error-msg"></span>
                    </div>
                  </div>
                </div>
              </div>
                
              </div> 
              <div class="field-footer">
                   <div class="btn-grp text-center">
                     <button type="button" class="btn btn-primary" onclick="Order_Form.checkCustomerDetail()">Continue</button>
                   </div>
              </div>         
           </fieldset>
           <!-- fieldsets -->
            <fieldset id="billingTab" class="multistep-tab">
              <div class="form-head mb-4">
                <h3 class="step-title">Biling Details</h3>
              </div>
                 <div class="radio-group mb-4">
              <div class="custom-control custom-radio">
                <input type="radio" id="billingForExisting" name="billingFor" value="existing" class="custom-control-input" checked>
                <label class="custom-control-label" for="billingForExisting">I want to use an existing address</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="billingForNew" name="billingFor" value="new" class="custom-control-input">
                <label class="custom-control-label" for="billingForNew">I want to use a new address</label>
              </div>
            </div>
            <div class="existing-billing-block billingForToggle billingForToggleExisting" style="display: none">
              <div class="form-group">
                <span class="text text-danger error-msg" id="billingId_error"></span>
                <select id="billingId" name="billingId" class="form-control addressList">
                  <option value="">Please select</option>
                </select>
              </div>
            </div>
            <div class="new-address-block billingForToggle billingForToggleNew">
                <div class="row">

                  <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">First Name:</label>
                        <input type="text" class="form-control " placeholder="Firstname" name="billingFirstname" value="" autofocus="">
                        <span id="billingFirstname_error" class="error text text-danger error-msg"></span>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">Last Name:</label>
                        <input type="text" class="form-control " placeholder="Billing Lastname" name="billingLastname" value="" autofocus="">
                        <span id="billingLastname_error" class="error text text-danger error-msg"></span>
                    </div>
                  </div>

                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-label">Company:</label>
                        <input type="text" class="form-control " placeholder="Company" name="billingCompnay" value="" autofocus="">
                        <span id="billingCompnay_error" class="error text text-danger error-msg"></span>
                      </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">Address 1:</label>
                        <input type="text" class="form-control " placeholder="Address1" name="billingAddress1" value="" autofocus="">
                        <span id="billingAddress1_error" class="error text text-danger error-msg"></span>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">Address 2:</label>
                        <input type="text" class="form-control " placeholder="Address2" name="billingAddress2" value="" autofocus="">
                        <span id="billingAddress2_error" class="error text text-danger error-msg"></span>
                    </div>
                  </div>

                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-label">City:</label>
                        <input type="text" class="form-control " placeholder="City" name="BillingCity" value="" autofocus="">
                        <span id="BillingCity_error" class="error text text-danger error-msg"></span>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">Phone:</label>
                        <input type="number" class="form-control " placeholder="Phone" name="billingPhone" value="" autofocus="">
                        <span id="billingPhone_error" class="error text text-danger error-msg"></span>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">Postcode:</label>
                        <input type="text" class="form-control " placeholder="Postcode" name="billingPostcode" value="" autofocus="">
                        <span id="billingPostcode_error" class="error text text-danger error-msg"></span>
                    </div>
                  </div>

                  <div class="col-lg-6">
                      <div class="form-group required">
                          <label class="control-label">Country</label>
                          <div class="">
                              <x-country fieldname="billingCountryId" classes="country form-control"/>
                              <span class="text text-danger error-msg" id="billingCountryId_error"></span>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-6">
                     <div class="form-group required">
                          <label class="control-label">Region / State</label>
                          <div class="">
                              <x-state fieldname="billingStateId" classes="state form-control"/>
                              <span class="text text-danger error-msg" id="billingStateId_error"></span>
                          </div>
                     </div>
                  </div>

                </div>

            </div>
            <div class="field-footer">
                   <div class="btn-grp text-center">
                    <button type="button" class="btn btn-primary btn-back" id="billing_back_btn" onclick="Order_Form.backTo('customer')">Previous</button>
                     <button type="button" class="btn btn-primary" onclick="Order_Form.checkBillingDetail()">Continue</button>
                   </div>
              </div> 
            </fieldset>
            <!-- fieldsets -->
            <fieldset id="productTab" class="multistep-tab">
              <div class="form-head mb-4">
                <h3 class="step-title">Search Products</h3>
              </div>
               
               <div class="search-field">
                <div class="form-group">
                  <span class="text text-danger" id="search_product_error"></span>
                  <input type="text" name="search_product" class="form-control" placeholder="Type a product name,sku" autofocus="nope">
                  <div class="search-result searchProductResult">
                    <ul class="result-listing">
                    
                    </ul>
                  </div>
                </div>
              </div>

              <div class="addedProductList"></div> 

              <div class="field-footer">
                   <div class="btn-grp text-center">
                    <button type="button"  class="btn btn-primary btn-back" id="search_product_back_btn" onclick="Order_Form.backTo('billing')">Previous</button>
                     <button type="button" class="btn btn-primary" onclick="Order_Form.checkSearchProduct()">Continue</button>
                   </div>
              </div> 
            </fieldset>

            <!-- fieldsets -->
            <fieldset id="shippingTab" class="multistep-tab">
              <div class="form-head mb-4">
                <h3 class="step-title">Shipping Details</h3>
              </div>
                 <div class="radio-group mb-4">
              <div class="custom-control custom-radio">
                <input type="radio" id="shippingToExisting" name="shippingTo" value="existing" class="custom-control-input" checked>
                <label class="custom-control-label" for="shippingToExisting">I want to use an existing address</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="shippingToNew" name="shippingTo" value="new" class="custom-control-input">
                <label class="custom-control-label" for="shippingToNew">I want to use a new address</label>
              </div>
            </div>
            <div class="existing-billing-block shippingToToggle shippingToToggleExisting" style="display: none">
              <div class="form-group">
                <span class="text text-danger error-msg" id="shippingId_error"></span>
                <select id="shippingId" name="shippingId" class="form-control addressList">
                  <option value="">Please select</option>
                </select>
              </div>
            </div>
            <div class="new-address-block shippingToToggle shippingToToggleNew" style="display: none">
                <div class="row">

                  <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">First Name:</label>
                        <input type="text" class="form-control " placeholder="Firstname" name="shippingFirstname" value="" autofocus="">
                        <span id="shippingFirstname_error" class="error text text-danger error-msg"></span>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">Last Name:</label>
                        <input type="text" class="form-control " placeholder="shipping Lastname" name="shippingLastname" value="" autofocus="">
                        <span id="shippingLastname_error" class="error text text-danger error-msg"></span>
                    </div>
                  </div>

                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-label">Company:</label>
                        <input type="text" class="form-control " placeholder="Company" name="shippingCompnay" value="" autofocus="">
                        <span id="shippingCompnay_error" class="error text text-danger error-msg"></span>
                      </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">Address 1:</label>
                        <input type="text" class="form-control " placeholder="Address1" name="shippingAddress1" value="" autofocus="">
                        <span id="shippingAddress1_error" class="error text text-danger error-msg"></span>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">Address 2:</label>
                        <input type="text" class="form-control " placeholder="Address2" name="shippingAddress2" value="" autofocus="">
                        <span id="shippingAddress2_error" class="error text text-danger error-msg"></span>
                    </div>
                  </div>

                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-label">City:</label>
                        <input type="text" class="form-control " placeholder="City" name="shippingCity" value="" autofocus="">
                        <span id="shippingCity_error" class="error text text-danger error-msg"></span>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">Phone:</label>
                        <input type="number" class="form-control " placeholder="Phone" name="shippingPhone" value="" autofocus="">
                        <span id="shippingPhone_error" class="error text text-danger error-msg"></span>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">Postcode:</label>
                        <input type="text" class="form-control " placeholder="Postcode" name="shippingPostcode" value="" autofocus="">
                        <span id="shippingPostcode_error" class="error text text-danger error-msg"></span>
                    </div>
                  </div>

                  <div class="col-lg-6">
                      <div class="form-group required">
                          <label class="control-label">Country</label>
                          <div class="">
                              <x-country fieldname="shippingCountryId" classes="country form-control"/>
                              <span class="text text-danger error-msg" id="shippingCountryId_error"></span>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-6">
                     <div class="form-group required">
                          <label class="control-label">Region / State</label>
                          <div class="">
                              <x-state fieldname="shippingStateId" classes="state form-control"/>
                              <span class="text text-danger error-msg" id="shippingStateId_error"></span>
                          </div>
                     </div>
                  </div>

                </div>

            </div>
            <div class="field-footer">
                   <div class="btn-grp text-center">
                    <button type="button" class="btn btn-primary btn-back" id="shipping_back_btn" onclick="Order_Form.backTo('product')">Previous</button>
                     <button type="button" class="btn btn-primary" onclick="Order_Form.checkShippingDetail()">Continue</button>
                   </div>
              </div> 
            </fieldset>
            <!-- fieldsets -->

             <!-- fieldsets -->
            <fieldset id="shippingmethodTab" class="multistep-tab">
              <div class="form-head mb-4">
                <h3 class="step-title">Shipping Method</h3>
              </div>
              <div class="shippingMethodList"></div>
              <div class="field-footer">
                   <div class="btn-grp text-center">
                    <button type="button"  class="btn btn-primary btn-back" id="shipping_method_back_btn" onclick="Order_Form.backTo('shipping')">Previous</button>
                     <button type="button" class="btn btn-primary" onclick="Order_Form.checkShippingMethodDetail()">Continue</button>
                   </div>
              </div> 
            </fieldset>
            <!-- fieldsets -->


            <!-- fieldsets -->
            <fieldset id="confirmorderTab" class="multistep-tab">
              <div class="form-head mb-4">
                <h3 class="step-title">Confirm Order</h3>
              </div>
              <div class="confirm_order_details"></div>
              <div class="field-footer">
                   <div class="btn-grp text-center">
                    <button type="button"  class="btn btn-primary btn-back" id="confirm_order_back_btn" onclick="Order_Form.backTo('shippingmethod')">Previous</button>
                     <button type="submit" class="btn btn-primary btn-back" onclick="Order_Form.placeOrder()">Place Order</button>
                   </div>
              </div> 
            </fieldset>
            <!-- fieldsets -->
          
            </div>
         </div>
      </div>
    </form>  
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
<script type="text/javascript" src="{{asset('sadmin/js/order_create.js')}}"></script>
@endsection