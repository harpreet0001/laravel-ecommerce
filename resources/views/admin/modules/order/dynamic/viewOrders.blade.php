<table class="table table-bordered cstm-data-table">
   <thead>
      <tr>
         <th style="width: 60px;">OrderId
            <!-- <a href="#" class="SortLink" data-sort-field="_id" data-sort-order="asc"><span class="asc-desc"><i class="fas fa-chevron-up"></i></span></a> -->
            <!-- <a href="#" class="SortLink" data-sort-field="_id" data-sort-order="desc"><span class="asc-desc"><i class="fas fa-chevron-down"></i></span></a> -->
         </th>
         <th>Customer</th>
         <th>Date</th>
         <th>Status</th>
         <th>Total</th>
         <th style="width:160px;">Actions</th>
      </tr>
   </thead>
   <tbody>
      @if($orders->count() > 0)
         @foreach($orders as $key=>$order)
            <tr>
               <td>{{$order->unique_order_id ?? ''}} </td>               
               <td>{{$order->orderuser->firstname}} {{$order->orderuser->lastname}}</td>
               <td>{!! fnDateFormat($order->created_at) !!}</td>
               <td 
                      id="order_status_column_{{base64_encode($order->_id)}}" 
                      style="border-left-style: solid; border-left-width: 10px; width:165px;" 
                      class="OrderStatus OrderStatus{{$order->orderstatus}}">
                      {!! selectOrderStatus($order) !!}
               </td>
               <td>{{priceFormat($order->total)}}</td>
               <td>
                  <ul class="action_btns_wrap a-i-c">
                     <!-- 1 is using for checking the "usetype" field with database -->
                     @php
                        echo IsLoopPermitted(1, $order->_id);
                     @endphp
                    {!! orderActions($order->_id) !!}
                  </ul>
               </td>
            </tr>
         @endforeach
      @else
         <tr>
            <td colspan="8">No Data Found.</td>
         </tr>
      @endif   
   </tbody>
</table>
@include('admin.modules.order.dynamic.pagination')