@extends('front.layouts.layout',['pageslug' => 'Newsletter','pagetitle'=>'Account|Newsletter'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{route('account.home')}}">Account</a></li>
<li class="breadcrumb-item"><a href="{{Request::url()}}">Newsletter</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Newsletter Subscription</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content" class=" col-sm-9">
                @include('message.error')
                @include('message.success')
                <form class="form-horizontal" method="post" action="{{route('account.newsletter')}}">
                    @method('post')
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Subscribe</label>
                            <div class="col-sm-10">
                                @php($isSubscriber = auth()->user()->isNewletterSubscriber())
                                <label class="radio-inline">
                                    <input type="radio" name="newsletter" value="1" @if($isSubscriber){{'checked'}}@endif >Yes</label>
                                <label class="radio-inline">
                                    <input type="radio" name="newsletter" value="0"  @if(!$isSubscriber){{'checked'}}@endif>No</label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="buttons clearfix">
                        <div class="pull-left"><a href="{{route('account.home')}}" class="btn btn-default">Back</a></div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary"><span>Continue</span></button>
                        </div>
                    </div>
                </form>
            </div>
            @include('front.includes.aside',['activelink' => 'newsletter'])
        </div>
    </div>
</section>
@endsection