@extends('web.backend.layouts.app')
@section('title', 'Teacher | Subject')
@section('content')
    <main id="main" class="main">

        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h5 class="page-title my-2"><i class="bi bi-person-lines-fill"></i> Subject</h5>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark"><i
                                        class="bi bi-house-door"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="">Subject</a>
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
                            <div class="row my-3 ">
                                <div class="col-12 col-md-2">
                                    <div class="mb-3">
                                        <select class="form-select select_sy" required aria-label="select example"
                                            name="school_year">
                                            <option selected disabled>Select School Year</option>
                                            @foreach ($sessions as $key => $session)
                                                <option value="{{ $session->school_year }}">
                                                    {{ $session->school_year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="mb-3">
                                        <select class="form-select school_year_by_subject" required
                                            aria-label="select example" name="school_year">
                                            <option selected disabled>Select Subject</option>
                                            @foreach ($subjects as $key => $subject)
                                                <option value="{{ $subject->id }}">
                                                    {{ $subject->subjectName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="mb-3">
                                        <select class="form-select school_year_by_section" required
                                            aria-label="select example" name="school_year">
                                            <option selected disabled>Select Section</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="mb-3">
                                        <button type="button" disabled
                                            class="btn btn-secondary rounded-0 filter_by">Filter</button>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="mb-3">
                                        <a href="" class="float-md-end btn btn-light rounded-0 border-dark"
                                            data-bs-toggle="modal" data-bs-target="#addstudent_click">+ Add student</a>
                                        {{-- @include('web.backend.teacher.students.admission-advisory.add-student') --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Recent Sales -->

            </div>
        </section>
    </main>
@endsection
@section('scripts')
@include('web.backend.teacher.students.admission-subject.script')
@endsection
