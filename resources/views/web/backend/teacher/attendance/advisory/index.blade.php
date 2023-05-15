@extends('web.backend.layouts.app')
@section('title', 'Teacher | Class Attendance')
@section('content')
    <main id="main" class="main">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h5 class="page-title my-2"><i class="bi bi-person-lines-fill"></i> @yield('title')</h5>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark"><i
                                        class="bi bi-house-door"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="">Advisory</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <div class="row my-3">
                                <div class="col-md-12 col-lg-12 col-xlg-12">
                                    <a id="addAttendance" href="{{ url('teacher/create-attendance-by-advisory') }}"
                                        class="btn btn-light fw-bold"><i class="mdi mdi-plus fw-bold"></i>Add</a>

                                    <table id="studentAttendance" class="table table-hover" style="width:100%">
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
                                                            <a class="dropbtn"><i
                                                                    class=" fs-4 mdi mdi-dots-vertical"></i></a>
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

                            <div class="students_table">

                            </div>
                        </div>
                    </div>
                </div><!-- End Recent Sales -->
            </div>
        </section>
    </main>
@endsection
