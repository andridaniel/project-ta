<aside class="main-sidebar sidebar-white warnasidebar elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar ">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel card-header mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/' . auth()->user()->gambar_profile) }}" class="img-circle elevation-2"
                    alt="gambar profile">
            </div>
            <div class="info">
                <p class="d-block text-capitalize ">
                    <a class="textdecoration " href="{{ route('profilepengguna') }}">
                        @auth
                            {{ auth()->user()->name }}
                        @endauth
                    </a>
                </p>
            </div>

        </div>

        <!-- SidebarSearch Form -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="custom-border hover-element nav-link {{ Route::currentRouteName() == 'dashboard' ? 'activesidebar' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>


                <li class="nav-item  mt-2 ">
                    <a href="{{ route('profilepengguna') }}"
                        class="custom-border hover-element nav-link {{ Route::currentRouteName() == 'profilepengguna' ? 'activesidebar' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            My Profile
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>

                @if (auth()->user()->role_id == '3')
                    <li class="nav-item mt-2">
                        <a href="{{ route('kelompok_bimbingan') }}"
                            class="custom-border  hover-element nav-link {{ Route::currentRouteName() == 'kelompok_bimbingan' ? 'activesidebar' : '' }}                                         ">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Kelompok Bimbingan
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                    </li>
                @endif


                <li class="nav-item  mt-2 ">
                    <a href="{{ route('tempattraining') }}"
                        class="custom-border hover-element nav-link {{ Route::currentRouteName() == 'tempattraining' ? 'activesidebar' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Tempat Training
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>

                @if (auth()->user()->role_id == '1')
                    <li class="nav-item mt-2">
                        <a href="{{ route('userregister') }}"
                            class="custom-border  hover-element nav-link {{ Route::currentRouteName() == 'userregister' ? 'activesidebar' : '' }}                                         ">
                            <i class="nav-icon ion ion-person-add"></i>
                            <p>
                                Register
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item mt-2">
                        <a href="{{ route('data_admin') }}"
                            class="custom-border  hover-element nav-link {{ Route::currentRouteName() == 'data_admin' ? 'activesidebar' : '' }}                                         ">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Data Admin
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item mt-2">
                        <a href="{{ route('data_guru_pembimbing') }}"
                            class="custom-border  hover-element nav-link {{ Route::currentRouteName() == 'data_guru_pembimbing' ? 'activesidebar' : '' }}                                         ">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Data Guru Pembimbing
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item mt-2">
                        <a href="{{ route('data_siswa') }}"
                            class="custom-border  hover-element nav-link {{ Route::currentRouteName() == 'data_siswa' ? 'activesidebar' : '' }}                                         ">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Data Siswa
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->role_id == '2')
                    <li class="nav-item mt-2">
                        <a href="{{ route('data_siswa_bimbingan') }}"
                            class="custom-border  hover-element nav-link {{ Route::currentRouteName() == 'data_siswa_bimbingan' ? 'activesidebar' : '' }}                                         ">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Siswa Bimbingan
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->role_id == '3')
                    <li class="nav-item mt-2">
                        <a href="{{ route('data_siswa_bimbingan') }}"
                            class="custom-border  hover-element nav-link {{ Route::currentRouteName() == 'data_siswa_bimbingan' ? 'activesidebar' : '' }}                                         ">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>
                                Jadwal Interview
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                    </li>



                    {{-- Laporan --}}
                    <li class="nav-item mt-2">
                        <a href="{{ route('data_siswa_bimbingan') }}"
                            class="custom-border  hover-element nav-link {{ Route::currentRouteName() == 'data_siswa_bimbingan' ? 'activesidebar' : '' }}                                         ">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Tempat Trainingku
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                    </li>
                @endif


                @if (in_array(auth()->user()->role_id, ['2', '3']))
                    <li class="nav-item mt-2">
                        <a href="{{ route('data_laporan_mingguan') }}"
                            class="custom-border  hover-element nav-link {{ Route::currentRouteName() == 'data_laporan_mingguan' ? 'activesidebar' : '' }}                                         ">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Laporan Mingguan
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                    </li>


                    <li class="nav-item mt-2">
                        <a href="{{ route('data_laporan_akhir') }}"
                            class="custom-border  hover-element nav-link {{ Route::currentRouteName() == 'data_laporan_akhir' ? 'activesidebar' : '' }}                                         ">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Laporan Akhir
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                    </li>
                @endif


                @auth
                    {{-- <li class="nav-item mt-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn"> <!-- Ganti dengan elemen yang sesuai -->
                                <i class="nav-icon fas fa-power-off"></i>
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </li> --}}
                    <li class="nav-item mt-2">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="custom-border hover-element nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                {{ __('Keluar') }}
                            </p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
