@extends('layouts.app')
@section('title', 'SRESMIS | Advisory')
@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                   
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Advisory
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
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white">
                                <i class="mdi mdi-view-dashboard"></i>
                            </h1>
                            <h6 class="text-white">{{$section->sectionName}}</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>


            <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                     
                      <div class="row">
                        <div class="mb-2">
                            <span class="fs-4">Teacher Personal Information</span>
                            <a href="" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addStudent">+ Add student</a>
                            @include('backend.teacher.student-information.add-student')
                        </div>
                        <!-- column -->
                        <table id="adminTeacherUser" class="table table-dark table-hover">
                            <thead>
                                <tr class="fs-5">
                                  <th scope="col" class="text-success">#</th>
                                  <th scope="col" class="text-success">Full name</th>
                                  <th scope="col" class="text-success">Designation</th>
                                  <th scope="col" class="text-success">Grade Level Taught</th>
                                  <th scope="col" class="text-success">Section Assigned</th>
                                  <th scope="col" class="text-success">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                 
                           
                              
                        </table>
                        <!-- column -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
@endsection
