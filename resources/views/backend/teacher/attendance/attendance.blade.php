@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Attendance</h4>
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Attendance
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
                    <div class="card shadow card_attendance">
                        <div class="box bg-cyan">
                            <h4 class="text-white">Pick Dates</h4>
                           <div class="row">
                            <div class="col-8  col-sm-6 col-md-8 mb-1">
                            <input type="date" class="form-control">
                            </div>
                            <div class="col-4  col-sm-4 col-md-2 mb-1">
                            <a href="" class="btn btn-light  fw-bold">Filter</a>
                            </div>
                            <div class="col-12  col-sm-2 col-md-2 mb-1 d-flex justify-content-start  justify-content-md-center">
                           <a id="addAttendance" data-bs-toggle="modal" data-bs-target="#add_attendance" class="btn btn-light fw-bold"><i class="mdi mdi-plus fw-bold"></i>Add</a>

                            @include('backend.teacher.attendance.add-attendance')











                            </div>
                           </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
@endsection
