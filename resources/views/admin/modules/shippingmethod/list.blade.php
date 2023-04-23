@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         <div class="card-header d-f j-c-s-b" style="cursor: move;">
            <h3 class="card-title">Shipping method for {{$shippingzone->zonename}}</h3>
            <div class="btn-wrap">
               <a href="{{route('shippingzone-list')}}" class="btn btn-primary">Back</a>
               <a href="{{route('shippingmethod-create',base64_encode($shippingzone->_id))}}" class="btn btn-primary">Create Shipping Method </a>
            </div>
         </div>
         <div class="card-body">
            <div class="tab-content p-0">
               @include('msg')
               <div class="table-responsive">
                  <table class="table table-bordered cstm-data-table">
                     <thead>
                        <tr>
                           <th style="width: 60px;">S No.</th>
                           <th>Name</th>
                           <th>Shipping Method</th>
                           <th style="width:160px;">Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse($shippingmethodList as $shippingmethod)
                        <tr>
                           <td>{{$loop->index+1}}</td>
                           <td>{{$shippingmethod->methodname}}</td>
                           <td>{{fixedShippingMethods()[$shippingmethod->methodmodule]}}</td>
                           <td>
                              <ul class="action_btns_wrap a-i-c">  
                                 <li>
                                    <a href="{{route('shippingmethod-edit',[base64_encode($shippingzone->_id),base64_encode($shippingmethod->_id)])}}" data-toggle="tooltip" title="Shipping Zone Edit" class="btn btn-info action-btn" onclick="return confirm('Are you sure?');">
                                       <span><i class="fas fa-pencil-alt"></i></span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="{{route('shippingmethod-delete',[base64_encode($shippingzone->_id),base64_encode($shippingmethod->_id)])}}" data-toggle="tooltip" title="Shipping Zone Delete" class="btn btn-info action-btn" onclick="return confirm('Are you sure?');">
                                       <span><i class="fas fa-trash-alt"></i></span>
                                    </a>
                                 </li>
                                 <li>
                                    <label class="switch mini-switch">
                                       <input type="checkbox" class="target_switch" data-attr="{{route('shippingmethod-enabled',$shippingmethod->_id)}}" @if($shippingmethod->methodenabled){{'checked'}}@endif>
                                           <span class="slider round"></span>
                                    </label>
                                 </li>
                              </ul>
                           </td>
                        </tr>
                        @empty
                        @endforelse
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
   $('table').DataTable();
</script>
@endsection