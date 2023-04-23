@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
  <div class="content-card">
    <div class="card">
        <div class="card-header d-f j-c-s-b" style="cursor: move;">
       <h3 class="card-title">Order Create Copy</h3>
          <div class="btn-wrap">
       </div>
    </div>
      <div class="card-body">
         <div class="multistep-form-container">
           <!-- progressbar -->
           <section class="multi_step_form">  
            <ul id="progressbar">
              <li class="active"> Customer Details</li>  
              <li>Biling Details</li> 
              <li>Search Products</li>
              <li>Shipping Address</li>
              <li> Shipping Method</li>
              <li>Confirm Order</li>
            </ul>
          </section>
            
            <div class="multistep-content">
              <!-- fieldsets -->
           <fieldset id="multistep-tab1" class="multistep-tab active">
            <div class="form-head mb-4">
                <h3 class="step-title">Customer Details</h3>
              </div>
                <div class="radio-group mb-4">
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked>
                <label class="custom-control-label" for="customRadio1">Search my existing customer list</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                <label class="custom-control-label" for="customRadio2">A new customer or in-store purchase</label>
              </div>
            </div>

            <div class="radio-content-area">
              <div class="search-field">
                <div class="form-group">
                  <input type="text" name="" placeholder="Search here..." class="form-control">
                  <div class="search-result">
                    <ul class="result-listing">
                      <li><a href="javascript:void(0);" class="result-item"><span class="r-name">Lorem Ipsum</span> <span class="e-mail">dummy@gmail.com</span> <span class="n-number">85399412</a></li>
                        <li><a href="javascript:void(0);" class="result-item"><span class="r-name">Lorem Ipsum</span> <span class="e-mail">dummy@gmail.com</span> <span class="n-number">85399412</a></li>
                          <li><a href="javascript:void(0);" class="result-item"><span class="r-name">Lorem Ipsum</span> <span class="e-mail">dummy@gmail.com</span> <span class="n-number">85399412</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="new-customer-block">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-label">Lorem ipsum</label>
                      <input type="text" name="" class="form-control" placeholder="Lorem ipsum">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-label">Lorem ipsum</label>
                      <input type="text" name="" class="form-control" placeholder="Lorem ipsum">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-label">Lorem ipsum</label>
                      <input type="text" name="" class="form-control" placeholder="Lorem ipsum">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-label">Lorem ipsum</label>
                      <input type="text" name="" class="form-control" placeholder="Lorem ipsum">
                    </div>
                  </div>
                </div>
              </div>
                
              </div> 
              <div class="field-footer">
                   <div class="btn-grp text-center">
                    <button type="button" id="customer_detail_btn" class="btn btn-primary">Previous</button>
                     <button type="button" id="customer_detail_btn" class="btn btn-primary">Continue</button>
                   </div>
              </div>         
           </fieldset>
           <!-- fieldsets -->
            <fieldset id="multistep-tab2" class="multistep-tab">
              <div class="form-head mb-4">
                <h3 class="step-title">Biling Details</h3>
              </div>
                 <div class="radio-group mb-4">
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input" checked>
                <label class="custom-control-label" for="customRadio3">I want to use an existing address</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                <label class="custom-control-label" for="customRadio4">I want to use a new address</label>
              </div>
            </div>
            <div class="existing-billing-block">
              <div class="form-group">
                <select class="form-control">
                  <option>Option 1</option>
                  <option>Option 1</option>
                  <option>Option 1</option>
                </select>
              </div>
            </div>
            <div class="new-address-block">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-label">Lorem ipsum</label>
                      <input type="text" name="" class="form-control" placeholder="Lorem ipsum">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-label">Lorem ipsum</label>
                      <input type="text" name="" class="form-control" placeholder="Lorem ipsum">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-label">Lorem ipsum</label>
                      <input type="text" name="" class="form-control" placeholder="Lorem ipsum">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-label">Lorem ipsum</label>
                      <input type="text" name="" class="form-control" placeholder="Lorem ipsum">
                    </div>
                  </div>
                </div>
            </div>


            <div class="new-address-block">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-label">Lorem ipsum</label>
                      <input type="text" name="" class="form-control" placeholder="Lorem ipsum">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-label">Lorem ipsum</label>
                      <input type="text" name="" class="form-control" placeholder="Lorem ipsum">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-label">Lorem ipsum</label>
                      <input type="text" name="" class="form-control" placeholder="Lorem ipsum">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-label">Lorem ipsum</label>
                      <input type="text" name="" class="form-control" placeholder="Lorem ipsum">
                    </div>
                  </div>
                </div>
            </div>
            <div class="field-footer">
                   <div class="btn-grp text-center">
                    <button type="button" id="customer_detail_btn" class="btn btn-primary">Previous</button>
                     <button type="button" id="customer_detail_btn" class="btn btn-primary">Continue</button>
                   </div>
              </div> 
            </fieldset>
            <!-- fieldsets -->
            <fieldset id="multistep-tab3" class="multistep-tab">
              <div class="form-head mb-4">
                <h3 class="step-title">Search Products</h3>
              </div>
               
               <div class="search-field">
                <div class="form-group">
                  <input type="text" name="" placeholder="Search here..." class="form-control">
                  <div class="search-result">
                    <ul class="result-listing">
                      <li><a href="javascript:void(0);" class="result-item"><span class="r-name">Lorem Ipsum</span> <span class="e-mail">dummy@gmail.com</span> <span class="n-number">85399412</a></li>
                        <li><a href="javascript:void(0);" class="result-item"><span class="r-name">Lorem Ipsum</span> <span class="e-mail">dummy@gmail.com</span> <span class="n-number">85399412</a></li>
                          <li><a href="javascript:void(0);" class="result-item"><span class="r-name">Lorem Ipsum</span> <span class="e-mail">dummy@gmail.com</span> <span class="n-number">85399412</a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th>Products Image</th>
                        <th>Products Name</th>
                        <th>Qty</th>
                        <th>Item Price </th>
                        <th>Item Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><span class="product-img"></span></td>
                        <td>Vitamin B12 Ampules</td>
                        <td><input type="number" name="" class="form-control" style="max-width: 120px" /></td>
                        <td>£4.25 </td>
                        <td>4.25</td>
                        <td><a href="javascript:void(0);" class="btn-icon"><i class="fas fa-trash-alt"></i></a></td>
                      </tr>
                    </tbody>
                  </table>
              </div>

              <div class="field-footer">
                   <div class="btn-grp text-center">
                    <button type="button" id="customer_detail_btn" class="btn btn-primary">Previous</button>
                     <button type="button" id="customer_detail_btn" class="btn btn-primary">Continue</button>
                   </div>
              </div> 
            </fieldset>
          
            </div>
         </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
@endsection