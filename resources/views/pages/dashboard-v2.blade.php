@extends('layout.app-v2')
@section('content')
    <div class="row">
        <div class="alert alert-info nomargin alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
            <h4 class="font-weight-bold text-dark">System Update!</h4>
            <p>We are excited to inform you about some important changes to our system:</p>
            <ul>
                <li><strong>UI Change:</strong> We have refreshed the user interface to enhance your user experience.</li>
                <li><strong>Upcoming Features:</strong> Get ready for these upcoming features:</li>
                <ul>
                    <li>a. Tasks: Stay organized with a new task management feature.</li>
                    <li>b. Employee Shift Schedule: Easily manage employee schedules with our new tool.</li>
                    <li>c. Disbursement Payroll: Streamline your payroll process with our upcoming feature.</li>
                    <li>d. Dashboard Analytics View: Gain deeper insights into your data with an improved analytics dashboard.</li>
                </ul>
            </ul>
            <p>Thank you for choosing our system, and we look forward to providing you with an even better user experience!</p>
        </div>
        
        <div class="col-lg-12 col-xl-6">
            <div class="row">
                <div class="col-md-12">
                    {{-- <h4 class="mt-0 mb-0 font-weight-bold text-dark">Dashboard</h4> --}}
                    {{-- <p class="mb-3">Widgets for user actions.</p> --}}

                    <section class="card-group mb-3 mb-4">
                        <div class="widget-twitter-profile">
                            <div class="top-image">
                                <img src="img/widget-twitter-profile.jpg" alt="">
                            </div>
                            <div class="profile-info">
                                <div class="profile-picture">
                                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" alt="">
                                </div>
                                <div class="profile-account">
                                    <h3 class="name font-weight-semibold">{{ Str::ucfirst(auth()->user()->name) }}</h3>
                                    <a href="#" class="account">{{ "@" . Str::ucfirst(auth()->user()->company->name) }}</a>
                                </div>
                                <ul class="profile-stats">
                                    <li>
                                        <h5 class="stat text-uppercase">Employees</h5>
                                        <h4 class="count">{{ count(auth()->user()->company->employee) }}</h4>
                                    </li>
                                </ul>
                            </div>
                            <div class="profile-quote">
                                <blockquote>
                                    <p>
                                        But remember the Lord your God, for it is he who gives you the ability to produce wealth, and so confirms his covenant, which he swore to your ancestors, as it is today. - Deuteronomy 8:18
                                    </p>
                                </blockquote>
                                <div class="quote-footer">
                                    <span class="datetime">4:27 PM - 15 Jul 2021</span>
                                    -
                                    <a href="#">Details</a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row" style="opacity: 30%;">
                <div class="col-md-12">
                    <section class="card">
                        <div class="card card-default">
                            <div class="card-header">
                                <h4 class="card-title m-0">
                                    <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion"
                                        data-bs-target="#collapse1One">
                                        <i class="fas fa-check"></i> Tasks
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1One" class="collapse show">
                                <div class="card-body">
                                    <ul class="widget-todo-list">
                                        <li>
                                            <div class="checkbox-custom checkbox-default">
                                                <input type="checkbox" checked="" id="todoListItem1" class="todo-check">
                                                <label class="todo-label" for="todoListItem1"><span>Lorem ipsum dolor
                                                        sit amet</span></label>
                                            </div>
                                            <div class="todo-actions">
                                                <a class="todo-remove" href="#">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox-custom checkbox-default">
                                                <input type="checkbox" id="todoListItem2" class="todo-check">
                                                <label class="todo-label" for="todoListItem2"><span>Lorem ipsum dolor
                                                        sit amet</span></label>
                                            </div>
                                            <div class="todo-actions">
                                                <a class="todo-remove" href="#">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox-custom checkbox-default">
                                                <input type="checkbox" id="todoListItem3" class="todo-check">
                                                <label class="todo-label" for="todoListItem3"><span>Lorem ipsum dolor
                                                        sit amet</span></label>
                                            </div>
                                            <div class="todo-actions">
                                                <a class="todo-remove" href="#">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xl-6" style="opacity: 30%;">
            <div class="row">
                <div class="col-md-12">
                    <section class="card card-transparent">
                        <div class="card-body">
                            <section class="card">
                                <div class="card-body">
                                    <div class="small-chart float-end" id="sparklineBarDash"></div>
                                    <script type="text/javascript">
                                        var sparklineBarDashData = [5, 6, 7, 2, 0, 4, 2, 4, 2, 0, 4, 2, 4, 2, 0, 4];
                                    </script>
                                    <div class="h4 font-weight-bold mb-0">488</div>
                                    <p class="text-3 text-muted mb-0">Average Profile Visits</p>
                                </div>
                            </section>
                            <section class="card">
                                <div class="card-body">
                                    <div class="circular-bar circular-bar-xs m-0 mt-1 me-4 mb-0 float-end">
                                        <div class="circular-bar-chart" data-percent="45"
                                            data-plugin-options='{ "barColor": "#2baab1", "delay": 300, "size": 50, "lineWidth": 4 }'>
                                            <strong>Average</strong>
                                            <label><span class="percent">45</span>%</label>
                                        </div>
                                    </div>
                                    <div class="h4 font-weight-bold mb-0">12</div>
                                    <p class="text-3 text-muted mb-0">Working Projects</p>
                                </div>
                            </section>
                            <section class="card">
                                <div class="card-body">
                                    <div class="small-chart float-end" id="sparklineLineDash"></div>
                                    <script type="text/javascript">
                                        var sparklineLineDashData = [15, 16, 17, 19, 10, 15, 13, 12, 12, 14, 16, 17];
                                    </script>
                                    <div class="h4 font-weight-bold mb-0">89</div>
                                    <p class="text-3 text-muted mb-0">Pending Tasks</p>
                                </div>
                            </section>
                        </div>
                    </section>
                </div>
                <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="d-block text-capitalize w-100">
                                <h5 class="f-15 f-w-500 mb-20 text-darkest-grey">Week Timelogs <span
                                        class="badge badge-secondary ml-1 f-10">0s This Week</span></h5>

                                <div id="weekly-timelogs">
                                    <nav class="mb-3">
                                        <ul class="pagination pagination-sm week-pagination">
                                            <li class="page-item week-timelog-day" data-toggle="tooltip"
                                                data-original-title="28-08-2023" data-date="2023-08-28">
                                                <a class="page-link" href="javascript:;">Mo</a>
                                            </li>
                                            <li class="page-item week-timelog-day active" data-toggle="tooltip"
                                                data-original-title="29-08-2023" data-date="2023-08-29">
                                                <a class="page-link" href="javascript:;">Tu</a>
                                            </li>
                                            <li class="page-item week-timelog-day" data-toggle="tooltip"
                                                data-original-title="30-08-2023" data-date="2023-08-30">
                                                <a class="page-link" href="javascript:;">We</a>
                                            </li>
                                            <li class="page-item week-timelog-day" data-toggle="tooltip"
                                                data-original-title="31-08-2023" data-date="2023-08-31">
                                                <a class="page-link" href="javascript:;">Th</a>
                                            </li>
                                            <li class="page-item week-timelog-day" data-toggle="tooltip"
                                                data-original-title="01-09-2023" data-date="2023-09-01">
                                                <a class="page-link" href="javascript:;">Fr</a>
                                            </li>
                                            <li class="page-item week-timelog-day" data-toggle="tooltip"
                                                data-original-title="02-09-2023" data-date="2023-09-02">
                                                <a class="page-link" href="javascript:;">Sa</a>
                                            </li>
                                            <li class="page-item week-timelog-day" data-toggle="tooltip"
                                                data-original-title="03-09-2023" data-date="2023-09-03">
                                                <a class="page-link" href="javascript:;">Su</a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <div class="progress" style="height: 7px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 0%"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                            data-toggle="tooltip" data-original-title="0s"></div>

                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                            data-toggle="tooltip" data-original-title="0s">
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mt-1 text-dark-grey f-12">
                                        <small>Duration: 0s</small>
                                        <small>Break: 0s</small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-3" style="opacity: 30%;">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Shift Schedule</h4>
                    <div class="card-tools">
                        <button class="btn btn-danger btn-xs float-end">Employee Shift</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table" id="example">
                        <tbody>
                            <tr>
                                <td class="pl-20">
                                    28-08-2023
                                </td>
                                <td>Monday</td>
                                <td>
                                    <span class="badge badge-primary" style="background-color:#99C7F1">General
                                        Shift</span>
                                </td>
                                <td class="pr-20 text-right">
                                    This is default shift
                                </td>
                            </tr>
                            <tr>
                                <td class="pl-20">
                                    29-08-2023
                                </td>
                                <td>Tuesday</td>
                                <td>
                                    <span class="badge badge-primary" style="background-color:#99C7F1">General
                                        Shift</span>
                                </td>
                                <td class="pr-20 text-right">
                                    This is default shift
                                </td>
                            </tr>
                            <tr>
                                <td class="pl-20">
                                    30-08-2023
                                </td>
                                <td>Wednesday</td>
                                <td>
                                    <span class="badge badge-primary" style="background-color:#99C7F1">General
                                        Shift</span>
                                </td>
                                <td class="pr-20 text-right">
                                    This is default shift
                                </td>
                            </tr>
                            <tr>
                                <td class="pl-20">
                                    31-08-2023
                                </td>
                                <td>Thursday</td>
                                <td>
                                    <span class="badge badge-primary" style="background-color:#99C7F1">General
                                        Shift</span>
                                </td>
                                <td class="pr-20 text-right">
                                    This is default shift
                                </td>
                            </tr>
                            <tr>
                                <td class="pl-20">
                                    01-09-2023
                                </td>
                                <td>Friday</td>
                                <td>
                                    <span class="badge badge-primary" style="background-color:#99C7F1">General
                                        Shift</span>
                                </td>
                                <td class="pr-20 text-right">
                                    This is default shift
                                </td>
                            </tr>
                            <tr>
                                <td class="pl-20">
                                    02-09-2023
                                </td>
                                <td>Saturday</td>
                                <td>
                                    <span class="badge badge-primary" style="background-color:#99C7F1">General
                                        Shift</span>
                                </td>
                                <td class="pr-20 text-right">
                                    This is default shift
                                </td>
                            </tr>
                            <tr>
                                <td class="pl-20">
                                    03-09-2023
                                </td>
                                <td>Sunday</td>
                                <td>
                                    <span class="badge badge-primary" style="background-color:#99C7F1">General
                                        Shift</span>
                                </td>
                                <td class="pr-20 text-right">
                                    This is default shift
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-scripts')
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
@endsection