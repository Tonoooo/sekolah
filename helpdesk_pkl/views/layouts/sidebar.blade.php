<aside class="main-sidebar sidebar-dark-primary elevation-4">
    {{-- <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('gambar/logopei.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Help Desk</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('gambar/iconuser.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="dashboard" class="d-block">{{auth()->user()->level}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dashboard" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              @if (auth()->user()->level=="admin")
                  <li class="nav-item">
                    <a href="/tiket" class="nav-link">
                      <i class="fas fa-list"></i>
                      <p>List Ticket</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/divisi" class="nav-link">
                      <i class="fas fa-users"></i>
                      <p>Divisi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/departemen" class="nav-link">
                      <i class="fas fa-building"></i>
                      <p>Departemen</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/kategori" class="nav-link">
                      <i class="far fa-list-alt"></i>
                      <p>Kategori</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/tiket/prioritas" class="nav-link">
                      <i class="fas fa-bars"></i>
                      <p>Prioritas</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/useradmin" class="nav-link">
                      <i class="fas fa-user-circle"></i>
                      <p>User Admin</p>
                    </a>
                  </li>
              @endif
              @if (auth()->user()->level=="user")
                  <li class="nav-item">
                    <a href="/tiket/create" class="nav-link">
                      <i class="fas fa-edit"></i>
                      <p>New Ticket</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/tiket/myticket" class="nav-link">
                      <i class="fas fa-envelope"></i>
                      <p>My Ticket</p>
                    </a>
                  </li>
              @endif
              @if (auth()->user()->level=="pic")
                <li class="nav-item">
                  <a href="/tiket" class="nav-link">
                    <i class="fas fa-list"></i>
                    <p>List Ticket</p>
                  </a>
                </li>
              @endif
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>