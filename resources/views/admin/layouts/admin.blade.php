<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8" />
    <title>{{ config('app.name') }} | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Ifeanyi Nnaemego" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('') }}admin/assets/images/favicon.ico">

    <!-- Plugins css -->
    <link href="{{ asset('') }}admin/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}admin/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet"
        type="text/css" />

    <!-- Bootstrap css -->
    <link href="{{ asset('') }}admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{ asset('') }}admin/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <!-- icons -->
    <link href="{{ asset('') }}admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- Head js -->
    <script src="{{ asset('') }}admin/assets/js/head.js"></script>

</head>

<!-- body start -->

<body data-layout-mode="default" data-theme="light" data-topbar-color="dark" data-menu-position="fixed"
    data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='false'>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        @include('admin.layouts.navbar')
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.layouts.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">@yield('title')</h4>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
            <!-- end page title -->
            @yield('admin')

            <!-- Footer Start -->
            @include('admin.layouts.footer')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    @include('admin.layouts.rightbar')
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="{{ asset('') }}admin/assets/js/vendor.min.js"></script>

    <!-- Plugins js-->
    <script src="{{ asset('') }}admin/assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="{{ asset('') }}admin/assets/libs/apexcharts/apexcharts.min.js"></script>

    <script src="{{ asset('') }}admin/assets/libs/selectize/js/standalone/selectize.min.js"></script>

    <!-- Dashboar 1 init js-->
    <script src="{{ asset('') }}admin/assets/js/pages/dashboard-1.init.js"></script>

    <!-- App js-->
    <script src="{{ asset('') }}admin/assets/js/app.min.js"></script>

    @yield('js')

</body>

</html>
