@extends('front.layouts.layout',['pageslug' => 'Recurring','pagetitle'=>'Account|Recurring'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{Request::url()}}">Recurring</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Recurring </span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content" class=" col-sm-9">
                
                
            </div>
            @include('front.includes.aside',['activelink' => 'account'])
        </div>
    </div>
</section>
@endsection