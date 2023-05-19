@extends('web.backend.layouts.app')
@section('title', 'Teacher | Grade')
<style>
    .table th:first-child {
        color: black;
        font-weight: bold;
    }

    table th:first-child,
    table td:first-child {
        position: sticky;
        left: 0;
        background-color: white;
        max-width: 110px !important;
    }

    .table td {
        white-space: nowrap;
    }

    .table-scrollable {
        overflow-x: auto;
    }

    @media (max-width: 576px) {
        .input-responsive {
            width: 100%;
        }
    }

    table.student-table input {
        width: 100%;
        text-align: right;
        border: none;
        background: transparent;
        padding: 5px;
    }

    .student-table th,
    .student-table td {
        width: 17px !important;
        padding: 0px !important;
    }


    table.student-table {
        /* max-width: 1131px; */
        border: 1px solid #333;
    }

    input[type="radio"] {
        display: none;
    }

    /* The label is what's left to style.
                                                            As long as its 'for' attribute matches the input's 'id', it will maintain the function of a radio button. */
    label {
        padding: .4em;
        display: inline-block;
        border: 1px solid grey;
        cursor: pointer;
    }

    .blank-label {
        display: none;
    }

    /* The '+' is the adjacent sibling selector.
                                                            It selects what ever element comes right after it,
                                                            as long as it is a sibling. */
    input[type="radio"]:checked+label {
        background: #0d6efd;
        color: #fff;
    }
</style>

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>icon here @yield('title')</h1>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-12 col-md-2 gx-1">
                                    <div class="mb-3 p-2">
                                        <select class="form-select school_year_select" name="school_year" id="">
                                            <option selected disabled>Select School Year</option>
                                            @foreach ($sessions as $session)
                                                <option value="{{ $session->school_year }}">{{ $session->school_year }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 gx-1">
                                    <div class="mb-3 p-2">
                                        <select class="form-select subject_select" name="subject_select" id="">
                                            <option selected disabled>Select Subject</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 gx-1">
                                    <div class="mb-3 p-2">
                                        <select class="form-select section_select" name="section_select" id="">
                                            <option value="">Select Section</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="col-12 col-md-2 gx-1">
                                    <div class="mb-3 p-2">
                                        <select class="form-select quarter_select" name="school_year" id="">
                                            @foreach ($quarters as $quarter)
                                                <option {{ $quarter->status == 1 ? 'selected' : 'disabled' }}
                                                    value="{{ $quarter->id }}">{{ $quarter->quarter_name }}
                                                    {{ $quarter->status == 2 ? '--Disabled--' : '' }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}

                                <div class="col-12 col-md-2 gx-1">
                                    <div class="mb-3 p-2">
                                        <button class="btn btn-primary rounded-0" disabled
                                            id="search_button">Search</button>
                                    </div>
                                </div>


                                <div class="col-12 col-md-2 gx-1">
                                    <div class="mb-3 p-2 float-md-end">
                                        <button class="btn btn-primary rounded-0" id="saveButton">Save</button>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12 bg-dark text-light py-2 header_container">

                                </div>

                                <div class="col-12 components">
                                </div>
                                <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                                    <div class="tab-pane fade show active" id="written_works_tab" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <div class="table-responsive written_data_table">

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="performance_tasks_tab" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <div class="table-responsive performance_data_table">

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="quarterly_assessment_tab" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <div class="table-responsive assessment_data_table">
                                            
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="transmuted_grade_tab" role="tabpanel"
                                        aria-labelledby="contact-tab">
                                        <div class="table-responsive transmuted_data_table">
                                        
                                    </div>
                                </div><!-- End Bordered Tabs Justified -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('scripts')
    @include('web.backend.teacher.grading-component.createScript')
@endsection
