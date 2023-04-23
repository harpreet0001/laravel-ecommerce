//---------------------------------------Messages-------------------------------------------

function display_error(id, message, timeout) {
    if ($('#' + id + ' .MessageBox').get() != "") {
        $('#' + id).fadeOut('slow');
        $('#' + id).html('<div class="MessageBox MessageBoxError">' + message + '</div>').fadeIn('slow');
    } else {
        $('#' + id).hide().html('<div class="MessageBox MessageBoxError">' + message + '</div>').show('slow');
    }
    if (timeout > 0) {
        window.setTimeout(function() {
            $('#' + id).hide('slow');
        }, timeout);
    }
}
function display_info(id, message, timeout) {
    if ($('#' + id + ' .MessageBox').get() != "") {
        $('#' + id).fadeOut('slow');
        $('#' + id).html('<div class="MessageBox MessageBoxInfo">' + message + '</div>').fadeIn('slow');
    } else {
        $('#' + id).hide().html('<div class="MessageBox MessageBoxInfo">' + message + '</div>').show('slow');
    }
    if (timeout > 0) {
        window.setTimeout(function() {
            $('#' + id).hide('slow');
        }, timeout);
    }
}
function display_success(id, message, timeout) {
    if ($('#' + id + ' .MessageBox').get() != "") {
        $('#' + id).fadeOut('slow');
        $('#' + id).html('<div class="MessageBox MessageBoxSuccess">' + message + '</div>').fadeIn('slow');
    } else {
        $('#' + id).hide().html('<div class="MessageBox MessageBoxSuccess">' + message + '</div>').show('slow');
    }
    if (timeout > 0) {
        window.setTimeout(function() {
            $('#' + id).hide('slow');
        }, timeout);
    }
}
let order_status_update_success_message = 'The status of order has been changed to %s';
//--------------------------------------------------------------------------------------------------
//----------------------------------Functin-to-url-parameter-value----------------------------------
function getUrlParameter(sParam) {

    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }

    return null ;
};
//------------------------------------------------------------------------------------------------------

//----------------------------------Functin-to-covert-object-to-url-parameter---------------------------
function createUrlParameterString(params)
{
    // convert objec to a query string
    const qs = Object.keys(params)
    .map(function(key)
    { 
        if(params[key] !== '' && params[key] !== null && params[key] !== undefined)
        {   
          return `${key}=${params[key]}`;
        }

        return null;

    }).filter(function (el) {
          return el != null;
    }).join('&');

    return qs;
}

//------------------------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------------------------------
function getResults()
{
    let qParam = createUrlParameterString(params);

     new Promise((resolve,reject) => {

                  $.ajax({

                        url        : window.location.pathname+'?'+qParam,
                        method     : "GET",
                        dataType   : "html",
                        async      : true,
                        beforeSend : function(){
                                       
                         },
                         complete  : function() {
                                      
                         },
                        success    : function(result)
                        {            
                                        resolve(result);  
                        },
                        error      : function()
                        {           
                                       reject(result);      
                        }
                    });

           })
           .then((html) => {

                $('body #orderlist').html(html);
           })
           .catch((error) => {
                
                console.log(error);
 
           }); 
}
//-----------------------------------------------------------------------------------------------------------------

let params  = {
                'userId'     : getUrlParameter('userId'),
                'limit'      : $('.card select[name="limit"]').val(),
                'searchQuery': getUrlParameter('searchQuery'),
                'sortField'  : getUrlParameter('sortField'),
                'sortOrder'  : getUrlParameter('sortOrder'),
                'orderStatus': getUrlParameter('orderStatus'),
                'page'       : 1,
                
              };


//----------------------------------Pagination-------------------------------------------------------------------
     $(document).on('.order_list .card .pagination a','click',function(event)
     {
        event.preventDefault();
        $('.pagination li').removeClass('active');
        $(this).parent('li').addClass('active');

        var myurl    = $(this).attr('href');
        var page     = $(this).attr('href').split('page=')[1];
        params.page  =  page;

        window.history.pushState('order', 'parameters', window.location.pathname+"?"+createUrlParameterString(params));

        getResults();
    });   
//-----------------------------------------------------------------------------------------------------------------

//-------------------------limit filter----------------------------------------------------------------------------
$('.order_list .card select[name="limit"]').on('change',function(event)
{
     params['limit'] = $(this).val();
     params['page']  = 1;
     window.history.pushState('order', 'parameters', window.location.pathname+"?"+createUrlParameterString(params));
     getResults();
});
//-----------------------------------------------------------------------------------------------------------------

