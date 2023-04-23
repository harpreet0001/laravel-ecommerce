@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         <div class="card-header d-f j-c-s-b" style="cursor: move;">
            <h3 class="card-title">Edit shipping method for {{$shippingzone->zonename}}</h3>
            <div class="btn-wrap">
               <a href="{{route('shippingmethod-list',base64_encode($shippingzone->_id))}}" class="btn btn-primary">Back</a>
            </div>
         </div>
         <div class="card-body">
            <div class="tab-content p-0">
               @include('msg')
                <form class="cstm-form" method="post" action="{{route('shippingmethod-update',[$shippingzone->_id,$shippingmethod->_id])}}"  onsubmit="return SubmitShippingMethod.create(this)">
                  @csrf
                  @method('patch')
                  <div class="shipping-method">
                    <h4>Shipping Method Settings</h4>
                      <div class="row">

                        <div class="col-lg-12">
                          <div class="form-group">
                             <label class="form-label">Shippingzone Method<span class="required">*</span></label>
                             <select name="methodmodule" id="methodmodule" class="form-control" onchange="UpdateModule(this);" data-url="{{route('shipping-module-properties')}}">
                                
                                  <option value="{{$shippingmethod->methodmodule}}">{!! getFixedShippingMethodName($shippingmethod->methodmodule) !!}</option>
                                
                             </select>
                             <span id="methodmodule_error" class="text text-danger err-msg"></span>
                          </div>
                        </div>

                        <div class="col-lg-12">
                          <div class="form-group">
                             <label class="form-label">Display Name<span class="required">*</span></label>
                             <input type="text" name="methodname" id="methodname" value="{{$shippingmethod->methodname ?? ''}}" class="form-control" placeholder="shipping zone name">
                             <span id="methodname_error" class="text text-danger err-msg"></span>
                          </div>
                        </div>

                        <div class="col-lg-12">
                          <div class="form-check">
                            <input type="checkbox" name="methodenabled" id="methodenabled" value="1" class="form-check-input" @if($shippingmethod->methodenabled){{'checked'}} @endif>
                            <label class="form-check-label" for=""> Yes, enable this shipping method</label>
                            <span id="methodenabled_error" class="text text-danger err-msg"></span>
                          </div>
                        </div> 

                        <div class="col-lg-12">
                          <!--shipping-settings-->
                            <table width="100%" class="Panel" id="chooseMethodFirst">
                              <tbody>
                                <tr>
                                  <td class="Heading2" colspan="2">
                                    <h4>Shipping Settings</h4>
                                  </td>
                                 </tr>
                                <tr>
                                  <td colspan="2">
                                    <p class="MessageBox MessageBoxInfo">Please choose a shipping method first.</p>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <div class="shipping-method" id="shippingMethodSettings">{!! $moduleSettingHtml !!}</div>
                          <!--shipping-settings-end-->
                        </div>  

                        <div class="col-lg-12">
                            <div class="btn-wrap mt-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
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
@endsection
@section('js')
<script type="text/javascript">
   ShowCorrectLinks();
</script>
@endsection