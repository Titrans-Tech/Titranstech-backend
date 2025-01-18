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
                <span class="info-box-number">4</span>
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
                <span class="info-box-number">2</span>
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
                <span class="info-box-number">0</span>
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
                      <img src="{{ URL::asset("/public/../$view_training->images")}}" alt="User Image">
                      <a class="users-list-name" href="{{ url('admin/viewsingledistributor/'.$view_training->ref_no) }}">{{ $view_training->fname }} {{ $view_training->lname }}</a>
                      <span class="users-list-date">{{ $view_training->created_at->diffForHumans() }}</span>
                    </li>
                    @endforeach
                    
                    
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="{{ url('admin/viewdistributorsadmin') }}">View All Distributors</a>
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
                    <a class="users-list-name" href="{{ url('admin/viewsingledistributor/'.$view_blog->ref_no) }}">{{ $view_blog->fname }} {{ $view_blog->lname }}</a>
                    <span class="users-list-date">{{ $view_blog->created_at->diffForHumans() }}</span>
                  </li>
                  @endforeach
                  
                  
                </ul>
                <!-- /.users-list -->
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
                    <h3 class="card-title">Latest Teams</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger">Teams</span>
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
                        <a class="users-list-name" href="#">{{ $view_blog->fname }} {{ $view_blog->lname }}</a>
                        <span class="users-list-date">{{ $view_blog->created_at->diffForHumans() }}</span>
                      </li>
                      @endforeach
                     
                      
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="{{ url('admin/viewteam') }}">View All Teams</a>
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
                <h3 class="card-title">Latest Orders</h3>

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
                      <th>Order ID</th>
                      <th>Item</th>
                      <th>Qty</th>
                      <th>Payment Status</th>
                      <th>Amount</th>
                      <th>Product Status</th>
                      <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($view_blogs as $view_blog)
                      <tr>
                        <td><a href="{{ url('admin/viewsingleorderadmin/'.$view_blog->ref_no) }}">{{ $view_blog->ref_no }}</a></td>
                        <td>{{ $view_blog->productname }}</td>
                        <td>{{ $view_blog->quantity }}</td>
                        <td>@if ($view_blog->status == 'success')
                          <span class="badge badge-success">Success</span>
                        
                          @elseif ($view_blog->status == 'pending')
                          <span class="badge badge-warning">Payment Pending</span>
                          @else
                          
                        @endif</td>
                        <td>
                          <div class="sparkbar" data-color="#00a65a" data-height="20">₦ {{ $view_blog->amount}}</div>
                        </td>
                        <td>@if ($view_blog->productstatus == null)
                          <span class="badge badge-info">Pending</span>
                        
                          @elseif ($view_blog->productstatus == 'received')
                          <span class="badge badge-success">Received</span>
                          @else
                          <span class="badge badge-dark">Delivered</span>
                        @endif</td>
                        <td>{{ $view_blog->created_at->format('D m,Y, h:a') }}</td>
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
                <a href="{{ url('admin/vieworders') }}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Unpaid Products</span>
                <span class="info-box-number">4</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Paid Products</span>
                <span class="info-box-number">9</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Registration Failed</span>
                <span class="info-box-number">4</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="far fa-comment"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Testimony</span>
                <span class="info-box-number">3</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Withdrawals</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Simon Udo</td>
                        <td>N5000</td>
                        <td>Success</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-white p-0">
                
                </ul>
              </div>
              <!-- /.footer -->
            </div>
            <!-- /.card -->

            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recently Added Products</h3>

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
                  @foreach ($view_blogs as $view_blog)
                  <li class="item">
                    <div class="product-img">
                      <img src="{{ URL::asset("/public/../$view_blog->images1")}}" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="{{ url('admin/viewsingleproduct/'.$view_blog->ref_no) }}" class="product-title">{{ $view_blog->title }}
                        <span class="badge badge-warning float-right">N {{ $view_blog->amount }}</span></a>
                      <span class="product-description">
                        <b style="color: red">{{ $view_blog->title }}</b> {{ $view_blog->title }}
                      </span>
                    </div>
                  </li>
                  @endforeach
                  
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{ url('admin/viewproducts') }}" class="uppercase">View All Products</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->



            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recently Added Adverts</h3>

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
                  @foreach ($view_blogs as $view_advert)
                  <li class="item">
                    <div class="product-img">
                      <img src="{{ URL::asset("/public/../$view_advert->images1")}}" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="{{ url('admin/viewsingleadverts/'.$view_advert->ref_no) }}" class="product-title">{{ $view_advert->company_name }}
                        <span class="badge badge-warning float-right"> {{ $view_advert->title }}</span></a>
                      <span class="product-description">
                        <b style="color: red">{{ $view_advert->phone }}</b> {{ $view_advert->email }}
                      </span>
                    </div>
                  </li>
                  @endforeach
                  
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{ url('admin/viewadvertments') }}" class="uppercase">View All Adverts</a>
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
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  

  @include('dashboard.admin.footer')