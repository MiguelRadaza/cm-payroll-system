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
                    <h2 class="card-title">List</h2>
                </div>
                <div class="card-body">
                    <table id="manage-category-table" class="table table-bordered table-striped">
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
                                        <button class="btn btn-info btn-md"><i class="fas fa-clipboard me-2"></i> View</button>
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
@section('scripts')
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
        });
    </script>
@endsection