<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-map-marker-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            PETA KERENTANAN
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- ========================= -->
    <!-- MENU UTAMA -->
    <!-- ========================= -->

    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Peta -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-map"></i>
            <span>Peta</span>
        </a>
    </li>

    <!-- Tentang -->
    <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('about') }}">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>Tentang</span>
        </a>
    </li>

    <!-- Kontak -->
    <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('contact') }}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Kontak</span>
        </a>
    </li>

   @auth
    @if(auth()->user()->role === 'admin')

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Administrator
        </div>

        <li class="nav-item {{ request()->is('geojson*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('geojson.index') }}">
                <i class="fas fa-file-code"></i>
                <span>GeoJSON</span>
            </a>
        </li>

    @endif
@endauth

    <hr class="sidebar-divider">

@guest
<li class="nav-item">
    <a class="nav-link" href="{{ route('login') }}">
        <i class="fas fa-sign-in-alt"></i>
        <span>Login</span>
    </a>
</li>
@endguest

@auth
<li class="nav-item">
    <a class="nav-link"
       href="#"
       data-toggle="modal"
       data-target="#logoutModal">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
    </a>
</li>
@endauth

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>