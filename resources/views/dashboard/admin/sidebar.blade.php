<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/home') }}" class="brand-link">
      <img src="{{ asset('assets/dist/img/logo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">TITRANSTECH</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/logo.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">TITRANSTECH</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link bg-warning">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/home') }}" class="nav-link active">
                  <i class="far fa-circle text-warning nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
            
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon text-warning fas fa-tree"></i>
              <p>
                Free training Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/viewfreetraining') }}" class="nav-link">
                  <i class="far fa-circle text-warning nav-icon"></i>
                  <p>View Freetraining</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon text-warning fas fa-copy"></i>
              <p>
                BLog Section
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/addblog') }}" class="nav-link">
                  <i class="far fa-circle text-warning nav-icon"></i>
                  <p>Add Blog</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/viewblog') }}" class="nav-link">
                  <i class="far fa-circle text-warning nav-icon"></i>
                  <p>View Blog</p>
                </a>
              </li>
              
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas text-warning fa-chart-pie"></i>
              <p>
                Jobs Section
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/addjob') }}" class="nav-link">
                  <i class="far fa-circle text-warning nav-icon"></i>
                  <p>Add Jobs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/viewjobs') }}" class="nav-link">
                  <i class="far fa-circle text-warning nav-icon"></i>
                  <p>View Jobs</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon text-warning fas fa-tree"></i>
              <p>
                Contact Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/viewcontacts') }}" class="nav-link">
                  <i class="far fa-circle text-warning nav-icon"></i>
                  <p>View Contacts</p>
                </a>
              </li>
             
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon text-warning fas fa-users"></i>
              <p>
                Subscribers Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/viewsubscribers') }}" class="nav-link">
                  <i class="far fa-circle text-warning nav-icon"></i>
                  <p>View Subscribers</p>
                </a>
              </li>
             
            </ul>
          </li>
         
          <li class="nav-item">
            <a href="{{ url('admin/logout') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Logout</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>