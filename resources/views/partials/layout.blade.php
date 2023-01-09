<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Control Nominas.</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">        
        
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
            <div class="wrapper" id="app">
            
              <!-- Navbar -->
                @include('partials.navbar')
              <!-- /.navbar -->
            
              <!-- Main Sidebar Container -->
              <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                  <a href="{{ route('home') }}" class="brand-link">
                  <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                       style="opacity: .8">
                  <span class="brand-text font-weight-light">Control Nominas.</span>
                </a>
            
                <!-- Sidebar -->
                <div class="sidebar">
                  <!-- Sidebar user panel (optional) -->
                  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                      <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                      <router-link to="/logout" class="d-block">{{ auth()->user()->nombre }}</router-link>
                    </div>
                    
                  </div>
            
                  <!-- Sidebar Menu -->
                   @include('partials.sidebar')
                  <!-- /.sidebar-menu -->

                </div>
                <!-- /.sidebar -->
              </aside>
            
              <!-- Content Wrapper. Contains page content -->
              <div class="content-wrapper">
                    @yield('content')
              </div>
              <!-- /.content-wrapper -->

              <footer class="main-footer">
                <strong>Copyright &copy; 2019 <a href="http://iscah.cl">iscah.cl</a>.</strong>
                Todos los Derechos Reservados.
                <div class="float-right d-none d-sm-inline-block">
                  <b>Version</b> 1.0
                </div>
              </footer>
            
              <!-- Control Sidebar -->
              <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
              </aside>
              <!-- /.control-sidebar -->
            </div>
            <!-- ./wrapper -->
                
        <script src="{{asset('js/app.js')}}" ></script>

        <!--
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        -->

        <!-- jQuery -->
        <script src="../../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables -->
        <script src="../../plugins/datatables/jquery.dataTables.js"></script>
        <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
        <!-- AdminLTE App -->
        <script src="../../dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../dist/js/demo.js"></script>        
        
    </body>
</html>