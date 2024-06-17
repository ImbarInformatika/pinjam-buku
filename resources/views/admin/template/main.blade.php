<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') </title>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('template') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template') }}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('template') }}/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template') }}/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('template') }}/dist/css/skins/_all-skins.min.css">
    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @stack('style')
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>PTK</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Perpustakaan</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('template') }}/dist/img/user2-160x160.jpg" class="img-circle"
                                    style="width: 18px; height: 18px;" alt="User Photo">
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ asset('template') }}/dist/img/user2-160x160.jpg" class="img-circle">
                                    <p>
                                        <strong>{{ Auth::user()->name }}</strong>
                                        <small>Admin Perpustakaan {{ date('Y') }}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer" style="text-align: center;">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <span class="btn btn-primary">Keluar</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        @include('admin.template.sidebar')

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="section">
                @yield('content')
            </section>
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }} <a href="#">Perpustakaan</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- jQuery 3 -->
    <script src="{{ asset('template') }}/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('template') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template') }}/dist/js/adminlte.min.js"></script>
    <script>
        // SweetAlert script
        @if (Session::has('alert'))
            Swal.fire({
                icon: '{{ Session::get('alert.type') }}',
                title: '{{ Session::get('alert.title') }}',
                text: '{{ Session::get('alert.message') }}',
                showConfirmButton: {{ Session::get('alert.confirmButton') }},
                timer: {{ Session::get('alert.timer') }}
            });
        @endif
    </script>
    @stack('script')

</body>

</html>
