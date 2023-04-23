@extends('front.layouts.layout',['pageslug' => 'Address Book','pagetitle' => 'Address Book|List'])
@section('content')
<!-- breadcrumb -->
<!-- breadcrumb -->
@component('front.includes.breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="javascript::void(0)">Account</a></li>
<li class="breadcrumb-item"><a href="{{route('account.addressbook.index')}}">Address Book List</a></li>
@endcomponent
<!-- breadcrumb end-->
<!-- page-title -->
@component('front.includes.page_title')
<h1 class="title page-title"><span>Address Book List</span></h1>
@endcomponent
<!-- page-title  end-->
<section class="my-account-all-sec">
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-9">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover addressbook-table">
                        <tbody>
                            @forelse($addressbooks as $addressbook)
                              <tr>
                                <td class="text-left">
                                  {!! defaultAddressbookLevel($addressbook) !!}
                                  {{$addressbook->firstname}} {{$addressbook->lastname}}<br>
                                  {{$addressbook->postcode}},{{$addressbook->company}}<br>
                                  {{$addressbook->state->state_name}} {{$addressbook->country->country_name}}<br>
                                  {{substr($addressbook->address_1,0,100)}}<br>
                                  {{substr($addressbook->address_2,0,100)}}<br>
                                </td>
                                <td class="text-right">
                                    <a href="{{route('account.addressbook.edit',base64_encode($addressbook->_id))}}" class="btn btn-info">Edit</a> 
                                    <a href="javascript:void(0);" class="btn btn-danger" id="{{base64_encode($addressbook->_id)}}" 
                                      onclick="if(confirm('Are you sure')){document.getElementById('addressbook-'+this.id).submit(); }">Delete</a></td>
                                    <form id="addressbook-{{base64_encode($addressbook->_id)}}" method="post" action="{{route('account.addressbook.destroy',base64_encode($addressbook->_id))}}">
                                      @csrf
                                      @method('delete')
                                    </form>
                               </tr>
                            @empty
                             <tr><td colspan="2">You do not have any address book</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="buttons clearfix">
                    <div class="pull-left"><a href="{{route('account.home')}}" class="btn btn-default">Back</a></div>
                    <div class="pull-right"><a href="{{route('account.addressbook.create')}}" class="btn btn-primary">New Address</a></div>
                </div>
            </div>
            @include('front.includes.aside',['activelink' => 'addressbook'])
        </div>
    </div>
</section>
@endsection