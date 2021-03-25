<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('public/admin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{ asset('public/admin/icons-reference/styles.css')}}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('public/admin/css/style.default.css')}}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ asset('public/admin/css/main.css')}}" id="theme-stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('public/admin/img/favicon.ico')}}">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <script src="{{ asset('public/ckeditor/ckeditor.js')}}"></script>
</head>

<body>
    <style type="text/css">
    .notify {
        position: fixed;
        z-index: 999999;
        left: calc(50% - 150px);
        top: 100px;
        width: 300px;
    }

    .notify p {
        width: 100%;
        margin: 0 auto;
        padding: 10px 20px;
        text-align: center;
        font-size: 19px;
        opacity: 0.9;
        border: 1px solid #fff;
        border-radius: 2px;
        color: #fff;
        box-shadow: 0px 0px 2px 0px rgba(6, 6, 6, 0.3);
    }

    .notify p.notify-success {
        background-color: rgba(91, 189, 114);
    }

    .notify p.notify-fail {
        background-color: rgba(217, 92, 92);
    }
    </style>
    <!-- Side Navbar -->
    <nav class="side-navbar">
        <div class="side-navbar-wrapper">
            <!-- Sidebar Header    -->
            <div class="sidenav-header d-flex align-items-center justify-content-center">
                <!-- User Info-->
                <div class="sidenav-header-inner text-center">
                    <img src="https://raw.githubusercontent.com/LuaSolution/sylencer-net/master/assets/images/10.jpg" alt="person"
                        class="img-fluid rounded-circle">
                    <h2 class="h5">Administrator</h2><span>{{ Auth::user()->name }}</span>
                </div>
                <!-- Small Brand information, appears on minimized sidebar-->
                <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center">
                        <strong>B</strong><strong class="text-primary">D</strong></a></div>
            </div>
            <!-- Sidebar Navigation Menus-->
            @include('admin.sidebar')
        </div>
    </nav>
    <div class="page">
        <!-- navbar-->
        <header class="header">
            <nav class="navbar">
                <div class="container-fluid">
                    <div class="navbar-holder d-flex align-items-center justify-content-between">
                        <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars">
                                </i></a><a href="{{route('adgetHome')}}" class="navbar-brand">
                                <div class="brand-text d-none d-md-inline-block"><span>Admin</span><strong
                                        class="text-primary">Dashboard</strong></div>
                            </a></div>
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                            <!-- Log out-->
                            <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link logout"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="d-none d-sm-inline-block">Đăng xuất</span><i
                                        class="fa fa-sign-out"></i></a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        @yield('content')
        <footer class="main-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <p>Admin &copy; 2019</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('public/admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('public/admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('public/admin/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script
        src="{{ asset('public/admin/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}">
    </script>
    <!-- Main File-->
    <script src="{{ asset('public/admin/js/front.js')}}"></script>
    <script src="{{ asset('public/admin/js/main.js')}}"></script>
    @if (session('success'))
    <script type="text/javascript">
    $(document).ready(function() {
        notify("{{session('success')}}", 1);
    });
    </script>
    @endif
    @if (session('error'))
    <script type="text/javascript">
    $(document).ready(function() {
        notify("{{session('error')}}", 0);
    });
    </script>
    @endif
    @section('js')
    @show
</body>

</html>