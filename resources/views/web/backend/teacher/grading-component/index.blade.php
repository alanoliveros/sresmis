@extends('web.backend.layouts.app')
@section('title', 'Teacher | Grade')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1><i class="bi bi-building-fill-check"></i> @yield('title')</h1>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2 gx-1">
                                    <div class="mb-3 p-2">
                                        <select class="form-select school_year_select" name="school_year" id="">
                                            <option value="">Select School Year</option>
                                            @foreach ($sessions as $session)
                                                <option value="{{ $session->school_year }}">{{ $session->school_year }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2 gx-1">
                                    <div class="mb-3 p-2">
                                        <select class="form-select per_section" name="per_section" id="">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2 gx-1">
                                    <div class="mb-3 p-2">
                                        <select class="form-select per_subject" name="per_subject" id="">
                                            <option selected disabled>Select Subject</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2 gx-1">
                                    <div class="mb-3 p-2">
                                        <button disabled class="btn btn-primary rounded-0 filter_data">Search</button>
                                    </div>
                                </div>
                                <div class="col-3 gx-1">
                                    <div class="mb-3 p-2">
                                        <a href="{{ route('teacher.create-grade.grade-component') }}"
                                            class="btn btn-light border-dark rounded-0">+ Create</a>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12 text-center">

                                    <h5 class="card-title fs-4">Summary of Quarterly Grades</h5>
                                    <div class="text-start print_button">
                                       
                                    </div>
                                    <!-- Bordered Tabs Justified -->
                                  
                                    <div class="col-12 mt-2">
                                        <div class="table table-responsive mb-3">
                                            <table class="table table-bordered border-dark">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="3">Name of Learners</th>
                                                        <th colspan="4" class="text-center">Mother Tounge</th>
                                                    </tr>
                                                    <tr class="text-center">
                                                        <th colspan="4">Quarter</th>
                                                    </tr>
                                                    <tr class="text-center">
                                                        <th>1</th>
                                                        <th>2</th>
                                                        <th>3</th>
                                                        <th>4</th>
                                                        <th class="text-center">Final</th>
                                                        <th class="text-center">Remarks</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="summary_grade_tbody">
                                                  
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="table table-responsive">
                                        <table class="">

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('scripts')
    @include('web.backend.teacher.grading-component.script')
@endsection
