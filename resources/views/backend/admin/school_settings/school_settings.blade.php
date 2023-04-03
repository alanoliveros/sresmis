@extends('layouts.app')
@section('content')
<div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">School Settings</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-muted">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('sresmis.admin.school-settings')}}"> School Settings</a>
                     
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Sales Cards  -->
          <!-- ============================================================== -->
          <div class="row">
            <!-- Column -->
            <div class="col-md-12 col-lg-12 col-xlg-12">
              <div class="card card-hover">
                <div class="box bg-cyan">
                   <div class="text-light fs-5">
                   

<!-- form -->
<form class="row g-3 needs-validation" action="{{route('sresmis.admin.school-settings.update')}}" method="POST">
  @csrf
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">School ID</label>
    <input type="hidden" class="form-control" value="{{$school_settings->admin_id}}" name="admin_id">
    <input type="number" class="form-control" value="{{$school_settings->school_id}}" name="school_id">
    
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">School Name</label>
    <input type="text" class="form-control" value="{{$school_settings->school_name}}" name="school_name">
   
  </div>
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">Region</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" value="{{$school_settings->school_region}}" name="school_region">
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">Division</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" value="{{$school_settings->school_division}}" name="school_division">
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">District</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" value="{{$school_settings->school_district}}" name="school_district">
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom05" class="form-label">Zip Code</label>
    <input type="text" class="form-control" value="{{$school_settings->school_zip_code}}" name="school_zip_code">

  </div>

  <div class="col-12">
    <button class="btn btn-light float-end" type="submit"><i class="mdi mdi-pencil"></i>Update</button>
  </div>
</form>
<!-- end form -->





                   </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            
            <!-- Column -->
          </div>
          <!-- ============================================================== -->
        </div>
@endsection
