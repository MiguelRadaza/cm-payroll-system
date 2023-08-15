<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a class='brand-link' href='/dist/pages/'>
            <span class="brand-text fw-light">Inventory</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
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
                <li class="nav-item">
                    <a class='nav-link @if(Request::is('payouts/*') || Request::is('payouts')) active @endif' href="{{ route('payouts') }}">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>Payout History</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>