//-------------------------search filter----------------------------------------------------------------------------
$('.order_list .card #SearchButton').on('click',function(event)
{
     params['searchQuery'] = $('.card input[name="searchQuery"]').val();
     params['page']  = 1;
     window.history.pushState('order', 'parameters', window.location.pathname+"?"+createUrlParameterString(params));
     getResults();
});
//-----------------------------------------------------------------------------------------------------------------

//-------------------------------------reset filters---------------------------------------------------------------
$('.order_list .card #reset-filter-btn').on('click',function(event)
{   
    event.preventDefault();
    $('.card select[name="sort"] option:first').prop('selected','selected');
    $('.card select[name="limit"] option:first').prop('selected','selected');
    $('.card input[name="searchQuery"]').val('');
    $(".card select#orderStatusFilter option:first").attr('selected','selected');

    params['limit']         = $('select[name="limit"]').val();
    params['searchQuery']   = null;
    params['sortField']     = null;
    params['sortOrder']     = null;
    params['orderStatus']   = null;
    params['page']          = 1;

    window.history.pushState('order', 'parameters', window.location.pathname+"?"+createUrlParameterString(params));
    getResults();

});
//-----------------------------------------------------------------------------------------------------------------

//-------------------------------------------order-status-filter--------------------------------------------------
$('.card #orderStatusFilter').on('change',function(event)
{   
    event.preventDefault();
    params['orderStatus']   = $(this).val();
    params['page'] = 1;

    window.history.pushState('order', 'parameters', window.location.pathname+"?"+createUrlParameterString(params));
    getResults();

});
//----------------------------------------------------------------------------------------------------------------


//-----------------------------------------------sorting-----------------------------------------------------------
$('.card').on('click','a.SortLink',function(event){

    params['sortField']  = $(this).data('sort-field');
    params['sortOrder']  = $(this).data('sort-order');
    params['page']       = 1;

    window.history.pushState('order', 'parameters', window.location.pathname+"?"+createUrlParameterString(params));
    getResults();
   
})
//-----------------------------------------------------------------------------------------------------------------

//--------------------------------------order-quick-view-----------------------------------------------------------
function QuickView(element) {
         
        let event =  window.event;
            event.preventDefault();
 
        new Promise((resolve,reject) => {

              $.ajax({

                        url      : $(element).attr('href'),
                        method   : "GET",
                        dataType : "html",
                        async    : true,
                        success  : function(result)
                        {       
                            resolve(result);      
                        },
                        error: function()
                        {
                            reject(result);      
                        }
                    });
           })
           .then((html) => {  

                let orderquickmodal = $('body #orderQuickViewModal');
                    orderquickmodal.find('.modal-content').html(html);
                    orderquickmodal.modal('show');
           })
           .catch((error) => {
                console.log(error); 
           });
}
//-----------------------------------------------------------------------------------------------------------------

//----------------------------------------Update Order Status------------------------------------------------------
let lastorderstatus;
function setlastorderstatus(orderStatus)
{
    lastorderstatus = orderStatus; 
}
function update_order_status(element,orderId,orderStatus, statusText) {
       
        let event =  window.event;
            event.preventDefault();
        if(confirm('Are you sure?'))
        {
            status_message = statusText.toLowerCase();    

            new Promise((resolve,reject) => {

            $.ajax({

                        url      : element.getAttribute('data-url'),
                        method   : "POST",
                        dataType : "json",
                        headers  : {
                                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                   },
                        data     : {orderId:orderId,orderStatus:orderStatus,statusText:statusText},
                        async    : true,
                        cache    : false,
                        beforeSend: function () {
                                callLoader();
                        },
                        complete: function () {
                                endLoader();
                        },
                        success  : function(result)
                        {       
                            resolve(result);      
                        },
                        error: function()
                        {
                            reject(result);      
                        }
                    });
            })
            .then((response) => {  
                 
                $("#order_status_column_" + orderId).get(0).className = $("#order_status_column_" + orderId)
                                                                          .get(0)
                                                                          .className.replace(/OrderStatus[0-9*]/, "");
                $("#order_status_column_" + orderId)
                    .addClass("OrderStatus")
                    .addClass("OrderStatus" + orderStatus); 

                alert(order_status_update_success_message.replace("%d", orderId).replace("%s", status_message));

                return false;

                display_success('OrdersStatus', order_status_update_success_message.replace("%d", orderId).replace("%s", status_message));            
            })
            .catch((error) => {
                console.log(error); 
            });
        }
        else
        {
            $(element).val(lastorderstatus);
            $(element).find('option[value="'+lastorderstatus+'"]').attr("selected", "selected");
            
        }    
 

}
//-----------------------------------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------------------------------
var Order = {

    HandleAction:function(element,orderId,action){

        event =window.event;
        event.preventDefault();

        if (!action) {
            return false;
        }

        let url = element.getAttribute('data-url');

        switch (action) {

            case 'printInvoice':
                   PrintInvoice(orderId,url,action);
                   break;

            case 'printPackingSlip':  
                   PrintInvoice(orderId,url,action);
                   break;  
        }

        return false;
     }
}

