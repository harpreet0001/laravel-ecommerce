@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         @include('admin.layouts.CardHeader')
         <div class="card-body">
            <div class="tab-content p-0">
               @include('msg')
               <form class="cstm-form" method="post" action="{{route('brand-save')}}" name="brand-save">
                  @csrf
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Title<span class="required">*</span></label>
                           <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title" name="title" value="{{ old('title') }}" autofocus>
                           @error('title')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                           <label class="form-label">Search Engine Optimization:</label>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Page Title</label>
                           <input type="text" class="form-control @error('pagetitle') is-invalid @enderror" placeholder="Page Title" name="pagetitle" value="{{ old('pagetitle') ?? '' }}" autofocus>
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
                           <input type="text" class="form-control @error('metakeywords') is-invalid @enderror" placeholder="Meta Keywords" name="metakeywords" value="{{ old('metakeywords') ?? '' }}" autofocus>
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
                              <input type="text" class="form-control @error('metadescription') is-invalid @enderror" placeholder="Meta Description" name="metadescription" value="{{ old('metadescription') ?? '' }}" autofocus>
                              @error('metadescription')
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