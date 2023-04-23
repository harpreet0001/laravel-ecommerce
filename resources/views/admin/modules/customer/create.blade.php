@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         @include('admin.layouts.CardHeader')
         <div class="card-body">
            <div class="tab-content p-0">
               @include('msg')
               <form class="cstm-form" method="post" action="{{route('customer-save')}}" name="customer-save">
                  @csrf
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">First Name<span class="required">*</span></label>
                           <input type="text" class="form-control @error('firstname') is-invalid @enderror" placeholder="First Name" name="firstname" value="{{ old('firstname') }}" autofocus>
                           @error('firstname')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Last Name<span class="required">*</span></label>
                           <input type="text" class="form-control @error('lastname') is-invalid @enderror" placeholder="Last Name" name="lastname" value="{{ old('lastname') }}" autofocus>
                           @error('lastname')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">E-Mail<span class="required">*</span></label>
                           <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-Mail" name="email" value="{{ old('email') }}" autofocus>
                           @error('email')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Telephone<span class="required">*</span></label>
                           <input type="text" class="form-control @error('contact') is-invalid @enderror" placeholder="Telephone" name="contact" value="{{ old('contact') }}" autofocus>
                           @error('contact')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Password<span class="required">*</span></label>
                           <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" value="{{ old('password') }}" autofocus autocomplete="new-password">
                           @error('password')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Password Confirm<span class="required">*</span></label>
                           <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Password Confirm" name="password_confirmation" value="{{ old('password_confirmation') }}" autofocus autocomplete="new-password">
                           @error('password_confirmation')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Newsletter Subscribe<span class="required">*</span></label>
                           <label class="radio-inline">
                              <input type="radio" name="newsletter" value="1">
                              Yes
                           </label>
                           <label class="radio-inline">
                              <input type="radio" name="newsletter" value="0" checked="checked">
                              No
                           </label>
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