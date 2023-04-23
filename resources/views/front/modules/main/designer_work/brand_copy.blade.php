@extends('front.layouts.layout',['pageslug' => 'brands','pagetitle' => 'Brands'])
@section('content')
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{route('compare.show')}}">Brands</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
<!-- page-title -->
@component('front.includes.page_title')
 <h1 class="title page-title"><span>Brands</span></h1>
@endcomponent
 <!-- page-title  end-->


<section class="brand-copy-sec" id="brand-copy-sec">
  <div class="container">
    <div class="main-cards">
      <div class="brand_card text-center">
        <p>Melanotan 2</p>
        <a href="javascript:void(0);" class="brand-view-btn">View</a>
      </div>
      <div class="brand_card text-center">
        <p>Melanotan Nasal Spray</p>
        <a href="javascript:void(0);" class="brand-view-btn">View</a>
      </div>
      <div class="brand_card text-center">
        <p>Melanotan Oral Drops</p>
        <a href="javascript:void(0);" class="brand-view-btn">View</a>
      </div>
      <div class="brand_card text-center">
        <p>MT2 Reseller Packs</p>
        <a href="javascript:void(0);" class="brand-view-btn">View</a>
      </div>
      <div class="brand_card text-center">
        <p>MT2 Starter Kits</p>
        <a href="javascript:void(0);" class="brand-view-btn">View</a>
      </div>
      <div class="brand_card text-center">
        <p>Tanning Injection Supplies</p>
        <a href="javascript:void(0);" class="brand-view-btn">View</a>
      </div>
    </div>
  </div>
</section>

@endsection
