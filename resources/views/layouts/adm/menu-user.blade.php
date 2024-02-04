<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column nav-collapse-hide-child nav-compact nav-flat nav-legacy"
        data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('user.dashboard') }}"
                class="nav-link {{ Request::is('user/dashboard*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>{{ __('Dashboard') }}</p>
            </a>
        </li>
        @if (auth()->user()->hasRole('user'))
            <li class="nav-item {{ Request::is('user/histories*') || Request::is('user/messages*') ? 'menu-is-opening menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('user/messages*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>{{ __('Menu Pesan') }} <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('user.messages.index') }}"
                            class="nav-link {{ Request::is('user/messages*') ? 'active' : '' }}">
                            <i class="fas fa-angle-right nav-icon"></i>
                            <p>{{ __('Riwayat Pesan') }}</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Request::is('user/submission_letter*') ? 'menu-is-opening menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('user/submission_letter*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>{{ __('Menu Pengajuan Surat') }} <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('user.submission_letter.index') }}"
                            class="nav-link {{ Request::is('user/submission_letter*') ? 'active' : '' }}">
                            <i class="fas fa-angle-right nav-icon"></i>
                            <p>{{ __('Riwayat Surat') }}</p>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</nav>
<!-- /.sidebar-menu -->
