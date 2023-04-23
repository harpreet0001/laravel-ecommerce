@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         @include('admin.layouts.CardHeader')
         <div class="card-body">
            <div class="tab-content p-0">
               @include('msg')
               <form class="cstm-form" method="post" action="{{route('shippingzone-update',base64_encode($ShippingzoneData->_id))}}" name="blog-create" enctype="multipart/form-data">
                  @csrf
                  @method('patch')
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label class="form-label">Shippingzone Name<span class="required">*</span></label>
                           <input type="text" class="form-control @error('zonename') is-invalid @enderror" placeholder="shipping zone name" name="zonename" value="{{ old('zonename') ?? $ShippingzoneData->zonename }}"  autocomplete="zonename" autofocus>
                           @error('zonename')
                              <span class="invalid-feedback" style="display: block;" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>

                     <div class="col-lg-12">
                        <div class="form-group">
                           <label class="form-label">Shippingzone Type</label>
                           <label style="display: block;" class="font-weight-bold">
                              This shipping zone is based on one or more countries</label>                              
                        </div>
                     </div>

                     <div class="col-lg-12" id="ZoneTypeCountry">
                        <div class="form-group">
                           <label class="form-label">Country</label>
                           <?php 
                                
                              if(old('zonecountry'))
                              {
                                $selectedCountry = old('zonecountry');
                              }
                              else 
                              {
                                $selectedCountry = $ShippingzoneData->zonecountry;
                              }
                            ?>
                           <select name="zonecountry" id="zonecountry" class="form-control @error('zonecountry') is-invalid @enderror">
                               <option value="0" @if($selectedCountry == 0){{'selected'}}@endif>All</option>
                              @foreach($countries as $country)
                                @if($selectedCountry == $country->_id)
                                 <option value="{{$country->_id}}" selected>{{$country->country_name}}</option>
                                @else
                                 <option value="{{$country->_id}}">{{$country->country_name}}</option>
                                @endif
                              @endforeach
                           </select>
                           @error('zonecountry')
                                 <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                           @enderror
                        </div>
                     </div>
                     
                     <div class="col-lg-12" id="ZoneTypeCountry">
                       <div class="form-check">
                         <input type="checkbox" name=" zoneenabled" id="zoneenabled" value="1" class="form-check-input @error('zoneenabled') is-invalid @enderror" @if($ShippingzoneData->zoneenabled == 1){{'checked'}}@endif>
                         <label class="form-check-label" for=""> Yes, enable this shipping zone</label>
                         @error('zoneenabled')
                                 <span class="invalid-feedback" style="display: block;" role="alert">
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
</div>
<script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
<script>CKEDITOR.replace('article-ckeditor');</script>
@endsection
@section('js')
<script type="text/javascript">
 $(document).ready(function()
 {
    $('#zonecountry').select2();

 });
</script>
@endsection