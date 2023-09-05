@extends('layout.app-v2')
@section('content')
    <div class="container">
        <!--begin::Row-->
        <div class="row mb-5">
            <!--begin::Col-->
            <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 1-->
                <x-small-box-widget
                    icon='users'
                    color="tertiary" count="{{ count($employees) }}" content="Employees" moreLink="#" />
                <!--end::Small Box Widget 1-->
            </div>
            <!--end::Col-->
        </div>

        <div class="row">
            <div class="card row">
                <div class="card-body">
                    <div class="col-12">
                        <a href="{{ route('payout-type') }}" class="btn btn-secondary btn-md "><i
                                class="fas fa-gear me-2"></i>Payout Type</a>
                        <button id="addEmployeeButton" class="btn btn-success btn-md float-end"><i
                                class="fas fa-plus me-2"></i>Add New Employee</button>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="cm-datatable-default" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Rate</th>
                                        <th>Is Fixed</th>
                                        <th>Payout</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $item)
                                        <tr>
                                            <td>{{ isset($item->user->name) ? $item->user->name : 'Pending Invitation' }}
                                            </td>
                                            <td>{{ $item->position }}</td>
                                            <td>{{ $item->rate }}</td>
                                            <td>{{ $item->is_fixed }}</td>
                                            <td>{{ $item->payout }}</td>
                                            <td class="text-center badge-status">
                                                @if ($item->is_deleted)
                                                    <span class="ecommerce-status on-hold">Deleted</span>
                                                @else
                                                    <span class="ecommerce-status completed">Completed</span>
                                                @endif
                                            </td>
                                            <td>{{ $item->created_at }}</td>
                                            <td class="text-center">
    
                                                @if (!$item->is_deleted)
                                                    <a @if (!empty($item->user_id)) href="{{ route('employee.create-page', $item->user_id) }}" @else hidden @endif
                                                        class="btn btn-warning btn-md mr-3"><i
                                                            class="fas fa-money-bill me-2"></i>Send Payout</a>
                                                    <button class="btn btn-info btn-md view-button"
                                                        data-item-id="{{ $item->id }}" data-user="{{ $item }}"><i
                                                            class="fas fa-clipboard me-2"></i>View</button>
                                                    <a href="{{ route('employee.delete', $item->id) }}"
                                                        class="btn btn-danger btn-md"><i class="fas fa-trash"></i></a>
                                                @else
                                                    <a href="{{ route('employee.activate', $item->id) }}"
                                                        class="btn btn-success btn-md"><i class="fas fa-check"></i>
                                                        Activate</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-modal id="addEmployeeModal" class="modal-xl" title="Create New Employee" formAction="{{ route('employee.create') }}">
            <div class="form-group mb-3">
                <label for="inputField">User Email</label>
                <select name="user_id" id="userDropdown" class="form-select @error('user_id') is-invalid @enderror" required
                    aria-label="Select User">
                    <option></option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}"> {{ $user->email }} </option>
                    @endforeach
                </select>
                @error('user_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <div class="col-12 mb-3">
                    <input type="text" class="form-control" id="inviteInput" name="user_email"
                        placeholder="Enter email to send invite link." hidden />
                </div>

                <div class="col-12">
                    <button class="btn btn-success" id="showInviteButton"><i class="fas fa-magnifying-glass me-2"></i>
                        Employee not registered user yet?</button>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="position">Position</label>
                <input type="text" class="form-control @error('position') is-invalid @enderror" required id="position"
                    name="position">
                @error('position')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <hr />
            <div class="form-group">
                <label for="rate">Rate</label>
                <div class="input-group mb-3">
                    <input type="number" class="form-control @error('rate') is-invalid @enderror" id="rate" required
                        name="rate">
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                    @error('rate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input @error('is_fixed') is-invalid @enderror" type="checkbox" id="isFixed"
                        name="is_fixed" checked>
                    <label class="form-check-label" for="isFixed">Is Fixed Rate</label>
                </div>
                @error('is_fixed')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="payout">Payout</label>
                <select name="payout" id="payout" class="form-select @error('payout') is-invalid @enderror" required
                    aria-label="Select Payout">
                    <option></option>
                    <option value="15-30"> 15th & 30</option>
                    <option value="30"> 30 </option>
                </select>
                @error('payout')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </x-modal>

        <x-modal id="viewEmployeeModal" title="Employee Details" formAction="{{ route('employee.update') }}">
            <input type="hidden" name="id" id="id" />
            <div class="form-group mb-3">
                <label for="inputField">User Email</label>
                <select name="user_id" id="update-user_id" class="form-select @error('user_id') is-invalid @enderror"
                    required aria-label="Select User">
                    <option></option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}"> {{ $user->email }} </option>
                    @endforeach
                </select>
                @error('user_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="position">Position</label>
                <input type="text" class="form-control @error('position') is-invalid @enderror" required
                    id="update-position" name="position">
                @error('position')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <hr />
            <div class="form-group mb-3">
                <label for="rate">Rate</label>
                <input type="number" class="form-control @error('rate') is-invalid @enderror" id="update-rate" required
                    name="rate">
                @error('rate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input @error('is_fixed') is-invalid @enderror" type="checkbox"
                        id="update-isFixed" name="is_fixed" checked>
                    <label class="form-check-label" for="isFixed">Is Fixed Rate</label>
                </div>
                @error('is_fixed')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="payout">Payout</label>
                <select name="payout" id="update-payout" class="form-select @error('payout') is-invalid @enderror"
                    required aria-label="Select Payout">
                    <option></option>
                    <option value="15-30"> 15th & 30</option>
                    <option value="30"> 30 </option>
                </select>
                @error('payout')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </x-modal>
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
        document.addEventListener('DOMContentLoaded', function() {
            const viewModal = new bootstrap.Modal(document.getElementById("viewEmployeeModal"));
            const printButtons = document.querySelectorAll('.view-button');

            printButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = this.getAttribute('data-item-id');
                    const userData = JSON.parse(this.getAttribute('data-user'));
                    console.log(userData);
                    const user_id = userData.user_id;
                    const id = userData.id;
                    const userEmail = userData.employee_id;
                    const position = userData.position;
                    const rate = userData.rate;
                    const isFixed = userData.isFixed;
                    const payout = userData.payout;

                    document.getElementById('id').value = id;
                    document.getElementById('update-user_id').value = user_id;
                    document.getElementById('update-position').value = position;
                    document.getElementById('update-rate').value = rate;
                    document.getElementById('update-isFixed').checked = isFixed;
                    document.getElementById('update-payout').value = payout;

                    viewModal.show();
                });
            });

            const inviteInput = document.getElementById('inviteInput');
            const showInviteButton = document.getElementById('showInviteButton');
            const userDropdown = document.getElementById('userDropdown');

            showInviteButton.addEventListener('click', function() {
                inviteInput.removeAttribute('hidden');
                userDropdown.removeAttribute('required');
                userDropdown.setAttribute('hidden', 'hidden');
                inviteInput.setAttribute('required', 'required');
            });
        });
        $(function() {
            $('#multiple-select-field').select2({
                theme: 'bootstrap-5'
            });
        });

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

            var modal = new bootstrap.Modal(document.getElementById("addEmployeeModal"));
            $("#addEmployeeButton").click(function() {
                modal.show();
            });
        });
    </script>
@endsection
