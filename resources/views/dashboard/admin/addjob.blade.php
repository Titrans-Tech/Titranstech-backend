@include('dashboard.admin.header')

@include('dashboard.admin.sidebar')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Jobs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Jobs</li>
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
                <h3 class="card-title">Add Jobs</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('admin/job/store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  {{-- @method('PUT') --}}
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
                        <label for="">Title</label>
                        <input name="title" type="text" @error('title') is-invalid @enderror"
                        value="{{ old('title') }}" class="form-control" id="" placeholder="Title">
                    </div>
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror


                    <div class="form-group">
                      <label for="">Company</label>
                      <input name="company" type="text" @error('company') is-invalid @enderror"
                      value="{{ old('company') }}" class="form-control" id="" placeholder="company">
                  </div>
                  @error('company')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror

                 


                     <!-- /.form-group -->
                     <div class="form-group">
                        <label for="">Image</label>
                        <input required name="images" type="file" @error('images') is-invalid @enderror"
                        value="{{ old('images') }}" class="form-control" id="" placeholder="Price">
                    </div>
                    @error('images')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      
                    

                        <div class="form-group">
                            <label for="">Company Website</label>
                            <input name="company_url" type="url" @error('company_url') is-invalid @enderror"
                            value="{{ old('company_url') }}" class="form-control" id="" placeholder="https://titranstech.co.uk">
                        </div>
                        @error('company_url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    <div class="form-group">
                      <label for="">Message</label>
                      <textarea class="textarea" name="body" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                      {{-- <textarea name="body" cols="10" rows="10" @error('body') is-invalid @enderror"
                      value="{{ old('body') }}" class="form-control"></textarea> --}}
                  </div>
                  @error('body')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                     
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
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