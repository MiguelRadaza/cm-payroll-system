<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">
                    @if(Request::is('employees/*') || Request::is('employees')) 
                        Employee @if (Request::is('employees/payout/*') || Request::is('employees/payout')) - Payout @endif
                    @else 
                        Payouts
                    @endif 
                </h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item @if((Request::is('employees/*') || Request::is('employees')) && !Request::is('employees/payout')) active @endif" aria-current="page">
                        @if(Request::is('employees/*') || Request::is('employees')) 
                        Employee
                        @else 
                            Payouts
                        @endif 
                    </li>

                    @if (Request::is('employees/payout/*') || Request::is('employees/payout'))
                        <li class="breadcrumb-item active" aria-current="page">
                            Payouts
                        </li>
                    @endif
                </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>