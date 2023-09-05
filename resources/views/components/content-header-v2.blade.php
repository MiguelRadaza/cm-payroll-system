<header class="page-header">
    <h2>
        @if (Request::is('employees/*') || Request::is('employees'))
            Employee @if (Request::is('employees/payout/*') || Request::is('employees/payout'))
                - Payout
            @endif
        @elseif(Request::is('admin/company-invitation/*') || Request::is('admin/company-invitation'))
            Company Invitation
        @elseif(Request::is('payout-type/*') || Request::is('payout-type'))
            Payout Types
        @else
            Payouts
        @endif
    </h2>

    <div class="right-wrapper text-end">
        <ol class="breadcrumbs">
            <li>
                <a href="{{ route("dashboardV2") }}">
                    <i class="bx bx-home-alt"></i>
                </a>
            </li>
            <li>
                <span>
                    @if (Request::is('employees/*') || Request::is('employees'))
                        Employee
                    @elseif(Request::is('admin/company-invitation/*') || Request::is('admin/company-invitation'))
                        Company Invitation
                    @elseif(Request::is('payout-type/*') || Request::is('payout-type'))
                        Payout Types
                    @else
                        Payouts
                    @endif
                </span>
            </li>


            @if (Request::is('employees/payout/*') || Request::is('employees/payout'))
                <li>
                    <span>
                        Payouts
                    </span>
                </li>
            @endif
        </ol>

        <a class="sidebar-right-toggle"></a>
    </div>
</header>
