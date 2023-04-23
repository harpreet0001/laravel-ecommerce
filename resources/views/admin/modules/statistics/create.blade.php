@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         @include('admin.layouts.CardHeader')
         <div class="card-body">
            <div class="tab-content p-0">
               @include('msg')
               <form class="cstm-form" method="post" action="{{route('module-save')}}" name="module-save">
                  @csrf
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Type</label>
                           <select class="form-control" id="select-type" name="type">
                              <option value="0">Parent</option>
                              <option value="1">Child</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Title</label>
                           <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title" name="title" value="{{ old('title') }}" autofocus>
                           @error('title')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Slug<span class="required">*</span></label>
                           <input type="text" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug" name="slug" value="{{ old('slug') }}" autofocus>
                           @error('slug')
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