<!doctype html>
<html class="fixed">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Default Layout | Porto Admin - Responsive HTML5 Template</title>

    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
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
    <script src="{{ asset('vendor/cm-payroll/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/common/common.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/nanoscroller/nanoscroller.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>

    <!-- Specific Page Vendor -->
    <script src="{{ asset('vendor/cm-payroll/vendor/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/jquery-appear/jquery.appear.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/jquery.easy-pie-chart/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/flot.tooltip/jquery.flot.tooltip.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/jquery-sparkline/jquery.sparkline.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/raphael/raphael.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/morris/morris.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/gauge/gauge.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/snap.svg/snap.svg.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/liquid-meter/liquid.meter.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/jqvmap/jquery.vmap.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/jqvmap/data/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/jqvmap/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/jqvmap/maps/continents/jquery.vmap.africa.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/jqvmap/maps/continents/jquery.vmap.asia.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/jqvmap/maps/continents/jquery.vmap.australia.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/jqvmap/maps/continents/jquery.vmap.europe.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js') }}"></script>

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
