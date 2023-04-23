@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         @include('admin.layouts.CardHeader')
         <div class="card-body">
            <div class="tab-content p-0">
               @include('msg')
               <form class="cstm-form" method="post" action="{{route('page_update',$page->_id)}}" name="page_update">
                  @csrf
                  <div class="form-group">
                     <label class="form-label">Title</label>
                     <input type="text" class="form-control" placeholder="Title" name="title" value="{{$page->title}}">
                  </div>
                  <div class="form-group">
                     <label class="form-label">Content</label>
                     <textarea class="form-control" placeholder="Content" id="article-ckeditor" name="content">{{$page->content}}</textarea>
                  </div>
                  <div class="form-group">
                     <label class="form-label">Status</label>
                     <label class="switch ">
                     <input type="checkbox" class="target_switch" value="1" name="status" {{$page->status==1 ? 'checked' : ''}}>
                     <span class="slider round"></span>
                     </label>
                  </div>
                                       <div class="col-lg-12">
                        <div class="form-group">
                           <label class="form-label">Search Engine Optimization:</label>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Page Title</label>
                           <input type="text" class="form-control @error('pagetitle') is-invalid @enderror" placeholder="Page Title" name="pagetitle" value="{{ old('pagetitle') ?? $page->pagetitle }}" autofocus>
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
                           <input type="text" class="form-control @error('metakeywords') is-invalid @enderror" placeholder="Meta Keywords" name="metakeywords" value="{{ old('metakeywords') ?? $page->metakeywords }}" autofocus>
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
                              <input type="text" class="form-control @error('metadescription') is-invalid @enderror" placeholder="Meta Description" name="metadescription" value="{{ old('metadescription') ?? $page->metadescription }}" autofocus>
                              @error('metadescription')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                              @enderror
                        </div>
                     </div>
                  <div class="btn-wrap">
                     <button type="submit" class="btn btn-primary">Save</button>
                  </div>
               </form>
            </div>
         </div>
         <!-- /.card-body -->
      </div>
   </div>
</div>
<script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
<script>CKEDITOR.replace('article-ckeditor');</script>
@endsection