@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         @include('admin.layouts.CardHeader')
         <div class="card-body">
            <div class="tab-content p-0">
               @include('msg')
               <form class="cstm-form" method="post" action="{{route('category-update')}}" name="category-update" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                     <div class="col-lg-5">
                        <div class="form-group">
                           <label class="form-label">Title<span class="required">*</span></label>
                           <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title" name="title" value="{{ $CategoryData->title }}" autofocus>
                           @error('title')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-5">
                        <div class="form-group">
                           <label class="form-label">Image<span class="required">*</span></label>
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
                     </div> 
                     <div class="col-sm-2">
                        <figure class="uploaded_img">
                           <img src="{{ $CategoryData->image }}" id="preview" class="img-thumbnail">
                        </figure>
                     </div>
                      <div class="col-lg-5">
                        <div class="form-group">
                           <?php 
                              $topcategory = null;
                              if(old('top')){
                                 $topcategory = old('top');
                              }else{
                                 $topcategory = $CategoryData->top;
                              }
                           ?>
                           <label class="form-label">Top Category</label>
                           <select name="top" class="form-control @error('description') is-invalid @enderror">
                              <option value="0" @if($topcategory == '0'){{'selected'}}@endif>No</option>
                              <option value="1" @if($topcategory == '1'){{'selected'}}@endif>Yes</option>
                           </select>
                           @error('description')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>                     
                     <div class="col-lg-7">
                        <div class="form-group">
                           <label class="form-label">Description</label>
                           <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Description" id="category-ckeditor" name="description">{{ $CategoryData->description }}</textarea>
                           @error('description')
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
                           <input type="text" class="form-control @error('pagetitle') is-invalid @enderror" placeholder="Page Title" name="pagetitle" value="{{ $CategoryData->pagetitle }}" autofocus>
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
                           <input type="text" class="form-control @error('metakeywords') is-invalid @enderror" placeholder="Meta Keywords" name="metakeywords" value="{{ $CategoryData->metakeywords }}" autofocus>
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
                              <input type="text" class="form-control @error('metadescription') is-invalid @enderror" placeholder="Meta Description" name="metadescription" value="{{ old('metadescription') ?? $CategoryData->metadescription }}" autofocus>
                              @error('metadescription')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                              @enderror
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="btn-wrap mt-3">
                           <input type="hidden" name="IdHidden" value="{{base64_encode($CategoryData->_id)}}">
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
<script>CKEDITOR.replace('category-ckeditor');</script>
@endsection