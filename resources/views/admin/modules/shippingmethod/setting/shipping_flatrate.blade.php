<div style="padding:0px 0px 5px 10px" class="Text">Complete the form below to integrate flat rate shipping into your store. All fields are required.</div>
	<table width="100%" class="Panel">
	<tr style="">
	    <td class="Heading2" colspan="2"><h4>Flat Rate Per Order Settings</h4></td>
	</tr>
	<tr style="" class="">
		<td class="FieldLabel">
			<div class="form-group">
			   <label class="form-label" for="StoreName">Shipping Cost:<span class="required">*</span></label>
			   <input type="text" name="shipping_flatrate" id="shipping_flatrate" value="{{$shippingmethod->methoddetails->defaultcost ?? ''}}" size="7" class="form-control" placeholder="shipping flatrate">
			   <span id="shipping_flatrate_error" class="text text-danger err-msg"></span>
		   </div>
		</td>
	</tr>
	</table>
<span style="display: none;" id="moduleName">Flat Rate Per Order</span>
<script type="text/javascript"> 
	function ShipperValidation() 
	{ 
		if(!$('#shipping_flatrate').val()) 
		{
			alert('Please enter a value for the \'Shipping Flat Rate\' field.');
			$('#shipping_flatrate').focus();
			return false;
		}

	    return true; 
	}
</script>



