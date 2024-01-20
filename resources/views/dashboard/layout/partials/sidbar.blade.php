<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('dashboard/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dashboard/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info d-flex  align-items-center justify-content-between ">
                <a href="#" class="d-block ">{{auth()->user()->name}}</a>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
<button class="btn btn-sm btn-danger mx-2"> Logout</button>
</form>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->

 <li class="nav-item">
                    <a href="{{route('dashboard.index')}}" @class([
                        'nav-link',
                        'active' => request()->routeIs('dashboard.index')
                    ])

                    >
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.categories.index')}}" @class([
                        'nav-link',
                        'active' => request()->routeIs('dashboard.categories.index')
                    ]) >
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.products.index')}}" @class([
                        'nav-link',
                        'active' => request()->routeIs('dashboard.products.index')
                    ])>
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-chart-pie"></i>
                      <p>
                        Orders
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{route('dashboard.orders.index')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>New Order</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('dashboard.orders.index',['status'=>'approved'])}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Approved</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('dashboard.orders.index',['status'=>'paid'])}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Paid/Undelieverd</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('dashboard.orders.index',['status'=>'unpaid'])}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Delieverd/Unpaid</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('dashboard.orders.index','completed')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Completed</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('dashboard.orders.index','rejected')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Rejected</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                    </ul>
                </li>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
