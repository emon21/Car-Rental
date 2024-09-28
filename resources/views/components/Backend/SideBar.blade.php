<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('admin.home') ? 'active' : '' }}" href="{{ route('admin.home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        {{-- acive menu --}}

        <!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#car-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Car List</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="car-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('car.index') }}">
                        <i class="bi bi-circle"></i><span>CarList</span>
                    </a>
                </li>
            </ul>
        </li>


         <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('rental.index') ? 'active' : '' }}" href="{{ route('rental.index') }}"">
                <i class="bi bi-bar-chart"></i><span>Rental</span>
            </a>
           
        </li>
        <!-- End Charts Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Logout</span>
            </a>
        </li>
        <!-- End Login Page Nav -->

    </ul>

</aside>
