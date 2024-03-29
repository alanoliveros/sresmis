@extends('layouts.app')
@section('title', 'SRESMIS | Attendance')
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title mt-2">Attendance</h4>
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
        <div class="container-fluid">
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
                                <div
                                    class="col-12  col-sm-2 col-md-2 mb-1 d-flex justify-content-start  justify-content-md-center">
                                    <a id="addAttendance" href="{{ url('sresmis/teacher/add-attendance-by-advisory') }}"
                                        class="btn btn-light fw-bold"><i class="mdi mdi-plus fw-bold"></i>Add</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xlg-12">
                    <div class="card shadow card_attendance">
                        <div class="box bg-light">
                            <table id="studentAttendance" class="table table-dark table-hover" style="width:100%">
                                <thead>
                                    <tr class="fs-5">
                                        <th scope="col" class="text-success">#</th>
                                        <th scope="col" class="text-success">LRN</th>
                                        <th scope="col" class="text-success">Complete name</th>
                                        <th scope="col" class="text-success">Age</th>
                                        <th scope="col" class="text-success">Birthdate</th>
                                        <th scope="col" class="text-success">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $key => $student)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $student->lrn }}</td>
                                            <td>{{ $student->lastname . ', ' . $student->name . ($student->middlename != null ? ', ' . $student->middlename : '') . ($student->suffix != null ? ', ' . $student->suffix : '') }}
                                            </td>
                                            <td>{{ $student->age }}</td>
                                            <td>{{ date('F d, Y', strtotime($student->birthdate)) }}</td>
                                            <td>
                                                <div class="dropdown" tabindex="1">
                                                    <i class="db2" tabindex="1"></i>
                                                    <a class="dropbtn"><i class=" fs-4 mdi mdi-dots-vertical"></i></a>
                                                    <div class="dropdown-content">
                                                        <a href="#">View</a>
                                                        <a href="#">Edit</a>
                                                        <a href="{{ url('sresmis/teacher/delete-student/' . $student->studentId) }}"
                                                            class="text-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
