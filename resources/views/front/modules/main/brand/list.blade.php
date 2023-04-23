@extends('front.layouts.layout',['pageslug' => 'brands','pagetitle' => 'Brands'])
@section('content')
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{Request::url()}}">Brands</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
 <h1 class="title page-title"><span>Brands</span></h1>
@endcomponent
 <!-- page-title  end-->
<section class="brand-copy-sec" id="brand-copy-sec">
  <div class="container">
    <div class="main-cards">
    	@forelse($brands as $brand)
    	    <div class="brand_card text-center">
		        <p>{{$brand->title ?? ''}}</p>
		        <a href="{{route('brand.products',base64_encode($brand->_id))}}" class="brand-view-btn">{{$brand->title ?? ''}}</a>
		    </div>
		@empty
		    <div class="brand_card text-center">
		        <p>No Brand Found!</p>
		        <a href="{{route('shop')}}" class="brand-view-btn">Click Here</a>
		    </div>
		@endforelse
    </div>
  </div>
</section>
@endsection
