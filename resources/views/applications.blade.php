<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Titrans Technology </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title" style="color: #fff; font-weight: bold">Employment Application Form</h3>
                </div>
              
                <form action="{{ url('admin/store') }}" method="post" enctype="multipart/form-data">
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
                        
                        <label for="">Personal Information</label>
                        <div class="form-group">
                          <label for="">Full Name</label>
                          <input name="fullname" type="text" @error('fullname') is-invalid @enderror"
                          value="{{ old('fullname') }}" class="form-control" id="" placeholder="fullname">
                      </div>
                      @error('fullname')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
  
  
                      <div class="form-group">
                        <label for="">Email</label>
                        <input name="email" type="text" @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" class="form-control" id="" placeholder="email">
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
  
                    <div class="form-group">
                        <label for="">Zip</label>
                        <input name="zip" type="text" @error('zip') is-invalid @enderror"
                        value="{{ old('zip') }}" class="form-control" id="" placeholder="zip">
                    </div>
                    @error('zip')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="">Phone</label>
                        <input name="phone" type="text" @error('phone') is-invalid @enderror"
                        value="{{ old('phone') }}" class="form-control" id="" placeholder="phone">
                    </div>
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                      <label for="">Address</label>
                      <input name="address" type="text" @error('address') is-invalid @enderror"
                      value="{{ old('address') }}" class="form-control" id="" placeholder="address">
                  </div>
                  @error('address')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror

                  <div class="form-group">
                      <label for="">City</label>
                      <input name="city" type="text" @error('city') is-invalid @enderror"
                      value="{{ old('city') }}" class="form-control" id="" placeholder="city">
                  </div>
                  @error('city')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror


                  <div class="form-group">
                      <label for="">State</label>
                      <input name="state" type="text" @error('state') is-invalid @enderror"
                      value="{{ old('state') }}" class="form-control" id="" placeholder="state">
                  </div>
                  @error('state')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror

                  <label for="">Work Experience</label>

                  <div class="form-group">
                    <label for="">Company Name</label>
                    <input name="company" type="text" @error('company') is-invalid @enderror"
                    value="{{ old('company') }}" class="form-control" id="" placeholder="Company Name">
                </div>
                @error('company')
                    <span class="text-danger">{{ $message }}</span>
                @enderror


                <div class="form-group">
                    <label for="">Position Held</label>
                    <input name="position_held" type="text" @error('position_held') is-invalid @enderror"
                    value="{{ old('position_held') }}" class="form-control" id="" placeholder="Position Held">
                </div>
                @error('position_held')
                    <span class="text-danger">{{ $message }}</span>
                @enderror


                <div class="form-group">
                    <label for="">Employment Date</label>
                    <input name="job_start_date" type="text" @error('job_start_date') is-invalid @enderror"
                    value="{{ old('job_start_date') }}" class="form-control" id="" placeholder="Employment Date">
                </div>
                @error('job_start_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror


               

              <div class="form-group">
                <label for="">Responsilities</label>
                <textarea class="textarea" name="job_description" placeholder="Place some text here"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
            @error('job_description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
                      

             <label for="">Work Experience 3</label>
                        
                        <div class="form-group">
                            <label for="">Company Name</label>
                            <input name="company3" type="text" @error('company3') is-invalid @enderror"
                            value="{{ old('company3') }}" class="form-control" id="" placeholder="Company Name">
                        </div>
                        @error('company3')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="form-group">
                            <label for="">Position Held</label>
                            <input name="position_held3" type="text" @error('position_held3') is-invalid @enderror"
                            value="{{ old('position_held3') }}" class="form-control" id="" placeholder="Position Held">
                        </div>
                        @error('position_held3')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="form-group">
                            <label for="">Employment Date</label>
                            <input name="job_start_date3" type="text" @error('job_start_date3') is-invalid @enderror"
                            value="{{ old('job_start_date3') }}" class="form-control" id="" placeholder="Employment Date">
                        </div>
                        @error('job_start_date3')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                      <div class="form-group">
                        <label for="">Responsilities</label>
                        <textarea class="textarea" name="job_description3" placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                    @error('job_description3')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                        <!-- /.form-group -->

                        <label for="">5 Top most Relevance Skills</label>
                        
                        <div class="form-group">
                            <label for="">Hard Skills 1</label>
                            <input name="hard_skill1" type="text" @error('hard_skill1') is-invalid @enderror"
                            value="{{ old('hard_skill1') }}" class="form-control" id="" placeholder="Hard Skill 1">
                        </div>
                        @error('hard_skill1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="form-group">
                            <label for="">Hard Skill 2</label>
                            <input name="hard_skill2" type="text" @error('hard_skill2') is-invalid @enderror"
                            value="{{ old('hard_skill2') }}" class="form-control" id="" placeholder="Hard Skill 2">
                        </div>
                        @error('hard_skill2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label for="">Hard Skill 3</label>
                            <input name="hard_skill3" type="text" @error('hard_skill3') is-invalid @enderror"
                            value="{{ old('hard_skill3') }}" class="form-control" id="" placeholder="Hard Skill 3">
                        </div>
                        @error('hard_skill3')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="form-group">
                            <label for="">Hard Skill 4</label>
                            <input name="hard_skill4" type="text" @error('hard_skill4') is-invalid @enderror"
                            value="{{ old('hard_skill4') }}" class="form-control" id="" placeholder="Hard Skill 4">
                        </div>
                        @error('hard_skill4')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label for="">Hard Skill 5</label>
                            <input name="hard_skill5" type="text" @error('hard_skill5') is-invalid @enderror"
                            value="{{ old('hard_skill5') }}" class="form-control" id="" placeholder="Hard Skill 5">
                        </div>
                        @error('hard_skill5')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                       
                        <div class="form-group">
                            <label for="">Bank Name</label>
                            <input name="bank_name" type="text" @error('bank_name') is-invalid @enderror"
                            value="{{ old('bank_name') }}" class="form-control" id="" placeholder="Bank Name">
                        </div>
                        @error('bank_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="form-group">
                            <label for="">Bank Account Number</label>
                            <input name="bank_account_number" type="text" @error('bank_account_number') is-invalid @enderror"
                            value="{{ old('bank_account_number') }}" class="form-control" id="" placeholder="Bank Account Number">
                        </div>
                        @error('bank_account_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="form-group">
                            <label for="">IFSC Code</label>
                            <input name="ifsc_code" type="text" @error('ifsc_code') is-invalid @enderror"
                            value="{{ old('ifsc_code') }}" class="form-control" id="" placeholder="IFSC Code">
                        </div>
                        @error('ifsc_code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="form-group">
                            <label for="">Bank Branch</label>
                            <input name="bank_branch" type="text" @error('bank_branch') is-invalid @enderror"
                            value="{{ old('bank_branch') }}" class="form-control" id="" placeholder="Bank Branch">
                        </div>
                        @error('bank_branch')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="form-group">
                            <label for="">Bank Account Name</label>
                            <input name="bank_account_name" type="text" @error('bank_account_name') is-invalid @enderror"
                            value="{{ old('bank_account_name') }}" class="form-control" id="" placeholder="Bank Account Name">
                        </div>
                        @error('bank_account_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="form-group">
                            <label for="">Bank Type</label>
                            <select required name="bank_type" @error('bank_type') is-invalid @enderror"
                                value="{{ old('bank_type') }}" class="form-control">
                                <option value="">Select Bank Type</option>
                                <option value="savings">Savings</option>
                                <option value="current">Current</option>
                                <option value="fixed">Fixed</option>
                            </select>
                        </div>
                        @error('bank_type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                        

                </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <label for="">Position Information</label>
                        <div class="form-group">
                            <label for="">Position Applied For</label>
                            <input name="position_applied" type="text" @error('position_applied') is-invalid @enderror"
                            value="{{ old('position_applied') }}" class="form-control" id="" placeholder="Position Applied For">
                        </div>
                        @error('position_applied')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="form-group">
                            <label for="">Prefered Start Date</label>
                            <input name="start_date" type="text" @error('start_date') is-invalid @enderror"
                            value="{{ old('start_date') }}" class="form-control" id="" placeholder="Prefered Start Date">
                        </div>
                        @error('start_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label for="">Salary Expectation</label>
                            <input name="salary_expectation" type="text" @error('salary_expectation') is-invalid @enderror"
                            value="{{ old('salary_expectation') }}" class="form-control" id="" placeholder="Salary Expectation">
                        </div>
                        @error('salary_expectation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <label for="">Education</label>
                        <div class="form-group">
                            <label for="">Highest Level Academic Education Obtained</label>
                            <input name="education_level" type="text" @error('education_level') is-invalid @enderror"
                            value="{{ old('education_level') }}" class="form-control" id="" placeholder="Highest Level Academic Education Obtained">
                        </div>
                        @error('education_level')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label for="">Please upload a copy of your Highest Academic qualification</label>
                            <input required name="eduction_file" type="file" @error('eduction_file') is-invalid @enderror"
                            value="{{ old('eduction_file') }}" class="form-control" id="" placeholder="Price">
                        </div>
                        @error('eduction_file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        
                        <label for="">Work Experience 2</label>
                        
                        <div class="form-group">
                            <label for="">Company Name</label>
                            <input name="company2" type="text" @error('company2') is-invalid @enderror"
                            value="{{ old('company2') }}" class="form-control" id="" placeholder="Company Name">
                        </div>
                        @error('company2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="form-group">
                            <label for="">Position Held</label>
                            <input name="position_held2" type="text" @error('position_held2') is-invalid @enderror"
                            value="{{ old('position_held2') }}" class="form-control" id="" placeholder="Position Held">
                        </div>
                        @error('position_held2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="form-group">
                            <label for="">Employment Date</label>
                            <input name="job_start_date2" type="text" @error('job_start_date2') is-invalid @enderror"
                            value="{{ old('job_start_date2') }}" class="form-control" id="" placeholder="Employment Date">
                        </div>
                        @error('job_start_date2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                       

                      <div class="form-group">
                        <label for="">Responsilities</label>
                        <textarea class="textarea" name="job_description2" placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                    @error('job_description2')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                        <!-- /.form-group -->

        
                        <label for="">Work Experience 3</label>
                        
                        <div class="form-group">
                            <label for="">Company Name</label>
                            <input name="company3" type="text" @error('company3') is-invalid @enderror"
                            value="{{ old('company3') }}" class="form-control" id="" placeholder="Company Name">
                        </div>
                        @error('company3')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="form-group">
                            <label for="">Position Held</label>
                            <input name="position_held3" type="text" @error('position_held3') is-invalid @enderror"
                            value="{{ old('position_held3') }}" class="form-control" id="" placeholder="Position Held">
                        </div>
                        @error('position_held3')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="form-group">
                            <label for="">Employment Date</label>
                            <input name="job_start_date3" type="text" @error('job_start_date3') is-invalid @enderror"
                            value="{{ old('job_start_date3') }}" class="form-control" id="" placeholder="Employment Date">
                        </div>
                        @error('job_start_date3')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                      <div class="form-group">
                        <label for="">Responsilities</label>
                        <textarea class="textarea" name="job_description3" placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                    @error('job_description3')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                        <!-- /.form-group -->
                        <label for="">Soft Skills</label>
                        <div class="form-group">
                            <label for="">Soft Skills 1 </label>
                            <input name="soft_skill1" type="text" @error('soft_skill1') is-invalid @enderror"
                            value="{{ old('soft_skill1') }}" class="form-control" id="" placeholder="Soft Skills 1">
                        </div>
                        @error('soft_skill1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="form-group">
                            <label for="">Soft Skills 2 </label>
                            <input name="soft_skill2" type="text" @error('soft_skill2') is-invalid @enderror"
                            value="{{ old('soft_skill2') }}" class="form-control" id="" placeholder="Soft Skills 2">
                        </div>
                        @error('soft_skill2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="form-group">
                            <label for="">Soft Skills 3 </label>
                            <input name="soft_skill3" type="text" @error('soft_skill3') is-invalid @enderror"
                            value="{{ old('soft_skill3') }}" class="form-control" id="" placeholder="Soft Skills 3">
                        </div>
                        @error('soft_skill3')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror



                        <div class="form-group">
                            <label for="">Soft Skills 4 </label>
                            <input name="soft_skill4" type="text" @error('soft_skill4') is-invalid @enderror"
                            value="{{ old('soft_skill4') }}" class="form-control" id="" placeholder="Soft Skills 4">
                        </div>
                        @error('soft_skill4')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="form-group">
                            <label for="">Soft Skills 5 </label>
                            <input name="soft_skill5" type="text" @error('soft_skill5') is-invalid @enderror"
                            value="{{ old('soft_skill5') }}" class="form-control" id="" placeholder="Soft Skills 5">
                        </div>
                        @error('soft_skill5')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror



                        <label for="">Additional Information</label>

                        <div class="form-group">
                            <label for="">Are you legally eligible to work in the country? </label>
                            Yes <input name="elegible" type="checkbox">
                            No <input name="elegible1" type="checkbox">
                        </div>

                        <div class="form-group">
                            <label for="">Have you ever been convicted of a felony? </label>
                            Yes <input name="convicted" type="checkbox">
                            No <input name="convicted1" type="checkbox">
                        </div>

                        <div class="form-group">
                            <label for=""> Do you have any physical or mental conditions that may affect your ability to perform the job? </label>
                            Yes <input name="mental_stable" type="checkbox">
                            No <input name="mental_stable1" type="checkbox">
                        </div>

                        <div class="form-group">
                            <label for=""> Do you have a minimum of 3 years experience in the chosen field of application? </label>
                            Yes <input name="job_experience" type="checkbox">
                            No <input name="job_experience1" type="checkbox">
                        </div>
                        <label for="">Proof of Identification</label>
                        <div class="form-group">
                            <label for=""> Upload Proof of Identification</label>
                            <input required name="identification" type="file" @error('identification') is-invalid @enderror"
                            value="{{ old('identification') }}" class="form-control" id="" placeholder="Price">
                        </div>
                        @error('identification')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label for="">  Please upload a copy of your proof of Address</label>
                            <input required name="identification_address" type="file" @error('identification_address') is-invalid @enderror"
                            value="{{ old('identification_address') }}" class="form-control" id="" placeholder="Price">
                        </div>
                        @error('identification_address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="form-group">
                            <label for=""> Signature</label>
                            <input required name="signature" type="file" @error('signature') is-invalid @enderror"
                            value="{{ old('signature') }}" class="form-control" id="" placeholder="Price">
                        </div>
                        @error('signature')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning">Submit</button>
                          </div>
                      </div>
                      <!-- /.col -->
                    </div>
                    
                </form>
              </div>
  
  
  
              
  
            </div>
  
            </div>
  
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>

</body>
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
