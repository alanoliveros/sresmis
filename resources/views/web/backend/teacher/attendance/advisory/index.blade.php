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
                            <li class="breadcrumb-item" aria-current="page"><a href="">Attendance</a>
                            </li>
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
                                <div class="col-md-12 col-lg-12 col-xlg-12 mb-3">
                                    <div class="row">
                                        <div class="col-3">
                                            <input type="date" name="date" id="date_val" class="form-control">
                                        </div>
                                        <div class="col-3">
                                            <button class="btn btn-primary rounded-0" id="filter_date_attendance"><i
                                                    class="bi bi-search"></i> Filter</button>
                                        </div>
                                        <div class="col">
                                            <div class="float-end mb-2">

                                                <a id="addAttendance"
                                                    href="{{ url('teacher/create-attendance-by-advisory') }}"
                                                    class="btn btn-light border-dark rounded-0 fw-bold"><i
                                                        class="bi bi-folder-plus"></i> Create</a>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                                <hr>
                                
                                
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
@section('scripts')
@include('web.backend.teacher.attendance.advisory.script')
@endsection
