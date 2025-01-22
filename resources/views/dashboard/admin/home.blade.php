@include('dashboard.admin.header')

@include('dashboard.admin.sidebar')
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @if (Auth::guard('admin')->user()->role == null)
      <h4>Please for Approval</h4>

      @elseif(Auth::guard('admin')->user()->role == 'suspend')
    
      <h4>You have been suspended </h4>

      @elseif(Auth::guard('admin')->user()->role == 'admin')
      
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Free Training</span>
                <span class="info-box-number">{{ $freetrainingcount }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Blog</span>
                <span class="info-box-number">{{ $countblogs }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jobs</span>
                <span class="info-box-number">{{ $countjobs }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->



           <!-- /.col -->
           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Meetings</span>
                <span class="info-box-number">{{ $countmeet }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

         
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-copy"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Students</span>
                <span class="info-box-number">{{ $countstudent }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
        </div>
        

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- MAP & BOX PANE -->
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Latest Free Training</h3>

                  <div class="card-tools">
                    <span class="badge badge-danger"> Free Training</span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="users-list clearfix">
                    @foreach ($view_trainings as $view_training)
                    <li>
                      <a class="users-list-name" href="{{ url('admin/viewsingledistributor/'.$view_training->ref_no) }}">{{ $view_training->fname }} {{ $view_training->lname }}</a>
                      <span class="users-list-date">{{ $view_training->created_at->diffForHumans() }}</span>
                    </li>
                    @endforeach
                    
                    
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="{{ url('admin/viewfreetrainer') }}">View All Free Students </a>
                </div>
                <!-- /.card-footer -->
              </div>
              <!--/.card -->
            


               <!-- MAP & BOX PANE -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Latest Blog</h3>

                <div class="card-tools">
                  <span class="badge badge-danger"> Blog</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="users-list clearfix">
                  @foreach ($view_blogs as $view_blog)
                  <li>
                    <img src="{{ URL::asset("/public/../$view_blog->images")}}" alt="User Image">
                    <a class="users-list-name" href="{{ url('admin/show/'.$view_blog->slug) }}">{{ $view_blog->fname }} {{ $view_blog->lname }}</a>
                    <span class="users-list-date">{{ $view_blog->created_at->diffForHumans() }}</span>
                  </li>
                  @endforeach
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{ url('admin/viewvendorsadmin') }}">View All Vendors</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!--/.card -->
          



            
            <div class="row">
             

              <div class="col-md-12">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Latest Jobs</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger">Jobs</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      @foreach ($view_jobs as $view_job)
                      <li>
                        <img src="{{ URL::asset("/public/../$view_job->images")}}" alt="User Image">
                        <a class="users-list-name" href="#">{{ $view_job->fname }} {{ $view_job->lname }}</a>
                        <span class="users-list-date">{{ $view_job->created_at->diffForHumans() }}</span>
                      </li>
                      @endforeach
                     
                      
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="{{ url('admin/viewjobs') }}">View All </a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Contact</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Subject</th>
                      <th>Message</th>
                    
                      <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($view_contacts as $view_contact)
                      <tr>
                        <td>{{ $view_contact->name }}</td>
                        <td>{{ $view_contact->email }}</td>
                       
                        <td>
                          <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $view_contact->phone}}</div>
                        </td>
                        <td>{{ $view_contact->subject }}</td>
                        <td>{!! $view_contact->body !!}</td>
                        <td>{{ $view_contact->created_at->format('D m,Y, h:a') }}</td>
                      </tr>
                      @endforeach
                    
                   
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a> --}}
                <a href="{{ url('admin/viewcontacts') }}" class="btn btn-sm btn-secondary float-right">View All </a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            
       

             
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recent Subscribers</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  @foreach ($view_subs as $view_subs)
                  <li class="item">
                    
                    <div class="product-info">
                      <a href="#" class="product-title">
                        <span class="badge badge-warning float-right">{{ $view_subs->email }}</span></a>
                    </div>
                  </li>
                  @endforeach
                  
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{ url('admin/viewproducts') }}" class="uppercase">View All Subcribers</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->



           


          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    @else
      
    @endif
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  

  @include('dashboard.admin.footer')