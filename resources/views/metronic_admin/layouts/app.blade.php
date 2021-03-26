<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>{{config('config.title')}} | @yield('page_title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="{{config('config.description')}}"
        name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link
        href="{{ asset('public/metronic_assets/global/plugins/font-awesome/css/font-awesome.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ asset('public/metronic_assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ asset('public/metronic_assets/global/plugins/bootstrap/css/bootstrap.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ asset('public/metronic_assets//global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}"
        rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link
        href="{{ asset('public/metronic_assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/metronic_assets/global/plugins/morris/morris.css') }}"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ asset('public/metronic_assets/global/plugins/fullcalendar/fullcalendar.min.css') }}"
        rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset('public/metronic_assets/global/css/components-md.min.css') }}"
        rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ asset('public/metronic_assets/global/css/plugins-md.min.css') }}"
        rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{ asset('public/metronic_assets/layouts/layout4/css/layout.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ asset('public/metronic_assets/layouts/layout4/css/themes/default.min.css') }}"
        rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ asset('public/metronic_assets/layouts/layout4/css/custom.min.css') }}"
        rel="stylesheet" type="text/css" />
    <script src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
    <!-- BEGIN HEADER -->
    @include('metronic_admin.layouts.top-nav')
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"> </div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        @include('metronic_admin.layouts.sidebar')
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content" style="min-height: 1610px;">
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <!-- BEGIN PAGE TITLE -->
                    <div class="page-title">
                        <h1>@yield('page_title')
                            <!-- <small>material design bootstrap inputs, input groups, custom checkboxes and radio controls
                                and more</small> -->
                        </h1>
                    </div>
                    <!-- END PAGE TITLE -->
                    <!-- BEGIN PAGE TOOLBAR -->
                    <div class="page-toolbar">
                        <!-- BEGIN THEME PANEL -->
                        <div class="btn-group btn-theme-panel">
                            <a href="javascript:;" class="btn dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-settings"></i>
                            </a>
                            <div class="dropdown-menu theme-panel pull-right dropdown-custom hold-on-click">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <h3>HEADER</h3>
                                        <ul class="theme-colors">
                                            <li class="theme-color theme-color-default active" data-theme="default">
                                                <span class="theme-color-view"></span>
                                                <span class="theme-color-name">Dark Header</span>
                                            </li>
                                            <li class="theme-color theme-color-light " data-theme="light">
                                                <span class="theme-color-view"></span>
                                                <span class="theme-color-name">Light Header</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-xs-12 seperator">
                                        <h3>LAYOUT</h3>
                                        <ul class="theme-settings">
                                            <li> Layout
                                                <select class="layout-option form-control input-small input-sm">
                                                    <option value="fluid" selected="selected">Fluid</option>
                                                    <option value="boxed">Boxed</option>
                                                </select>
                                            </li>
                                            <li> Header
                                                <select class="page-header-option form-control input-small input-sm">
                                                    <option value="fixed" selected="selected">Fixed</option>
                                                    <option value="default">Default</option>
                                                </select>
                                            </li>
                                            <li> Top Dropdowns
                                                <select
                                                    class="page-header-top-dropdown-style-option form-control input-small input-sm">
                                                    <option value="light">Light</option>
                                                    <option value="dark" selected="selected">Dark</option>
                                                </select>
                                            </li>
                                            <li> Sidebar Mode
                                                <select class="sidebar-option form-control input-small input-sm">
                                                    <option value="fixed">Fixed</option>
                                                    <option value="default" selected="selected">Default</option>
                                                </select>
                                            </li>
                                            <li> Sidebar Menu
                                                <select class="sidebar-menu-option form-control input-small input-sm">
                                                    <option value="accordion" selected="selected">Accordion</option>
                                                    <option value="hover">Hover</option>
                                                </select>
                                            </li>
                                            <li> Sidebar Position
                                                <select class="sidebar-pos-option form-control input-small input-sm">
                                                    <option value="left" selected="selected">Left</option>
                                                    <option value="right">Right</option>
                                                </select>
                                            </li>
                                            <li> Footer
                                                <select class="page-footer-option form-control input-small input-sm">
                                                    <option value="fixed">Fixed</option>
                                                    <option value="default" selected="selected">Default</option>
                                                </select>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END THEME PANEL -->
                    </div>
                    <!-- END PAGE TOOLBAR -->
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE BREADCRUMB -->
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <a href="{{ route('adMgetHome') }}">Dashboard</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span class="active">@yield('page_title')</span>
                    </li>
                </ul>
                <!-- END PAGE BREADCRUMB -->
                <!-- BEGIN PAGE BASE CONTENT -->
                @yield('content')
                <!-- END PAGE BASE CONTENT -->
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
        @include('metronic_admin.layouts.quick-sidebar')
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    @include('metronic_admin.layouts.footer')
    <!-- END FOOTER -->
    <!--[if lt IE 9]>
