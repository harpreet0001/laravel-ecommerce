@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         <!-- @include('admin.layouts.CardHeader') -->
         <div class="card-body">
            <div class="tab-content p-0">
               @include('msg')
               <div class="table-responsive">
                  @if($Modules->count() > 0)
                     <menu id="nestable-menu" style="text-align: right">
                        <button type="button" data-action="expand-all" class="btn btn-primary e-all">Expand All</button>
                        <button type="button" data-action="collapse-all" class="btn btn-primary c-all">Collapse All</button>
                     </menu>
                     <div class="cf nestable-lists">
                        <div class="dd" id="nestable">
                           <ol class="dd-list">
                              @foreach($Modules as $key=>$value)                              
                                 <li class="dd-item" data-id="{{$value->_id}}">
                                       <ul class="action_btns_wrap a-i-c">
                                          <!-- 1 is using for checking the "usetype" field with database -->
                                          @php
                                             echo IsLoopPermitted(1, $value->_id);
                                          @endphp
                                          <label class="switch mini-switch ">
                                             <input type="checkbox" class="target_switch" data-attr="{{Route('module-active',$value->_id)}}" {{$value->active==1 ? 'checked' : ''}}>
                                             <span class="slider round"></span>
                                          </label>
                                       </ul>
                                       <div class="dd-handle">
                                          {{ucwords($value->title)}}
                                       </div>
                                    <ol class="dd-list">
                                       @foreach($value->WithChild as $keys=>$values)                                    
                                          <li class="dd-item" data-id="{{$values->_id}}">
                                             <div class="dd-handle-inn">
                                                {{ucwords($values->title)}}
                                                <ul class="action_btns_wrap a-i-c">
                                                   <!-- 1 is using for checking the "usetype" field with database -->
                                                   @php
                                                      echo IsLoopPermitted(1, $values->_id);
                                                   @endphp
                                                   <label class="switch mini-switch">
                                                      <input type="checkbox" class="target_switch" data-attr="{{Route('module-active',$values->_id)}}" {{$values->active==1 ? 'checked' : ''}}>
                                                      <span class="slider round"></span>
                                                   </label>
                                                </ul>
                                             </div>
                                          </li>                                    
                                       @endforeach
                                    </ol>
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