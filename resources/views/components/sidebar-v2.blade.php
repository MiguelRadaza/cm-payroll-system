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
                        <li class="@if(Request::is('employees/*') || Request::is('employees')) nav-active @endif">
                            <a class='nav-link' href="{{ route('employee') }}">
                                <i class="fas fa-users" aria-hidden="true"></i>
                                <span>Employee</span>
                            </a>
                        </li>
                    @endrole
                        <li class="@if(Request::is('payout/*') || Request::is('payout')) nav-active @endif">
                            <a class='nav-link' href="{{ route('payouts') }}">
                                <i class="fas fa-money-bill" aria-hidden="true"></i>
                                <span>Payout History</span>
                            </a>
                        </li>
        
                    @role('super admin')
                        <li class="@if(Request::is('company-invitation/*') || Request::is('company-invitation')) nav-active @endif">
                            <a class='nav-link' href="{{ route('admin.create-invitation-page') }}"> 
                                <i class="fas fa-building" aria-hidden="true"></i>
                                <span>Company Invitation</span>
                            </a>
                        </li>
                    @endrole

                    

                </ul>
            </nav>

            <hr class="separator" />

            <div class="sidebar-widget widget-tasks">
                <div class="widget-header">
                    <h6>Projects</h6>
                    <div class="widget-toggle">+</div>
                </div>
                <div class="widget-content">
                    <ul class="list-unstyled m-0">
                        <li><a href="#">Porto HTML5 Template</a></li>
                        <li><a href="#">Tucson Template</a></li>
                        <li><a href="#">Porto Admin</a></li>
                    </ul>
                </div>
            </div>

            <hr class="separator" />

            <div class="sidebar-widget widget-stats">
                <div class="widget-header">
                    <h6>Company Stats</h6>
                    <div class="widget-toggle">+</div>
                </div>
                <div class="widget-content">
                    <ul>
                        <li>
                            <span class="stats-title">Stat 1</span>
                            <span class="stats-complete">85%</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                                    <span class="sr-only">85% Complete</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <span class="stats-title">Stat 2</span>
                            <span class="stats-complete">70%</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                    <span class="sr-only">70% Complete</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <span class="stats-title">Stat 3</span>
                            <span class="stats-complete">2%</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                    <span class="sr-only">2% Complete</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
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