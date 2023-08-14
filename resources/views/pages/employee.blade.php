@extends('layout.app')
@section('content')
<div class="app-content">
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="container">
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-lg-3 col-6">
                    <!--begin::Small Box Widget 1-->
                    <x-smallBoxWidget></x-smallBoxWidget>
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
            </div>
        </div>
        <!--end::Row-->
    </div>
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