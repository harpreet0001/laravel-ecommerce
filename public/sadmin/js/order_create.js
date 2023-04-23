var Order_Form = {

  orderCount    : 0,
  orderSubtotal : 0,
  orderShipping : 0,

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

	initCustomerSearch:function()
  {  
		var typingTimer; //timer identifier
		var doneTypingInterval = 800; //time in ms (1 seconds) 

     	$('body').on('keyup','input[name="searchCustomer"]',function()
     	{
 	  	    clearTimeout(typingTimer);

 	  	    if ($(this).val()) {

				typingTimer = setTimeout(doneTyping, doneTypingInterval);
			}
			else {
				console.log('empty');
			}

			let url = $(this).data('search-customer-url') + '?search=' + $(this).val();

			function doneTyping() {

				$.ajax({

					url: url,
					type: 'GET',
					dataType: 'json',
					beforeSend: function () {
             callLoader();
					},
					complete: function (){
            endLoader();
					},
					success: function (response) {
						
						let row  = '';
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

                                        row +=  `<li id="${customerId}" onClick="Order_Form.selectCustomer(${"'"+customerId+"'"},${"'"+customerEmail+"'"},${"'"+customerFirstname+"'"},${"'"+customerLastname+"'"})">
						                           <a href="javascript:void(0);" class="result-item"><span class="r-name">${customer.firstname} ${customer.lastname} </span> <span class="e-mail">${customer.email}</span> <span class="n-number">${customer.contact}</a>
						                         </li>`;
                             	  }
                             });
						} 
						else
						{
							row += '<li>NO DATA FOUND</li>';
						}

						let customerSearchResultEle = $('body .customerSearchResult');
						customerSearchResultEle.addClass('active').find('ul.result-listing').html(row);
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
    	if(customerId)
    	{
        $('input[name="searchCustomer"]').val(`${customerFirstname ?? ''} ${customerLastname ?? ''} ( ${customerEmail ?? ''} )`);
    	  $('body .customerSearchResult').removeClass('active');	
	      $('input#customerId').val(customerId);
	 
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
    	}

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
        callLoader(); 
        if(Order_Form.ValidateOrderFor() && Order_Form.ValidateCustomer())
        {
            $('body ul.orderProgressLi li#billing_li').addClass('active');
            $('body .multistep-content .multistep-tab').removeClass('active');
            $('body .multistep-content .multistep-tab#billingTab').addClass('active');
            endLoader();
        }
        else
        {
            endLoader();
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
                              if(! Order_Form.checkEmailAvailability($(element).val()))
                              {
                                 $('span#'+$(element).attr('name')+'_error').html('Email is already exist');
                                 ret = false;
                              }
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

    checkBillingDetail:function()
    {
        callLoader();
        if(Order_Form.validateBillingDetail())
        {   
            $('body ul.orderProgressLi li#product_li').addClass('active');
            $('body .multistep-content .multistep-tab').removeClass('active');
            $('body .multistep-content .multistep-tab#productTab').addClass('active');
            endLoader();
        }
        else
        {
           endLoader();
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
                    $('.billingForToggleNew').find('input').each(function(index,element)
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

                    $('.billingForToggleNew').find('select').each(function(index,element)
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

    initProductSearch: function()
    {
    	//setup before functions
		var typingTimer; //timer identifier
		var doneTypingInterval = 800; //time in ms (1 seconds)
    	$('body').on('keyup','input[name="search_product"]',function()
     	{
              
   	  	clearTimeout(typingTimer);
   	  	if ($(this).val()) {
  				typingTimer = setTimeout(doneTyping, doneTypingInterval);
  			}
  			else {
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
              callLoader();
  					},
  					complete: function () {
              endLoader();
  					},
  					success: function (response) {
  				         
  				    let row  = '';
  						let products = response.products;
  						if(products.length > 0 )
  						{
                $.each(products,function(index,product)
                {

             	    let productId          = product['id'];
         	  	    let productTitle       = product['title'];
         	  	    let productPrice       = product['price'];
         	  	    let productDescription = product['description'];

                  row +=  `<li id="${productId}" onClick="Order_Form.addItem('${productId}',1)">
                             <a href="javascript:void(0);" class="result-item">${productTitle}</a>
                          </li>`;
                 
                });
  						} 
  						else
  						{
  							row += '<li>NO DATA FOUND</li>';
  						}

  						let customerSearchResultEle = $('body .searchProductResult');
  						customerSearchResultEle.addClass('active').find('ul.result-listing').html(row);
  						
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

      if(quantity === undefined) {
         return false;
      }

      $('body .searchProductResult').removeClass('active');
    	$.ajax({

		         url      : customRoutes['add-product'],
		         method   : 'POST',
		         async    : false,
		         dataType : 'json',
             beforeSend: function () {
                  callLoader();
              },
              complete: function (){
                  endLoader();
              },
		         headers  : {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			      },
		         data     : {'productId':productId,'quantity':quantity},
		         success  : function(response){

                Order_Form.orderSubtotal = parseFloat(response['cart-subtotal']);
                Order_Form.orderCount    = parseFloat(response['cart-count']);
		            $('body .addedProductList').html(response.cartlist);
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
             beforeSend: function () {
                 callLoader();
              },
              complete: function (){
                endLoader();
              },
		         headers  : {
				             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			      },
		         data     : {'rowId' : rowId},
		         success  : function(response)
		         {        
                      Order_Form.orderSubtotal = parseFloat(response['cart-subtotal']);
                      Order_Form.orderCount    = parseFloat(response['cart-count']);
		                  $('body .addedProductList').html(response.cartlist);
		         }

		   });
    },

    checkSearchProduct: function()
    {   
        callLoader(); 
        if(Order_Form.validateSearchProduct())
        {
            $('body ul.orderProgressLi li#shipping_li').addClass('active');
            $('body .multistep-content .multistep-tab').removeClass('active');
            $('body .multistep-content .multistep-tab#shippingTab').addClass('active');
            endLoader();
        }
        else
        {  
           endLoader();
           return false;
        }	
    },

    validateSearchProduct : function()
    {
        if($("body .addedProductList input[name='quantity']").length)
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

    checkShippingDetail:function()
    {    
        if(Order_Form.validateShippingDetail())
        {
            new Promise((resolve,reject) => {

                let countryId = null;
                callLoader();

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

              $('body .shippingMethodList').html(response.html); 
              $('body ul.orderProgressLi li#shippingmethod_li').addClass('active');
	            $('body .multistep-content .multistep-tab').removeClass('active');
	            $('body .multistep-content .multistep-tab#shippingmethodTab').addClass('active');
              endLoader();

            })
            .catch((response) => {
                  
                  endLoader(); 
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
                    $('.shippingToToggleNew').find('input').each(function(index,element)
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

                    $('.shippingToToggleNew').find('select').each(function(index,element)
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

    checkShippingMethodDetail:function()
    {
        callLoader();
        if($('body input[name="shipping_method"]:checked').length <= 0)
        {
          $('span#shipping_method_error').html('Please select valid shipping method');
        }
        else
        {
            $('span#shipping_method_error').html('');
            Order_Form.orderShipping = $('body input[name="shipping_method"]:checked').data('shipping-cost');

            new Promise((resolve,reject) => {

                resolve(Order_Form.getSaveOrderDetail());
            })
            .then((response) => {

              $('body .confirm_order_details').html(response['order-detail-html']); 
              $('body ul.orderProgressLi li#confirmorder_li').addClass('active');
	            $('body .multistep-content .multistep-tab').removeClass('active');
	            $('body .multistep-content .multistep-tab#confirmorderTab').addClass('active');

              $('body .order-shipping').text(`£${Order_Form.orderShipping}`);
              $('body .order-total').text(`£${parseFloat(Order_Form.orderSubtotal)+parseFloat(Order_Form.orderShipping)}`);
              endLoader();
            })
            .catch((response) => {

                 endLoader();
                 console.log(response);
            });


        }

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

    placeOrder:function(element)
    {
       let event = window.event;
       event.preventDefault();

       callLoader();

       if(Order_Form.checkCardDetails())
       {
          $.ajax({

            url: $('form#order_placed_form').attr('action'),
            type: 'post',
            data: $('form#order_placed_form').serialize(),
            dataType: 'json',
            success : function(response)
            {   
                 endLoader();
                window.location.href=response.redirect;
            },
            error: function()
            {
                endLoader();
            }

          });
       }
       else
       { 
          endLoader();
          return false;
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

    backTo : function(value)
    {    
        callLoader(); 
        let next_li = $("ul#progressbar li#"+value+"_li").nextAll("li");
            next_li.removeClass('active');

        let next_tab = $(".multistep-tab#"+value+"Tab").nextAll(".multistep-tab");
            next_tab.removeClass('active');

        $('body ul.orderProgressLi li#'+value+'_li').addClass('active');
        $('body .multistep-content .multistep-tab#'+value+'Tab').addClass('active');

        endLoader();
      
    }


};


// ----------------------step1----------------------------
    $("input[name=orderFor]").change(function () {
        
        let value      = $(this).val();
        let activeItem = ".orderForToggle" + value.charAt(0).toUpperCase() + value.substr(1);
        $(".orderForToggle").not(activeItem).hide();
        $(activeItem).show();

        $('input#customerId').val('');
    });

    $("input[name=orderFor]:checked").trigger("change");

    Order_Form.initCustomerSearch();
// ---------------------step1----------------------------

// ----------------------step2----------------------------
    $("input[name=billingFor]").change(function () {

        var value = $(this).val();
        var activeItem = ".billingForToggle" + value.charAt(0).toUpperCase() + value.substr(1);
        $(".billingForToggle").not(activeItem).hide();
        $(activeItem).show();
    });

   $("input[name=billingFor]:checked").trigger("change");
// ----------------------step2----------------------------

// ----------------------step3----------------------------
Order_Form.initProductSearch();
// ----------------------step3----------------------------

// ----------------------step4----------------------------
    $("input[name=shippingTo]").change(function () {

        var value = $(this).val();
        var activeItem = ".shippingToToggle" + value.charAt(0).toUpperCase() + value.substr(1);
        $(".shippingToToggle").not(activeItem).hide();
        $(activeItem).show();
    });

    $("input[name=shippingTo]:checked").trigger("change");
// ----------------------step4----------------------------


function checkNumber(value)
{

    let pattern =  RegExp(/^([0-9])+$/i);

    if(pattern.test(value))
    {
        return true;
    }

    return false;
}
