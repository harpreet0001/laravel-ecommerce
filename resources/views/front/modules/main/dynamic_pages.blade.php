@extends('front.layouts.layout',['pageslug' => $data->slug ?? '' ,'pageTitle' => $data->pagetitle ?? '' ])

@section('meta-data')
 <meta name="description" content="{{$data->metadescription ?? ''}}">
 <meta name="keywords" content="{{$data->metakeywords ?? ''}}" />
@endsection

@section('content')
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{Request::url()}}">{{$data->title ?? ''}}</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>{{$data->title ?? ''}}</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="aside-sec">
    <div class="container">
        <div class="aside-_content">
            <div class="row">
                <aside class="side-column">
                    <!-- mobile sec -->
                    <div class="mobile-wrapper-header">
                        <span>Filters</span>
                        <a class="x"><i class="fas fa-times"></i></a>
                    </div>
                    <!-- mobile sec end -->
                   
                    <div class="aside_links">
                        <h3 class="module-title">Categories</h3>
                        <!--sidebar category component-->
                        <x-category /> 
                    </div>
                </aside>
                <div class="right-content">
                    <div class="top-heading">
                        <h2>{{$data->title ?? ''}}</h2>
                    </div>
                    <div class="main-products"> 
                     {!! $data->content!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<a class="mobile-filter-trigger btn">Filter Products</a>
@endsection