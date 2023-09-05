<!doctype html>
<html class="fixed header-dark">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>CM Payroll System</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Covenant Millionare Payroll System">
    <meta name="author" content="Miguel Radaza (Starlight)">
    <meta name="description" content="A system for covenant millionare to help managing employees payroll history, and for employees to check payout history.">
    <meta name="keywords" content="payroll, CM Payroll, CM payroll, cm payroll, cm payroll system">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light"
        rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/cm-payroll/vendor/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/cm-payroll/vendor/animate/animate.compat.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/cm-payroll/vendor/font-awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/cm-payroll/vendor/boxicons/css/boxicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/cm-payroll/vendor/magnific-popup/magnific-popup.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('vendor/cm-payroll/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/cm-payroll/vendor/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/cm-payroll/vendor/jquery-ui/jquery-ui.theme.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('vendor/cm-payroll/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/cm-payroll/vendor/morris/morris.css') }}" />

    <link rel="stylesheet" href="{{ asset('vendor/cm-payroll/vendor/select2/css/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/cm-payroll/vendor/select2-bootstrap-theme/select2-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/cm-payroll/vendor/datatables/media/css/dataTables.bootstrap5.css') }}" />

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
    <section class="body">
        <x-headerV2></x-headerV2>
        <div class="inner-wrapper">
            <x-sidebarV2></x-sidebarV2>
            <section role="main" class="content-body">
                <x-contentHeaderV2></x-contentHeaderV2>
                @yield('content')
            </section>
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
    <script src="{{ asset('vendor/cm-payroll/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/select2/js/select2.js') }}"></script>


    <!-- Specific Page Vendor -->
    @yield('page-scripts')

    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('vendor/cm-payroll/js/theme.js') }}"></script>

    <!-- Theme Custom -->
    <script src="{{ asset('vendor/cm-payroll/js/custom.js') }}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{ asset('vendor/cm-payroll/js/theme.init.js') }}"></script>

    <!-- Examples -->
    <script src="{{ asset('vendor/cm-payroll/js/examples/examples.dashboard.js') }}"></script>

</body>

</html>
