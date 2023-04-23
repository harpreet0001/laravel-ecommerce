@extends('front.layouts.layout',['pageslug' => 'Transaction','pagetitle'=>'Account|Transaction'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{Request::url()}}">Transaction</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Transaction </span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-9">
                <p>Your current balance is: <b>£0.00</b>.</p>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td class="text-left">Date Added</td>
                                <td class="text-left">Description</td>
                                <td class="text-right">Amount (GBP)</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center" colspan="5">You do not have any transactions!</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row pagination-results">
                    <div class="col-sm-6 text-left"></div>
                    <div class="col-sm-6 text-right">Showing 0 to 0 of 0 (0 Pages)</div>
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