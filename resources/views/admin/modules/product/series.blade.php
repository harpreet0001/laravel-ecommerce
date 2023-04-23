@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
          @include('admin.layouts.CardHeader')
         <div class="card-body">
            <div class="tab-content p-0">
               <div class="table-responsive">
                  @if($Products->count() > 0)
                     <div class="cf nestable-lists">
                        <div class="dd" id="nestable">
                           <ol class="dd-list">
                              @foreach($Products as $key=>$value)                              
                                 <li class="dd-item" data-id="{{$value->_id}}">
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
@section('js')
<script type="text/javascript">
   $('table').DataTable({

      "ordering": false
   });
</script>
@endSection



