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
                                <div class="col-12 col-sm-4 col-md-4">
                                    <div class="mb-3">
                                        <select class="form-select school_year" required
                                            aria-label="select example" name="school_year">
                                            <option selected disabled>Select Year</option>
                                            @foreach ($sessions as $session)
                                                <option value="{{ $session->id }}">{{ $session->school_year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 col-md-4">
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-secondary rounded-0 filter_Sy">Filter</button>
                                    </div>
                                </div>
                                {{-- add student start --}}
                                <div class="col-12 col-sm-4 col-md-4">
                                    <div class="mb-3 addstudent-button">
                                    </div>
                                </div>
                                {{-- add student start --}}
                                <hr>

                                <div class="col-12">
                                    <div class="mb-3 displaystudent-data">
                                        <div class="mb-1">

                                            <a class="btn btn-primary rounded-0" data-bs-toggle="modal"
                                                data-bs-target="#importsf1">Import</a>
                                            @include('web.backend.teacher.school-forms.sf1.import')


                                            <div class="dropdown">
                                                <button class="btn btn-warning rounded-0 fw-bold" data-bs-toggle="dropdown"
                                                     type="button" aria-expanded="false">
                                                    Export
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item exportToExcel" href="{{url('teacher/export-sf1-by-school_year')}}">Excel</a></li>
                                                    <li><a class="dropdown-item" href="{{url('teacher/generate')}}">PDF</a></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <table class="table table-hover" id="studentSF1">
                                            <thead>
                                                <tr>
                                                    <th>Sr.</th>
                                                    <th>LRN</th>
                                                    <th>Student Name</th>
                                                    <th>Gender</th>
                                                    <th>Age</th>
                                                    <th>Birthdate</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sf1data as $key => $val)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $val->lrn }}</td>
                                                        <td>{{ $val->name }}</td>
                                                        <td>{{ $val->gender }}</td>
                                                        <td>{{ $val->age }}</td>
                                                        <td>{{ $val->birthdate }}</td>
                                                        <td>
                                                            <div class="btn-group dropend">
                                                                <button
                                                                    class="btn btn-sm btn-light border-dark rounded-pill fw-bold "
                                                                    data-bs-toggle="dropdown" type="button"
                                                                    aria-expanded="false">
                                                                    <i class="bi bi-three-dots-vertical"></i>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item text-primary" href="#">Edit</a></li>
                                                                    <li><a class="dropdown-item text-danger" id="deleteStudent" href="{{url('teacher/student-delete/'.$val->studentId)}}">Delete</a></li>

                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
@section('scripts')
    @include('web.backend.teacher.school-forms.sf1.script')
@endsection
