@extends('layout.app-v2')
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
                    <h2 class="card-title">Employee Payout List</h2>
                </div>
                <div class="card-body">
                    <table id="cm-datatable-default" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Net Pay</th>
                                <th>Total Deductions</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payouts as $payout)
                                <tr>
                                    <td>{{ $payout->employee->user->name }}</td>
                                    <td>{{ $payout->net_pay }}</td>
                                    <td>{{ $payout->total_deductions }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-success btn-md print-button" data-item-id="{{ $payout->id }}"><i class="fas fa-print me-2"></i> Print</button>
                                        @role(['ceo', 'super admin'])
                                            <a class="btn btn-danger btn-md" href="{{ route('payouts.payslip-delete', $payout->id) }}"><i class="fas fa-trash me-2"></i> Delete Payout</a>
                                        @endrole
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            const printButtons = document.querySelectorAll('.print-button');
            printButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = this.getAttribute('data-item-id');
                    const printUrl = `{{ route('payouts.payslip', ['id' => 'itemId']) }}`.replace('itemId', itemId);

                    const printWindow = window.open(printUrl, '_blank');
                    printWindow.onload = function() {
                        printWindow.print();
                    };
                });
            });
        });
    </script>
@endsection