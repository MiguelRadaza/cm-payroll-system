<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>CM Payroll System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Covenant Millionare Payroll System">
    <meta name="author" content="Miguel Radaza (Starlight)">
    <meta name="description"
        content="A system for covenant millionare to help managing employees payroll history, and for employees to check payout history.">
    <meta name="keywords" content="payroll, CM Payroll, CM payroll, cm payroll, cm payroll system">

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light"
        rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/cm-payroll/vendor/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/cm-payroll/vendor/animate/animate.compat.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/cm-payroll/vendor/font-awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/cm-payroll/vendor/boxicons/css/boxicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/cm-payroll/vendor/magnific-popup/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/cm-payroll/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css') }}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/cm-payroll/css/theme.css') }}" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/cm-payroll/css/skins/default.css') }}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/cm-payroll/css/custom.css') }}">

    <!-- Head Libs -->
    <script src="{{ asset('vendor/cm-payroll/vendor/modernizr/modernizr.js') }}"></script>

</head>

<body>
    
    <section class="body-sign">
        <div class="center-sign">
            <a href="/" class="logo float-start">
                {{-- <img src="img/logo.png" height="70" alt="Porto Admin" /> --}}
            </a>
            <div class="panel card-sign">
                <div class="card-title-sign mt-3 text-end">
                    <h2 class="title text-uppercase font-weight-bold m-0"><i class="bx bx-user-circle me-1 text-6 position-relative top-5"></i> CM Payroll</h2>
                </div>
                <div class="card-body">
                    @yield('content')
                </div>
            </div>
            <p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2023. All Rights Reserved.</p>
        </div>
    </section>

    <!-- Vendor -->
    <script src="{{ asset('vendor/cm-payroll/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/popper/umd/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/common/common.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/nanoscroller/nanoscroller.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>

    <!-- Specific Page Vendor -->

    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('vendor/cm-payroll/js/theme.js') }}"></script>

    <!-- Theme Custom -->
    <script src="{{ asset('vendor/cm-payroll/js/custom.js') }}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{ asset('vendor/cm-payroll/js/theme.init.js') }}"></script>

</body>

</html>
