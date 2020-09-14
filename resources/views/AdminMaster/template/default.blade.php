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
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <?php
        $transactionnotif = \DB::select(" SELECT * from midpayments ");
      ?>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{count($transactionnotif)}}</span>
        </a>
        {{-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Notifications Transaction</span>
          <div class="dropdown-divider"></div>
          @foreach($transactionnotif as $notif)
          <a href="#" class="dropdown-item">
            <i class="fas fa-sign-in-alt mr-2"></i>{{$notif->ID_payment}} - {{$notif->status}}
          </a>
          @endforeach
          <div class="dropdown-divider"></div>
        </div> --}}
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
          {{-- @if(Auth::admin()->role == 'adminB') --}}
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
            <a href="/admin_master/ProductShow" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                PRODUCT
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin_master/ProductSpecial" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                SPECIAL PRODUCT
              </p>
            </a>
          </li>
          {{-- @else --}}
          <li class="nav-item">
            <a href="/admin_master/UserShow" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                USERS
              </p>
            </a>
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
              <i class="nav-icon fa fa-file"></i>
              <p>
                TRANSACTION
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fa fa-truck"></i>
              <p>
                PENGIRIMAN
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

@stack('scriptsadminmasterspecial')

@stack('scriptsadminusers')

@stack('scriptsadminvoucher')

@stack('scriptsadminnonactivevoucher')

@stack('scriptsadminadvertiseadvert')

@stack('scriptsadminnonactiveadvert')

@stack('scriptsadmintransaction')

@stack('scriptsadminnonactivetransaction')

</body>
</html>
