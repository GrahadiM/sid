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
            <li class="nav-item {{ Request::is('staff/penduduk*') || Request::is('staff/kartu_keluarga*') ? 'menu-is-opening menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('staff/kartu_keluarga*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>{{ __('Menu Data') }} <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('staff.penduduk.index') }}"
                            class="nav-link {{ Request::is('staff/penduduk*') ? 'active' : '' }}">
                            <i class="fas fa-angle-right nav-icon"></i>
                            <p>{{ __('Data Penduduk') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('staff.kartu_keluarga.index') }}"
                            class="nav-link {{ Request::is('staff/kartu_keluarga*') ? 'active' : '' }}">
                            <i class="fas fa-angle-right nav-icon"></i>
                            <p>{{ __('Data Kartu Keluarga') }}</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Request::is('staff/data_lahir*') || Request::is('staff/data_meninggal*') || Request::is('staff/data_pendatang*') || Request::is('staff/data_pindah*') ? 'menu-is-opening menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('staff/messages*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>{{ __('Menu Siklus Penduduk') }} <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('staff.data_lahir.index') }}"
                            class="nav-link {{ Request::is('staff/data_lahir*') ? 'active' : '' }}">
                            <i class="fas fa-angle-right nav-icon"></i>
                            <p>{{ __('Data Lahir') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('staff.data_meninggal.index') }}"
                            class="nav-link {{ Request::is('staff/data_meninggal*') ? 'active' : '' }}">
                            <i class="fas fa-angle-right nav-icon"></i>
                            <p>{{ __('Data Meninggal') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('staff.data_pendatang.index') }}"
                            class="nav-link {{ Request::is('staff/data_pendatang*') ? 'active' : '' }}">
                            <i class="fas fa-angle-right nav-icon"></i>
                            <p>{{ __('Data Pendatang') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('staff.data_pindah.index') }}"
                            class="nav-link {{ Request::is('staff/data_pindah*') ? 'active' : '' }}">
                            <i class="fas fa-angle-right nav-icon"></i>
                            <p>{{ __('Data Pindah') }}</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Request::is('staff/submission_letter*') ? 'menu-is-opening menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('staff/submission_letter*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>{{ __('Menu Pengajuan Surat') }} <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('staff.submission_letter.index') }}"
                            class="nav-link {{ Request::is('staff/submission_letter*') ? 'active' : '' }}">
                            <i class="fas fa-angle-right nav-icon"></i>
                            <p>{{ __('Riwayat Surat') }}</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Request::is('staff/suket_domisili*') || Request::is('staff/suket_kelahiran*') || Request::is('staff/suket_kematian*') || Request::is('staff/suket_pendatang*') || Request::is('staff/suket_pindah*') ? 'menu-is-opening menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('staff/messages*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>{{ __('Menu Surat') }} <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('staff.suket_domisili.index') }}"
                            class="nav-link {{ Request::is('staff/suket_domisili*') ? 'active' : '' }}">
                            <i class="fas fa-angle-right nav-icon"></i>
                            <p>{{ __('Su-Ket Domisili') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('staff.suket_kelahiran.index') }}"
                            class="nav-link {{ Request::is('staff/suket_kelahiran*') ? 'active' : '' }}">
                            <i class="fas fa-angle-right nav-icon"></i>
                            <p>{{ __('Su-Ket Kelahiran') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('staff.suket_kematian.index') }}"
                            class="nav-link {{ Request::is('staff/suket_kematian*') ? 'active' : '' }}">
                            <i class="fas fa-angle-right nav-icon"></i>
                            <p>{{ __('Su-Ket Kematian') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('staff.suket_pendatang.index') }}"
                            class="nav-link {{ Request::is('staff/suket_pendatang*') ? 'active' : '' }}">
                            <i class="fas fa-angle-right nav-icon"></i>
                            <p>{{ __('Su-Ket Pendatang') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('staff.suket_pindah.index') }}"
                            class="nav-link {{ Request::is('staff/suket_pindah*') ? 'active' : '' }}">
                            <i class="fas fa-angle-right nav-icon"></i>
                            <p>{{ __('Su-Ket Pindahan') }}</p>
                        </a>
                    </li>
                </ul>
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
