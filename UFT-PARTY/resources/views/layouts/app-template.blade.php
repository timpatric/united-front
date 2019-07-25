<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UFT Management System</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="{{ asset("/bower_components/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset("/bower_components/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/bower_components/plugins/daterangepicker/daterangepicker.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/bower_components/plugins/datepicker/datepicker3.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/bower_components/dist/css/Uft.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/bower_components/dist/css/skins/_all-skins.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app-template.css') }}" rel="stylesheet">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    <!-- Main Header -->
    @include('layouts.header')
    <!-- Sidebar -->
    @include('layouts.sidebar')
    @yield('content')
    <!-- /.content-wrapper -->
    <!-- Footer -->
    @include('layouts.footer')
    <!-- ./wrapper -->
    <!-- REQUIRED JS SCRIPTS -->
    <!-- jQuery 2.1.3 -->
    <script src="{{ asset ("/bower_components/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset ("/bower_components/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <script  src="{{ asset ("/bower_components/plugins/datatables/jquery.dataTables.min.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/plugins/datatables/dataTables.bootstrap.min.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/plugins/slimScroll/jquery.slimscroll.min.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/plugins/fastclick/fastclick.js") }}" type="text/javascript" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script  src="{{ asset ("/bower_components/plugins/input-mask/jquery.inputmask.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/plugins/input-mask/jquery.inputmask.date.extensions.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/plugins/input-mask/jquery.inputmask.extensions.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/plugins/daterangepicker/daterangepicker.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/plugins/datepicker/bootstrap-datepicker.js") }}" type="text/javascript" ></script>
    <script src="{{ asset ("/bower_components/dist/js/app.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("/bower_components/dist/js/demo.js") }}" type="text/javascript"></script>
      <script>
      $(document).ready(function() {
        //Date picker
        $('#regDate').datepicker({
          autoclose: true,
          format: 'yyyy/mm/dd'
        });
        $('#from').datepicker({
          autoclose: true,
          format: 'yyyy/mm/dd'
        });
        $('#to').datepicker({
          autoclose: true,
          format: 'yyyy/mm/dd'
        });
    });
</script>
<script src="{{ asset('js/site.js') }}"></script>
  </body>
</html>