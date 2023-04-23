@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
            @include('admin.layouts.CardHeader')
            <div class="card-body">
               <div class="tab-content p-0">
                  <div class="form-group">
                     <label class="form-label">Blog</label>
                     <p class="form-control">{{$blogcomment->blog->title ?? ''}}</p>
                  </div>
                  <div class="form-group">
                     <label class="form-label">Name</label>
                     <p class="form-control">{{$blogcomment->name ?? ''}}</p>
                  </div>
                  <div class="form-group">
                     <label class="form-label">Email</label>
                     <p class="form-control">{{$blogcomment->email ?? ''}}</p>
                  </div>
                  <div class="form-group">
                     <label class="form-label">Website</label>
                     <p class="form-control">{{$blogcomment->website ?? ''}}</p>
                  </div>
                  <div class="form-group">
                     <label class="form-label">Comment</label>
                     <p class="form-control">{!! $blogcomment->comment ?? '' !!}</p>
                  </div>
                  
                  <div class="form-group">
                     <label class="switch mini-switch">
                        <input type="checkbox" class="target_switch" data-attr="{{route('blogcomment-active',base64_encode($blogcomment->_id))}}" @if($blogcomment->active) {{'checked'}} @endif>
                            <span class="slider round"></span>
                     </label>
                  </div>

               </div>
            </div>
      </div>
   </div>
</div>
@endsection