@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         @include('admin.layouts.CardHeader')
         <div class="card-body">
            <div class="tab-content p-0">
               @include('msg')
               <form class="cstm-form" method="post" action="{{route('blog_save')}}" name="blog-create" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Title<span class="required">*</span></label>
                           <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title" name="title" value="{{ old('title') }}"  autocomplete="title" autofocus>
                        </div>
                        @error('title')
                           <span class="invalid-feedback" style="display: block;" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Featured Image<span class="required">*</span></label>
                           <!-- <input type="file" class="form-control" placeholder="Title" name="title"> -->
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
                        <div class="ml-2 col-sm-6">
                           <img src="" id="preview" class="img-thumbnail">
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label class="form-label">Content<span class="required">*</span></label>
                           <textarea class="form-control @error('content') is-invalid @enderror" placeholder="Content" id="article-ckeditor" name="content" autocomplete="title" autofocus></textarea>
                        </div>
                        @error('content')
                           <span class="invalid-feedback" style="display: block;" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
                     <div class="col-lg-12">
                        <div class="card card-inn">
                           <div class="card-header d-f j-c-s-b">
                              <h3 class="card-title">Search Engine Optimization</h3>
                           </div>
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-label">Page Title</label>
                                      <input type="text" class="form-control " placeholder="Page Title" name="pagetitle" value="{{old('pagetitle') ?? ''}}" autofocus="">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-label">Meta Keywords</label>
                                      <input type="text" class="form-control " placeholder="Meta Keywords" name="metakeywords" value="{{old('metakeywords') ?? ''}}" autofocus="">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-label">Meta Description</label>
                                      <input type="text" class="form-control " placeholder="Meta Description" name="metadescription" value="{{old('metadescription') ?? ''}}" autofocus="">
                                    </div>
                                 </div>
                              </div>
                           </div>
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
<script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
<script>CKEDITOR.replace('article-ckeditor');</script>
@endsection