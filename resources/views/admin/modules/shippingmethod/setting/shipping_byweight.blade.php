<div style="padding:0px 0px 5px 10px" class="Text">Complete the form below to integrate by weight shipping into your store. All fields are required.</div>
<table width="100%" class="Panel">
	<tr style="">
	   <td class="Heading2" colspan="2"><h4>Ship by Weight Settings</h4></td>
	</tr>
	<tr style="" class="">
		<td class="FieldLabel">
		  <label for="StoreName">Default Shipping Cost:</label>
		</td>
		<td class="shippingMethodSettings">
		<div class="form-group">
	  		<label for="StoreName"></label>
	  		<div>
	  			 <input type="text" class="Field" name="shipping_byweight_defaultcost" id="shipping_byweight_defaultcost" value="{{$shippingmethod->methoddetails->defaultcost ?? ''}}" size="7" class="" />
				<span id="shipping_byweight_defaultcost_error" class="text text-danger err-msg"></span>
	  		</div>
	  	</div>
	</td>
	</tr>
	<tr style="" class="">
		<td class="FieldLabel">
		<label for="StoreName">Weight Ranges:</label>
		</td>
		<td class="">
			@php($ranges = $shippingmethod->methoddetails->ranges ?? null)
			
				@if(!is_null($ranges) && count($ranges))
				 @foreach($ranges as $index => $range)
				 <div id="" class="WeightRanges add-remove-links shippingMethodSettings">
				 	<div class="form-group">
				 		<label>When weight is greater than or equal to </label>
				 		 <div>
					    	<input type="text" name="shipping_byweight_lower[]" value="{{$range->lower}}" id="lower_{{$index}}" class="WeightRange LowerRange">
							<span id="shipping_byweight_lower_{{$index}}_error" class="text text-danger err-msg"></span>
				        </div>
				 	</div>
				 	<div class="form-group">
				     <label>Grams and less than</label> 
					     <div>
						    <input type="text" name="shipping_byweight_upper[]" value="{{$range->upper}}" id="upper_{{$index}}" class="WeightRange UpperRange">
				    		<span id="shipping_byweight_upper_{{$index}}_error" class="text text-danger err-msg"></span>
						</div>
				    </div>
				    <div class="form-group">
				      <label>Grams shipping is £</label>
					     <div>
					     	<input type="text" name="shipping_byweight_cost[]" value="{{$range->cost}}" id="cost_{{$index}}" class="WeightRange RangeCost">
				    		<span id="shipping_byweight_cost_{{$index}}_error" class="text text-danger err-msg"></span>
					    </div>
				    </div>
					<a href="#" onclick="AddWeightRange(this.parentNode); return false;" class="add"><i class="fas fa-plus-circle"></i></a>
					<a href="#" onclick="RemoveWeightRange(this.parentNode); return false;" class="remove"><i class="fas fa-minus-circle"></i></a>
				</div>
				 @endforeach
				 @else
				 <div id="" class="WeightRanges add-remove-links shippingMethodSettings">

				 	<div class="form-group">
				 		<label> Grams and More than</label>
				 		 <div>
					    	<input type="text" name="shipping_byweight_lower[]" value="" id="lower_0" class="WeightRange LowerRange">
							<span id="shipping_byweight_lower_0_error" class="text text-danger err-msg"></span>
				        </div>
				 	</div>

				    <div class="form-group">
				     <label> Grams and less than</label> 
					     <div>
						    <input type="text" name="shipping_byweight_upper[]" value="" id="upper_0" class="WeightRange UpperRange">
						    <span id="shipping_byweight_upper_0_error" class="text text-danger err-msg"></span>
						</div>
				    </div>

				    <div class="form-group">
				      <label> Grams shipping is	£</label>
					     <div>
					     	<input type="text" name="shipping_byweight_cost[]" value="" id="cost_0" class="WeightRange RangeCost">
					    	<span id="shipping_byweight_cost_0_error" class="text text-danger err-msg"></span>
					    </div>
				    </div>
					<a href="#" onclick="AddWeightRange(this.parentNode); return false;" class="add"><i class="fas fa-plus-circle"></i></a>
					<a href="#" onclick="RemoveWeightRange(this.parentNode); return false;" class="remove"><i class="fas fa-minus-circle"></i></a>
				</div>
				@endif
		</td>
	</tr>
</table>
<span style="display: none;" id="moduleName">Ship by Weight</span>
<script type="text/javascript"> function ShipperValidation() {  return true; }</script>
<script type="text/javascript" charset="utf-8">
ShowCorrectLinks();	
</script>