jQuery("form[name='page-create']").validate({

    ignore: [],
              debug: false,
    rules: {

      'title': 
      {
        required: true,
        nowhitespace: true,
      },
      'content': 
      {
        required: true,
        // nowhitespace: true,

      }
   
    },     
});    

jQuery("form[name='page_update']").validate({

    ignore: [],
              debug: false,
    rules: {

      'title': 
      {
        required: true,
        // nowhitespace: true,
      },
      'content': 
      {
        required: true,
        // nowhitespace: true,

      }
   
    },     
});    