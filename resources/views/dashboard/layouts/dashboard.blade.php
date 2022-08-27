<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Toko Kita | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('/') }}/plugins/fontawesome-free/css/all.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('/') }}/dist/css/adminlte.min.css" />

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('/') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="{{ url('/') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="{{ url('/') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right text-center">
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">{{ auth()->user()->nama }}</h3>
                    <p class="text-muted">{{ Str::upper(auth()->user()->role) }}</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
                <!-- Message Start -->
                <div class="media">
                  <div class="media-body bg-danger">
                    <form action="{{ route('logout') }}" method="post">
                      @csrf
                      <input class="dropdown-item-title border-0 p-2 bg-danger " name="logout" type="submit" value="Logout" />

                    </form>
                  </div>
                </div>
                <!-- Message End -->
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" /> --}}
          <span class="brand-text text-center font-weight-light">Toko Kita</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- dftr pesanan -->
              <li class="nav-item">
                <a href="#" class="nav-link {{ $title == 'Pesanan' ? 'active' : '' }}">
                  <i class="fas fa-shopping-cart"></i>
                  <p>
                    Daftar Pesanan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('pesanan.index') }}" class="nav-link ">
                      <i class="fas fa-list-ul nav-icon"></i>
                      <p>Pesanan Masuk</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- dftr pembayaran -->
              <li class="nav-item " >
                <a href="{{ route('viewPembayaran') }}" class="nav-link {{ $title == 'Pembayaran' ? 'active' : '' }}">
                  <i class="fas fa-money-bill-wave"></i>
                  <p>Daftar Pembayaran</p>
                </a>
              </li>
              <!-- dftr barang -->
              <li class="nav-item ">
                <a href="{{ route('barang.index') }}" class="nav-link {{ $title == 'Barang' ? 'active' : '' }}">
                  <i class="fas fa-info-circle"></i>
                  <p>Daftar Barang</p>
                </a>
              </li>
              <!-- dftr user -->
              <li class="nav-item ">
                <a href="#" class="nav-link {{ $title == 'Users' ? 'active' : '' }}">
                  <i class="fas fa-user-circle"></i>
                  <p>
                    Daftar User
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('daftarUser') }}" class="nav-link">
                      <i class="fas fa-users nav-icon"></i>
                      <p>Semua User</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('tambahUser') }}" class="nav-link">
                      <i class="fas fa-user-plus nav-icon"></i>
                      <p>Tambah User</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @yield('content-wrapper') <!-- /////////////////////////////////////////////////// -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <!-- <aside class="control-sidebar control-sidebar-dark"> -->
      <!-- Control sidebar content goes here -->
      <!-- <div class="p-3">
          <h5>Title</h5>
          <p>Sidebar content</p>
        </div>
      </aside> -->
      <!-- /.control-sidebar -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">Anything you want</div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
      </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ url('/') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('/') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & /Plugins -->
    <script src="{{ url('/') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ url('/') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ url('/') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ url('/') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ url('/') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ url('/') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ url('/') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ url('/') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ url('/') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ url('/') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ url('/') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
      $(function () {
        $("#example1")
          .DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: ["copy", "excel", "pdf", "print", "colvis"],
          })
          .buttons()
          .container()
          .appendTo("#example1_wrapper .col-md-6:eq(0)");
      });
    </script>
    <!-- AdminLTE App -->
    <script src="{{ url('/') }}/dist/js/adminlte.min.js"></script>
  </body>
</html>
