@extends('front.layouts.layout',['pageslug' => 'brand products','pagetitle' => 'Brand products'])
@section('content')
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{route('compare.show')}}">Brand products</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
<!-- page-title -->
@component('front.includes.page_title')
 <h1 class="title page-title"><span>Brand products</span></h1>
@endcomponent
 <!-- page-title  end-->


  write Here

@endsection
