            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center"
                    href="{{ route('dashboard') }}">
                    <div class="sidebar-brand-icon">
                        <i class="fas fa-rss"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">E-SMT</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item {{ $menuDashboard ?? '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="fas fa-th-large"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Nav Item - Data Minusan -->
                <li class="nav-item {{ $menuMinusan ?? '' }}">
                    <a class="nav-link" href="{{ route('minusan') }}">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Data Minusan</span></a>
                </li>

                <!-- Nav Item - Rekap Bulanan -->
                <li class="nav-item">
                    <a class="nav-link" href="tables.html">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Rekap Bulanan</span></a>
                </li>

                <!-- Nav Item - Export
                <li class="nav-item">
                    <a class="nav-link" href="tables.html">
                        <i class="fas fa-fw fa-download "></i>
                        <span>Export</span></a>
                </li> -->

                <!-- Nav Item - User -->
                <li class="nav-item {{ $menuAdminUser ?? '' }}">
                    <a class="nav-link" href="{{ route('user') }}">
                        <i class="fas fa-fw fa-user"></i>
                        <span>User</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->