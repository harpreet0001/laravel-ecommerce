@extends('front.layouts.layout',['pageslug' => $blog->title,'pageTitle' => $blog->pagetitle ?? '' ])

@section('meta-data')
 <meta name="description" content="{{$blog->metadescription ?? ''}}">
 <meta name="keywords" content="{{$blog->metakeywords ?? ''}}" />
@endsection

@section('content')
<div class="page-login common-container">
<h1 class="title page-title"><span>{{$blog->title}}</span></h1>
<div class="container blog-post">
<div class="row">
<div id="content" class="p-0">
<div class="post-details">
<div class="post-image">
<span class="p-date p-date-image">{!! blogDateFormat($blog->created_at) !!}</span>
<img src="{{imagePath($blog->image)}}" srcset="{{imagePath($blog->image)}}" width="1060" height="400" alt="What is a Sunburn?" title="{{$blog->title}}">
</div>
<div class="post-stats">
<span class="p-posted">Posted By</span>
<span class="p-author">Admin</span>
<span class="p-comment">{{$blog->comments()->where('active',1)->where('delete','!=',1)->count()}} Comment(s)</span>
</div>
<div class="post-content cstm-post_content">
	{!! $blog->content !!}
</div>
</div>
<div class="post-comments mb-5">
<div class="comment-form">
<h3 class="title">Leave a Comment</h3>
<form method="post" class="form-horizontal" action="{{route('add-blog-comment',base64_encode($blog->_id))}}" onsubmit="blogComment.add(this)">
	 @csrf
	 @method('post')
	<fieldset>
		<div class="form-group required">
			<label class="col-sm-2 control-label" for="input-name">Your Name</label>
			<div class="col-sm-10">
			   <input type="text" name="name" value="" id="input-name" class="form-control">
			   <span class="text text-danger err-msg" id="name_error"></span>
			</div>
		</div>
		<div class="form-group required">
			<label class="col-sm-2 control-label" for="input-email">E-Mail</label>
			<div class="col-sm-10">
			   <input type="text" name="email" value="" id="input-email" class="form-control">
			   <span class="text text-danger err-msg" id="email_error"></span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="input-website">Web Site</label>
			<div class="col-sm-10">
			   <input type="text" name="website" value="" id="input-website" class="form-control">
			   <span class="text text-danger err-msg" id="website_error"></span>
			</div>
		</div>
		<div class="form-group required">
			<label class="col-sm-2 control-label" for="input-comment">Comments</label>
			<div class="col-sm-10">
			   <textarea name="comment" rows="10" id="input-comment" class="form-control" spellcheck="false"></textarea>
			   <span class="text text-danger err-msg" id="comment_error"></span>
			</div>
		</div>
	</fieldset>
	<div class="buttons">
		<div class="pull-right">
		    <button type="submit" class="btn comment-submit">Submit</button>
		</div>
	</div>
</form>
</div>
</div>
</div>
</div>

</div>
</div>
@endsection