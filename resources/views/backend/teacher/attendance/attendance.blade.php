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
    </div>


    @extends('layouts.app')
@section('title', 'SRESMIS | Add Attendance')
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">

        </div>

        <div class="container-fluid">
            <form action="{{ url('sresmis/teacher/submit-attendance/advisory') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xlg-12">
                        <div class="card shadow card_attendance">
                            <div class="box bg-cyan">

                                <div class="row g-3">
                                    <div class="col-12 col-md-4">
                                        <label for="validationCustom01" class="form-label text-light fs-5">Select School
                                            Year</label>
                                        <select name="school_year" id="" class="form-select">
                                            @foreach ($schoolYear as $key => $year)
                                                <option value="{{ $year->id }}" {{ $key == 0 ? 'selected' : '' }}>
                                                    {{ $year->school_year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="validationCustom01" class="form-label text-light fs-5">Date</label>
                                        <input type="date" class="form-control" value="{{ date('Y-m-d') }}"
                                            name="attendance_date">
                                    </div>
                                    <div class="col-12 col-md-4 d-flex justify-content-end align-items-end">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-12 g-4 mb-2">
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-success text-light rounded-0 mx-2 mb-1 present_all">Present
                            All</button>
                        <button type="button" class="btn btn-danger text-light rounded-0 mx-2 mb-1 absent_all">Absent
                            All</button>
                    </div>
                </div>
                <hr>
                <div class="col-12 d-flex no-block align-items-center justify-content-center">
                    <h4 class="page-title mt-2 fs-3">
                        {{ strtoupper($sectionName->gradeLevelName) . ' - ' . strtoupper($sectionName->sectionName) }}</h4>
                </div>
                <div>
                    <span class="fs-4 fw-bold" style="color:blue;"> <i class="mdi mdi-gender-male"></i>Male</span>
                </div>

                <div class="row row-cols-1 row-cols-md-4 g-4">

                    @foreach ($students as $key => $student)
                        @if ($student->gender == 'Male' && $student->status == 1)
                            <div class="col">
                                <div class="card card-inverse card-info h-100">
                                    @if ($student->image == 'avatar.png')
                                        <img src="{{ asset('storage/student_img/boy.png') }}"
                                            class="card-img-top w-50 p-1 m-auto rounded-pill" alt="" />
                                    @else
                                        <img src="{{ asset('storage/student_img/' . $student->image) }}"
                                            class="card-img-top w-50 p-1 m-auto" alt="" />
                                    @endif
                                    <div class="card-header text-center">
                                        <span
                                            class="fs-5 fw-bold">{{ $student->lastname . ', ' . $student->name . ($student->middlename != null ? ', ' . $student->middlename : '') }}</span>
                                    </div>
                                    <div
                                        class="card-body text-center d-flex align-items-end justify-content-center bg-info">
                                        <label>
                                            <input type="radio"
                                                name="status_student_attendance_male[{{ $student->studentId }}]"
                                                class="attendance_status_present" checked value="Present" />
                                            <span>P</span>
                                        </label>
                                        <br />
                                        <label>
                                            <input type="radio"
                                                name="status_student_attendance_male[{{ $student->studentId }}]"
                                                class="attendance_status_absent" value="Absent" />
                                            <span>A</span>
                                        </label>
                                        <label>
                                            <input type="radio"
                                                name="status_student_attendance_male[{{ $student->studentId }}]"
                                                class="attendance_status_tardy" value="Tardy" />
                                            <span>T</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="mt-3">
                    <span class="fs-4 fw-bold" style="color:palevioletred"> <i
                            class="mdi mdi-gender-female"></i>Female</span>
                </div>
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    @foreach ($students as $key => $student)
                        @if ($student->gender == 'Female' && $student->status == 1)
                            <div class="col">
                                <div class="card card-inverse card-info h-100">
                                    @if ($student->image == 'avatar.png')
                                        <img src="{{ asset('storage/student_img/girl.png') }}"
                                            class="card-img-top w-50 p-1 m-auto rounded-pill" alt="" />
                                    @else
                                        <img src="{{ asset('storage/student_img/' . $student->image) }}"
                                            class="card-img-top w-50 p-1 m-auto" alt="" />
                                    @endif
                                    <div class="card-header text-center">
                                        <span
                                            class="fs-5 fw-bold">{{ $student->lastname . ', ' . $student->name . ($student->middlename != null ? ', ' . $student->middlename : '') }}</span>
                                    </div>
                                    <div class="card-body text-center d-flex align-items-end justify-content-center"
                                        style="background-color: palevioletred">
                                        <label>
                                            <input type="radio"
                                                name="status_student_attendance_female[{{ $student->studentId }}]"
                                                class="attendance_status_present" checked value="Present" />
                                            <span>P</span>
                                        </label>
                                        <br />
                                        <label>
                                            <input type="radio"
                                                name="status_student_attendance_female[{{ $student->studentId }}]"
                                                class="attendance_status_absent" value="Absent" />
                                            <span>A</span>
                                        </label>
                                        <label>
                                            <input type="radio"
                                                name="status_student_attendance_female[{{ $student->studentId }}]"
                                                class="attendance_status_tardy" value="Tardy" />
                                            <span>T</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </form>
        </div>
    </div>

@endsection
