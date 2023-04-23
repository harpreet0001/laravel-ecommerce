<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Megatan || Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--csrf-token-->
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('sadmin/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('sadmin/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('sadmin/css/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('sadmin/css/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('sadmin/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('sadmin/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('sadmin/css/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('sadmin/css/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('sadmin/css/cstm-style.css') }}">
  <link rel="stylesheet" href="{{ asset('sadmin/css/nestdrag.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <!-- select2 styles -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
   <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- select2 styles end-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  @yield('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  
  <!-- /.navbar -->
  @include('admin.includes.navbar')
  <!-- Main Sidebar Container -->
    @include('admin.includes.sidebar')

      @yield('content')
  
  @include('admin.includes.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- loader -->
<div id="overlay" style="/* display: none; */">
    <div class="cv-spinner">
       <span class="spinner"></span>
    </div>
</div>
<!-- loder end -->

<!-- jQuery -->
<script src="{{ asset('sadmin/js/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('sadmin/js/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('sadmin/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('sadmin/js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('sadmin/js/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('sadmin/js/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('sadmin/js/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('sadmin/js/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('sadmin/js/moment.min.js') }}"></script>
<script src="{{ asset('sadmin/js/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('sadmin/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('sadmin/js/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('sadmin/js/jquery.vmap.usa.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('sadmin/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('sadmin/js/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('sadmin/js/demo.js') }}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> 
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> 
<script src="{{ asset('sadmin/js/validation.js') }}"></script>  
  <!-- select2 styles -->
  <script type="text/javascript" src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
  <!-- select2 styles end-->
<script src="{{ asset('sadmin/js/main.js?v=54443443') }}"></script>
<script src="{{ asset('sadmin/js/nestdrag.js') }}"></script>
<script src="{{ asset('sadmin/js/order.js') }}"></script>
<script src="{{ asset('sadmin/js/custom.js') }}"></script>
<script src="{{ asset('sadmin/js/shipping.js') }}"></script>
<script type="text/javascript">
$( ".target_switch" ).change(function() {
  
  var value = $(this).prop("checked");
  url = $(this).attr('data-attr');

     $.ajax({
               url : url,
               type: 'POST',   
               dataTYPE:'JSON',
               data:{
                value : value
               },
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                     $("body").find('.loaders').show();
                },
                success: function (result) {
                    if(result.return==0)  { alert('Something went wrong...!!');    }
                    else                  { alert('Status Changed Successfully.'); }
               },
               error: function (jqXhr, textStatus, errorMessage) {
                 alert('Something went wrong...!!');    
               }

        });
});


$(document).on("click", ".browse", function() {
  var file = $(this).parents().find(".file");
  file.trigger("click");
});
$('input[type="file"]').change(function(e) {
  var fileName = e.target.files[0].name;
  $("#file").val(fileName);

  var reader = new FileReader();
  reader.onload = function(e) {
    // get loaded data and render thumbnail.
    document.getElementById("preview").src = e.target.result;
  };
  // read the image file as a data URL.
  reader.readAsDataURL(this.files[0]);
});

</script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
@yield('js')
</body>
</html>