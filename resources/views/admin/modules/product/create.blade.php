@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         @include('admin.layouts.CardHeader')
         <div class="card-body">
            <div class="tab-content p-0">
               @include('msg')
               <form class="cstm-form" method="post" action="{{route('product-save')}}" name="product-save" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group">
                           <?php   
                                 $selected_categories = old('category') ?? [];
                           ?>
                           <label class="form-label">Category</label>
                           <select class="form-control @error('category')is-invalid @enderror" name="category[]" id="category" multiple>
                              @foreach($category as $key => $value)
                                @if(in_array($value->_id,$selected_categories))
                                  <option value="{{ $value->_id }}" selected>{{ $value->title }}</option>
                                @else
                                  <option value="{{ $value->_id }}" >{{ $value->title }}</option>
                                @endif
                              @endforeach
                           </select>
                           @error('category')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Brand</label>
                           <select class="form-control" name="brand">
                              <option value="">Choose Brand</option>
                              @foreach($brand as $key => $value)
                                 <option value="{{ $value->_id }}">{{ $value->title }}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Product Type</label>
                           <?php 
                               $selected_product_type = old('type');
                           ?>
                           <select class="form-control" name="type" id="product_type">
                              <option value="0" @if($selected_product_type == '0'){{'selected'}}@endif>Physical Product</option>
                              <option value="1" @if($selected_product_type == '1'){{'selected'}}@endif>Downloadable Product</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Name<span class="required">*</span></label>
                           <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title" name="title" value="{{ old('title') }}" autofocus>
                           @error('title')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                      <div class="col-lg-6" style="display:none;" id="product-download">
                        <div class="form-group">
                           <label class="form-label">Attach File</label>
                           <input type="file" class="form-control @error('downloadfile') is-invalid @enderror" placeholder="FILE" name="downloadfile" value="{{ old('downloadfile') }}" autofocus>
                           @error('downloadfile')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">SKU</label>
                           <input type="text" class="form-control @error('sku') is-invalid @enderror" placeholder="SKU" name="sku" value="{{ old('sku') }}" autofocus>
                           @error('sku')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Image</label>
                           <input type="file" class="file" name="img" accept="image/*" autocomplete="img" autofocus>
                           <div class="upload-file-wrap">
                              <input type="text" class="form-control @error('img') is-invalid @enderror" disabled placeholder="Upload File" id="file">
                              <button type="button" class="browse btn btn-primary">Browse...</button>
                           </div>
                           @error('img')
                              <span class="invalid-feedback" style="display: block;" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                        <div class="form-group mb-0">
                           <img src="" id="preview" class="img-thumbnail" style="width: 20%;">
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label class="form-label">Description<span class="required">*</span></label>
                           <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Description" id="product-ckeditor" name="description">{{ old('description') }} </textarea>
                           @error('description')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="card card-inn">
                     <div class="card-header d-f j-c-s-b">
                        <h3 class="card-title">Pricing & Pre-Order Options</h3>
                     </div>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-label">Availability</label>
                                 <select class="form-control" id="avialsection" name="availability">
                                    <option value="1">can be purchased in my online store</option>
                                    <option value="2">coming soon but I want to take pre-orders</option>
                                    <option value="3">cannot be purchased in my online store</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <div id="availability_2" class="avialsectionCLS" style="display: none ;">
                                    <div class="row">
                                       <div class="col-lg-4">
                                          <label class="form-label">Message:</label>
                                          <input type="text" class="form-control" value="Expected release date is %%DATE%%" name="csmessage">
                                       </div>
                                       <div class="col-lg-4">
                                          <label class="form-label">Release Date:</label>
                                          <input type="date" class="form-control" name="csreleasedate">
                                       </div>
                                       <div class="col-lg-4">
                                          <label class="form-label">Release Date:</label>
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" name="csremovestatus" id="customCheck1">
                                             <label class="custom-control-label" for="customCheck1">Remove pre-order status on this date</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div id="availability_3" class="avialsectionCLS" style="display: none;">
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" name="callmessage" id="customCheck2">
                                       <label class="custom-control-label" for="customCheck2">Show "Call for pricing" message instead of the price</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Price<span class="required">*</span></label>
                                 $ <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="Price" name="price" value="{{ old('price') }}" autofocus> 
                                 <h6><small>(Excluding Tax)</small></h6>
                                 @error('price')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Cost Price</label>
                                 $ <input type="text" class="form-control @error('costprice') is-invalid @enderror" placeholder="Cost Price" name="costprice" value="{{ old('costprice') }}" autofocus>
                                 @error('costprice')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Retail Price</label>
                                 $ <input type="text" class="form-control @error('retailprice') is-invalid @enderror" placeholder="Retail Price" name="retailprice" value="{{ old('retailprice') }}" autofocus>
                                 @error('retailprice')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Sale Price</label>
                                 $ <input type="text" class="form-control @error('saleprice') is-invalid @enderror" placeholder="Sale Price" name="saleprice" value="{{ old('saleprice') }}" autofocus>
                                 @error('saleprice')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card card-inn">
                     <div class="card-header d-f j-c-s-b">
                        <h3 class="card-title">Shipping Details</h3>
                     </div>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Product Weight<span class="required">*</span></label>
                                 <input type="text" class="form-control @error('weight') is-invalid @enderror" placeholder="Weight" name="weight" value="{{ old('weight') }}" autofocus> Grams
                                 @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Product Width</label>
                                 <input type="text" class="form-control @error('width') is-invalid @enderror" placeholder="Width" name="width" value="{{ old('width') }}" autofocus> Centimeters
                                 @error('width')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Product Height</label>
                                 <input type="text" class="form-control @error('height') is-invalid @enderror" placeholder="Height" name="height" value="{{ old('height') }}" autofocus> Centimeters
                                 @error('height')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Product Depth</label>
                                 <input type="text" class="form-control @error('depth') is-invalid @enderror" placeholder="Depth" name="depth" value="{{ old('depth') }}" autofocus> Centimeters
                                 @error('depth')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Fixed Shipping Cost</label>
                                 $ <input type="text" class="form-control @error('fixshipping') is-invalid @enderror" placeholder="Fix Shipping Cost" name="fixshipping" value="{{ old('fixshipping') }}" autofocus>
                                 @error('fixshipping')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Free Shipping</label>
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="freeshipping" id="shippingCheck">
                                    <label class="custom-control-label" for="shippingCheck">Yes, this product has free shipping</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card card-inn">
                     <div class="card-header d-f j-c-s-b">
                        <h3 class="card-title">Inventory</h3>
                     </div>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Current Stock Level</label>
                                 <input type="text" class="form-control" name="currentstock" value="0">
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Low Stock Level</label>
                                 <input type="text" class="form-control" name="lowstock" value="0">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card card-inn">
                     <div class="card-header d-f j-c-s-b">
                        <h3 class="card-title">Other Details</h3>
                     </div>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Product Condition<span class="required">*</span></label>
                                 <select class="form-control" name="condition">
                                    <option value="new">New</option>
                                    <option value="used">Used</option>
                                    <option value="refurbished">Refurbished</option>
                                 </select>
                                 <input type="checkbox" name="showcondition"> Show the condition on the product page
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Product Warranty</label>
                                 <input type="text" class="form-control @error('warranty') is-invalid @enderror" placeholder="Product Warranty" name="warranty" value="{{ old('warranty') }}" autofocus>
                                 @error('warranty')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Search Keywords</label>
                                 <input type="text" class="form-control @error('searchkeyword') is-invalid @enderror" placeholder="Search Keywords" name="searchkeyword" value="{{ old('searchkeyword') }}" autofocus>
                                 @error('searchkeyword')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Product Tags</label>
                                 <input type="text" class="form-control @error('producttag') is-invalid @enderror" placeholder="Product Tags" name="producttag" value="{{ old('producttag') }}" autofocus>
                                 @error('producttag')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Visible</label>
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="active" id="VisibleCheck" checked="checked">
                                    <label class="custom-control-label" for="VisibleCheck">Yes, this product should be visible on my web site</label>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Featured Product</label>
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="featured" id="featuredCheck">
                                    <label class="custom-control-label" for="featuredCheck">Yes, this is a featured product</label>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Minimum Purchase Quantity</label>
                                 <input type="text" class="form-control @error('min_purchase_qty') is-invalid @enderror" placeholder="Minimum Purchase Quantity" name="min_purchase_qty" value="{{ old('min_purchase_qty') }}" autofocus>
                                 @error('min_purchase_qty')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Maximum Purchase Quantity</label>
                                 <input type="text" class="form-control @error('max_purchase_qty') is-invalid @enderror" placeholder="Maximum Purchase Quantity" name="max_purchase_qty" value="{{ old('max_purchase_qty') }}" autofocus>
                                 @error('max_purchase_qty')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card card-inn">
                     <div class="card-header d-f j-c-s-b">
                        <h3 class="card-title">Search Engine Optimization</h3>
                     </div>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Page Title</label>
                                 <input type="text" class="form-control @error('pagetitle') is-invalid @enderror" placeholder="Page Title" name="pagetitle" value="{{ old('pagetitle') }}" autofocus>
                                 @error('pagetitle')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Meta Keywords</label>
                                 <input type="text" class="form-control @error('metakeywords') is-invalid @enderror" placeholder="Meta Keywords" name="metakeywords" value="{{ old('metakeywords') }}" autofocus>
                                 @error('metakeywords')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Meta Description</label>
                                 <input type="text" class="form-control @error('metadescription') is-invalid @enderror" placeholder="Meta Description" name="metadescription" value="{{ old('metadescription') }}" autofocus>
                                 @error('metadescription')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="btn-wrap mt-3">
                           <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
<script>CKEDITOR.replace('product-ckeditor');</script>
@endsection
@section('js')
<script type="text/javascript">

   $(document).ready(function()
   {
      $('select[id="category"]').select2();
   });

</script>
@endsection