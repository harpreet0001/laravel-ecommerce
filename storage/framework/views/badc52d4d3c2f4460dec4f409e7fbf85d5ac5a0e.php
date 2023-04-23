<div class="horizontalFormContainer ">
<div class="header">
Shipping Method
</div>
<div class="formRow   " style="">
<label class="label">
<span class="Required" style="visibility:hidden;">*</span>
Choose a Provider:
</label>
<div class="value">
<select name="shippingQuoteList" class="Field300 showByValue shippingQuoteList" size="5">
<option value="builtin:current" selected="selected">Use Existing Quote: Royal Mail 1st Class Signed For (£0.00)</option>
<option value="builtin:none">None</option>
<option value="builtin:custom">Custom</option>
</select> <a href="#" class="fetchShippingQuotesLink">Fetch Shipping Quotes</a>
<div class="nodeJoin customShippingContainer showByValue_shippingQuoteList showByValue_shippingQuoteList_builtincustom" style="display:none;">
<div class="horizontalFormContainer ">
<div class="formRow   " style="">
<label class="label">
<span class="Required">*</span>
Shipping Method:
</label>
<div class="value">
<input name="customShippingDescription" type="text" value="Royal Mail 1st Class Signed For" class="Field300">
</div>
</div>
<div class="formRow   formRowLast" style="">
<label class="label">
<span class="Required" style="visibility:hidden;">*</span>
Shipping Cost:
</label>
<div class="value">
£ <input name="customShippingPrice" type="text" value="0.00" class="Field70">
</div>
</div>
</div>
</div>
</div>
</div>
</div><?php /**PATH /home/megatanws/public_html/web/resources/views/admin/modules/order/form/shipping_method_form.blade.php ENDPATH**/ ?>