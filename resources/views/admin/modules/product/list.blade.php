@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         @include('admin.layouts.CardHeader')
         <div class="card-body">
            <div class="tab-content p-0">
               @include('msg')
               <div class="table-responsive">
                  <table class="table table-bordered cstm-data-table">
                     <thead>
                        <tr>
                           <th>Title</th>
                           <th>Price</th>
                           <th>Stock Level</th>
                           <th>Featured</th>
                           <th style="width:200px">SKU</th>
                           <th>Image</th>
                           <th style="width:160px;">Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if($Products->count() > 0)
                           @foreach($Products as $key=>$value)
                              <tr>
                                 <td>{{ucwords($value->title)}}</td>
                                 <td>{{priceFormat($value->price)}}</td>
                                 <td>{{$value->currentstock == '' ? 'NA' : $value->currentstock}}</td>
                                 <td>{!! ($value->featured == 1) ? '<i class="fas fa-check" style="color:green;"></i>' : '<i class="fas fa-times" style="color:red;"></i>' !!}</td>
                                 <td>{{$value->sku ?? 'NA'}}</td>
                                 <td><img src="{{imagePath($value->image)}}" width="60" height="60"></td>
                                 <td>
                                    <ul class="action_btns_wrap a-i-c"> 
                                       <!-- 1 is using for checking the "usetype" field with database -->
                                       @php
                                          echo IsLoopPermitted(1, $value->_id);
                                       @endphp
                                       <label class="switch mini-switch ">
                                          <input type="checkbox" class="target_switch" data-attr="{{Route('product-active',$value->_id)}}" {{$value->active==1 ? 'checked' : ''}}>
                                          <span class="slider round"></span>
                                       </label>
                                    </ul>
                                 </td>
                              </tr>
                           @endforeach
                        @else
                           <tr>
                              <td colspan="7">No Data Found.</td>
                           </tr>
                        @endif   
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


@endsection
@section('js')
<script type="text/javascript">
   $('table').DataTable({

      "ordering": false
   });
</script>
@endSection



