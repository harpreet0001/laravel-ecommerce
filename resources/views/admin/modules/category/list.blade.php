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
                  @if($Category->count() > 0)
                     <div class="cf nestable-lists">
                        <div class="dd" id="nestable">
                           <ol class="dd-list">
                              @foreach($Category as $key=>$value)                              
                                 <li class="dd-item" data-id="{{$value->_id}}">
                                       <ul class="action_btns_wrap a-i-c">
                                          <!-- 1 is using for checking the "usetype" field with database -->
                                          @php
                                             echo IsLoopPermitted(1, $value->_id);
                                          @endphp
                                          <label class="switch mini-switch ">
                                             <input type="checkbox" class="target_switch" data-attr="{{Route('category-active',$value->_id)}}" {{$value->active==1 ? 'checked' : ''}}>
                                             <span class="slider round"></span>
                                          </label>
                                       </ul>
                                       <div class="dd-handle">
                                          {{ucwords($value->title)}}
                                       </div>
                                 </li>                              
                              @endforeach
                           </ol>
                        </div>
                     </div>
                     <input type="hidden" id="nestable-output">
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection