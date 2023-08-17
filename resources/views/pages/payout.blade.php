@extends('layout.app')
@section('content')
<div class="container-fluid">
    <!--begin::Row-->
    <div class="container">

        
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Creating Payout</strong></h3>
            </div>
            <form id="deductionForm">
                @csrf
                <input id="is_fixed" value="{{ $employee->is_fixed }}" type="hidden">
                <input id="employee_id" value="{{ $employee->id }}" type="hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="row">
                            <div class="col-6">
                                <label for="name">Name</label>
                                <input class="form-control" id="name" type="text" readonly value="{{ $employee->user->name }}" />
                            </div>
                            <div class="col-6">
                                <label for="position">Position</label>
                                <input class="form-control" id="position" type="text" readonly value="{{ $employee->position }}" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label for="rate">Rate</label>
                                <input class="form-control" id="rate" type="text" readonly value="{{ $employee->rate }}" />
                            </div>
                            <div class="col-6">
                                <label for="payout">Payout Type</label>
                                <input class="form-control" id="payout" type="text" readonly value="{{ $employee->payout }}" />
                            </div>
                        </div>

                        <div class="col-12"><hr/></div>

                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="month">Month</label>
                                    <input type="month" name="month" id="month" required class="form-control" />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="period">Period</label>
                                    <select class="form-select" name="period" id="period" @if ($employee->is_fixed)
                                        disabled
                                    @endif >
                                        <option value=""></option>
                                        <option value="1">Period 1</option>
                                        <option value="2">Period 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="net_pay">Total Net Pay</label>
                            <input type="number" name="net_pay" id="net_pay" required class="form-control" />
                            <hr />
                        </div>

                        <div class="col-12">
                            <p><strong>Deductions</strong></p>
                            <div id="deductionsContainer">
                                <div class="deduction mb-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="deduction_name[]" placeholder="Deduction Name">
                                        </div>
                                        <div class="col-4">
                                            <input type="number" class="form-control" name="deduction_amount[]" placeholder="Amount">
                                        </div>
                                        <div class="col-2">
                                            <button type="button" class="btn btn-danger btn-xs remove-btn">Remove</button>
                                        </div>
    
                                    </div>
                                </div>
                            </div>

                            <button type="button" id="addDeduction" class="btn btn-warning"><i class="fas fa-plus me-3"></i>Add Deduction</button>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-info"><i class="fas fa-clock me-2"></i>Save as Draft</button>
                    <button class="btn btn-secondary"><i class="fas fa-x me-2"></i>Cancel</button>
                    <button class="btn btn-success float-end"><i class="fas fa-check me-2"></i> Send Payout</button>
                </div>
            </form>
        </div>
        
    </div>
    <!--end::Row-->
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $("#addDeduction").click(function () {
                var newDeduction = $('<div class="deduction mb-2">' +
                    '<div class="row">' +
                        '<div class="col-6">' +
                            '<input type="text" class="form-control" name="deduction_name[]" placeholder="Deduction Name">' +
                        '</div>' +
                        '<div class="col-4">' +
                            '<input type="number" class="form-control" name="deduction_amount[]" placeholder="Amount">' +
                        '</div>' +
                        '<div class="col-2">' +
                            '<button type="button" class="btn btn-danger btn-xs remove-btn">Remove</button>' +
                        '</div>' +
                    '</div>'+
                    '</div>');

                $("#deductionsContainer").append(newDeduction);
            });

            $(document).on("click", ".remove-btn", function () {
                $(this).closest(".deduction").remove();
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#deductionForm").submit(function (event) {
                event.preventDefault();
                var deductions = [];

                $(".deduction").each(function () {
                    var name = $(this).find('input[name="deduction_name[]"]').val();
                    var amount = $(this).find('input[name="deduction_amount[]"]').val();
                    deductions.push({ name: name, amount: amount });
                });

                var payload = {
                    _token: $('meta[name="csrf-token"]').attr('content'), 
                    deductions : deductions, 
                    employeeId : $("#employee_id").val(),
                    month : $("#month").val(),
                    net_pay : $("#net_pay").val(),
                };

                if ($('#is_fixed').val() === 0) {
                    payload.period = $('#is_fixed').val();
                }

                $.ajax({
                    type: "POST",
                    url: "{{ route('employee.payout-create') }}", // Replace with the actual route URL
                    data: payload,
                    dataType: "json",
                    success: function (response) {
                        if (response.success === true) {
                            var baseUrl = window.location.protocol + "//" + window.location.host;
                            var newUrl = baseUrl + "/employees";
                            window.location.href = newUrl; // Redirect to the desired URL
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });

                // Do something with the deductions array (e.g., send it to the server)
                console.log(deductions);
            });
        });
    </script>
@endsection