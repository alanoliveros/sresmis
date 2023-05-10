@extends('web.backend.layouts.app')
@section('title' , 'Teacher')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->



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































    </main><!-- End #main -->

@endsection
