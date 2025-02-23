@include('dashboard.admin.header')

@include('dashboard.admin.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">DataTable with default features</h3> --}}
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Title</th>
                    <th>Duration</th>
                    <th>Amount</th>
                    <th>Images</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if (Session::get('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
                  @endif

                  @if (Session::get('fail'))
                  <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                  @endif
                  @foreach ($view_courses as $view_course)
                    <tr>
                        
                        <td>{{ $view_course->title }}</td>
                        <td>{{ $view_course->duration }}</td>
                        <td>NGN {{ $view_course->amount }}</td>
                        <td><img style="width: auto; height: 30px;" src="{{ URL::asset("/public/../$view_course->images")}}" alt=""></td>
                       <td><a href="{{ url('admin/course/show/'.$view_course->slug) }}"
                        class='btn btn-success'>
                         <i class="far fa-eye"></i>
                     </a></td>
                     <td><a href="{{ url('admin/editcourse/'.$view_course->slug) }}"
                      class='btn btn-warning'>
                       <i class="far fa-edit"></i>
                   </a></td>

                       <td><a href="{{ url('admin/deletecourse/'.$view_course->id) }}"
                        class='btn btn-danger'>
                         <i class="far fa-trash-alt"></i>
                     </a></td>
                     <td>@if ($view_course->status == null)
                      <span class="badge badge-warning">Not Approved</span>
                        @elseif ($view_course->status == 'approved')
                            <span class="badge badge-success">Approved</span>
                        @else
                            <span class="badge badge-danger">Suspended</span> 
                        @endif </td>
                     <td> <div class="input-group input-group-lg mb-3">
                      <div class="input-group-prepend">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                          Action
                        </button>
                        <ul class="dropdown-menu">
                          <li class="dropdown-item"><a href="{{ url('admin/approvedcourse/'.$view_course->id) }}">Approved</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/susendcourse/'.$view_course->id) }}">Suspend</a></li>
                          
                        </ul>
                      </div>
                      <!-- /btn-group --></td>
                     <td>{{ $view_course->created_at->format('D d, M Y, H:i')}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Title</th>
                        <th>Duration</th>
                        <th>Amount</th>
                        <th>Images</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Date</th>
                      </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 
</div>
<!-- ./wrapper -->

@include('dashboard.admin.footer')
<!-- <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> -->
