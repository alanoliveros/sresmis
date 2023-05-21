@extends('web.backend.layouts.app')
@section('title', 'Teacher | SF1')
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
                                <div class="col-12 col-sm-4 col-md-3">
                                    <div class="mb-3">
                                        <select class="form-select school_year" required aria-label="select example"
                                            name="school_year">
                                            @foreach ($sessions as $key => $session)
                                                <option {{ $key == 0 ? 'selected' : '' }}
                                                    value="{{ $session->school_year }}">
                                                    {{ $session->school_year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 col-md-3">
                                    <div class="mb-3">
                                        <select class="form-select select_student_by" required aria-label="select example"
                                            name="school_year">
                                            {{-- @foreach ($students as $student)
                                                <option value="">{{$student->name}}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>

                                {{-- add student start --}}
                                <div class="col-12 col-sm-4 col-md-6">
                                    <div class="mb-3 addstudent-button">
                                        <a href="" class="btn btn-primary rounded-0 float-md-end"><i
                                                class="bi bi-folder-plus"></i> Create</a>

                                        {{-- @include('web.backend.teacher.quarterly-grade.advisory.create') --}}

                                    </div>
                                </div>
                                {{-- add student start --}}
                                <hr>

                                <div class="here">
                                    <div class="modal fade" id="studentModal" tabindex="-1"
                                        aria-labelledby="studentModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="studentModalLabel">Student Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="studentData"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3 displaystudent-data">
                                        <table class="table table-hover" id="studentSF1">
                                            <thead>
                                                <tr>
                                                    <th>Learning Areas</th>
                                                    <th>Q1</th>
                                                    <th>Q2</th>
                                                    <th>Q3</th>
                                                    <th>Q4</th>
                                                    <th>Final Grades</th>
                                                    <th>Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody class="tbody_data">

                                            </tbody>
                                        </table>
                                    </div>
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
{{-- @section('scripts')
    @include('web.backend.teacher.quarterly-grade.advisory.script')
@endsection --}}
