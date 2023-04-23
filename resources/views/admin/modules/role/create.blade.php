@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         @include('admin.layouts.CardHeader')
         <div class="card-body">
            <div class="tab-content p-0">
               @include('msg')
               <form method="POST" action="{{ route('role-save') }}" name="register" class="register-form form-horizontal">
                  @csrf
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Role<span class="required">*</span></label>
                           <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}"  autocomplete="role" autofocus>
                           @error('role')
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
                        </div>
                     </div>
                     <div class="card-body">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label class="form-label" style="cursor: pointer;"><input class="" type="checkbox" id="allchecked">&nbsp; Select all module</label>
                              <ul class="checkbox-grp-list">
                                 @foreach($modules as $key => $value)
                                    <li>
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input moduleclass @error('permissions') is-invalid @enderror" id="customCheck_{{$value->_id}}" value="{{$value->_id}}" name="permissions[]" {{ !empty(old("permissions")) && in_array($value->_id, old("permissions")) ? 'checked' : '' }} >
                                          <label class="custom-control-label" for="customCheck_{{$value->_id}}">{{$value->title}}</label>
                                       </div>
                                    </li>
                                 @endforeach
                              </ul>
                              @error('permissions')
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
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection