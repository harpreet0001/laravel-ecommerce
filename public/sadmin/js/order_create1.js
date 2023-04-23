$(function () {

	// <!--common functions start-->

	$("html body").on('keyup', '.cart-product-quantity', function (e) {

		if ($(this).val() == '') {
			$(this).val(1);
			return false;
		}
		var cart_quantity = parseInt($(this).val());
		if (cart_quantity < 1 || cart_quantity > $(this).attr('max')) {
			var targ = $(e.target);
			$(this).val(1);
		}
	});

	// Numeric only control handler

	$("html body").on('keydown', '.cart-product-quantity', function (e) {
		var key = e.charCode || e.keyCode || 0;

		// allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
		// home, end, period, and numpad
		return (
			key == 8 ||
			key == 9 ||
			key == 13 ||
			key == 46 ||
			(key >= 35 && key <= 40) ||
			(key >= 48 && key <= 57) ||
			(key >= 96 && key <= 105)
		);

	});
	//<!--common functions end-->

    $("#orderForm").submit(function () {
        return false;
    });



  // ----------------------step1----------------------------
    $("input[name=orderFor]").change(function () {
        
        Order_Form.ValidateOrderFor();

        var value = $(this).val();

        // -------------------------
           $('input#customerId').val('');
        // -------------------------
        // <!--steps
			      Order_Form.setAdressList([],'addressList');
			      $('body .shippingMethodList').html('');
            $('body .saveOrderDetails').html(''); 
            Order_Form.customerStepDone       = false;
			      Order_Form.billingStepDone        = false;
            Order_Form.shippingStepDone       = false;
            Order_Form.shippingMethodStepDone = false;
            Order_Form.confirmOrderStepDone   = false;
        //----------------------------//
        Order_Form.setCustomerDetails('','','');

        var activeItem = ".orderForToggle" + value.charAt(0).toUpperCase() + value.substr(1);
        $(".orderForToggle").not(activeItem).hide();
        $(activeItem).show();
    });

    $("input[name=orderFor]:checked").trigger("change");

    Order_Form.initCustomerSearch();
    // ------------------------------------------------------


    // ----------------------step2----------------------------
        $("input[name=billingFor]").change(function () {

	        var value = $(this).val();
	        var activeItem = ".billingToggle" + value.charAt(0).toUpperCase() + value.substr(1);
	        $(".billingToggle").not(activeItem).hide();
	        $(activeItem).show();

          // <!--steps
          Order_Form.billingStepDone = false;
	    });

    $("input[name=billingFor]:checked").trigger("change");
    // ----------------------step2----------------------------

    // ----------------------step3----------------------------
     Order_Form.initProductSearch();
    // ----------------------step3----------------------------


     // ----------------------step4----------------------------
        $("input[name=shippingTo]").change(function () {

	        var value = $(this).val();
	        // <!--set orderFor variables
	       //----------------------------//

	        var activeItem = ".shippingToggle" + value.charAt(0).toUpperCase() + value.substr(1);
	        $(".shippingToggle").not(activeItem).hide();
	        $(activeItem).show();

           // <!--steps
            $('body .shippingMethodList').html('');
            $('body .saveOrderDetails').html(''); 
            Order_Form.shippingStepDone       = false;
            Order_Form.shippingMethodStepDone = false;
            Order_Form.confirmOrderStepDone   = false;

	    });

    $("input[name=shippingTo]:checked").trigger("change");
    // ----------------------step4----------------------------


    // ----------------------step5----------------------------
     $('body .shippingMethodList input[name="shipping_method"]').on('change',function()
     {
           Order_Form.shippingMethodId = $(this).val();
           Order_Form.shippingMethodStepDone = true;
     });
    // ----------------------step5----------------------------


    Order_Form.checkStepIncomplete();


});

var Order_Form = {
    
    //<!-- for step1 -->
	customerStepDone        : false,
	billingStepDone         : false,
	searchProductStepDone   : false, 
	shippingStepDone        : false,
	shippingMethodStepDone  : false,
	confirmOrderStepDone    : false,

    initCustomerSearch:function()
    {  
		var typingTimer; //timer identifier
		var doneTypingInterval = 800; //time in ms (1 seconds) 
     	$('body').on('keyup','#orderForSearch',function()
     	{
 	  	    clearTimeout(typingTimer);

 	  	    if ($(this).val())  {
				typingTimer = setTimeout(doneTyping, doneTypingInterval);
			}
			else {
				console.log('empty');
			}

			let url = $(this).data('search-customer') + '?search=' + $(this).val();

			//user is "finished typing," do something
			function doneTyping() {

				$.ajax({

					url: url,
					type: 'GET',
					dataType: 'json',
					beforeSend: function () {

					},
					complete: function (){

					},
					success: function (response) {
						
						let row  = '<ul>';
						let customers = response.customers;
						if(customers.length > 0 )
						{
                             $.each(customers,function(index,customer)
                             {
                             	  if(customer.role == 'customer')
                             	  {     
                             	        let customerId         = customer._id;
                             	        let customerEmail      = customer.email;
                             	        let customerFirstname  = customer.firstname;
                             	        let customerLastname   = customer.lastname;

                                        row +=  `<li onClick="Order_Form.selectCustomer(${"'"+customerId+"'"},${"'"+customerEmail+"'"},${"'"+customerFirstname+"'"},${"'"+customerLastname+"'"})">
	                                                <div class="recordContent">
	                                                    <strong>
								                          ${customer.firstname} ${customer.lastname} 
								                        </strong> 
								                        <div>${customer.email}</div>
								                        <div>${customer.contact}</div>
	                                                </div>
	                                             </li>`;
                             	  }
                             });
						} 
						else
						{
							row += '<li>NO DATA FOUND</li>';
						}
						row += '</ul>';
						$('body .orderCustomerSearchResult').html(row).css('display','block');
					},
					error: function (response) {
                       
                            console.log(response);
					}
				});
			}


     	});

     },

    selectCustomer:function(customerId,customerEmail,customerFirstname,customerLastname)
    {
    	// SET CUSTOMER variables
			Order_Form.customerStepDone   = true;
    	//---------------------//

        //---------------------//
          $('input#customerId').val(customerId);
        //---------------------//


    	new Promise((resolve,reject) => {
          
            resolve(Order_Form.getAddressList(customerId));

    	})
    	.then((response) => {

            let addressList = response;
            Order_Form.setAdressList(addressList.addresses,'addressList');

    	})
    	.catch((response) => {

    		 console.log(response);
    	});


    	Order_Form.setCustomerDetails(customerEmail,customerFirstname,customerLastname);
    },

    setCustomerDetails:function(customerEmail,customerFirstname,customerLastname)
    {
    	let customer_detail_append = '';

    	if(customerEmail !== '' && customerEmail !== null)
    	{
    	 	if(customerFirstname !== '' && customerFirstname !== null){
                  
                customer_detail_append += customerFirstname;
    	 	}

    	 	if(customerLastname !== '' && customerLastname !== null) {

    	 	 	customer_detail_append += ' '+customerLastname;
    	 	}

    	 	customer_detail_append += '('+customerEmail+')';

    	}

     	$('body #customer_detail_span').html(customer_detail_append);
    },

    setAdressList: function(addresses,elementClass)
    {   
    	let rows = '';
        if(addresses.length > 0)
        {   
          	$.each(addresses,function(index,address)
          	{    
          	  	let country_state_city_postcode = address.countryName+' '+address.stateName+' '+address.city+' '+address.company;
          	  	rows += `<option value="${address.id}" data-countryid="${address.countryId}">${country_state_city_postcode}</option>`; 
          	});
        }

        $('body .'+elementClass).each(function(index,ele)
        { 
            $(ele).find('option').not(':first').remove();
        });

        if(rows !== '')
        {
            $('body .'+elementClass).each(function(index,ele)
	        { 
	            $(ele).append(rows);
	        });
        }
    } ,

    checkCustomerDetail:function()
    {
        if(Order_Form.ValidateOrderFor(),Order_Form.ValidateCustomer())
        {
            $('body #customer_detail').collapse('hide');
            $('body #billing_address').toggleClass('show');
        }
        else
        {
            return false;
        }  
	
    },

    ValidateOrderFor:function()
    {
        let ret = false;
        if($("input[name='orderFor']:checked").length <= 0)
        {
            $('span#orderFor_error').html('Please select valid order for field');
            ret = false;
        }
        else
        {
            $('span#orderFor_error').html('');
            ret = true;
        }

        return ret     
    },
    ValidateCustomer : function()
    {

        switch($("input[name='orderFor']:checked").val())
        {
            case 'existing':
                 
                if($('input[name="customerId"]').val() == '' || $('input[name="customerId"]').val() == null)
                {
                    $('span#customerId_error').html('Please select a valid customer');
                    return false;
                }
                else 
                {   
                    Order_Form.customerStepDone = true;
                    $('span#customerId_error').html('');
                    return true;
                }

            break;

            case 'new':
                   
                   let ret = true;
                   $('.orderForToggleNew').find('input').each(function(index,element)
                   {
                         if($(element).val() == '')
                         {
                            $('span#'+$(element).attr('name')+'_error').html('Please fill this field');
                            ret = false
                         }
                         else if($(element).val().length > 300)
                         {
                            $('span#'+$(element).attr('name')+'_error').html('Field length should be less than 200 characters');
                            ret = false;
                         }
                         else
                         {  
                            $('span#'+$(element).attr('name')+'_error').html('');

                            if($(element).attr('type') == 'email')
                            {
                                //checkEmailValidation
                                console.log('email validation');
                            }

                            if($(element).attr('type') == 'number')
                            {
                                 console.log('number validation');
                            }
                         }
                   });
                   
                   return ret;

            break;

            default:

               alert('Please select Order for');
               return false;

            break;
        }
    
    },
    checkEmailAvailability:function(email)
    {
    	let availability = false;

        $.ajax({

		         url    : customRoutes['check-email-availability'],
		         method : 'GET',
		         async  : false,
		         data   : {'email' : email},
		         success : function(response)
		         {
		            availability = (response.availability == 'true') ? true : false;
		         }

		   });

        return availability;
    },

    getAddressList:function(customerId)
    {
         let ret;

         $.ajax({

		         url      : customRoutes['get-address-list'],
		         method   : 'POST',
		         async    : false,
		         headers  : {
				             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			      },
		         dataType : 'json',
		         data     : {'customerId' : customerId},
		         success  : function(response)
		         {
		               ret = response;
		         },
		         error : function(response)
		         {
		         	   ret = response;
		         }

		   });

        return ret;  
    },

    checkBillingDetail:function()
    {
        if(Order_Form.validateBillingDetail())
        {   
            Order_Form.billingStepDone = true;
            $('body #billing_address').collapse('hide');
            $('body #search_product').toggleClass('show');
        }
        else
        {
            Order_Form.billingStepDone = false;
            return false;
        }

    },
    validateBillingDetail:function()
    {
        if($("input[name='billingFor']:checked").length <= 0)
        {
            $('span#orderFor_error').html('Please select valid billing for field'); 
            return false;
        }
        else
        {
            $('span#billingFor_error').html('');

            switch($("input[name='billingFor']:checked").val())
            {
                case 'existing':

                    let billingIdEle = $('body select[name="billingId"]');

                    if(billingIdEle.val() == '' || billingIdEle.val() === null)
                    {
                        $('span#billingId_error').html('Please select valid billing address or create new one');
                        return false;
                    }
                    else 
                    {
                        $('span#billingId_error').html('');
                        return true;
                    }

                break;

                case 'new':

                    let ret = true;
                    $('.billingToggleNew').find('input').each(function(index,element)
                    {
                         if($(element).val() == '')
                         {
                            $('span#'+$(element).attr('name')+'_error').html('Please fill this field');
                            ret = false
                         }
                         else if($(element).val().length > 300)
                         {
                            $('span#'+$(element).attr('name')+'_error').html('Field length should be less than 200 characters');
                            ret = false;
                         }
                         else
                         {  
                            $('span#'+$(element).attr('name')+'_error').html('');

                            if($(element).attr('type') == 'email')
                            {
                                //checkEmailValidation
                                console.log('email validation');
                            }

                            if($(element).attr('type') == 'number')
                            {
                                 console.log('number validation');
                            }
                         }
                    });

                    $('.billingToggleNew').find('select').each(function(index,element)
                    {
                        if($(element).val() == '' || $(element).val() === null)
                        {
                          ret = false;
                          $('span#'+$(element).attr('name')+'_error').html('Please fill this field');
                        }
                        else
                        {
                            $('span#'+$(element).attr('name')+'_error').html('');
                        }
                    });
                   
                    return ret;

                      
                break;

                default:

                   alert('Please select Billing for');
                   return false;

                break;
            }   
        }
    },

    setBillingAddress:function(element)
    {
    	if(element.value !== null || element.value != '')
    	{
    		Order_Form.billingId      = element.value;
    		Order_Form.billingStepDone = true;
    	}
    	else
    	{
    		Order_Form.billingId      = null;
    		Order_Form.billingStepDone = false;
    	}
    },

     initProductSearch: function()
    {
    	//setup before functions
		var typingTimer; //timer identifier
		var doneTypingInterval = 800; //time in ms (1 seconds)
    	$('body').on('keyup','.quoteItemSearch input[name="search_product"]',function()
     	{
              
 	  	    clearTimeout(typingTimer);

 	  	    if ($(this).val())
 	  	    {
				typingTimer = setTimeout(doneTyping, doneTypingInterval);
			}
			else 
			{
				console.log('empty');
			}

			let url = customRoutes['search-products'] + '?search=' + $(this).val();

			//user is "finished typing," do something
			function doneTyping() {

				$.ajax({

					url: url,
					type: 'GET',
					dataType: 'json',
					beforeSend: function () {

					},
					complete: function () {

					},
					success: function (response) {
				         
				       	let row      = '<ul>';
						let products = response.products;
						if(products.length > 0 )
						{
                             $.each(products,function(index,product)
                             {
                             	

                     	  	    let productId          = product['id'];
                     	  	    let productTilte       = product['title'];
                     	  	    let productPrice       = product['price'];
                     	  	    let productDescription = product['description'];
                              	 

                                row +=  ` <a href="#" onClick="Order_Form.addItem('${productId}',1)">use this</a>
                                          <li">
                                            <div class="recordContent">
                                                <strong>
						                          ${productTilte}
						                        </strong> 
						                        <div>${productPrice}</div>
						                        <div>${productPrice}</div>
                                            </div>
                                         </li>`;
			                          
                             });
						} 
						else
						{
							row += '<li>NO DATA FOUND</li>';
						}
						    row += '</ul>';

						    $('body .quoteItemSearchResult').html(row).css('display','block');
						
					},
					error: function (response) {
                       
                        console.log(response);
					}
				});
			}

     	});
   },
    addItem:function(productId,quantity)
    {
    	let event = window.event;
		  event.preventDefault();

      if(quantity === undefined)
      {
         return false;
      }
        
    	 $.ajax({

		         url      : customRoutes['add-product'],
		         method   : 'POST',
		         async    : false,
		         dataType : 'json',
		         headers  : {
				             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			      },
		         data     : {'productId':productId,'quantity':quantity},
		         success  : function(response)
		         {
		                  $('body .quoteItemSearchProductList').html(response.cartlist);
		                  if(parseInt(response['cart-count']) > 0)
		                  {
                              Order_Form.searchProductCount = parseInt(response['cart-count']);
		                  	  Order_Form.searchProductStepDone = true;
		                  }
		                  else
		                  { 
		                  	 Order_Form.searchProductCount = 0;
		                  	 Order_Form.searchProductStepDone = false;
		                  }
		         }

		   });

        return false;
    },

    deleteItem:function(rowId)
    {
    	 $.ajax({

		         url      : customRoutes['delete-product'],
		         method   : 'POST',
		         async    : false,
		         dataType : 'json',
		         headers  : {
				             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			      },
		         data     : {'rowId' : rowId},
		         success  : function(response)
		         {
		                  $('body .quoteItemSearchProductList').html(response.cartlist);
		                  if(parseInt(response['cart-count']) > 0)
		                  {
                              Order_Form.searchProductCount = parseInt(response['cart-count']);
		                  	  Order_Form.searchProductStepDone = true;
		                  }
		                  else
		                  { 
		                  	 Order_Form.searchProductCount = 0;
		                  	 Order_Form.searchProductStepDone = false;
		                  }
		         }

		   });
    },

    checkSearchProduct: function()
    {
        if(Order_Form.validateSearchProduct())
        {
           $('body #search_product').collapse('hide');
           $('body #shipping_address').toggleClass('show');
        }
        else
        {
           return false;
        }	
    },

    validateSearchProduct : function()
    {
        if($("body input[name='quantity']").length)
        {
            $('span#search_product_error').html('');
            return true; 
        }
        else
        {
            $('span#search_product_error').html('Please select atleast one item');
            return false;
        }
    },

    setShippingAddress:function(element)
    {
    	if(element.value !== null || element.value != '')
    	{
    		Order_Form.shippingId       = element.value;
    		Order_Form.shippingStepDone = true;
    	}
    	else
    	{
    		Order_Form.shippingId      = null;
    		Order_Form.shippingStepDone = false;
    	}
    },

    checkShippingDetail:function()
    {   
        if(Order_Form.validateShippingDetail())
        {
            new Promise((resolve,reject) => {

                let countryId = null;

                if($("input[name='shippingTo']:checked").val() == 'existing')
                {
                    countryId = $('body select[name="shippingId"]').children('option:selected').attr('data-countryid');
                }
                else
                {
                    countryId = $('body select[name="shippingCountryId"]').val();
                }

                if(countryId == '' || countryId == null)
                {  
                    reject('Please select valid shipping country');   
                }
                else
                {
                    resolve(Order_Form.getShippingMethods(countryId));
                    
                }
            })
            .then((response) => {

                // <!--steps
                $('body .saveOrderDetails').html(''); 
                Order_Form.shippingStepDone       = true;
                Order_Form.shippingMethodStepDone = false;
                Order_Form.confirmOrderStepDone   = false;
                         
                $('body .shippingMethodList').html(response.html); 
                $('body #shipping_address').collapse('hide');
                $('body #shipping_method').toggleClass('show');
            })
            .catch((response) => {

                  alert(response);
            });

        }
        else
        {
            return false;
        }
	
    },

    validateShippingDetail : function()
    {
          
        if($("input[name='shippingTo']:checked").length <= 0)
        {
            $('span#shippingTo_error').html('Please select valid shipping to field'); 
            return false;
        }
        else
        {
            $('span#shippingTo_error').html('');

            switch($("input[name='shippingTo']:checked").val())
            {
                case 'existing':

                    let shippingIdEle = $('body select[name="shippingId"]');

                    if(shippingIdEle.val() == '' || shippingIdEle.val() === null)
                    {
                        $('span#shippingId_error').html('Please select valid shipping address or create new one');
                        return false;
                    }
                    else 
                    {
                        $('span#shippingId_error').html('');
                        return true;
                    }

                break;

                case 'new':

                    let ret = true;
                    $('.shippingToggleNew').find('input').each(function(index,element)
                    {
                         if($(element).val() == '')
                         {
                            $('span#'+$(element).attr('name')+'_error').html('Please fill this field');
                            ret = false
                         }
                         else if($(element).val().length > 300)
                         {
                            $('span#'+$(element).attr('name')+'_error').html('Field length should be less than 200 characters');
                            ret = false;
                         }
                         else
                         {  
                            $('span#'+$(element).attr('name')+'_error').html('');

                            if($(element).attr('type') == 'email')
                            {
                                //checkEmailValidation
                                console.log('email validation');
                            }

                            if($(element).attr('type') == 'number')
                            {
                                 console.log('number validation');
                            }
                         }
                    });

                    $('.shippingToggleNew').find('select').each(function(index,element)
                    {
                        if($(element).val() == '' || $(element).val() === null)
                        {
                          ret = false;
                          $('span#'+$(element).attr('name')+'_error').html('Please fill this field');
                        }
                        else
                        {
                            $('span#'+$(element).attr('name')+'_error').html('');
                        }
                    });
                   
                    return ret;

                break;

                default:

                   alert('Please select shipping to');
                   return false;

                break;
            }   
        }
    
    },

    getShippingMethods:function(countryId)
    {    
    	let ret;

         $.ajax({

		         url      : customRoutes['get-shipping-methods'],
		         method   : 'POST',
		         async    : false,
		         headers  : {
				             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			      },
		         dataType : 'json',
		         data     : {'countryId' : countryId},
		         success  : function(response)
		         {
		               ret = response;
		         },
		         error : function(response)
		         {
		         	   ret = response;
		         }

		   });

        return ret;  
    },
    getSaveOrderDetail:function()
    {
         let ret;

         $.ajax({

		        url      : customRoutes['save-order-detail'],
		        method   : 'POST',
		        async    : false,
		        headers  : {
				             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
		        dataType : 'json',
		        success  : function(response)
		        {
		               ret = response;
		        },
		        error : function(response)
		        {
		         	   ret = response;
		        }

		   });

        return ret;  
    },
    checkShippingMethodDetail:function()
    {
        if($('body input[name="shipping_method"]:checked').length <= 0)
        {
            $('span#shipping_method_error').html('Please select valid shipping method');
        }
        else
        {
            $('span#shipping_method_error').html('');

            new Promise((resolve,reject) => {

                resolve(Order_Form.getSaveOrderDetail());
            })
            .then((response) => {

                // <!--steps
                Order_Form.shippingMethodStepDone = true;
                Order_Form.confirmOrderStepDone   = true;
                         
                $('body .saveOrderDetails').html(response['order-detail-html']); 
                $('body #shipping_method').collapse('hide');
                $('body #confirm_order').toggleClass('show');
            })
            .catch((response) => {
                 console.log(response);
            });


        }

    },
    checkStepIncomplete : function()
    {    

    	 $('a.btn-header-link').on('click',function(event)
  		{
  			
  			let stepName = $(this).data('step-name');

  			if(!Order_Form[stepName])
  			{   event.preventDefault();
  				  event.stopImmediatePropagation();	
  				  Order_Form.moveToStep();
  			}

      });
    },
    moveToStep:function()
    {
	       if(!Order_Form.customerStepDone)
	    	{
	    	 	$('body #customer_detail').collapse('show');
	    	}
	    	else if(!Order_Form.billingStepDone)
	    	{
	           $('body #billing_address').collapse('show');
	    	}
	    	else if(!Order_Form.searchProductStepDone)
	    	{
	            $('body #search_product').collapse('show'); 
	    	}
	    	else if(!Order_Form.shippingStepDone)
	    	{
	            $('body #shipping_address').collapse('show');
	    	}
	    	else if(!Order_Form.shippingMethodStepDone)
	    	{
	            $('body #shipping_method').collapse('show');
	    	}
	    	else
	    	{
	    		 console.log('body '+$(this).data('target'));
	    		 $('body '+$(this).data('target')).collapse('show');
	    	}
    },

    checkCardDetails:function()
    {
        let ret = true;
        $('body .card_details').find('input').each(function(index,element)
        {
            if($(element).val() == '')
            {
              $('span#'+$(element).attr('name')+'_error').html('Please fill this field');
              ret = false
            }
            else if($(element).val().length > 300)
            {
              $('span#'+$(element).attr('name')+'_error').html('Field length should be less than 200 characters');
              ret = false;
            }
            else
            {  
                if($(element).attr('name') == 'cc_number')
                {
                   if(!checkNumber($(element).val().toString()))
                   {  
                      $('span#'+$(element).attr('name')+'_error').html('Field should be integer');
                      ret = false;
                      return false;
                   }

                   if($(element).val().length != 16)
                   {
                      $('span#'+$(element).attr('name')+'_error').html('Field length must be 16');
                      ret = false;
                      return false;
                   }
                }

                if($(element).attr('name') == 'cc_cvv2')
                {
                   if(!checkNumber($(element).val().toString()))
                   {
                      $('span#'+$(element).attr('name')+'_error').html('Field should be integer');
                      ret = false;
                      return false;
                   }
                   
                   if($(element).val().length != 3)
                   {
                      $('span#'+$(element).attr('name')+'_error').html('Field length must be 3');
                      ret = false;
                      return false;
                   }
                }

                $('span#'+$(element).attr('name')+'_error').html('');
            }
        });

        $('body .card_details').find('select').each(function(index,element)
        {
            if($(element).val() == '')
            {
              $('span#'+$(element).attr('name')+'_error').html('Please select this field');
              ret = false
            }
            else
            {  
                $('span#'+$(element).attr('name')+'_error').html('');
            }
        });

        return ret;
    },
    placeOrder:function(element)
    {
       let event = window.event;
       event.preventDefault();

       if(Order_Form.checkCardDetails())
       {
          $.ajax({

            url: $('form#order_placed_form').attr('action'),
            type: 'post',
            data: $('form#order_placed_form').serialize(),
            dataType: 'json',
            success : function(response)
            {
                console.log(response);
            }

          });
       }
       else
       {
          return false;
       }

      
    }

}


function checkNumber(value)
{

    let pattern =  RegExp(/^([0-9])+$/i);

    if(pattern.test(value))
    {
        return true;
    }

    return false;
}