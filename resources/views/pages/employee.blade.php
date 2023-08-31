@extends('layout.app')
@section('content')
    <div class="container">
        <!--begin::Row-->
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
                    color="bg-warning" count="{{ count($employees) }}" content="Employees" moreLink="#" />
                <!--end::Small Box Widget 1-->
            </div>
            <!--end::Col-->
        </div>

        <div class="row">
            <div class="card row">
                <div class="card-body">
                    <div class="col-12">
                        <button id="addEmployeeButton" class="btn btn-success btn-md  me-2"><i
                                class="fas fa-plus me-2"></i>Add Employee</button>
                        <button id="inviteEmployeeButton" class="btn btn-secondary btn-md "><i
                                class="fas fa-plus me-2"></i>Invite Employee</button>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="manage-category-table" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Employee Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $item)
                                        <tr>
                                            <td></td>
                                            <td>
                                                @if (isset($item->user->name))
                                                    <img class="user-image mr-3 rounded-circle" height="40px"
                                                        src="https://ui-avatars.com/api/?background=random&name={{ $item->user->name }}" />
                                                    {{ $item->user->name }}
                                                @else
                                                    'Pending Invitation'
                                                @endif
                                            </td>
                                            <td>{{ $item->user->email }}</td>
                                            <td class="text-center badge-status">
                                                @if ($item->is_deleted)
                                                    <span class="badge bg-danger"> </span> Deleted
                                                @else
                                                    <svg class="svg-inline--fa fa-circle fa-w-16 mr-1 text-light-green f-10"
                                                        style="font-size: 10px !important;" aria-hidden="true"
                                                        focusable="false" data-prefix="fa" data-icon="circle" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                        </path>
                                                    </svg><!-- <i class="fa fa-circle mr-1 text-light-green f-10"></i> Font Awesome fontawesome.com -->Active
                                                @endif
                                            </td>
                                            <td>{{ $item->created_at }}</td>
                                            <td class="text-center">
                                                @if (!$item->is_deleted)
                                                    <a @if (!empty($item->user_id)) href="{{ route('employee.create-page', $item->user_id) }}" @else hidden @endif
                                                        class="btn btn-warning btn-md mr-3"><i
                                                            class="fas fa-money-bill me-2"></i>Send Payout</a>
                                                    <button class="btn btn-info btn-md view-button"
                                                        data-item-id="{{ $item->id }}"
                                                        data-user="{{ $item }}"><i
                                                            class="fas fa-clipboard me-2"></i>View</button>
                                                    <a href="{{ route('employee.delete', $item->id) }}"
                                                        class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
                                                @else
                                                    <a href="{{ route('employee.activate', $item->id) }}"
                                                        class="btn btn-success btn-xs"><i class="fas fa-check"></i>
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

        <x-modal id="addEmployeeModal" class="modal-xl" title="Create New Employee"
            formAction="{{ route('employee.create') }}">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" required id="name"
                        name="name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-6 col-12">
                    <div class="form-group mb-3">
                        <label for="inputField">User Email</label>
                        <select name="user_id" id="userDropdown" class="form-select @error('user_id') is-invalid @enderror"
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
                        <div class="col-12 mb-3">
                            <input type="text" class="form-control" id="inviteInput" name="user_email"
                                placeholder="Enter email to send invite link." hidden />
                        </div>

                        <div class="col-12">
                            <button class="btn btn-success" id="showInviteButton"><i
                                    class="fas fa-magnifying-glass me-2"></i>
                                Employee not registered user yet?</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-12 mb-2">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" class="form-control @error('birthdate') is-invalid @enderror" required
                        id="birthdate" name="birthdate">
                    @error('birthdate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-lg-6 col-12">
                    <label for="profilePicture">Picture</label>
                    <input type="file" class="form-control @error('picture') is-invalid @enderror" required
                        id="profilePicture" name="picture">
                    @error('birthdate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-12 mb-2">
                    <label for="number">Number</label>
                    <input type="number" class="form-control @error('picture') is-invalid @enderror" required
                        id="number" name="number">
                    @error('birthdate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-lg-6 col-12">
                    <label for="gender">Mobile Number</label>
                    <select class="form-select" id="gender" name="gender">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="form-group mb-3">
                        <label for="position">Position</label>
                        <input type="text" class="form-control @error('position') is-invalid @enderror" required
                            id="position" name="position">
                        @error('position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="form-group mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" required
                            id="address" name="address">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <textarea class="form-control mb-4" name="about" placeholder="About"></textarea>

            <div class="row">
                <div class="col-lg-4 col-6">
                    <div class="form-check form-switch">
                        <input class="form-check-input @error('is_receive_email_notification') is-invalid @enderror"
                            type="checkbox" id="is_receive_email_notification" name="is_receive_email_notification"
                            checked>
                        <label class="form-check-label" for="is_receive_email_notification">Should Receive Email
                            Notification?</label>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <label for="address">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" required
                        id="address" name="address">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-lg-4 col-12">
                    <label for="address">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" required
                        id="address" name="address">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <hr />

            <div class="form-group">
                <label for="rate">Rate</label>
                <div class="input-group mb-3">
                    <input type="number" class="form-control @error('rate') is-invalid @enderror" id="rate"
                        required name="rate">
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
                    <input class="form-check-input @error('is_fixed') is-invalid @enderror" type="checkbox"
                        id="isFixed" name="is_fixed" checked>
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

        <div class="modal fade" id="inviteEmployee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="inviteEmployeeLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inviteEmployeeLabel">Invite New Employee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </symbol>
                            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                            </symbol>
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </symbol>
                        </svg>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="email-tab" data-bs-toggle="tab"
                                    data-bs-target="#email" type="button" role="tab" aria-controls="email"
                                    aria-selected="true">Invite By
                                    Email</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="link-tabl" data-bs-toggle="tab" data-bs-target="#link"
                                    type="button" role="tab" aria-controls="link" aria-selected="false">Invite
                                    By Link</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="email" role="tabpanel"
                                aria-labelledby="email-tab">
                                <form action="{{ route('employee.create') }}" method="POST">
                                    @csrf
                                    <div class="alert alert-primary mt-3 d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                            aria-label="Info:">
                                            <use xlink:href="#info-fill" />
                                        </svg>
                                        <div>
                                            Employees will receive an email to log in and update their profile through the
                                            self-service
                                            portal.
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="email" class="form-control" name="user_email"
                                            placeholder="Enter email to send invite link." />
                                    </div>
                                    <div class="form-group mb-3">
                                        <textarea class="form-control" placeholder="Add Message (Optional)"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-secondary float-start"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger float-end"><i
                                                class="fas fa-paper-plane me-3"></i>GenerateLink</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="link" role="tabpanel" aria-labelledby="link-tabl">
                                <div class="col-sm-12">
                                    <form action="{{ route('employee.create') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="f-14 text-dark-grey mb-12" data-label=""
                                                for="createLinkLabel">Create an
                                                invite link for members to join.
                                            </label>
                                            <br />
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-check-inline custom-control custom-radio mt-2 mr-3">
                                                        <input type="radio" value="any" class="custom-control-input"
                                                            id="allowAnyEmail" name="allow_email" checked="">
                                                        <label class="custom-control-label pt-1 cursor-pointer"
                                                            for="allowAnyEmail">Allow
                                                            any
                                                            email address</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check-inline custom-control custom-radio my-3 mr-3">
                                                        <div class="col-12">
                                                            <input type="radio" value="selected"
                                                                class="custom-control-input" id="onlyAllowEmail"
                                                                name="allow_email">
                                                            <label class="custom-control-label cursor-pointer"
                                                                for="onlyAllowEmail">
                                                                Only allow email addresses with domain
                                                        </div>
                                                        <div class="input-group mt-2 tagify_tags ms-4">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text height-35 border">@</span>
                                                            </div>
                                                            <input type="text" name="email_domain" id="email_domain"
                                                                placeholder="e.g. gmail.com" value="email.com"
                                                                class="form-control height-35 f-14">
                                                        </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="button" class="btn btn-secondary float-start"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger float-end"><i
                                                        class="fas fa-paper-plane me-3"></i>GenerateLink</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div> --}}
                </div>
            </div>
        </div>

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

            var employeeModal = new bootstrap.Modal(document.getElementById("inviteEmployee"));
            $("#inviteEmployeeButton").click(function() {
                employeeModal.show();
            });
        });
    </script>
@endsection
