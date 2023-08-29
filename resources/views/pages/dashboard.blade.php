@extends('layout.app')
@section('content')
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    @role('employee')
                        <h3 class="mb-0">{{ auth()->user()->employee->company->name }}</h3>
                    @else
                        <h3 class="mb-0">{{ auth()->user()->company->name }}</h3>
                    @endrole

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Dashboard
                        </li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <!--begin::Row-->
                @role(['ceo', 'super admin'])
                    <div class="row mb-5">
                        <div class="col-6">
                            <div class="card p-2">
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        <div class="card-image text-center">
                                            <img class="user-image rounded shadow"
                                                src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" style=""
                                                alt="User Image">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                            <h4 class="">{{ auth()->user()->name }}</h4>
                                            <p class="f-14 font-weight-normal text-dark-grey mb-2">
                                                @foreach (auth()->user()->roles as $role)
                                                    {{ ucfirst($role->name) }}
                                                @endforeach
                                            </p>
                                            <p class="card-text f-12 text-lightest"> Employee Id :
                                                EMP-1</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer mt-3 bg-white border-top-grey py-3">
                                    <div class="d-flex flex-wrap justify-content-between">
                                        <span>
                                            <label class="f-12 text-dark-grey mb-12 text-capitalize" for="usr">
                                                Open Tasks </label>
                                            <p class="mb-0 f-18 f-w-500">
                                                <a href="https://demo-saas.worksuite.biz/account/tasks?assignee=me"
                                                    class="text-dark">
                                                    1
                                                </a>
                                            </p>
                                        </span>
                                        <span>
                                            <label class="f-12 text-dark-grey mb-12 text-capitalize" for="usr">
                                                Projects </label>
                                            <p class="mb-0 f-18 f-w-500">
                                                <a href="https://demo-saas.worksuite.biz/account/projects?assignee=me&amp;status=all"
                                                    class="text-dark">3</a>
                                            </p>
                                        </span>
                                        <span>
                                            <label class="f-12 text-dark-grey mb-12 text-capitalize" for="usr">
                                                Open Tickets </label>
                                            <p class="mb-0 f-18 f-w-500">
                                                <a href="https://demo-saas.worksuite.biz/account/tickets?agent=me&amp;status=open"
                                                    class="text-dark">0</a>
                                            </p>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
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
                                                        <span class="badge badge-primary"
                                                            style="background-color:#99C7F1">General Shift</span>
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
                                                        <span class="badge badge-primary"
                                                            style="background-color:#99C7F1">General Shift</span>
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
                                                        <span class="badge badge-primary"
                                                            style="background-color:#99C7F1">General Shift</span>
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
                                                        <span class="badge badge-primary"
                                                            style="background-color:#99C7F1">General Shift</span>
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
                                                        <span class="badge badge-primary"
                                                            style="background-color:#99C7F1">General Shift</span>
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
                                                        <span class="badge badge-primary"
                                                            style="background-color:#99C7F1">General Shift</span>
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
                                                        <span class="badge badge-primary"
                                                            style="background-color:#99C7F1">General Shift</span>
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

                        <div class="col-6 row">
                            <div class="col-6">
                                <!--begin::Small Box Widget 1-->
                                <x-small-box-widget
                                    icon='
                                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
                                </svg>
                                '
                                    color="bg-success" count="{{ count(auth()->user()->company->employee) }}"
                                    content="Employees" moreLink="#" />
                                <!--end::Small Box Widget 1-->
                            </div>
                            <!--end::Col-->
                            <div class="col-6">
                                <!--begin::Small Box Widget 2-->
                                <x-small-box-widget
                                    icon='
                                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
                                </svg>
                                '
                                    color="bg-secondary" count="{{ count(auth()->user()->company->employeePayout) }}"
                                    content="Payouts" moreLink="#" />
                                <!--end::Small Box Widget 2-->
                            </div>
                            <div class="col-6">
                                <!--begin::Small Box Widget 2-->
                                <x-small-box-widget
                                    icon='
                                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
                                </svg>
                                '
                                    color="bg-warning" count="{{ count(auth()->user()->company->employeePayout) }}"
                                    content="Projects" moreLink="#" />
                                <!--end::Small Box Widget 2-->
                            </div>
                            <div class="col-6">
                                <!--begin::Small Box Widget 2-->
                                <x-small-box-widget
                                    icon='
                                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
                                </svg>
                                '
                                    color="bg-danger" count="{{ count(auth()->user()->company->employeePayout) }}"
                                    content="Tasks" moreLink="#" />
                                <!--end::Small Box Widget 2-->
                            </div>

                            <div class="col-12 ">
                                <div class="card">
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

                                                    <div class="progress-bar bg-secondary" role="progressbar"
                                                        style="width: 100%" aria-valuenow="0" aria-valuemin="0"
                                                        aria-valuemax="100" data-toggle="tooltip" data-original-title="0s">
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

                            <div class="col-12">
                                <div class="card bg-white border-0 b-shadow-4 e-d-info">
                                    <div
                                        class="card-header bg-white border-0 text-capitalize d-flex justify-content-between pt-4">
                                        <h4 class="f-18 f-w-500 mb-0">On Leave Today</h4>
                                    </div>

                                    <div class="card-body p-0 h-200">
                                        <table class="table" id="example">
                                            <tbody>
                                                <tr>
                                                    <td colspan="3" class="shadow-none">
                                                        <div
                                                            class="align-items-center d-flex flex-column text-lightest p-20 w-100">
                                                            <svg style="height: 30px;" class="svg-inline--fa fa-plane-departure fa-w-20 f-21 w-100"
                                                                aria-hidden="true" focusable="false" data-prefix="fa"
                                                                data-icon="plane-departure" role="img"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                                                data-fa-i2svg="">
                                                                <path fill="currentColor"
                                                                    d="M624 448H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h608c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16zM80.55 341.27c6.28 6.84 15.1 10.72 24.33 10.71l130.54-.18a65.62 65.62 0 0 0 29.64-7.12l290.96-147.65c26.74-13.57 50.71-32.94 67.02-58.31 18.31-28.48 20.3-49.09 13.07-63.65-7.21-14.57-24.74-25.27-58.25-27.45-29.85-1.94-59.54 5.92-86.28 19.48l-98.51 49.99-218.7-82.06a17.799 17.799 0 0 0-18-1.11L90.62 67.29c-10.67 5.41-13.25 19.65-5.17 28.53l156.22 98.1-103.21 52.38-72.35-36.47a17.804 17.804 0 0 0-16.07.02L9.91 230.22c-10.44 5.3-13.19 19.12-5.57 28.08l76.21 82.97z">
                                                                </path>
                                                            </svg><!-- <i class="fa fa-plane-departure f-21 w-100"></i> Font Awesome fontawesome.com -->

                                                            <div class="f-15 mt-4">
                                                                - No record found. -
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                @endrole

                {{-- <div class="row" >
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Reported Payout Issue</h2>
                    </div>
                    <div class="card-body">
                        <table id="manage-category-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>awd</td>
                                        <td>awd</td>
                                        <td>awdawd</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
            <!--end::Row-->
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            $('#manage-category-table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
