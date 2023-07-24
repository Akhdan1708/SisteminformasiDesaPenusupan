<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/jquery-jvectormap.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/AdminLTE.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/_all-skins.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('admin/css/jquery-jvectormap.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-datepicker.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin/css/daterangepicker.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap3-wysihtml5.min.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Trix -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/trix.css') }}">
    <script src={{ asset('admin/js/trix.js') }}></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display:none
        }
    </style>
    </head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">

            <!-- Logo -->
            <a href="index.php" class="logo">

                <span class="logo-mini"><b>A</b>S</span>

                <span class="logo-lg"><b>Halaman </b> Admin</span>
            </a>


            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            </a>
                            <ul class="dropdown-menu">

                                <ul class="menu">


                                    <a href="#">
                        </li>
                    </ul>
                    </li>
                    <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                    </li>

                    </li>

                    <li class="dropdown tasks-menu">
                        <ul class="dropdown-menu">

                            <ul class="menu">
                            </ul>
                    </li>
                    </ul>
                    </li>

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('admin/img/avatar5.png') }}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ $data_admin->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ asset('admin/img/avatar5.png') }}" class="img-circle" alt="User Image">

                                <p>
                                    {{ $data_admin->name }} - Desa Penusupan
                                    <small>{{\Carbon\Carbon::parse(now())->format('d-m-Y')}}</small>
                                </p>
                            </li>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="/" class="btn btn-default btn-flat">Beranda</a>
                        </div>
                        <div class="pull-right">
                            <a href="/logout" class="btn btn-danger btn-flat">Sign out</a>
                        </div>
                    </li>
                </div>

            </nav>
        </header>

        <aside class="main-sidebar">

            <section class="sidebar">

                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('admin/img/avatar5.png') }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ $data_admin->name }}</p>
                        <p><i class="fa fa-circle text-success"></i> Online</p>
                    </div>
                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header"></li>
                    <li><a href="/admin/dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                    <li class="header">Data Kependudukan</li>
                    <li><a href="/admin/rw"><i class="fa fa-users"></i> <span>Data RW</span></a></li>
                    <li><a href="/admin/rt"><i class="fa fa-users"></i> <span>Data RT</span></a></li>
                    <li><a href="/admin/penduduk"><i class="fa fa-users"></i> <span>Data Penduduk</span></a></li>
                    <li><a href="/admin/kematian"><i class="fa fa-users"></i> <span>Data Kematian</span></a></li>
                    <li class="header">Data Lain</li>
                    <li><a href="/admin/keluhan"><i class="fa fa-book"></i> <span>Data Keluhan</span></a></li>
                    <li><a href="/admin/berita"><i class="fa fa-comment"></i> <span>Data Berita</span></a></li>
                    <li><a href="/admin/galeri"><i class="fa fa-comment"></i> <span>Galeri</span></a></li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('header')
                    <small>@yield('headsmall')</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-Desa Penusupan"></i> @yield('bc1')</a></li>
                    <li class="active">@yield('bc2')</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Dias Akhdan</b>2023
            </div>
            <strong>Copyright &copy; 2023 <a href="#">Sistem Informasi Desa Penusupan</a>.</strong> All
            rights reserved. Dias Akhdan</a>
        </footer>

        <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src={{ asset('admin/js/jquery.min.js') }}></script>
    <!-- Bootstrap 3.3.7 -->
    <script src={{ asset('admin/js/bootstrap.min.js') }}></script>
    <!-- FastClick -->
    <script src={{ asset('admin/lib/fastclick.js') }}></script>
    <!-- AdminLTE App -->
    <script src={{ asset('admin/js/adminlte.min.js') }}></script>
    <!-- Sparkline -->
    <script src={{ asset('admin/js/jquery.sparkline.min.js') }}></script>
    <!-- jvectormap  -->
    <script src={{ asset('admin/js/jquery-jvectormap-1.2.2.min.js') }}></script>
    <script src={{ asset('admin/js/jquery-jvectormap-world-mill-en.js') }}></script>
    <!-- SlimScroll -->
    <script src={{ asset('admin/js/jquery.slimscroll.min.js') }}></script>
    <!-- ChartJS -->
    <script src={{ asset('admin/js/Chart.js') }}></script>
</body>

</html>
