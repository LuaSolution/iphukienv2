<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin login page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('public/admin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('public/admin/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('public/admin/img/favicon.ico')}}">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
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
    <div class="page login-page">
        <div class="container">
            <div class="form-outer text-center d-flex align-items-center">
                <div class="form-inner" style="margin:auto">
                    <div class="logo text-uppercase"><span style="display: block; width: 400px;">Đăng nhập</span><strong class="text-primary">Admin</strong></div>
                    <form class="text-left form-validate" method="POST" action="{{ route('adpostLogin') }}">
                        {{ csrf_field() }}
                        <div class="form-group-material">
                            <input id="login-username" type="text" name="email" required
                                data-msg="Please enter your email" class="input-material">
                            <label for="login-username" class="label-material">Email</label>
                        </div>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                        <div class="form-group-material">
                            <input id="login-password" type="password" name="password" required
                                data-msg="Please enter your password" class="input-material">
                            <label for="login-password" class="label-material">Password</label>
                        </div>
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                        <div class="form-group text-center"><button type="submit" id="login"
                                class="btn btn-primary">Login</button>
                            <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('public/admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('public/admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('public/admin/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <!-- Main File-->
    <script src="{{ asset('public/admin/js/login.js')}}"></script>
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
</body>

</html>