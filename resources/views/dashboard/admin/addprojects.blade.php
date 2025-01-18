@include('dashboard.admin.header')

@include('dashboard.admin.sidebar')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Project</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Project</li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('admin/createproject') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  {{-- @method('PUT') --}}
                  @if (Session::get('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
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
                        <label for="">Projects name</label>
                        <select name="project_name" class="form-control" >
                            <option value="Environmental/Natural Resources Management">Environmental/Natural Resources Management</option>
                            <option value="Sustainable Agriculture">Sustainable Agriculture</option>
                            <option value="Eco-Tourism">Eco-Tourism</option>
                            <option value="Community Health">Community Health</option>
                            <option value="Renewable Energy">Renewable Energy</option>
                            <option value="Indigenous Resources">Indigenous Resources</option>
                            <option value="Gallery">Gallery</option>
                        </select>
                    </div>
                    @error('projects_name')
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
  @include('dashboard.admin.footer')