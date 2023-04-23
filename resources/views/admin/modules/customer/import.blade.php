@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         @include('admin.layouts.CardHeader')
         <div class="card-body">
            <div class="tab-content p-0">
               @include('msg')
               <form class="cstm-form" method="post" action="{{route('customer-import')}}" name="customer-import" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Import File<span class="required">*</span></label>
                           <input type="file" class="form-control @error('import_file') is-invalid @enderror" placeholder="Import File" name="import_file" value="{{ old('import_file') }}" autofocus>
                           @error('import_file')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="btn-wrap mt-3">
                           <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection