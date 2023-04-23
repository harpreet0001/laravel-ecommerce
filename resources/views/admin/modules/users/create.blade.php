@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
        @include('admin.layouts.CardHeader')
         <div class="card-header user-card-header">
            <p>A user is someone who has access to the administration area of your store. Each user account also has its own customizable access permissions, which you can setup below.</p>
         </div>
         <div class="card-body">
            @include('msg')
            <form method="POST" action="{{ route('user-save') }}" name="register" class="register-form form-horizontal">
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
               </div>
               <div class="card mt-4">
                  <div class="card-header d-f j-c-s-b" style="cursor: move;">
                     <div class="left-block">
                        <h3 class="card-title">Permissions</h3>
                        <p>Permissions allow you to restrict which areas of the administration area this user can access.</p>
                     </div>
                     <div class="btn-wrap">
                        <a href="{{route('role-list')}}" class="btn btn-primary">Role Setting</a>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label class="form-label">Assign Role<span class="required">*</span></label>
                              <select id="assignrole" type="text" class="form-control @error('assignrole') is-invalid @enderror" name="assignrole" value="{{ old('assignrole') }}"  autocomplete="assignrole" autofocus>
                                 <option value="">Select</option>
                                 @foreach($role as $rolekey => $rolevalue)
                                    <option value="{{$rolevalue->_id}}" {{ old("assignrole") == $rolevalue->_id ? 'selected' : '' }}>{{$rolevalue->role}}</option>
                                 @endforeach
                              </select>
                              @error('assignrole')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label class="form-label">Module<span class="required">*</span></label>
                              <ul class="checkbox-grp-list ULmodule">
                                 @foreach($modules as $key => $value)
                                    <li>
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="modulecheckbox custom-control-input @error('userpermissions') is-invalid @enderror" id="customCheck_{{$value->_id}}" {{(!empty(old("assignrole"))) || (!empty(old("userpermissions")) && sizeof(old("userpermissions"))>0) ? '' : 'disabled="disabled"'}} name="userpermissions[]" value="{{$value->_id}}" {{ !empty(old("userpermissions")) && in_array($value->_id, old("userpermissions")) ? 'checked' : '' }} >
                                          <label class="custom-control-label" for="customCheck_{{$value->_id}}">{{$value->title}}</label>
                                       </div>
                                    </li>
                                 @endforeach
                              </ul>
                              @error('userpermissions')
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
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection