
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>CM Payroll System</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="title" content="Covenant Millionare Payroll System">
        <meta name="author" content="Miguel Radaza (Starlight)">
        <meta name="description" content="A system for covenant millionare to help managing employees payroll history, and for employees to check payout history.">
        <meta name="keywords" content="payroll, CM Payroll, CM payroll, cm payroll, cm payroll system">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('vendor/plugins/fontawesome-6.4.2/css/all.min.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.1.0/styles/overlayscrollbars.min.css" integrity="sha256-LWLZPJ7X1jJLI5OG5695qDemW1qQ7lNdbTfQ64ylbUY=" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" integrity="sha256-BicZsQAhkGHIoR//IB2amPN5SrRb3fHB8tFsnqRAwnk=" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('vendor/plugins/DataTables/datatables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/plugins/toastr/toastr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/adminlte4/adminlte.css') }}">
    </head>

    <body class="lockscreen bg-body-secondary">
        <!--begin::App Wrapper-->
        <div class="lockscreen-wrapper">
            <div class="lockscreen-logo">
                <a href='/dist/pages/index2'><b>Admin</b>LTE</a>
            </div>
    
            <div class="lockscreen-name">John Doe</div>
    
            <div class="lockscreen-item">
                <div class="lockscreen-image">
                    <img src="../../../dist/assets/img/user1-128x128.jpg" alt="User Image">
                </div>
    
                <form class="lockscreen-credentials">
                    <div class="input-group">
                        <input type="password" class="form-control shadow-none" placeholder="password">
                        <div class="input-group-text border-0 bg-transparent px-1">
                            <button type="button" class="btn shadow-none">
                                <i class="bi bi-box-arrow-right text-body-secondary"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
    
            <div class="help-block text-center">
                Enter your password to retrieve your session
            </div>
            <div class="text-center">
                <a href='/dist/pages/examples/login'>Or sign in as a different user</a>
            </div>
            <div class="lockscreen-footer text-center">
                Copyright © 2014-2023
                <b><a href="https://adminlte.io">AdminLTE.io</a></b><br>
                All rights reserved
            </div>
        </div>
        <script src="{{ asset('vendor/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/plugins/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('vendor/plugins/DataTables/datatables.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.1.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-NRZchBuHZWSXldqrtAOeCZpucH/1n1ToJ3C8mSK95NU=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
        @yield('scripts')
        {{-- <script src="{{ asset('vendor/plugins/jquery/jquery-3.7.0.min.js') }}"></script> --}}
        <script src="{{ asset('vendor/adminlte4/adminlte.js') }}"></script>
        <script>
            const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
            const Default = {
                scrollbarTheme: "os-theme-light",
                scrollbarAutoHide: "leave",
                scrollbarClickScroll: true,
            };

            document.addEventListener("DOMContentLoaded", function() {
                const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
                if (
                    sidebarWrapper &&
                    typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
                ) {
                    OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                        scrollbars: {
                            theme: Default.scrollbarTheme,
                            autoHide: Default.scrollbarAutoHide,
                            clickScroll: Default.scrollbarClickScroll,
                        },
                    });
                }
            });
        </script>
    </body>
</html>