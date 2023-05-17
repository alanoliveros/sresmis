@extends('web.backend.layouts.app')
@section('title', 'Teacher | Attendance | Advisory')
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
                                <div class="container-fluid">
                                    <form action="{{ route('teacher.save-attendance.advisory') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 col-xlg-12">
                                                <div class="mb-3">
                                                    <label for="validationCustom01" class="form-label text-dark fs-5">Select
                                                        School
                                                        Year</label>
                                                    <select name="school_year" id="" class="form-select">
                                                        @foreach ($schoolYear as $key => $year)
                                                            <option value="{{ $year->school_year }}"
                                                                {{ $key == 0 ? 'selected' : '' }}>
                                                                {{ $year->school_year }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="mb-3">
                                                    <label for="validationCustom01"
                                                        class="form-label text-dark fs-5">Date</label>
                                                    <input type="date" class="form-control" value="{{ date('Y-m-d') }}"
                                                        name="attendance_date">
                                                </div>


                                            </div>
                                        </div>

                                        <div class="row row-cols-1 row-cols-md-12 g-4 mb-2">
                                            <div class="col-12 text-center">
                                                <button type="button"
                                                    class="btn btn-success text-light rounded-0 mx-2 mb-1 present_all">Present
                                                    All</button>
                                                <button type="button"
                                                    class="btn btn-danger text-light rounded-0 mx-2 mb-1 absent_all">Absent
                                                    All</button>
                                                <button type="submit"
                                                    class="btn btn-light border-dark text-dark rounded-0 mx-2 mb-1 float-end">Save</button>

                                            </div>
                                            <div class="col-12 text-center">
                                                <span class="border border-dark mx-2 p-2">Total Student: <small
                                                        class="all_student text-danger fw-bold fs-4"></small></span>
                                                <span class="border border-dark mx-2 p-2">Total Male: <small
                                                        class="total_male_count text-danger fw-bold fs-4"></small></span>
                                                <span class="border border-dark mx-2 p-2">Total Female: <small
                                                        class="total_female_count text-danger fw-bold fs-4"></small></span>
                                                <span class="border border-dark mx-2 p-2 bg-success text-light">Total
                                                    Present: <small
                                                        class="total_present text-light fw-bold fs-4"></small></span>
                                                <span class="border border-dark mx-2 p-2 text-light bg-danger">Total Absent:
                                                    <small class="total_absent text-light fw-bold fs-4"></small></span>

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-12 d-flex no-block align-items-center justify-content-center">

                                            <h4 class="page-title mt-2 fs-3">
                                                {{-- {{ strtoupper($sectionName->gradeLevelName) . ' - ' . strtoupper($sectionName->sectionName) }}
                                                <input type="hidden" value="{{ $sectionName->sectionId }}"
                                                    name="sectionId">
                                                <input type="hidden" value="{{ $sectionName->gradeLevelId }}"
                                                    name="gradeLevelId"> --}}
                                            </h4>
                                        </div>
                                        <div>
                                            <span class="fs-4 fw-bold" style="color:blue;"> <i
                                                    class="mdi mdi-gender-male"></i>Male</span>
                                        </div>
                                        {{-- for female --}}
                                        <div class="row row-cols-1 row-cols-md-4 g-4">
                                            @php
                                                // Initialize counters for male and female students
                                                $maleCount = 0;
                                            @endphp
                                            {{-- @foreach ($students as $key => $student)
                                                @if ($student->gender == 'Male' && $student->status == 1)
                                                    @php
                                                        // Increment the male counter
                                                        $maleCount++;
                                                    @endphp
                                                    <div class="col">
                                                        <div class="card card-inverse card-info h-100">
                                                            @if ($student->image == 'avatar.png')
                                                                <img src="{{ asset('storage/student_img/boy.png') }}"
                                                                    class="card-img-top w-50 p-1 m-auto rounded-pill"
                                                                    alt="" />
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
                                                                        class="attendance_status_present" checked
                                                                        value="Present" />
                                                                    <span>P</span>
                                                                </label>
                                                                <br />
                                                                <label>
                                                                    <input type="radio"
                                                                        name="status_student_attendance_male[{{ $student->studentId }}]"
                                                                        class="attendance_status_absent" value="Absent" />
                                                                    <span>A</span>
                                                                </label>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach --}}
                                        </div>
                                        <div class="mt-3">
                                            <span class="fs-4 fw-bold" style="color:palevioletred"> <i
                                                    class="mdi mdi-gender-female"></i>Female</span>
                                        </div>

                                        {{-- for female --}}
                                        <div class="row row-cols-1 row-cols-md-4 g-4">
                                            @php
                                                // Initialize counters for male and female students
                                                $femaleCount = 0;
                                            @endphp
                                            {{-- @foreach ($students as $key => $student)
                                                @if ($student->gender == 'Female' && $student->status == 1)
                                                    @php
                                                        // Increment the female counter
                                                        $femaleCount++;
                                                    @endphp
                                                    <div class="col">
                                                        <div class="card card-inverse card-info h-100">
                                                            @if ($student->image == 'avatar.png')
                                                                <img src="{{ asset('storage/student_img/girl.png') }}"
                                                                    class="card-img-top w-50 p-1 m-auto rounded-pill"
                                                                    alt="" />
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
                                                                        class="attendance_status_present" checked
                                                                        value="Present" />
                                                                    <span>P</span>
                                                                </label>
                                                                <br />
                                                                <label>
                                                                    <input type="radio"
                                                                        name="status_student_attendance_female[{{ $student->studentId }}]"
                                                                        class="attendance_status_absent" value="Absent" />
                                                                    <span>A</span>
                                                                </label>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach --}}
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="mt-3">
                                <small class="total_male text-primary" data-total="{{ $maleCount }}"></small>
                                <small class="total_female text-danger" data-total="{{ $femaleCount }}"></small>
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
    @include('web.backend.teacher.attendance.advisory.add-attendance-script')
@endsection
