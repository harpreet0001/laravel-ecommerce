<div style="padding:0px 0px 5px 10px" class="Text">Complete the form below to integrate flat rate per item shipping into your store. All fields are required.</div>
<table width="100%" class="Panel">
  <tr style="">
     <td class="Heading2" colspan="2"><h4>Flat Rate Per Item Settings</h4></td>
  </tr>
  <tr style="" class="">
     <td class="FieldLabel" nowrap>
     	<div class="form-group">
		   <label class="form-label" for="StoreName">Shipping Cost Per Item:<span class="required">*</span></label>
		   <input type="text" name="shipping_peritem_cost" id="shipping_peritem_peritemcost" value="{{$shippingmethod->methoddetails->defaultcost ?? ''}}" size="7" class="form-control" placeholder="shipping cost per item">
		   <span id="shipping_peritem_cost_error" class="text text-danger err-msg"></span>
		</div>
     </td>
  </tr>
</table>
<span style="display: none;" id="moduleName">Flat Rate Per Item</span>


<script type="text/javascript"> 
	function ShipperValidation() 
	{ 
		if(!$('#shipping_peritem_peritemcost').val()) 
		{
			alert('Please enter a value for the \'Shipping Cost Per Item\' field.');
			$('#shipping_peritem_peritemcost').focus();
			return false;
		}

	    return true; 
	}
</script>



