<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-cloud-rain"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Peramalan Curah Hujan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

   

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    @auth
        @if(auth()->user()->role === 'admin')
            <div class="sidebar-heading">Manajemen Pengguna</div>

            <li class="nav-item {{ request()->is('users*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('users') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data User</span>
                </a>
            </li>

            <hr class="sidebar-divider">
        @endif
    @endauth

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
