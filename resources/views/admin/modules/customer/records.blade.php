<div class="tab-content p-0">
   @include('msg')
   <div class="table-responsive">
      <table class="table table-bordered cstm-data-table">
         <thead>
            <tr>
               <th>First Name</th>
               <th>Last Name</th>
               <th>E-mail</th>
               <th>Contact</th>
               <th>Date Joined</th>
               <th>Orders</th>
               <th style="width:160px;">Actions</th>
            </tr>
         </thead>
         <tbody>
            @if($Customers->count() > 0)
               @foreach($Customers as $key=>$value)
                  <tr>
                     <td>{{ucwords($value->firstname)}}</td>
                     <td>{{$value->lastname}}</td>
                     <td>{{$value->email}}</td>
                     <td>{{$value->contact}}</td>
                     <td>{{fnDateFormat($value->created_at)}}</td>
                     <td><a href="{{route('order-list')}}?userId={{base64_encode($value->_id)}}" class="btn btn-success btn-sm">{{$value->userorders->count()}}</a></td>
                     <td>
                        <ul class="action_btns_wrap a-i-c">
                           <!-- 1 is using for checking the "usetype" field with database -->
                           @php
                              echo IsLoopPermitted(1, $value->_id);
                           @endphp
                           <label class="switch mini-switch ">
                              <input type="checkbox" class="target_switch" data-attr="{{Route('user-active',$value->_id)}}" {{$value->active==1 ? 'checked' : ''}}>
                              <span class="slider round"></span>
                           </label>
                        </ul>
                     </td>
                  </tr>
               @endforeach
            
            @else
               <tr>
                  <td colspan="6">No Data Found.</td>
               </tr>
            @endif   
         </tbody>
      </table>
   </div>
</div>

<div class="custom_pagination">
      {{ $Customers->links() }}
</div>