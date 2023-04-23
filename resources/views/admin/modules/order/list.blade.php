@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         @include('admin.layouts.CardHeader')
         <div class="card-body order_list">
            <div class="tab-content p-0">
               @include('msg')
                <div class="order-list-header">
                    <div class="order-list-header_content">
                        <div>
                          @if(!is_null($user))
                            <p>{{$user->firstname}} {{$user->lastname}} ({{$user->email ?? ''}})</p>
                          @endif
                        </div>
                        <div class="order-search-header">
                          <!--filter-for-order-status-->
                           @include('admin.modules.order.dynamic.filters.order_status')
                          <!--filter-for-order-status-->  
                          <!--search-filter-->  
                           @include('admin.modules.order.dynamic.filters.search')
                          <!--search-filter-->
                        </div>
                    </div>
                </div>
                <!--limit-filter-->
                @include('admin.modules.order.dynamic.filters.limit')
                <!--limit-filter-->
               <div class="table-responsive" id="orderlist">
                   <!--list-of-orders-->
                   @include('admin.modules.order.dynamic.viewOrders')
                   <!--list-of-orders-->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('js')
@endsection