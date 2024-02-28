

<aside class="main-sidebar sidebar-white elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <p class="d-block text-capitalize ">
            @auth
            {{ auth()->user()->name }}
            @endauth
          </p>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
              <li class="nav-item">
                <a href="{{route('dashboard')}}" class="custom-border hover-element nav-link {{ Route::currentRouteName() == 'dashboard' ? 'activesidebar' : '' }}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Dashboard
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
              </li>

              <li class="nav-item  mt-2 ">
                <a href="{{route('tempatmagang')}}" class="custom-border hover-element nav-link {{ Route::currentRouteName() == 'tempatmagang' ? 'activesidebar' : '' }}">
                  <i class="nav-icon fas fa-building"></i>
                  <p>
                    Tempat Magang
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
              </li>

              <li class="nav-item  mt-2 ">
                <a href="{{route('akunadmin')}}" class="custom-border hover-element nav-link {{ Route::currentRouteName() == 'akunadmin' ? 'activesidebar' : '' }}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Akun Admin
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
              </li>

              
              <li class="nav-item  mt-2 ">
                <a href="{{route('akunguru')}}" class="custom-border hover-element nav-link {{ Route::currentRouteName() == 'akunguru' ? 'activesidebar' : '' }}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Akun Guru
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
              </li>

              
              <li class="nav-item  mt-2 ">
                <a href="{{route('akunsiswa')}}" class="custom-border hover-element nav-link {{ Route::currentRouteName() == 'akunsiswa' ? 'activesidebar' : '' }}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Akun Siswa
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
              </li>

              <li class="nav-item mt-2">
                <a href="pages/calendar.html" class="custom-border hover-element nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Siswa Bimbingan
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
              </li>

              <li class="nav-item mt-2">
                <a href="pages/calendar.html" class="custom-border hover-element nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Surat dan validasi
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
              </li>

              <li class="nav-item  mt-2">
                <a href="pages/calendar.html" class="custom-border hover-element nav-link">
                  <i class="nav-icon fas fa-print"></i>
                  <p>
                    Jadwal Interview
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
              </li>

              
              <li class="nav-item  mt-2">
                <a href="pages/calendar.html" class="custom-border hover-element nav-link">
                  <i class="nav-icon fas fa-calendar-alt"></i>
                  <p>
                    Laporan dan Mentoring
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
              </li>

              
              <li class="nav-item  mt-2">
                <a href="pages/calendar.html" class="custom-border hover-element nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Laporan akhir
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
              </li>

          
          <li class="nav-item  mt-2">
            <a href="pages/calendar.html" class="custom-border hover-element nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Data
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>


          @auth
          <li class="nav-item mt-2">
              <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="btn"> <!-- Ganti dengan elemen yang sesuai -->
                      <i class="nav-icon fas fa-power-off"></i>
                      {{ __('Log Out') }}
                  </button>
              </form>
          </li>
          @endauth
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>