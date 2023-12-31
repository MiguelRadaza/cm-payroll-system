@extends('layout.app-v2')
@section('content')
<div class="container-fluid">
    <!--begin::Row-->
    <div class="container">
        <div class="row mb-5">
            <!--begin::Col-->
            <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 1-->
                <x-small-box-widget
                    icon='
                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
                    </svg>
                    '
                    color="warning"
                    count="{{ $companyCount }}"
                    content="Employees"
                    moreLink="#"
                />
                <!--end::Small Box Widget 1-->
            </div>
            <!--end::Col-->
        </div>

        {{-- <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Employee List</h2>
                </div>
                <div class="card-body row">
                    <div class="col-12">
                        <button id="createCompanyInvitationButton" class="btn btn-success btn-md float-end"><i class="fas fa-plus me-2"></i>Add New Employee</button>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="manage-category-table" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($keys as $key)
                                        <tr>
                                            <td>{{ $key->email }}</td>
                                            <td>{{ $key->countdown  }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-danger" href="{{ route('admin.delete-invitation', $key->id) }}">
                                                    Delete Invitation
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-12 mb-3">
                <button id="createCompanyInvitationButton" class="btn btn-success btn-md float-end"><i class="fas fa-plus me-2"></i>Add New Employee</button>
            </div>
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">Pending Company Invitation</h2>
                </header>
                <div class="card-body">

                    <table class="table table-bordered table-striped mb-0" id="cm-datatable-default">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keys as $key)
                                <tr>
                                    <td>{{ $key->email }}</td>
                                    <td>{{ $key->countdown  }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-danger" href="{{ route('admin.delete-invitation', $key->id) }}">
                                            Delete Invitation
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            {{-- <tr>
                                <td>Trident</td>
                                <td>Internet
                                     Explorer 4.0</td>
                                <td>Win 95+</td>
                                <td class="center">4</td>
                                <td class="center">X</td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </section>
        </div>

        <x-modal id="createCompanyInvitationModal" title="Create Company Invitation" formAction="{{ route('admin.create-invitation') }}">
            <div class="form-group mb-3">
                <label for="inputField">User Email</label>
                <input type="email" name="email" class="form-control" required />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </x-modal>
    </div>
    <!--end::Row-->
</div>
@endsection
@section('page-scripts')
    <script src="{{ asset('vendor/cm-payroll/vendor/select2/js/select2.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/datatables/media/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendor/cm-payroll/vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/cm-datatable.js') }}"></script>
    <script>
        
        $(function () {
            $('#manage-category-table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

            var modal = new bootstrap.Modal(document.getElementById("createCompanyInvitationModal"));
            $("#createCompanyInvitationButton").click(function () {
                modal.show();
            });
        });
    </script>
@endsection