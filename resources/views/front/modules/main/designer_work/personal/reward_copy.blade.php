@extends('front.layouts.layout',['pageslug' => 'Reward','pagetitle'=>'Reward'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Reward</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Reward</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-9">
                <p class="reward-point-pera">Your total number of reward points is: <b>0</b>.</p>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td class="text-left">Date Added</td>
                                <td class="text-left">Description</td>
                                <td class="text-right">Points</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center" colspan="3">You do not have any reward points!</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination-results">
               
                    <div class="">Showing 0 to 0 of 0 (0 Pages)</div>
                </div>
                <div class="buttons clearfix">
                    <div class="pull-right"><a href="javascript:void(0);" class="btn btn-primary">Continue</a></div>
                </div>
            </div>
            @include('front.includes.aside',['activelink' => 'account'])
        </div>
    </div>
</section>
@endsection