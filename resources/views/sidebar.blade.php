  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4"  style="background: -webkit-linear-gradient(black, rgb(93, 64, 220));">
    <!-- Brand Logo -->
    <a href="{{ route('customer.index') }}" class="brand-link">
      <img src="{{asset('/template/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
        <form action="{{ route('customer.index') }}" method="GET">
          <div class="from-inline mt-3 mb-3">
            <div class="input-group"sss>
              <input id="search" name="search" required class="from-control from-control-sidebar" type="search" placeholder="Live search" aria-label="Search">
              <div class="input-group-append">
                <button type="submit" class="btn btn-sidebar">
                  <span class="fas fa-search fa-fw"></span>
                </button>
              </div>
            </div>
          </div>
        </form>
        <div id="livesearch" class="d-flex flex-column" style="background:rgb(198, 188, 244);gap:3px;">
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item mb-3">
              <a href="{{ route('customer.index') }}" class="nav-link">
                <i class="spanav-icon fas fa-bars"></i>
                <p>
                  &ensp;Danh sách khách hàng
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <p>
                  Lọc khách hàng theo tuổi
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('customer.index', ['from' => '18', 'to' => '25']) }}" class="nav-link">
                    <p>18&emsp;<i class="fa fa-arrow-right" aria-hidden="true"></i>&emsp;25</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('customer.index', ['from' => '26', 'to' => '30']) }}" class="nav-link">
                    <p>26&emsp;<i class="fa fa-arrow-right" aria-hidden="true"></i>&emsp;30</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('customer.index', ['from' => '31', 'to' => '45']) }}" class="nav-link">
                    <p>31&emsp;<i class="fa fa-arrow-right" aria-hidden="true"></i>&emsp;45</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('customer.index', ['from' => '46', 'to' => '60']) }}" class="nav-link">
                    <p>46&emsp;<i class="fa fa-arrow-right" aria-hidden="true"></i>&emsp;60</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>