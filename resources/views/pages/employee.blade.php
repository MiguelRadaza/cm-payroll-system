@extends('layout.app')
@section('content')
    <div class="container">
        <!--begin::Row-->
        <div class="row mb-5">
            <!--begin::Col-->
            <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 1-->
                {{-- <x-small-box-widget
                    icon='
                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
                    </svg>
                    '
                    color="bg-warning" count="{{ count($employees) }}" content="Employees" moreLink="#" /> --}}
                <!--end::Small Box Widget 1-->
            </div>
            <!--end::Col-->
        </div>

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
                        {!! $dataTable->table() !!}
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
                    {{-- @foreach ($users as $user)
                        <option value="{{ $user->id }}"> {{ $user->email }} </option>
                    @endforeach --}}
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
                    {{-- @foreach ($users as $user)
                        <option value="{{ $user->id }}"> {{ $user->email }} </option>
                    @endforeach --}}
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
@push('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}
@endpush
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
       
    </script>
@endsection
