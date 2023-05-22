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
                                <div class="col-4 gx-1">
                                    <div class="mb-3 p-2">
                                        <select class="form-select student_select" name="student_select" id="">
                                            <option value="">Select Student</option>
                                           
                                        </select>
                                    </div>
                                </div>
                             
                              
                                <div class="col gx-1">
                                    <div class="mb-3 p-2 float-md-end">
                                        <a href="" class="btn btn-light border-dark rounded-0" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Create</a>

                                        @include('web.backend.teacher.report-card.create-card')
                                  
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12 text-center">

                                    <h5 class="card-title fs-4">Report on Learning Progress and Achievement</h5>
                                    <div class="text-start print_button">
                                       
                                    </div>
                                    <!-- Bordered Tabs Justified -->
                                  
                                    <div class="col-12 mt-2">
                                        <div class="row mb-2">
                                            <div class="col-6 text-start">
                                                <span class=""><b>Name:</b> <u class="studentName fw-bold fs-5"></u></span>
                                            </div>
                                            <div class="col-6 text-end">
                                                <span><b>LRN:</b> <u class="studentLRN fw-bold fs-5"></u></span>
                                            </div>
                                        </div>
                                        <div class="table table-responsive mb-3">
                                            <table class="table table-bordered border-dark">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="3">Learning Areas </th>
                                                    </tr>
                                                    <tr class="text-center">
                                                        <th colspan="4">Quarter</th>
                                                    </tr>
                                                    <tr class="text-center">
                                                        <th>1</th>
                                                        <th>2</th>
                                                        <th>3</th>
                                                        <th>4</th>
                                                        <th class="text-center">Final Rating</th>
                                                        <th class="text-center">Remarks</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="summary_grade_tbody">
                                                    
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <div>
                                            
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
@include('web.backend.teacher.report-card.script')
@endsection

