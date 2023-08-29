@extends('layout.app')
@section('content')
<div class="container-fluid">
    <!--begin::Row-->
    <div class="container">
        <div class="row mb-5">
            <!--begin::Col-->
            <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 1-->
                {{-- <x-smallBoxWidget></x-smallBoxWidget> --}}
                <!--end::Small Box Widget 1-->
            </div>
            <!--end::Col-->
        </div>

        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Payout Type Details</h2>
                </div>
                <div class="card-body">
                    <div class="container row">
                        <div class="col-12">
                            <label>Payout Name</label>
                            <input type="text" class="form-control" name="payout_name"/>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-12">
                            <p><strong>Payout Days</strong></p>
                            <div id="payoutDayContainer">
                                <div class="deduction mb-2">
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="number" class="form-control" name="payout_days[]" placeholder="Day">
                                        </div>
                                        <div class="col-2">
                                            <button type="button" class="btn btn-danger btn-xs remove-btn">Remove</button>
                                        </div>
    
                                    </div>
                                </div>
                            </div>

                            <button type="button" id="addPayoutDay" class="btn btn-warning"><i class="fas fa-plus me-3"></i>Add Payout Day</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--end::Row-->
</div>
@endsection
@section('scripts')
    <script>
       $(document).ready(function () {
            $("#addPayoutDay").click(function () {
                var newPayoutDay = $('<div class="deduction mb-2">' +
                    '<div class="row">' +
                        '<div class="col-10">' +
                            '<input type="number" class="form-control" name="payout_days[]" placeholder="Day">' +
                        '</div>' +
                        '<div class="col-2">' +
                            '<button type="button" class="btn btn-danger btn-xs remove-btn">Remove</button>' +
                        '</div>' +
                    '</div>'+
                    '</div>');

                $("#payoutDayContainer").append(newPayoutDay);
            });

            $(document).on("click", ".remove-btn", function () {
                $(this).closest(".deduction").remove();
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#0f").submit(function (event) {
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