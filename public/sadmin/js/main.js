var base_url = window.location.origin;
var host     = window.location.host;
var path     = window.location.pathname;

$( document ).ready(function() {
    
    $("#select-type").change(function(){
        if($(this).val()==0){
          $("#p-selection").find('select').val('');
          $('#p-selection').hide();  
        }else if($(this).val()==1){
          $("#p-selection").find('select').val('');
          $('#p-selection').show();  
        } 
    });

    $("#allchecked").change(function(){
        if($(this).prop("checked") == true){
           $(".moduleclass").prop("checked", true);
        }
        else if($(this).prop("checked") == false){
            $(".moduleclass").prop("checked", false);
        }
    }); 

    $("#assignrole").change(function(){
        var thisval = $(this).val();
        if(thisval == ""){
            $(".modulecheckbox").prop('checked', false);
            $(".modulecheckbox").attr("disabled", true);
        }else{
            //$(".modulecheckbox").attr("disabled", false);
            $.ajax({
                _token  : "{{ csrf_token() }}",
                url     :  base_url+'/admin/role-module/'+thisval,
                type    : 'GET',
                success: function(data){
                    $(".ULmodule").html(data);
                },
                error: function(data){
                    alert('error');
                }
            });  
        }

    });

    /*$('.dragtable .tbodydragclass').addClass("DragMe");
    $('.DragMe').sortable({
        disabled: false,
        axis: 'y',
        //items: "> tr:not(:first)",
        forceHelperSize: true,
        update: function (event, ui) {
            var MovedItem;
            var Newpos  = ui.item.index();
            var RefID   = $('tr').eq(Newpos).find('td:first').html();
            var RefName = $('tr').eq(Newpos).find('td:eq(1)').html();
            var trIndex = "";
            $(".tbodydragclass tr").each(function(){
              trIndex+= $(".tbodydragclass tr").index(this)+'-->>'+$(".tbodydragclass tr").find("td:nth-child(2)").text()+',';
            });
            //alert("Position " + Newpos + "..... RefID: " + RefID+"....RefName: "+RefName);
            alert(trIndex);
        }
    }).disableSelection();*/
        

    /******Drag-Drop JS Start******/
        var FirstCall    = false; //For ajax call on page load. Ajax call will not trigger on page load.
        var updateOutput = function(e)
             {
                 var list   = e.length ? e : $(e.target),
                     output = list.data('output');
                 if (window.JSON) {
                     output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                 } else {
                     output.val('JSON browser support required for this demo.');
                 }
                 if(path == '/admin/category-list'){
                    UpdatecategorySeries(list.nestable('serialize'));
                 }else if(path == '/admin/module-list'){
                    UpdateManus(list.nestable('serialize'));
                 }
                 else if(path == '/admin/product-series'){
                    UpdateProductSeries(list.nestable('serialize'));
                 }
              };
        
        // activate Nestable for list 1
        $('#nestable').nestable({
            group: 1,
            maxDepth: 1
        }).on('change', updateOutput);
         
        // output initial serialised data
        updateOutput($('#nestable').data('output', $('#nestable-output')));
        $('.dd').nestable('collapseAll');
        $(".c-all").hide();
        $('#nestable-menu').on('click', function(e){
             var target = $(e.target),
                 action = target.data('action');
             if (action === 'expand-all') {
                 $('.dd').nestable('expandAll');
                 $(".e-all").hide();
                 $(".c-all").show();
             }
             if (action === 'collapse-all') {
                 $('.dd').nestable('collapseAll');
                 $(".c-all").hide();
                 $(".e-all").show();
             }
        });
      
      function UpdateManus(datas){
          if(FirstCall==true){ 
              $.ajax({
                          headers: {
                              'X-CSRF-TOKEN': $('input[name=_token]').val()
                          },
                          type     : 'POST',
                          dataType : 'text',
                          url      : base_url+'/admin/module-series',
                          data     : {
                                      "data"  : datas
                          },
                          beforeSend: function() {
                              
                          },                            
                          success: function(data){
                              $("#SidemanuLi").html(data);
                          },
                          error: function(data){
                              console.log('UpdateManus error');
                          }
              });
          }
          FirstCall = true;        
      }

      function UpdatecategorySeries(datas){
          if(FirstCall==true){ 
              $.ajax({
                          headers: {
                              'X-CSRF-TOKEN': $('input[name=_token]').val()
                          },
                          type     : 'POST',
                          dataType : 'text',
                          url      : base_url+'/admin/category-series',
                          data     : {
                                      "data"  : datas
                          },
                          beforeSend: function() {
                              
                          },                            
                          success: function(data){
                              console.log('UpdatecategorySeries done');
                          },
                          error: function(data){
                              console.log('UpdatecategorySeries error');
                          }
              });
          }
          FirstCall = true;        
      }

      function UpdateProductSeries(datas)
      {
         if(FirstCall==true){ 
              $.ajax({
                          headers: {
                              'X-CSRF-TOKEN': $('input[name=_token]').val()
                          },
                          type     : 'POST',
                          dataType : 'text',
                          url      : base_url+'/admin/product-series',
                          data     : {
                                      "data"  : datas
                          },
                          beforeSend: function() {
                              
                          },                            
                          success: function(data){
                              console.log('UpdateProductSeries done');
                          },
                          error: function(data){
                              console.log('UpdateProductSeries error');
                          }
              });
          }
          FirstCall = true;     
      }

    /******Drag-Drop JS End******/

}); //End ready function


$("#avialsection").change(function(){
    var SectionValue = $(this).val();
    $(".avialsectionCLS").hide();
    if(SectionValue==2){
      $("#availability_2").show();
    }else if(SectionValue==3){
      $("#availability_3").show();
    }
}); 