function PrintInvoice(orderId,url=null,action=null)
{
    let modifiedUrl = url+"?Todo="+action+'&orderId='+orderId;

    var l = screen.availWidth / 2 - 450;
    var t = screen.availHeight / 2 - 320;
    var win = window.open(modifiedUrl, '', 'width=900,height=650,left=' + l + ',top=' + t + ',scrollbars=1');
}
//-----------------------------------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------------------------------
function getPromise(url,data,dataType='text')
{
    return  new Promise((resolve,reject) => {

            $.ajax({

                        url      :  url,
                        method   : "GET",
                        dataType :  dataType,
                        data     : data,
                        async    : true,
                        cache    : false,
                        success  : function(result)
                        {       
                            resolve(result);      
                        },
                        error: function()
                        {
                            reject(result);      
                        }
                    });
            });
}
//-----------------------------------------------------------------------------------------------------------------

let OrderForm = {

     useExistingAddress : function(element)
     {

        event = window.event;
        event.preventDefault();
        let address = $(element).data('address'); 
        let url = $(element).attr('href')+'?address='+address;
        getPromise(url).then((response) => {
             
             if(address == 'billing'){
               $('#orderFormBillingDetails').html(response);
             }else{
                $('#orderFormShippingDetails').html(response);
             }  
        })
        .catch((erros) => {

             console.log(erros);
        });
            
     },
    itemQuantityPriceChange: function() {
       
       return false;
        var parentRow = $(this).parents('tr');
        var quantityField = parentRow.find('.quoteItemQuantity input[name="quantity[]"]');
        var quantity = quantityField.val();
        var priceField = parentRow.find('.quoteItemPrice input[name="price[]"]');
        var price = priceField.val();

        if (price == "") {
            alert('Please enter a valid price for this item.');
            $(priceField).select().focus();
            return false;
        } else if (quantity.match(/[^0-9]/)) {
            alert('Please enter a valid quantity for this item.');
            $(quantityField).select().focus();
            return false;
        }

        var itemId = parentRow.attr('id').replace('itemId_', '');

        $.ajax({
            url      :  $(this).data('url'),
            dataType :  'json',
            headers  :  {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
            type     : 'post',
            data     : {
                quantity : quantity,
                price    : price
            },
            success: function(response) {
                
                console.log(response);
            }
        })
    },

    orderUpdate:function(element)
    {
        event = window.event;
        event.preventDefault();

        $('span[id$="_error"]').html('');

        if(confirm('Are you sure?')){

                 $.ajax({

                    url         :  $(element).attr('action'),
                    method      :  "POST",
                    dataType    :  "json",
                    headers     :  {
                                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                   },
                    data        : $(element).serialize(),
                    async       : false,
                    cache       : false,
                    success     : function(response) {
                        
                                    location.reload();
                    },
                    error       : function(errorResponse)
                    {
                        let errorsData = errorResponse.responseJSON;
                        $.each(errorsData.errors,function(key,error){
                           document.getElementById(key+'_error').innerHTML = error.pop();
                        });
                    }
            });    
        }
        else
        {
           return false;
        }
  
    },
    handleResponse : function(response){

         if(!response){
            return true;
         }
   
    }

};


//-------------------------------------------------------------------------------------
$('.orderBillingDetailsChangeLink').on('click',function(event){

    event.preventDefault();
    $('#orderFormBillingDetailsContainer').css('display','block');
    $(this).parents('.orderBillingDetailsContainer').css('display','none');
});
//----------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
$('.orderShippingDetailsChangeLink').on('click',function(event){

    event.preventDefault();
    $('#orderFormShippingDetailsContainer').css('display','block');
    $(this).parents('.orderShippingDetailsContainer').css('display','none');
});
//----------------------------------------------------------------------------------

//----------------------------------------------------------------------------------
    $('.quoteItemQuantity input[name="quantity[]"]').on('change', OrderForm.itemQuantityPriceChange);
    $('.quoteItemPrice input[name=price]').on('change', OrderForm.itemQuantityPriceChange);
//----------------------------------------------------------------------------------

//---------------------------------
function priceFormat(price) {
    price = price.replace(ThousandsToken, "");
    price = price.replace(DecimalToken, ".");
    return price;
}
//---------------------------------