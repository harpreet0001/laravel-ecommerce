//------------------------------Country-------------------------------------------------------
$(document).delegate('select.country', 'change', function(e) {

    $.ajax({
        url        :  $(this).attr('action')+'?countryId='+this.value,
        dataType   : 'json',
        beforeSend : function() {
            $('select.country').prop('disabled', true);
        },
        complete   : function() {
            $('select.country').prop('disabled', false);
        },
        success    : function(json) {
            
            html = '<option value=""> --- Please Select --- </option>';

            if (json['states'] && json['states'] != '') 
            {
                $.each(json['states'],function(index,state){

                    html += `<option value="${state['_id']}">${state['state_name']}</option>`;
                });
            }

            $('select.state').html(html);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});
//------------------------------------Country----------------------------------------------


//------------------------------------Coupon-----------------------------------------------
  selectmax_discount();

  $('select[name=discount_type]').on('change',function(){
      selectmax_discount();
  });

  function selectmax_discount() {
     var id = $('select[name=discount_type]').val();
     var coupon_for = $('select[name=coupon_for]').val();
     if(parseInt(id) == 2){
        $('#max_discount').parents('.max_discount_container').hide();
     }else{
        $('#max_discount').parents('.max_discount_container').show();
     }   
  }

  $( document ).ready(function() {
    var coupon_for = $('select[name="coupon_for"]').find(":selected").val();
    if(coupon_for == '2'){
      $(".selected_member_list").css("display", "block");
    }
  });

  $('select[name="coupon_for"]').on('change', function() {
    var coupon_for = $(this).find(":selected").val();
    if(coupon_for == '2'){
      $(".selected_member_list").css("display", "block");
    }else{
      $(".selected_member_list").css("display", "none");
    }
  });

 function setDateTimePicker(elementSelector)
 {
     let element      = $(elementSelector);
     let elementValue = element.val();

     new Promise((resolve,reject) => {
          
            resolve(
                      element.daterangepicker({

                          singleDatePicker : true,
                          showDropdowns    : true,
                          //autoUpdateInput  : false,
                          locale           : {
                                               format: 'YYYY/MM/DD'
                                             }
                      })
              );   
       })
       .then((element) => {
           if(elementValue == ''){
               element.val('');
           }    
       });  
 }
//------------------------------------Coupon End--------------------------------------------

//------------------------------------Product--------------------------------------------------
   function select_product_file() {
     var id = $('select[id="product_type"]').val();
     if(parseInt(id) == 1){ //1:for downloadable product
        $('input[name="downloadfile"]').parents('#product-download').show();
     }else{
        $('input[name="downloadfile"]').parents('#product-download').hide();
     }   
  }

  select_product_file();

  $('select[id="product_type"]').on('change',function(){
      select_product_file();
  });

//------------------------------------Product END-----------------------------------------------


//----------------------LOADER------------------------

function callLoader(time = 300) {
  $("#overlay").fadeIn(time);
}

function endLoader(time) {
  $("#overlay").fadeOut(time);
}
//----------------------LOADER END------------------------



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
function createCustomUrlParameterString(custom_params)
{
    // convert objec to a query string
    const qs = Object.keys(custom_params)
    .map(function(key)
    { 
        if(custom_params[key] !== '' && custom_params[key] !== null && custom_params[key] !== undefined)
        {   
          return `${key}=${custom_params[key]}`;
        }

        return null;

    }).filter(function (el) {
          return el != null;
    }).join('&');

    return qs;
}

//------------------------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------------------------------
function getCustomResults()
{
    let qParam = createCustomUrlParameterString(custom_params);
    new Promise((resolve,reject) => {

                  $.ajax({

                        url        : window.location.pathname+'?'+qParam,
                        method     : "GET",
                        dataType   : "html",
                        async      : true,
                        beforeSend : function(){
                                      callLoader();            
                        },
                        complete   : function() {
                                      endLoader();             
                        },
                        success    : function(result) {            
                                      resolve(result);  
                        },
                        error      : function() {           
                                      reject(result);      
                        }
                    });

          })
          .then((html) => {
             $('body .responseHTML').html(html);
          })
           .catch((error) => { 
              console.log(error);
 
          }); 
}
//-----------------------------------------------------------------------------------------------------------------

//----------------------------------Pagination-------------------------------------------------------------------
  $(document).on('click', '.custom_pagination .pagination a',function(event)
  {
      event.preventDefault();
      $('.custom_pagination ul.pagination li').removeClass('active');
      $(this).parent('li').addClass('active');
      var myurl    = $(this).attr('href');
      var page     = $(this).attr('href').split('page=')[1];
      custom_params.page  =  page;
      window.history.pushState('custom', 'parameters', window.location.pathname+"?"+createCustomUrlParameterString(custom_params));
      getCustomResults();
  });   
//-----------------------------------------------------------------------------------------------------------------

//-------------------------search filter----------------------------------------------------------------------------
$(document).on('click','.custom_search #SearchButton',function(event)
{
     custom_params['searchQuery'] = $('.custom_search input[name="searchQuery"]').val();
     custom_params['page']  = 1;
     window.history.pushState('custom', 'parameters', window.location.pathname+"?"+createCustomUrlParameterString(custom_params));
     getCustomResults();
});
//-----------------------------------------------------------------------------------------------------------------

//-------------------------limit filter----------------------------------------------------------------------------
$(document).on('change','.custom_limit select[name="limit"]',function(event)
{
     custom_params['limit'] = $(this).val();
     custom_params['page']  = 1;
     window.history.pushState('custom', 'parameters', window.location.pathname+"?"+createUrlParameterString(custom_params));
     getCustomResults();
});
//-----------------------------------------------------------------------------------------------------------------


