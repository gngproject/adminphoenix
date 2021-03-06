<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="/Assets/logo/icon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('AdminStyle/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
  <link rel="stylesheet" href="{{ asset('AdminStyle/css/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
  <title>@yield('title')</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Right navbar links -->
    <ul class="navbar-nav">
     
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>
    <ul class="navbar-nav ml-auto">
         <?php
        $transactionnotif = \DB::select(" SELECT * from transaction_detail ");
      ?>
        <li class="nav-item dropdown ml-auto">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">{{count($transactionnotif)}}</span>
            </a>
           
        </li>
      <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fa fa-user-circle mr-3"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <div class="media-body">
                    <p class="text-sm text-muted">
                      <i class="fa fa-pencil-square-o mr-1"> </i>PROFILE -
                      {{ auth()->user()->name }}
                    </p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
                <!-- Message Start -->
                <div class="media">
                  <div class="media-body">
                    <p class="text-sm text-muted">
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fa fa-outdent mr-1"></i> LOGOUT </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </p>
                  </div>
                </div>
                <!-- Message End -->
            </div>
          </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="/Assets/logo/icon.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Phoenix</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">MENU</li>
          <li class="nav-item">
            <a href="/admin_master" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                HOME
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin_master/UserShow" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                USERS
              </p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a  class="nav-link accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-2">
              
                <span class="sidebar-icon"><i class="nav-icon fa fa-book"></i></span>
                <p>PRODUCTS<i class="fa fa-angle-down ml-2" style="text-align: right"></i></p>
               
            </a>
             
            <ul id="submenu-2" class="panel-collapse collapse panel-switch" role="menu" style="list-style-type: none;">
                <li style="padding: 1rem 0 1rem 0;"><a href="/admin_master/ProductShow"><i class="fas fa-ring"></i>
                  ALL PRODUCT</a></li>
                <li style="padding: 0 0 1rem 0;"><a href="/admin_master/CustomizeProduct"><i class="nav-icon fas fa-pencil-ruler"></i>CUSTOMIZE PRODUCT</a></li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="/admin_master/VoucherShow" class="nav-link">
              <i class="nav-icon fa fa-percent"></i>
              <p>
                VOUCHER
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin_master/AdvertShow" class="nav-link">
              <i class="nav-icon fa fa-trademark"></i>
              <p>
                ADVERTISEMENT
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin_master/Sell/show" class="nav-link">
              <i class="nav-icon fas fa-exchange-alt"></i>
              <p>
                TRANSACTION
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin_master/Pengiriman" class="nav-link">
              <i class="nav-icon fa fa-truck"></i>
              <p>
                SHIPMENT
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              <i class="nav-icon fa fa-outdent mr-1"></i>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
              <p>
                LOGOUT
              </p>
            </a>
          </li>
          {{-- @endif --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-fluid">
      @yield('content')
    </div>
  </div>
  <!-- /.content-wrapper -->
  <br/>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2020 <a href="https://phoenixjewellery.com">Phoenix Jewellery</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="/AdminStyle/js/jquery.min.js"></script>
<script src="/AdminStyle/js/jquery.min.js"></script>
<script src="/AdminStyle/js/bootstrap.bundle.min.js"></script>
<script src="/AdminStyle/js/adminlte.min.js"></script>
<script src="/AdminStyle/js/demo.js"></script>
<script src="/AdminStyle/datatables/jquery.dataTables.min.js"></script>
<script src="/AdminStyle/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/AdminStyle/daterangepicker/daterangepicker.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"> </script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"> </script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"> </script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"> </script>

@stack('scriptsadminmaster')

@stack('scriptsadminmastercustomize')

@stack('scriptsadminusers')

@stack('scriptsadminvoucher')

@stack('scriptsadminnonactivevoucher')

@stack('scriptsadminadvertiseadvert')

@stack('scriptsadminnonactiveadvert')

@stack('scriptsadmintransaction')

@stack('scriptsadminnonactivetransaction')

@stack('scriptspengirim')

</body>
</html>
