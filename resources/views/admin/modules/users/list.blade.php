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
                           <th style="width: 60px;">S No.</th>
                           <th>User Firstname</th>
                           <th>User Lastname</th>
                           <th>User Email</th>
                           <th>Role</th>
                           <th>Permissions</th>
                           <th style="width:160px;">Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if($users->count() > 0)
                           @foreach($users as $key=>$value)
                              <tr>
                                 <td>{{$key+1}}</td>
                                 <td>{{$value->firstname}}</td>
                                 <td>{{$value->lastname}}</td>
                                 <td>{{$value->email}}</td>
                                 <td>{{ !empty($value->UserPermission->RoleName) ? $value->UserPermission->RoleName->role : "-" }}</td>
                                 <td>{{GetModuleTitle($value->UserPermission->userpermissions)}}</td>
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
@endsection