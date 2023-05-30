@extends('web.backend.layouts.app')
@section('title', 'Teacher | Advisory')
@section('content')
    <main id="main" class="main">

        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h5 class="page-title my-2"><i class="bi bi-person-lines-fill"></i> Advisory</h5>
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
                                        <select class="form-select school_year_by_advisory" required
                                            aria-label="select example" name="school_year">
                                            <option selected disabled>Select Year</option>
                                            @foreach ($sessions as $key => $session)
                                                <option value="{{ $session->school_year }}">
                                                    {{ $session->school_year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 col-md-2 float-md-end">
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-secondary rounded-0 filter_student">Pull data</button>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <a href="" class="btn btn-warning rounded-0" data-bs-toggle="modal" data-bs-target="#import-student-advisory">Import</a>
                                        @include('web.backend.teacher.students.admission-advisory.import')

                                        <a href="" class="float-md-end btn btn-light rounded-0 border-dark"
                                            data-bs-toggle="modal" data-bs-target="#addstudent_click">+ Add student</a>
                                        @include('web.backend.teacher.students.admission-advisory.add-student')
                                    </div>
                                </div>

                            </div>

                            <div class="students_table">
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-center">
                                            <img style="width: 100px" src="{{ asset('storage/image/empty_box.png') }}">
                                            <p class="text-danger">No data found</p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('web.backend.teacher.students.admission-advisory.edit') 

@endsection
@section('scripts')
    @include('web.backend.teacher.students.admission-advisory.script')
@endsection
