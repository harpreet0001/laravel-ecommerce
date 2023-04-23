@extends('front.layouts.layout',['pageslug' => 'Addressbook-List'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="javascript::void(0)">Account</a></li>
<li class="breadcrumb-item"><a href="{{route('addressbook.index')}}">Address Book</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>List Address</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-9">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover addressbook-table">
                        <tbody>
                            <tr>
                                <td class="text-left">pumptester pumptester<br>pumptester<br>pumptester<br>pumptester<br>pumptester pumptester<br>Carmarthenshire<br>United Kingdom</td>
                                <td class="text-right"><a href="javascript:void(0);" class="btn btn-info">Edit</a> 
                                    <a href="javascript:void(0);" class="btn btn-danger">Delete</a></td>
                            </tr>
                            <tr>
                                <td class="text-left">new First Name new Last Name<br>new Company<br>new Address 1<br>new Address 2<br>new City 12345<br>Buckinghamshire<br>United Kingdom</td>
                                <td class="text-right"><a href="javascript:void(0);" class="btn btn-info">Edit</a>
                                 <a href="javascript:void(0);" class="btn btn-danger">Delete</a></td>
                            </tr>
                            <tr>
                                <td class="text-left">zxzxxz zxzxzx<br>zxzxxzzx<br>ddwdsda<br>sdasdasda<br>dsasdsda sdsdasda<br>Cholla-namdo<br>South Korea</td>
                                <td class="text-right"><a href="javascript:void(0);" class="btn btn-info">Edit</a>
                                 <a href="javascript:void(0);" class="btn btn-danger">Delete</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="buttons clearfix">
                    <div class="pull-left"><a href="javascript:void(0);" class="btn btn-default">Back</a></div>
                    <div class="pull-right"><a href="javascript:void(0);" class="btn btn-primary">New Address</a></div>
                </div>
            </div>
            @include('front.includes.aside')
        </div>
    </div>
</section>
@endsection