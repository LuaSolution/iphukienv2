<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>iPhukien | @yield('title')</title>
    <meta content="@yield('description')" name="description" />
    <meta name="url" content="@yield('url')">
    <meta property="image" content="@yield('image')" />
    <meta content="@yield('keywords')" name="keywords" />
    <meta property="og:url" content="@yield('url')" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:image" content="@yield('image')" />
    <link rel="canonical" href="@yield('canonical')" />

    <link rel="icon" href="{{ asset('public/assets/images/header/favicon.svg') }}"
        type="image/gif" sizes="16x16">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="{{ asset('public/css/materialize.min.css') }}">
    <!-- iPhuKien css -->
    <link rel="stylesheet" href="{{ asset('public/iphukien/user/header.css') }}">
    <link rel="stylesheet" href="{{ asset('public/iphukien/user/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('public/iphukien/user/common.css') }}">
    <link rel="stylesheet" href="{{ asset('public/iphukien/responsive/responsive.css') }}">
    <meta name="google-signin-client_id"
        content="445632322462-522or3m8qn2qaikj451irtimtegv2bqe.apps.googleusercontent.com">
    <!-- @yield('fb-meta-tags') -->
    @yield('meta-tags')
    @section('styles')
    @show
</head>

<body>
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                xfbml: true,
                version: 'v10.0'
            });
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your Plugin chat code -->
    <div class="fb-customerchat" attribution="biz_inbox" page_id="1447115355541411">
    </div>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FY9QF10LML"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-FY9QF10LML');
    </script>
    @yield('fb-sdk')
    @yield('header')
    @yield('content')
    <footer>
        <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
        @yield('footer')
        @include('layouts.footer', ['status' => 'complete'])
        <!-- jQuery -->
        <script src="{{ asset('public/js/jquery-3.6.0.min.js') }}"></script>
        <!-- Materialize -->
        <script src="{{ asset('public/js/materialize.min.js') }}"></script>
        <!-- header js -->
        <script src="{{ asset('public/assets/scripts/iphukien/user/header.js') }}"></script>
        @section('scripts')
        @show
        @include('toast::messages-jquery')
        <script>
            function numberWithCommas(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

            function onLoad() {
                gapi.load('auth2', function () {
                    gapi.auth2.init();
                });
            }

            function signOut() {
                if (gapi.auth2) {
                    var auth2 = gapi.auth2.getAuthInstance();
                    auth2.signOut().then(function () {
                        console.log('User signed out.');
                        window.location.href = `{{ route('doLogout') }}`
                    });
                } else {
                    window.location.href = `{{ route('doLogout') }}`
                }

            }

            //
            $(document).ready(function () {
                let cart = localStorage.getItem('ipk_cart') ? JSON.parse(localStorage.getItem('ipk_cart')) : {};
                let sum = 0;
                for (const i in cart) {
                    console.log(cart[i])
                    sum += parseInt(cart[i]['quantity']);
                }
                $("#header-cart-total").html(sum)
                $("#header-cart-total-mobile").html(sum)

                let link = $('.header-list .menu-item .item-group > a');
                link.append('<span class="link-arrow"></span>');

                $(document).on('click', 'a .link-arrow', function (e) {
                    e.preventDefault();
                });

                window.onscroll = function () {
                    is_sticky();
                };
                let header = $('header');
                let sticky = header.offset().top;

                function is_sticky() {
                    if (window.pageYOffset > (sticky + 130)) {
                        header.addClass("animated fadeInDown header-fixed");
                    } else {
                        header.removeClass("animated fadeInDown header-fixed");
                    }
                }
            });
        </script>
    </footer>
</body>

</html>