<script src="./assets/global/plugins/respond.min.js"></script>
<script src="./assets/global/plugins/excanvas.min.js"></script> 
<script src="./assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
    <script>
        function notify(mess, success) {
            var d = new Date();
            var n = d.getTime();
            var result = (success == 1) ? "success" : "fail";
            var id = 'notify-' + n;
            $("body").append('<div id="' + id + '" class="notify"><p class="notify-' + result + '">' + mess +
                '</p></div>');
            $("#" + id).fadeIn('fast', function () {
                setTimeout(function () {
                    $("#" + id).fadeOut('slow', function () {
                        $("#" + id).remove();
                    });
                }, 1500);
            });
        }
    </script>
    <!-- BEGIN CORE PLUGINS -->


    <script src="{{ asset('public/metronic_assets/global/plugins/jquery.min.js') }}"
        type="text/javascript"></script>
    <script
        src="{{ asset('public/metronic_assets/global/plugins/bootstrap/js/bootstrap.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('public/metronic_assets/global/plugins/js.cookie.min.js') }}"
        type="text/javascript"></script>
    <script
        src="{{ asset('public/metronic_assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('public/metronic_assets/global/plugins/jquery.blockui.min.js') }}"
        type="text/javascript"></script>
    <script
        src="{{ asset('public/metronic_assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"
        type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('public/metronic_assets/global/plugins/moment.min.js') }}"
        type="text/javascript"></script>
    <script
        src="{{ asset('public/metronic_assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('public/metronic_assets/global/plugins/morris/morris.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('public/metronic_assets/global/plugins/morris/raphael-min.js') }}"
        type="text/javascript"></script>
    <script
        src="{{ asset('public/metronic_assets/global/plugins/counterup/jquery.waypoints.min.js') }}"
        type="text/javascript"></script>
    <script
        src="{{ asset('public/metronic_assets/global/plugins/counterup/jquery.counterup.min.js') }}"
        type="text/javascript"></script>
    <script
        src="{{ asset('public/metronic_assets/global/plugins/fullcalendar/fullcalendar.min.js') }}"
        type="text/javascript"></script>
    <script
        src="{{ asset('public/metronic_assets/global/plugins/horizontal-timeline/horizontal-timeline.js') }}"
        type="text/javascript"></script>
    <script
        src="{{ asset('public/metronic_assets/global/plugins/flot/jquery.flot.min.js') }}"
        type="text/javascript"></script>
    <script
        src="{{ asset('public/metronic_assets/global/plugins/flot/jquery.flot.resize.min.js') }}"
        type="text/javascript"></script>
    <script
        src="{{ asset('public/metronic_assets/global/plugins/flot/jquery.flot.categories.min.js') }}"
        type="text/javascript"></script>
    <script
        src="{{ asset('public/metronic_assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('public/metronic_assets/global/plugins/jquery.sparkline.min.js') }}"
        type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{ asset('public/metronic_assets/global/scripts/app.min.js') }}"
        type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    @section('admin_js')
    @show
    <!-- END PAGE LEVEL SCRIPTS -->

    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script
        src="{{ asset('public/admin/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}">
    </script>
    <script src="{{ asset('public/admin/js/front.js')}}"></script>
    <script src="{{ asset('public/admin/js/main.js')}}"></script>
    <script
        src="{{ asset('public/metronic_assets/layouts/layout4/scripts/layout.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('public/metronic_assets/layouts/layout4/scripts/demo.min.js') }}"
        type="text/javascript"></script>
    <script
        src="{{ asset('public/metronic_assets/layouts/global/scripts/quick-sidebar.min.js') }}"
        type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>