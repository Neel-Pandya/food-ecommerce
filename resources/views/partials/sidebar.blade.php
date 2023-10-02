<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="{{ route('admin_dashboard') }}" class="nav-link">
                <div class="nav-profile-image">
                    @foreach ($adminData as $data)
                    @endforeach
                    <img src="{{ URL::to('/') }}/images/admin/{{ $data->admin_profile }}" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column ">
                    <span class="font-weight-bold mb-2">{{ $data->admin_name }}</span>
                </div>

            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin_dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('users') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('users') }}">
                <span class="menu-title">Users</span>

                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>

        </li>
        <li class="nav-item {{ request()->routeIs('products.available') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false"
                aria-controls="general-pages">
                <span class="menu-title">Items</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('products.available') }}">Available Items
                        </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('products.purchased') }}">Purchased Items
                        </a>
                    </li>

                </ul>
            </div>
        </li>


        <li class="nav-item {{ request()->routeIs('category') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('category') }}">
                <span class="menu-title">Category </span>
                <i class="mdi mdi-chef-hat menu-icon"></i>
            </a>
        </li>


        <li class="nav-item">
            <a href="{{ route('admin.change.password') }}" class="nav-link"><span class="menu-title">Change
                    Password</span>
                <i class="mdi mdi-key menu-icon"></i></a>
        </li>

        <li class="nav-item">
            <a href="{{ route('gallery.create') }}" class="nav-link"><span class="menu title">Gallery</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.logout') }}">
                <center>
                    <span class="menu-title">Logout </span>
                </center>
                <i class="mdi mdi-logout-variant menu-icon text-dangerz"></i>
            </a>
        </li>




    </ul>
</nav>