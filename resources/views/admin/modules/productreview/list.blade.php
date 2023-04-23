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
                  <table class="table table-bordered cstm-data-table" >
                     <thead>
                        <tr>
                           <th style="width: 60px;">S No.</th>
                           <th>Product</th>
                           <th>Posted By</th>
                           <th>Title</th>
                           <th>Rating</th>
                           <th>Review</th>
                           <th>Posted On</th>
                           <th style="width:160px;">Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if($productReviews->count() > 0)
                           @foreach($productReviews as $key=>$value)
                              <tr>
                                 <td>{{$key+1}}</td>
                                 <td>{{$value->product->title}}</td>
                                 <td>{{$value->posted_by}}</td>
                                 <td>{{ucwords($value->title)}}</td>
                                 <td>{{$value->rating}}</td>
                                 <td>{{$value->review}}</td>
                                 <td>{!! fnDateFOrmat($value->created_at) !!}</td>
                                 <td>
                                    <ul class="action_btns_wrap a-i-c">
                                       <!-- 1 is using for checking the "usetype" field with database -->
                                       @php
                                          echo IsLoopPermitted(1, $value->_id);
                                       @endphp
                                       <label class="switch mini-switch ">
                                          <input type="checkbox" class="target_switch" data-attr="{{Route('product-review-active',$value->_id)}}" {{$value->active==1 ? 'checked' : ''}}>
                                          <span class="slider round"></span>
                                       </label>
                                    </ul>
                                 </td>
                              </tr>
                           @endforeach
                        @else
                           <tr>
                              <td colspan="4">No Data Found.</td>
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
  $(document).ready(function(){
  
        $('.table').DataTable();
  });
</script>
@endsection