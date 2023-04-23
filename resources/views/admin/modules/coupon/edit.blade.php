@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         @include('admin.layouts.CardHeader')
         <div class="card-body">
            <div class="tab-content p-0">
               @include('msg')
               <form class="cstm-form" method="post" action="{{route('coupon-update',base64_encode($CouponData->_id))}}" name="module-save">
                  @csrf
                  @method('patch')
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-label">Coupon<span class="required">*</span></label>
                           <input type="text" name="coupon" value="{{  old('coupon') ?? $CouponData->coupon}}" class="form-control @error('coupon') is-invalid @enderror" placeholder="Coupon" autofocus>
                           @error('coupon')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-label">Discount Type<span class="required">*</span></label>
                          <?php 
                               $selectedDiscountType = '';
                               if(old('discount_type'))
                               {
                                  $selectedDiscountType = old('discount_type');
                               }
                               else
                               {
                                  $selectedDiscountType = $CouponData->discount_type;
                               }
                          ?>
                          <select name="discount_type" class="form-control @error('discount_type') is-invalid @enderror">
                             <option value="1" @if($selectedDiscountType == '1'){{'selected'}}@endif>Percent</option>
                             <option value="2" @if($selectedDiscountType == '2'){{'selected'}}@endif>Fixed Discount</option>
                          </select>
                           @error('discount_type')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-label">Coupon For<span class="required">*</span></label>
                             <?php 
                               $selectedCouponFor = '';
                               if(old('coupon_for'))
                               {
                                  $selectedCouponFor = old('coupon_for');
                               }
                               else
                               {
                                  $selectedCouponFor = $CouponData->coupon_for;
                               }
                             ?>
                            <select name="coupon_for" class="form-control @error('coupon_for') is-invalid @enderror">
                             <option value="1" @if($selectedCouponFor == '1'){{'selected'}}@endif>For All Members</option>
                             <option value="2" @if($selectedCouponFor == '2'){{'selected'}}@endif>Selected Members</option>
                          </select>
                           @error('coupon_for')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-12 selected_member_list" style="display: none">
                        <div class="form-group"> 
                          <label class="form-label">Users<span class="required">*</span></label>
                            <?php 
                                
                              if(old('users'))
                              {
                                $selectedUsers = old('users');
                              }
                              else 
                              {
                                $selectedUsers = json_decode($CouponData->users);
                              }
                            ?>
                            <select name="users[]" class="form-control select2 @error('users.*') is-invalid @enderror" multiple>
                             <option value="">select</option>
                              @foreach($users as $user)
                                @if(in_array($user->_id,$selectedUsers))
                                 <option value="{{$user->_id}}" selected>{{$user->email}}</option>
                                @else
                                 <option value="{{$user->_id}}">{{$user->email}}</option>
                                @endif
                              @endforeach
                          </select>
                           @error('users.*')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-label">Discount<span class="required">*</span></label>
                           <input type="text" name="discount" value="{{ old('discount') ?? $CouponData->discount }}" class="form-control @error('discount') is-invalid @enderror" placeholder="Discount" autofocus>
                           @error('discount')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-label">Apply on minimum amount<span class="required">*</span></label>
                           <input type="text" name="min_cart_total" value="{{ old('min_cart_total') ?? $CouponData->min_cart_total }}" class="form-control @error('min_cart_total') is-invalid @enderror" placeholder="Apply on minimum amount" autofocus>
                           @error('min_cart_total')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-12 max_discount_container">
                        <div class="form-group">
                          <label class="form-label">Maximum Discount Amount<span class="required">*</span></label>
                           <input type="text" name="max_discount" id="max_discount" value="{{ old('max_discount') ?? $CouponData->max_discount }}" class="form-control @error('max_discount') is-invalid @enderror" placeholder="Maximum Discount Amount" autofocus>
                           @error('max_discount')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-label">Maximum Usage Time</label>
                           <input type="text" name="usage_time" value="{{ old('usage_time') ?? $CouponData->usage_time }}" class="form-control @error('usage_time') is-invalid @enderror" placeholder="usage_time" autofocus>
                           @error('usage_time')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-label">Expire Date<span class="required">*</span></label>
                           <input type="text" name="expire_date" value="{{ old('expire_date') ?? $CouponData->expire_date }}" class="form-control @error('expire_date') is-invalid @enderror" autofocus >
                           @error('expire_date')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-label">Description</label>
                           <textarea name="description" class="form-control @error('description') is-invalid @enderror"  placeholder="Description" autofocus>{{ old('description') ?? $CouponData->description }}</textarea>
                           @error('description')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
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
@endsection
@section('js')
<script type="text/javascript">
   $(document).ready(function()
   { 
      setDateTimePicker('input[name="expire_date"]');
      $('.select2').select2()
   })
</script>
@endsection