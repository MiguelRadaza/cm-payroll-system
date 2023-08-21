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
       
    </script>
@endsection