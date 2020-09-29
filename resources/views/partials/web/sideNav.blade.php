<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar Toggler (Sidebar) -->
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('/frontend/img/logo1.png')}}" alt="">
        </div>
        {{-- <div class="sidebar-brand-text mx-3">{{ env('APP_SHORT_NAME')}} Admin</div> --}}
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (\Request::is('backend')) ? 'active' : ''  }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {{ (\Request::is('backend/users*')) ? 'active' : ''  }}">
        <a class="nav-link" href="{{ route('admin.users.index') }}">
            <i class="fas fa-user"></i>
            <span>Users</span></a>
    </li>

    <li class="nav-item {{ (\Request::is('backend/activities*')) ? 'active' : ''  }}">
        <a class="nav-link" href="{{ route('admin.activities.index') }}">
            <i class="fas fa-list"></i>
            <span>Activites</span></a>
    </li>

    <li class="nav-item {{ (\Request::is('backend/locations_log*')) ? 'active' : ''  }}">
        <a class="nav-link" href="{{ route('admin.locations_log.index') }}">
            <i class="fas fa-clipboard-list"></i>
            <span>Locations</span></a>
    </li>

    <li class="nav-item {{ (\Request::is('backend/supports*')) ? 'active' : ''  }}">
        <a class="nav-link" href="{{ route('admin.supports.index') }}">
            <i class="fas fa-cogs"></i>
            <span>Support</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item {{ (\Request::is('backend/broadcast*')) ? 'active' : ''  }}">
        <a class="nav-link" href="{{ route('admin.broadcast.index') }}">
            <i class="fas fa-comments"></i>
            <span>Broadcast</span></a>
    </li>

    <li class="nav-item {{ (\Request::is('backend/splash*')) ? 'active' : ''  }}">
        <a class="nav-link" href="{{ route('admin.splash.index') }}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Splash Screen</span></a>
    </li>

    <li class="nav-item {{ (\Request::is('backend/settings*')) ? 'active' : ''  }}">
        <a class="nav-link" href="{{ route('admin.settings.index') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span></a>
    </li>

    {{-- <li class="nav-item {{ (request()->is('backend/activity_log')) ? 'active' : ''  }}">
        <a class="nav-link" href="{{ route('admin.activity_log.index') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Activity Log</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="text-center d-none d-md-inline mr-2">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
