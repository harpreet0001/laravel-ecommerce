@extends('front.layouts.layout',['pageslug' => 'Blog list','pagetitle'=>'Blog list'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Blog list</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Blog list</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="blog-sec">
    <div class="container">
        <div class="blog_content">
            <div class="megatan-blog-card">
                <figure>
                    <span class="p-date p-date-image">05<i>Aug</i></span>
                    <a href="javascript:void(0);">
                        <img src="http://49.249.236.30:7860/images/blog/1628162745.jpg" class="img-fluid">
                    </a>                    
                </figure>
                <figcaption>
                    <div class="post-stats">
                        <span class="p-author">constantine</span>
                        <span class="p-comment">0</span>
                        <span class="p-view">178</span>
                    </div>
                    <div class="name">
                    	<a href="javascript:void(0);">How To Use Melanotan 2</a>
                    </div>
                    <div class="description">Melanotan 2 (most commonly referred to as MT2) is a lyophilized powder, which when injected into the body, gives it the desired brown coloured sunless tan. It can be primarily used in two forms, which consist of:Injectable Melanotan 2Melanotan 2 nasal sprayTips for Intake of Injectable FormWhen undertaking injections for the perfect tan, you need t..</div>                    
                   
                    <a href="javascript:void(0);" class="btn read-more-btn main-btn">Read more<i class="fas fa-arrow-right"></i></a>
                </figcaption>
            </div>
            <div class="megatan-blog-card">
                <figure>
                    <span class="p-date p-date-image">05<i>Aug</i></span>
                    <a href="javascript:void(0);">
                        <img src="http://49.249.236.30:7860/images/blog/1628162745.jpg" class="img-fluid">
                    </a>                    
                </figure>
                <figcaption>
                    <div class="post-stats">
                        <span class="p-author">constantine</span>
                        <span class="p-comment">0</span>
                        <span class="p-view">178</span>
                    </div>
                    <div class="name">
                    	<a href="javascript:void(0);">How To Use Melanotan 2</a>
                    </div>
                    <div class="description">Melanotan 2 (most commonly referred to as MT2) is a lyophilized powder, which when injected into the body, gives it the desired brown coloured sunless tan. It can be primarily used in two forms, which consist of:Injectable Melanotan 2Melanotan 2 nasal sprayTips for Intake of Injectable FormWhen undertaking injections for the perfect tan, you need t..</div>                    
                   
                    <a href="javascript:void(0);" class="btn read-more-btn main-btn">Read more<i class="fas fa-arrow-right"></i></a>
                </figcaption>
            </div>
            <div class="megatan-blog-card">
                <figure>
                    <span class="p-date p-date-image">05<i>Aug</i></span>
                    <a href="javascript:void(0);">
                        <img src="http://49.249.236.30:7860/images/blog/1628162745.jpg" class="img-fluid">
                    </a>                    
                </figure>
                <figcaption>
                    <div class="post-stats">
                        <span class="p-author">constantine</span>
                        <span class="p-comment">0</span>
                        <span class="p-view">178</span>
                    </div>
                    <div class="name">
                    	<a href="javascript:void(0);">How To Use Melanotan 2</a>
                    </div>
                    <div class="description">Melanotan 2 (most commonly referred to as MT2) is a lyophilized powder, which when injected into the body, gives it the desired brown coloured sunless tan. It can be primarily used in two forms, which consist of:Injectable Melanotan 2Melanotan 2 nasal sprayTips for Intake of Injectable FormWhen undertaking injections for the perfect tan, you need t..</div>                    
                   
                    <a href="javascript:void(0);" class="btn read-more-btn main-btn">Read more<i class="fas fa-arrow-right"></i></a>
                </figcaption>
            </div>
        </div>
    </div>
</section>
@endsection