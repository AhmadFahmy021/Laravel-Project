<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard/admin" class="brand-link">
      <img src="/img/karismalogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 10">
      <span class="brand-text font-weight-bold text-uppercase">Karisma Academy </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/admin/dist/img/user.jpg" class="img-circle elevation-2" alt="User Image">
          {{-- <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          <div class="text-white" href="#" class="d-block">{{Str::limit(Auth::user()->nama, 11, '...') }}</div>
          {{-- <a href="#" class="d-block">Alexander Pierce</a> --}}
        </div>
      </div>

      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        @if (Auth::user()->role == 'admin')
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard/admin/" class="nav-link {{Request::is('dashboard/admin') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/admin/pengguna" class="nav-link {{Request::is('dashboard/admin/pengguna*') ? 'active' : ''}}">
              {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
              <i class="nav-icon fas fa-user-edit"></i>
              <p>
                Kelola Pengguna
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/admin/postingan" class="nav-link {{Request::is('dashboard/admin/postingan*') ? 'active' : ''}}">
              {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
              <i class="nav-icon fas fa-cloud-upload-alt"></i>
              <p>
                Kelola Postingan
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>
        </ul>
        @endif
        @if (Auth::user()->role == 'superadmin')
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard/admin/" class="nav-link {{Request::is('dashboard/admin') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/admin/pengguna*" class="nav-link {{Request::is('dashboard/admin/pengguna') ? 'active' : ''}}">
              {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
              <i class="nav-icon fas fa-user-edit"></i>
              <p>
                Kelola Pengguna
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/admin/postingan*" class="nav-link {{Request::is('dashboard/admin/postingan') ? 'active' : ''}}">
              {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
              <i class="nav-icon fas fa-cloud-upload-alt"></i>
              <p>
                Kelola Postingan
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>
        </ul>
        @endif
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>