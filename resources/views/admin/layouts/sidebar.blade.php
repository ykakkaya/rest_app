<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Reservation System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{route('admin.category')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kategori Listesi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.menu')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Menu Listesi
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.table')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Masa Listesi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.reservation')}}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Reservasyon Listesi
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-tree"></i>
              <p>
                Admin Bilgi Güncelleme
              </p>
            </a>
          </li>


          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a class="nav-link" href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    <i class="nav-icon far fa-calendar-alt"></i>
                    {{ __('Çıkış') }}
                </a>
            </form>

          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
