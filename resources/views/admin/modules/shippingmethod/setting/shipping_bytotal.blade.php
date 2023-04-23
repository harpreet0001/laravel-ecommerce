<div style="padding:0px 0px 5px 10px" class="Text">Complete the form below to integrate by total shipping into your store. All fields are required.</div>
<table width="100%" class="Panel">
	<tr style="">
	    <td class="Heading2" colspan="2"><h4>Ship by Order Total Settings</h4></td>
	</tr>
	<tr style="" class="">
		<td class="FieldLabel" nowrap>
		  <label for="StoreName">Default Shipping Cost:</label>
		</td>
	<td class="shippingMethodSettings">
		<div class="form-group">
	  		<label for="StoreName"></label>
	  		<div>
	  			 <input type="text" class="Field" name="shipping_bytotal_defaultcost" id="shipping_bytotal_defaultcost" value="{{$shippingmethod->methoddetails->defaultcost ?? ''}}" size="7"  />
	              <span id="shipping_bytotal_defaultcost_error" class="text text-danger err-msg"></span>
	  		</div>
	  	</div>
	</td>
	</tr>
	<tr style="" class="">
		<td class="FieldLabel" nowrap>
		  <label for="StoreName">Total Ranges:</label>
		</td>
		<td class="">
			@php($ranges = $shippingmethod->methoddetails->ranges ?? null)
			@if(!is_null($ranges) && count($ranges))
				@foreach($ranges as $index => $range)
				  <div id="" class="TotalRanges add-remove-links shippingMethodSettings">
				  	<div class="form-group">
				  		<label>When the total is greater than or equal to £</label>
				  		<div>
				  			<input type="text" name="shipping_bytotal_lower[]" value="{{$range->lower}}" id="lower_{{$index}}" class="TotalRange LowerRange">
							<span id="shipping_bytotal_lower_{{$index}}_error" class="text text-danger err-msg"></span>
				  		</div>
				  	</div>
					<div class="form-group">
				  		<label>and less than £</label>
				  		<div>
				  			<input type="text" name="shipping_bytotal_upper[]" value="{{$range->upper}}" id="upper_{{$index}}" class="TotalRange UpperRange">
							<span id="shipping_bytotal_upper_{{$index}}_error" class="text text-danger err-msg"></span>
				  		</div>
				  	</div>
				  	<div class="form-group">
				  		<label>shipping is	£</label>
				  		<div>
				  			 <input type="text" name="shipping_bytotal_cost[]" value="{{$range->cost}}" id="cost_{{$index}}" class="TotalRange RangeCost">
							 <span id="shipping_bytotal_cost_0_error" class="text text-danger err-msg"></span>
				  		</div>
				  	</div>
					<a href="#" onclick="AddTotalRange(this.parentNode); return false;" class="add"><i class="fas fa-plus-circle"></i></a>
					<a href="#" onclick="RemoveTotalRange(this.parentNode); return false;" class="remove"><i class="fas fa-minus-circle"></i></a>
				</div>
				 @endforeach
			@else
			  <div id="" class="TotalRanges add-remove-links shippingMethodSettings">
			  	<div class="form-group">
			  		<label>When the total is greater than or equal to £</label>
			  		<div>
			  			<input type="text" name="shipping_bytotal_lower[]" value="" id="lower_0" class="TotalRange LowerRange">
			        	<span id="shipping_bytotal_lower_0_error" class="text text-danger err-msg"></span>
			  		</div>
			  	</div>
			  	<div class="form-group">
			  		<label>and less than £</label>
			  		<div>
			  			<input type="text" name="shipping_bytotal_upper[]" value="" id="upper_0" class="TotalRange UpperRange">
						<span id="shipping_bytotal_upper_0_error" class="text text-danger err-msg"></span>
			  		</div>
			  	</div>
			  	<div class="form-group">
			  		<label>shipping is	£</label>
			  		<div>
			  			 <input type="text" name="shipping_bytotal_cost[]" value="" id="cost_0" class="TotalRange RangeCost">
						<span id="shipping_bytotal_cost_0_error" class="text text-danger err-msg"></span>
			  		</div>
			  	</div>
				<a href="#" onclick="AddTotalRange(this.parentNode); return false;" class="add"><i class="fas fa-plus-circle"></i></a>
				<a href="#" onclick="RemoveTotalRange(this.parentNode); return false;" class="remove"><i class="fas fa-minus-circle"></i></a>
			</div>
			@endif
		</td>
	</tr>
</table>
<span style="display: none;" id="moduleName">Ship by Order Total</span>
<script type="text/javascript"> function ShipperValidation() {  return true; }</script>
<script type="text/javascript" charset="utf-8">
 ShowCorrectLinks();
</script>
