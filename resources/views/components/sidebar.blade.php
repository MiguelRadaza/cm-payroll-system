<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a class='brand-link' href='/dist/pages/'>
            @role('employee')
                <span class="brand-text fw-light">{{ config('app.name') }} <br/> {{ auth()->user()->employee->company->name }}</span>
            @else 
                <span class="brand-text fw-light">{{ config('app.name') }} <br/> {{ auth()->user()->company->name }}</span>
            @endrole
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                @role(['ceo', 'super admin'])
                    <li class="nav-item">
                        <a class='nav-link @if(Request::is('dashboard/*') || Request::is('dashboard')) active @endif' href="{{ route('dashboard') }}">
                            <i class="nav-icon fas fa-gauge-high"></i>
                            <p>Dashobard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class='nav-link  @if(Request::is('employees/*') || Request::is('employees')) active @endif' href="{{ route('employee') }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Employee</p>
                        </a>
                    </li>
                @endrole
                    <li class="nav-item">
                        <a class='nav-link @if(Request::is('payout/*') || Request::is('payout')) active @endif' href="{{ route('payouts') }}">
                            <i class="nav-icon fas fa-money-bill"></i>
                            <p>Payout History</p>
                        </a>
                    </li>
    
                @role('super admin')
                    <li class="nav-item">
                        <a class='nav-link @if(Request::is('company-invitation/*') || Request::is('company-invitation')) active @endif' href="{{ route('admin.create-invitation-page') }}"> 
                            <i class="nav-icon fas fa-building"></i>
                            <p>Company Invitation</p>
                        </a>
                    </li>
                @endrole
            </ul>
        </nav>
    </div>
</aside>