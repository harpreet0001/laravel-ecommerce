function ChangeZoneType(type)
{
	switch(type) {
		case "state":
			$('#ZoneStateSelectNone').css({width: $('#StateSelect').css('width'), height: $('#StateSelect').css('height')});
			$('#ZoneTypeCountry').hide();
			$('#ZoneTypeStates').show();
			$('#ZoneTypePostCodes').hide();
			break;
		case "zip":
			$('#ZoneTypeCountry').hide();
			$('#ZoneTypeStates').hide();
			$('#ZoneTypePostCodes').show();
			break;
		default:
			$('#ZoneTypeCountry').show();
			$('#ZoneTypeStates').hide();
			$('#ZoneTypePostCodes').hide();
	}
}


//<!--Shipping-method-module-->
var usingDefault = 1;

function updateUsingDefault()
{
	usingDefault = 0;
}

function UpdateModule(element){

	if(element.value == '' || element.value == null) {
		$('#chooseMethodFirst').show();
		$('#shippingMethodSettings *').remove();
		return;
	}

	$.ajax({

		url     : $(element).data('url'),
		method  : 'post',
		headers : {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			      },
		data    : 'module='+element.value,
		cache   : false,
		success : function(data) {
			      
			      $('#shippingMethodSettings').html(data);
			      $('#chooseMethodFirst').hide();
			      if(usingDefault == 1)
			      {
					//$('#methodname').val($('#shippingMethodSettings #moduleName').html());
				  }
			      
		}
	});
}

function CheckMethodForm()
{
	if(!$('#methodmodule').val()) {
		alert('Please select a shipping method.');
		$('#methodmodule').focus();
		return false;
	}

	if(!$('#methodname').val()) {
		alert('Please enter a name for this shipping method.');
		$('#methodname').focus();
		return false;
	}
    
	if(typeof(ShipperValidation) != 'undefined' && ShipperValidation() == false) {
		return false;
	}

	return true;
}

let SubmitShippingMethod = {

	 'create' : function(element)
	 {
	 	  event = window.event;
	 	  event.preventDefault();

	 	  $('span[id$="_error"]').text('');
          
          if(CheckMethodForm()){

          	  $.ajax({

				url        : $(element).attr('action'),
				method     : "POST",
				dataType   : "json",
				headers    : {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							 },
				data       : $(element).serialize(),				
				async      : true,
				beforeSend : function () {
					           $(element).find('button,input[type="submit"]').attr('disabled', true);
					
				},
				complete: function () {
					           $(element).find('button,input[type="submit"]').attr('disabled', false);
				},
				success: function (response) {
					
					    window.location.href = response.redirect_url;
				},
				error: function (errorResp) {
					
					    $(element).find('button,input[type="submit"]').attr('disabled', false);
						let response = errorResp.responseJSON;
						let errors = response.errors;
						showErrors(errors);
				}
			});
          }

	 	  return false;
          
	 }
}

//*********Common functions****************
	function ShowCorrectLinks()
	{
		$('.add-remove-links:first a.remove').hide();
		$('.add-remove-links:gt(0) a.remove').show();
	}

	function ConfirmRemove(node)
	{
		var canRemove = true;
		$(node).find('input').each(function() {
			if ($(this).val() != '') {
				if (confirm("That row isn't empty. Are you sure you want to remove it?")) {
					canRemove = true;
				} else {
					canRemove = false;
				}
				return false;
			}
		});

		return canRemove;
	}

	function showErrors(errors) {

	$.each(errors, function (key, error) {
		if(key.includes('.')){
			key = key.replace('.','_');
			console.log(key);
		}
		$('#' + key + '_error').text(error.pop());
	});
}
//*********Common functions End****************

