    <!--begin::Sidebar-->
    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
            <!--begin::Brand Link-->
            <a class='brand-link' href='/dist/pages/'>
                <!--begin::Brand Image-->
                {{-- <img src="../../../dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> --}}
                <!--end::Brand Image-->
                <!--begin::Brand Text-->
                <span class="brand-text fw-light">Inventory</span>
                <!--end::Brand Text-->
            </a>
            <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
            <nav class="mt-2">
                <!--begin::Sidebar Menu-->
                <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a class='nav-link @if(Request::is('dashboard/*') || Request::is('dashboard')) active @endif' href="{{ route('dashboard') }}">
                            <i class="nav-icon fas fa-users"></i>
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
                <!--end::Sidebar Menu-->
            </nav>
        </div>
        <!--end::Sidebar Wrapper-->
    </aside>
    <!--end::Sidebar-->