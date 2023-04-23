@extends('admin.layouts.layout')

@section('content')

<div class="content-wrapper p-4">
<div class="content-card">
	<div class="card-inn-heading mb-4">
		<h2>Page Edit</h2>
	</div>
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

   	<div class="btn-wrap">
   		<button type="submit" class="btn btn-primary">Save</button>
   	</div>
   </form>

	</div>
</div>
<script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
<script>CKEDITOR.replace('article-ckeditor');</script>
@endsection