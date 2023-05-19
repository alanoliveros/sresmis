@extends('web.backend.layouts.app')
@section('title', 'Teacher | Grade')
<style>
    .table {
        width: 100%;
        padding-bottom: 1rem;
    }

    .table th:first-child {
        color: black;
        font-weight: bold;
    }

    .table th:first-child,
    .table td:first-child {
        position: sticky;
        left: 0;
        background-color: white;
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
                            <div class="row">
                                <div class="col-3 gx-1">
                                    <div class="mb-3 p-2">
                                        <select class="form-select school_year_select" name="school_year" id="">

                                            @foreach ($sessions as $session)
                                                <option {{ $session->status == 1 ? 'selected' : 'disabled' }}
                                                    value="{{ $session->school_year }}">{{ $session->school_year }}
                                                    {{ $session->status == 2 ? '--Disabled--' : '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3 gx-1">
                                    <div class="mb-3 p-2">
                                        <select class="form-select quarter_select" name="school_year" id="">
                                            @foreach ($quarters as $quarter)
                                                <option {{ $quarter->status == 1 ? 'selected' : 'disabled' }}
                                                    value="{{ $quarter->id }}">{{ $quarter->quarter_name }}
                                                    {{ $quarter->status == 2 ? '--Disabled--' : '' }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3 gx-1">
                                    <div class="mb-3 p-2">

                                        <select class="form-select subject_select" name="school_year" id="">
                                            <option selected disabled>Select Subject</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}"
                                                    data-subject_name="{{ $subject->subjectName }}">
                                                    {{ $subject->subjectName }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3 gx-1">
                                    <div class="mb-3 p-2 float-md-end">
                                        <button class="btn btn-primary rounded-0" id="saveButton">Save</button>
                                    </div>
                                </div>
                                <hr>


                                <!-- Bordered Tabs Justified -->
                                <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                                    <li class="nav-item flex-fill" role="presentation">
                                        <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab"
                                            data-bs-target="#written_works_tab" type="button" role="tab"
                                            aria-controls="home" aria-selected="true">Written Works</button>
                                    </li>
                                    <li class="nav-item flex-fill" role="presentation">
                                        <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#performance_tasks_tab" type="button" role="tab"
                                            aria-controls="profile" aria-selected="false">Performance Tasks</button>
                                    </li>
                                    <li class="nav-item flex-fill" role="presentation">
                                        <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#quarterly_assessment_tab" type="button" role="tab"
                                            aria-controls="contact" aria-selected="false">Quarterly Assessment</button>
                                    </li>
                                    <li class="nav-item flex-fill" role="presentation">
                                        <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#transmuted_grade_tab" type="button" role="tab"
                                            aria-controls="contact" aria-selected="false">Transmuted Grades</button>
                                    </li>
                                </ul>
                                <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                                    <div class="tab-pane fade show active" id="written_works_tab" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <div class="table-responsive">
                                            <table class="student-table table table-hover table-sticky" id="written_works">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th class="text-center">1</th>
                                                        <th class="text-center">2</th>
                                                        <th class="text-center">3</th>
                                                        <th class="text-center">4</th>
                                                        <th class="text-center">5</th>
                                                        <th class="text-center">6</th>
                                                        <th class="text-center">7</th>
                                                        <th class="text-center">8</th>
                                                        <th class="text-center">9</th>
                                                        <th class="text-center">10</th>
                                                        <th class="text-center">Total</th>
                                                        <th class="text-center">PS</th>
                                                        <th class="text-center">WA</th>
                                                    </tr>
                                                    <tr class="possible_score_container">
                                                        <th class="text-nowrap">Highest Possible Score</th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th class="possible_total_score" data-component="written_works">
                                                            0</th>
                                                        <th class="possible_percentage_score"
                                                            data-component="written_works">100</th>
                                                        <th class="possible_weighted_average"
                                                            data-component="written_works">WA</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($students as $key => $student)
                                                        <tr class="learner_score_container{{ $student->id }}"
                                                            data-student_id="{{ $student->studentId }}">
                                                            <td>{{ $key + 1 }}{{ '. ' . $student->lastname . ', ' . $student->name }}
                                                            </td>
                                                            <td><input type="number" name="student_score[]"
                                                                    min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]"
                                                                    min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]"
                                                                    min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]"
                                                                    min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]"
                                                                    min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]"
                                                                    min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]"
                                                                    min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]"
                                                                    min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]"
                                                                    min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]"
                                                                    min="1" class="input-sm input-responsive"></td>
                                                            <td class="student_total_score" data-table="written_works">0</td>
                                                            <td class="student_percentage_score" data-table="written_works">0</td>
                                                            <td class="student_weighted_average" data-table="written_works">0</td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="performance_tasks_tab" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <div class="table-responsive">
                                            <table class="student-table table table-hover table-sticky" id="performance_tasks">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th class="text-center">1</th>
                                                        <th class="text-center">2</th>
                                                        <th class="text-center">3</th>
                                                        <th class="text-center">4</th>
                                                        <th class="text-center">5</th>
                                                        <th class="text-center">6</th>
                                                        <th class="text-center">7</th>
                                                        <th class="text-center">8</th>
                                                        <th class="text-center">9</th>
                                                        <th class="text-center">10</th>
                                                        <th class="text-center">0</th>
                                                        <th class="text-center">PS</th>
                                                        <th class="text-center">WA</th>
                                                    </tr>
                                                    <tr class="possible_score_container">
                                                        <th class="text-nowrap">Highest Possible Score</th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th class="possible_total_score"
                                                            data-component="performance_tasks">0</th>
                                                        <th class="possible_percentage_score"
                                                            data-component="performance_tasks">100</th>
                                                        <th class="possible_weighted_average"
                                                            data-component="performance_tasks">WA</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($students as $key => $student)
                                                        <tr class="learner_score_container{{ $student->id }}"
                                                            data-student_id="{{ $student->studentId }}">
                                                            <td>{{ $key + 1 }}{{ '. ' . $student->lastname . ', ' . $student->name }}
                                                            </td>
                                                            <td><input type="number" name="student_score[]"
                                                                    min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]"
                                                                    min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]"
                                                                    min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]"
                                                                    min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]"
                                                                    min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]"
                                                                    min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]"
                                                                    min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]"
                                                                    min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]"
                                                                    min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]"
                                                                    min="1" class="input-sm input-responsive"></td>
                                                            <td class="student_total_score" data-table="performance_tasks">0</td>
                                                            <td class="student_percentage_score" data-table="performance_tasks">0</td>
                                                            <td class="student_weighted_average" data-table="performance_tasks">0</td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="quarterly_assessment_tab" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <table class="student-table table table-hover table-sticky" id="quarterly_assessment">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th class="text-center">1</th>
                                                    <th class="text-center">Total</th>
                                                    <th class="text-center">PS</th>
                                                    <th class="text-center">WA</th>
                                                </tr>
                                                <tr class="possible_score_container">
                                                    <th class="text-nowrap">Highest Possible Score</th>
                                                    <th class="text-center text-center"><input type="number"
                                                            name="possible_score[]" min="1"
                                                            class="input-sm input-responsive"></th>
                                                    <th class="possible_total_score text-center"
                                                        data-component="quarterly_assessment">0</th>
                                                    <th class="possible_percentage_score text-center"
                                                        data-component="quarterly_assessment">100</th>
                                                    <th class="possible_weighted_average text-center"
                                                        data-component="quarterly_assessment">WA</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($students as $key => $student)
                                                    <tr class="learner_score_container{{ $student->id }}"
                                                        data-student_id="{{ $student->studentId }}">
                                                        <td>{{ $key + 1 }}{{ '. ' . $student->lastname . ', ' . $student->name }}
                                                        </td>
                                                        <td class="text-center"><input type="number"
                                                                name="student_score[]" min="1"
                                                                class="input-sm input-responsive"></td>
                                                        <td class="student_total_score text-center" data-table="quarterly_assessment">0</td>
                                                        <td class="student_percentage_score text-center" data-table="quarterly_assessment">0</td>
                                                        <td class="student_weighted_average text-center" data-table="quarterly_assessment">0</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="transmuted_grade_tab" role="tabpanel"
                                        aria-labelledby="contact-tab">
                                        <table class="table table-hover table-sticky" id="transmuted_grades_table">
                                            <thead>
                                                <tr class="possible_score_container">
                                                    <th class="text-nowrap">Student Name</th>
                                                    <th class="text-center text-center">Initial Grade</th>
                                                    <th class="text-center text-center">Quarterly Grade</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($students as $key => $student)
                                                    <tr class="learner_score_container_{{$key+1}}"
                                                        data-student_id="{{ $student->studentId }}">
                                                        <td>{{ $key + 1 }}{{ '. ' . $student->lastname . ', ' . $student->name }}
                                                        </td>
                                                        <td class="text-center" id="initial_grade">0</td>
                                                        <td class="text-center" id="student_quarterly_grade">0</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
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
