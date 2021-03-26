<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link
        href="{{ asset('public/metronic_assets/global/plugins/bootstrap/css/bootstrap.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/metronic_assets/pages/css/login.min.css') }}"
        rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->

<body class=" login">
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" method="POST" action="{{ route('adMpostLogin') }}">
        {{ csrf_field() }}
            <h3 class="form-title font-green">Sign In</h3>
            @if ($errors->has('email'))
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span> {{ $errors->first('email') }} </span>
            </div>
            @endif
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Username</label>
                <input class="form-control form-control-solid placeholder-no-fix" id="login-username" type="text" name="email" required
                                data-msg="Please enter your email" /> </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <input class="form-control form-control-solid placeholder-no-fix" id="login-password" type="password" name="password" /> </div>
            <div class="form-actions">
                <button type="submit" id="login" class="btn green uppercase">Login</button>
            </div>
        </form>
    </div>
    <script src="{{ asset('public/metronic_assets/global/plugins/jquery.min.js') }}"
        type="text/javascript"></script>
    <script
        src="{{ asset('public/metronic_assets/global/plugins/bootstrap/js/bootstrap.min.js') }}"
        type="text/javascript"></script>
        @include('toast::messages-jquery')
</body>

</html>
