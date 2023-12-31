<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ !empty(auth()->user()->photo) ? asset(auth()->user()->photo) : asset('default.png') }}" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-bs-toggle="dropdown">{{auth()->user()->username }}</a>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="#sidebarCrm" data-bs-toggle="collapse" class="" aria-expanded="true">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span> Employee Manager </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse show" id="sidebarCrm" style="">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('employees.index') }}">All Employees</a>
                            </li>
                            <li>
                                <a href="{{ route('employees.create') }}">Create Employee</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="apps-calendar.html">
                        <i class="mdi mdi-calendar"></i>
                        <span> Calendar </span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
