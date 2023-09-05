<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
        </div>
        <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">

                <ul class="nav nav-main">
                    @role(['ceo', 'super admin'])
                        <li class="@if(Request::is('dashboard-v2/*') || Request::is('dashboard-v2')) nav-active @endif">
                            <a class='nav-link' href="{{ route('dashboardV2') }}">
                                <i class="fas fa-gauge-high" aria-hidden="true"></i>
                                <span>Dashobard</span>
                            </a>
                        </li>
                        {{-- nav-expanded --}}
                        <li class="nav-parent @if(Request::is('employees/*') || Request::is('employees')) nav-expanded nav-active @endif "> 
                            <a class="nav-link" href="#">
                                <i class="fas fa-users-gear" aria-hidden="true"></i>
                                <span>HR</span>
                            </a>
                            <ul class="nav nav-children" style="">
                                <li class="@if(Request::is('employees/*') || Request::is('employees')) nav-active @endif">
                                    <a class="nav-link" href="{{ route('employee') }}">
                                        Employees
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="#">
                                        Shifts (Coming Soon)
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="#">
                                        Tasks (Coming Soon)
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endrole
                        <li class="@if(Request::is('payout/*') || Request::is('payout')) nav-active @endif">
                            <a class='nav-link' href="{{ route('payouts') }}">
                                <i class="fas fa-money-bill" aria-hidden="true"></i>
                                <span>Payout History</span>
                            </a>
                        </li>
        
                    @role('super admin')
                        <li class="@if(Request::is('admin/company-invitation/*') || Request::is('admin/company-invitation')) nav-active @endif">
                            <a class='nav-link' href="{{ route('admin.create-invitation-page') }}"> 
                                <i class="fas fa-building" aria-hidden="true"></i>
                                <span>Company Invitation</span>
                            </a>
                        </li>
                    @endrole

                </ul>
            </nav>
        </div>

        <script>
            // Maintain Scroll Position
            if (typeof localStorage !== 'undefined') {
                if (localStorage.getItem('sidebar-left-position') !== null) {
                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                    sidebarLeft.scrollTop = initialPosition;
                }
            }
        </script>

    </div>

</aside>