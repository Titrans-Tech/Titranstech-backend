@include('dashboard.admin.header')

@include('dashboard.admin.sidebar')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Student Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Student Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">View Student Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('admin/job/update/'.$view_student->slug) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  @if (Session::get('message'))
                  <div class="alert alert-success">
                      {{ Session::get('message') }}
                  </div>
                  @endif

                  @if (Session::get('fail'))
                  <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                  @endif

                  <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      

                      <div class="form-group">
                        <label for="">first name</label>
                        <input name="fname" type="text" @error('fname') is-invalid @enderror"
                        value="{{ $view_student->fname }}" class="form-control" id="" placeholder="fname">
                    </div>
                    @error('fname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror


                    <div class="form-group">
                      <label for="">Lastname</label>
                      <input name="lname" type="text" @error('lname') is-invalid @enderror"
                      value="{{ $view_student->lname }}" class="form-control" id="" placeholder="lname">
                  </div>
                  @error('lname')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror

                 


                  <div class="form-group">
                    <label for="">DOB</label>
                    <input name="dob" type="text" @error('dob') is-invalid @enderror"
                    value="{{ $view_student->dob }}" class="form-control" id="" placeholder="dob">
                </div>
                @error('dob')
                    <span class="text-danger">{{ $message }}</span>
                @enderror


                <div class="form-group">
                    <label for="">Degree</label>
                    <input name="degree_obtain" type="text" @error('degree_obtain') is-invalid @enderror"
                    value="{{ $view_student->degree_obtain }}" class="form-control" id="" placeholder="degree_obtain">
                </div>
                @error('degree_obtain')
                    <span class="text-danger">{{ $message }}</span>
                @enderror



                <div class="form-group">
                    <label for="">School name</label>
                    <input name="school_name" type="text" @error('school_name') is-invalid @enderror"
                    value="{{ $view_student->school_name }}" class="form-control" id="" placeholder="school_name">
                </div>
                @error('school_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="form-group">
                    <label for="">Year Graduate</label>
                    <input name="year_graduate" type="text" @error('year_graduate') is-invalid @enderror"
                    value="{{ $view_student->year_graduate }}" class="form-control" id="" placeholder="year_graduate">
                </div>
                @error('year_graduate')
                    <span class="text-danger">{{ $message }}</span>
                @enderror


                



                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      
                        <div class="form-group">
                            <label for="">Country</label>
                            <input name="country" type="text" @error('country') is-invalid @enderror"
                            value="{{ $view_student->country }}" class="form-control" id="" placeholder="country">
                        </div>
                        @error('country')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label for="">Course</label>
                            <input name="course" type="url" @error('course') is-invalid @enderror"
                            value="{{ $view_student->course }}" class="form-control" id="" placeholder="https://titranstech.co.uk">
                        </div>
                        @error('course')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label for="">Gender</label>
                            <input name="gender" type="text" @error('gender') is-invalid @enderror"
                            value="{{ $view_student->gender }}" class="form-control" id="" placeholder="gender">
                        </div>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    <div class="form-group">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input name="email" type="text" @error('email') is-invalid @enderror"
                            value="{{ $view_student->email }}" class="form-control" id="" placeholder="email">
                        </div>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                     
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input name="phone" type="text" @error('phone') is-invalid @enderror"
                            value="{{ $view_student->phone }}" class="form-control" id="" placeholder="phone">
                        </div>
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                  </div>
                  {{-- <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div> --}}
              </form>
            </div>



            

          </div>

          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
      <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/dist/js/demo.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
</body>
</html>