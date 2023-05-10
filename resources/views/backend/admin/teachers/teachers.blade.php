@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Teachers</h4>
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Teachers
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
                <div class="col-md-6 col-lg-3 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-danger text-center">
                            <h1 class="font-light text-white">
                                <i class="mdi mdi-border-outside"></i>
                            </h1>
                            <h6 class="text-white">All</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->

                <div class="col-md-6 col-lg-3 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white">
                                <i class="mdi mdi-view-dashboard"></i>
                            </h1>
                            <h6 class="text-white">Students</h6>
                        </div>
                    </div>
                </div>

                <!-- Column -->
                <div class="col-md-6 col-lg-3 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white">
                                <i class="mdi mdi-chart-areaspline"></i>
                            </h1>
                            <h6 class="text-white">Teachers</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-3 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-warning text-center">
                            <h1 class="font-light text-white">
                                <i class="mdi mdi-collage"></i>
                            </h1>
                            <h6 class="text-white">Parents</h6>
                        </div>
                    </div>
                </div>


            </div>
            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="mb-2">
                                    <span class="fs-4">Teacher Personal Information</span>
                                    <a href="" class="btn btn-primary float-end" data-bs-toggle="modal"
                                       data-bs-target="#addTeacher">+ Add teacher</a>
                                    @include('backend.admin.teachers.add-teacher')
                                </div>
                                <!-- column -->
                                <table id="adminTeacherUser" class="table table-dark table-hover"
                                ">
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
                                @foreach ($teachers as $key=>$teacher)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$teacher->lastname.', '.($teacher->middlename == NULL? '':$teacher->middlename.', ').$teacher->name.($teacher->suffix == NULL? '':', '.$teacher->suffix)}}</td>
                                        <td>{{$teacher->designation}}</td>
                                        <td>{{$teacher->gradeLevelName}}</td>
                                        <td>{{$teacher->sectionName}}</td>
                                        {{-- <td></td> --}}
                                        <td>
                                            <div class="dropdown" tabindex="1">
                                                <i class="db2" tabindex="1"></i>
                                                <a class="dropbtn"><i class=" fs-4 mdi mdi-dots-vertical"></i></a>
                                                <div class="dropdown-content">
                                                    <a href="#">View</a>
                                                    <a href="#">Edit</a>
                                                    <a href="#" class="text-danger">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>


                                </table>

                                <!-- column -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