//*********2.shipping_byweigth start*********
   function AddWeightRange(node)
	{
		var newNode = $(node).clone();
		var newVal = $(newNode).find('input:eq(1)').val();

		$(newNode).find('input:first').val(newVal);
		$(newNode).find('input:gt(0)').val('');

		var oldId = $('.WeightRanges:last input:first').attr('id');
		var oldParts = oldId.replace(/^.*_/, '');
		var newNum = parseInt(oldParts)+1;

		//var oldName = $('.WeightRanges:last input:first').attr('name');
		//var oldParts = oldName.replace(/^.*_/, '');
		//var oldParts = oldParts.replace(/\]/, '');
		//var newNum = parseInt(oldParts)+1;

		$(newNode).find('input').each(function() {
			//parts = $(this).attr('name').split(/[_|\[|\]]/);
			//$(this).attr('name', parts[0] + '_' + parts[1] + '[' + parts[2] + '_' + newNum + ']');
			parts = $(this).attr('id').split('_');
			$(this).attr('id', parts[0] + '_' + newNum);

			partsName = $(this).attr('name').split(/[_|\[|\]]/);

			$(this).next('span.err-msg').attr('id', partsName[0] + '_' + partsName[1] + '_' + partsName[2] + '_' + newNum +'_error');
		});

		$(node.parentNode).append(newNode);

		ShowCorrectLinks();
	}

	function RemoveWeightRange(node)
	{
		if (ConfirmRemove(node)) {
			$(node).remove();
			ShowCorrectLinks();
		}
	}

	//*********2.shipping_byweigth End*********

//*********3.shipping_bytotal*********
	function AddTotalRange(node)
	{
		var newNode = $(node).clone();
		var newVal = $(newNode).find('input:eq(1)').val();

		$(newNode).find('input:first').val(newVal);
		$(newNode).find('input:gt(0)').val('');

		var oldId = $('.TotalRanges:last input:first').attr('id');
		var oldParts = oldId.replace(/^.*_/, '');
		var newNum = parseInt(oldParts)+1;

		//var oldName = $('.WeightRanges:last input:first').attr('name');
		//var oldParts = oldName.replace(/^.*_/, '');
		//var oldParts = oldParts.replace(/\]/, '');
		//var newNum = parseInt(oldParts)+1;

		$(newNode).find('input').each(function() {
			//parts = $(this).attr('name').split(/[_|\[|\]]/);
			//$(this).attr('name', parts[0] + '_' + parts[1] + '[' + parts[2] + '_' + newNum + ']');
			parts = $(this).attr('id').split('_');
			$(this).attr('id', parts[0] + '_' + newNum);
			partsName = $(this).attr('name').split(/[_|\[|\]]/);
			$(this).next('span.err-msg').attr('id', partsName[0] + '_' + partsName[1] + '_' + partsName[2] + '_' + newNum +'_error');
		});

		$(node.parentNode).append(newNode);

		ShowCorrectLinks();
	}

	function RemoveTotalRange(node)
	{
		if (ConfirmRemove(node)) {
			$(node).remove();
			ShowCorrectLinks();
		}
	}

//*********3.shipping_bytotal End*********


//<!--Shipping-method-module-end-->


//<!--Order Shipment-module-start-->

let SubmitOrderShipment = {

	 'create' : function(element)
	 {
	 	  event = window.event;
	 	  event.preventDefault();

	 	  $('span[id$="_error"]').text('');
          
          	  $.ajax({

				url        : $(element).attr('action'),
				method     : "POST",
				dataType   : "json",
				headers    : {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							 },
				data       : $(element).serialize(),				
				async      : true,
				beforeSend : function () {
					           $(element).find('button,input[type="submit"]').attr('disabled', true);
					           callLoader();
					
				},
				complete: function () {
					           $(element).find('button,input[type="submit"]').attr('disabled', false);
					           endLoader();
				},
				success: function (response) {
					
					    if(response.success)
						{   
							alert(response.success);
							  window.location.reload();
						}
				},
				error: function (errorResp) {
					
					    $(element).find('button,input[type="submit"]').attr('disabled', false);
						let response = errorResp.responseJSON;
						let errors = response.errors;
						showErrors(errors);
						if(errorResp.error)
						{
							 alert(errorResp.error);
						}
				}
			});
  
	 	  return false;    
	 }
}

//<!--Order Shipment-module-start-->