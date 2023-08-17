@extends('layout.app')
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
                    color="bg-warning"
                    count="{{ count($employees) }}"
                    content="Employees"
                    moreLink="#"
                />
                <!--end::Small Box Widget 1-->
            </div>
            <!--end::Col-->
        </div>

        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Employee List</h2>
                </div>
                <div class="card-body row">
                    <div class="col-12">
                        <button id="addEmployeeButton" class="btn btn-success btn-md float-end"><i class="fas fa-plus me-2"></i>Add New Employee</button>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="manage-category-table" class="table table-bordered table-striped table-responsive">
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
                                            <td>{{ isset($item->user->name)? $item->user->name : "Pending Invitation" }}</td>
                                            <td>{{ $item->position }}</td>
                                            <td>{{ $item->rate }}</td>
                                            <td>{{ $item->is_fixed }}</td>
                                            <td>{{ $item->payout }}</td>
                                            <td>{{ $item->is_deleted }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td class="text-center">

                                                <a @if(!empty($item->user_id)) href="{{ route('employee.create-page', $item->user_id) }}" @else hidden @endif class="btn btn-warning btn-md mr-3"><i class="fas fa-money-bill me-2"></i>Send Payout</a>
                                                <button class="btn btn-info btn-md view-button" data-item-id="{{ $item->id }}" data-user="{{ $item }}"><i class="fas fa-clipboard me-2" ></i>View</button>
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

        <x-modal id="addEmployeeModal" title="Create New Employee" formAction="{{ route('employee.create') }}">
            <div class="form-group mb-3">
                <label for="inputField">User Email</label>
                <select name="user_id" id="userDropdown" class="form-select @error('user_id') is-invalid @enderror" required aria-label="Select User">
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
                    <input type="text" class="form-control" id="inviteInput" name="user_email" placeholder="Enter email to send invite link." hidden/>
                </div>

                <div class="col-12"> 
                    <button class="btn btn-success" id="showInviteButton"><i class="fas fa-magnifying-glass me-2"></i> Employee not registered user yet?</button>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="position">Position</label>
                <input type="text" class="form-control @error('position') is-invalid @enderror" required id="position" name="position">
                @error('position')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <hr/>
            <div class="form-group mb-3">
                <label for="rate">Rate</label>
                <input type="number" class="form-control @error('rate') is-invalid @enderror" id="rate" required name="rate">
                @error('rate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input @error('is_fixed') is-invalid @enderror" type="checkbox" id="isFixed" name="is_fixed" checked>
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
                <select name="payout" id="payout" class="form-select @error('payout') is-invalid @enderror" required aria-label="Select Payout">
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
                <select name="user_id" id="update-user_id" class="form-select @error('user_id') is-invalid @enderror" required aria-label="Select User">
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
                <input type="text" class="form-control @error('position') is-invalid @enderror" required id="update-position" name="position">
                @error('position')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <hr/>
            <div class="form-group mb-3">
                <label for="rate">Rate</label>
                <input type="number" class="form-control @error('rate') is-invalid @enderror" id="update-rate" required name="rate">
                @error('rate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input @error('is_fixed') is-invalid @enderror" type="checkbox" id="update-isFixed" name="is_fixed" checked>
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
                <select name="payout" id="update-payout" class="form-select @error('payout') is-invalid @enderror" required aria-label="Select Payout">
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
    </div>
    <!--end::Row-->
</div>
@endsection
@section('scripts')
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

            var modal = new bootstrap.Modal(document.getElementById("addEmployeeModal"));
            $("#addEmployeeButton").click(function () {
                modal.show();
            });
        });
    </script>
@endsection