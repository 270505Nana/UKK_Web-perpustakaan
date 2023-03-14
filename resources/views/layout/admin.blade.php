<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      DATA BUKU
    </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
    @stack('css')
  </head>
  <body class="hold-transition primary-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

<!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="{{ asset('template/dist/img/Logo.png') }}"height="60" width="60">
    </div>
<!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/" class="nav-link">Home</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/" class="brand-link">
      <img src="{{ asset('template/dist/img/Logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Data Buku</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
          <img src="{{ asset('template/dist/img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <div class="d-block">{{ Auth::user()->name }}</div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            
            <li class="nav-item">
              <a href="/dashboard" class="nav-link">
                <!-- / : diambil dari routes yg udah dibuat, didalam file routes -->
                <i class="nav-icon fas fa-home"></i>
                <p> Dashboard </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/daftarbuku" class="nav-link">
                <!-- /pegawai : diambil dari routes yg udah dibuat, didalam file routes -->
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Buku
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/logout" class="nav-link">
                <!-- /pegawai : diambil dari routes yg udah dibuat, didalam file routes -->
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p> Logout </p>
              </a>
            </li>
          </ul>
        </nav>
        
      </div>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    @yield('content', 'Default content')
  </div>

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('template/dist/js/adminlte.js') }}"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="{{ asset('template/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
  <script src="{{ asset('template/plugins/raphael/raphael.min.js') }}"></script>
  <script src="{{ asset('template/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
  <script src="{{ asset('template/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('template/plugins/chart.js/Chart.min.js') }}"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('template/dist/js/demo.js') }}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('template/dist/js/pages/dashboard2.js') }}"></script>

  @stack('scripts')

  </body>
</html>
