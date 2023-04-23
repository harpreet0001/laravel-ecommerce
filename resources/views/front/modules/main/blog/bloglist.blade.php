@extends('front.layouts.layout',['pageslug' => 'Blog','pageTitle'=>'Blog | Melanotan 2 Injections | Nasal Sprays | Megatan'])

@section('meta-data')
 <meta name="description" content="Check out our blog section to read about tips and tricks on using Melanotan 2 injections and nasal spray for a perfect tan. Get all the related information here.">
@endsection

@section('content')
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Blog</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Blog</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="blog-sec">
    <div class="container">
        <div class="blog_content">
            @forelse($blogs as $blog)
                <div class="megatan-blog-card">
                    <figure>
                        <span class="p-date p-date-image">{!! blogDateFormat($blog->created_at) !!}</span>
                        <a href="{{route('blog-detail',$blog->slug)}}">
                            <img src="{!! imagePath($blog->image) !!}" class="img-fluid">
                        </a>                    
                    </figure>
                    <figcaption>
                        <div class="post-stats">
                            <span class="p-author">Admin</span>
                            <span class="p-comment">{{$blog->comments()->where('active',1)->where('delete','!=',1)->count()}}</span>
                        </div>
                        <div class="name">
                        	<a href="{{route('blog-detail',$blog->slug)}}">{{$blog->title}}</a>
                        </div>
                        <div class="description">{!! $blog->content !!}</div>                    
                        <a href="{{route('blog-detail',$blog->slug)}}" class="btn read-more-btn main-btn">Read more<i class="fas fa-arrow-right"></i></a>
                    </figcaption>
                </div>
            @empty
            @endforelse
        </div>
    </div>
</section>
@endsection