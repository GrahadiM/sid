<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column nav-collapse-hide-child nav-compact nav-flat nav-legacy"
        data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('staff.dashboard') }}"
                class="nav-link {{ Request::is('staff/dashboard*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>{{ __('Dashboard') }}</p>
            </a>
        </li>
        @if (auth()->user()->hasRole('staff'))
            <li class="nav-item">
                <a href="{{ route('staff.announcement.index') }}"
                    class="nav-link {{ Request::is('staff/announcement*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>{{ __('Menu Pengumuman') }}</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('staff/histories*') || Request::is('staff/messages*') ? 'menu-is-opening menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('staff/messages*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>{{ __('Menu Pesan') }} <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('staff.messages.index') }}"
                            class="nav-link {{ Request::is('staff/messages*') ? 'active' : '' }}">
                            <i class="fas fa-angle-right nav-icon"></i>
                            <p>{{ __('Kritik & Saran') }}</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Request::is('staff/users*') ? 'menu-is-opening menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('staff/users*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-id-card"></i>
                    <p>{{ __('Menu Pengguna') }} <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('staff.users.index') }}"
                            class="nav-link {{ Request::is('staff/users*') ? 'active' : '' }}">
                            <i class="fas fa-angle-right nav-icon"></i>
                            <p>{{ __('Menu User') }}</p>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</nav>
<!-- /.sidebar-menu -->
