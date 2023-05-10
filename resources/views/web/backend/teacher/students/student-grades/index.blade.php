@extends('web.backend.layouts.app')
@section('title', 'SRESMIS | Grades')
@section('content')
    <main id="main" class="main">

        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h5 class="page-title my-2"><i class="bi bi-person-lines-fill"></i> Grades</h5>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark"><i
                                        class="bi bi-house-door"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="">Grades</a>
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
                                <div class="col-12 col-md-3">
                                    <div class="mb-3">
                                        <select class="form-select select_sy filter_for" required
                                            aria-label="select example" name="school_year">
                                            <option selected disabled>Select School Year</option>
                                            @foreach ($sessions as $key => $session)
                                                <option value="{{ $session->school_year }}">
                                                    {{ $session->school_year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="mb-3">
                                        <select class="form-select school_year_by_subject filter_for" required
                                            aria-label="select example" name="school_year">
                                            <option selected disabled>Select Subject</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="mb-3">
                                        <select class="form-select section_select filter_for" required
                                            aria-label="select example" name="school_year">
                                            <option selected disabled>Select Section</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="mb-3">
                                        <button type="button" disabled
                                            class="btn btn-secondary  rounded-0 filter_grades">Filter</button>
                                    </div>
                                </div>

                                <div class="wrapper">
                                    <div class="row">
                                        <div class="col-4 students_lists_container">
                                            

                                        </div>
                                        <div class="col grade_component_container">

                                        </div>
                                    </div>

                                </div>











                                <div class="col-12 border border-dark mb-4">
                                    <p class="text-center fs-4 fw-bold">Written Work (<small class="text-success">
                                            40%</small> )</p>
                                    <hr>
                                    <table class="table table-hover written_work">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="text-center fw-bold col_index">1</th>
                                                <th class="text-center between_count">Total</th>
                                                <th class="text-center">PS</th>
                                                <th class="text-center">WA</th>
                                                <th class="text-center">Action</th>

                                            </tr>
                                            <tr>
                                                <th>Highest Possible Score</th>
                                                <th><input type="number" name="score[]" min="1"
                                                        class="form-control written_output_score"></th>
                                                <th class="text-center text-success between_highest_score"><span
                                                        class="total_score">0</span></th>
                                                <th class="text-center text-success"><span
                                                        class="percentage_score_written">100</span></th>
                                                <th class="text-center text-success"><span
                                                        class="weighted_score_written">40%</span></th>
                                                <th class="text-center"><button type="button"
                                                        class="btn btn-success add_score"
                                                        data-gcomponent="written_work">+</button></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select name="" id="" class="form-control">
                                                        <option selected disabled>Select Student</option>
                                                    </select>
                                                </td>
                                                <td><input type="number" min="1" name="student_score[]"
                                                        class="form-control fs-6 quizzes_exams" placeholder="Enter Score">
                                                </td>
                                                <td class="total_score_by_learner text-center"><span
                                                        class="put_total_score_by_student"></span></td>
                                                <td class="text-center"><span class="percentage_score_by_student"></span>
                                                </td>
                                                <td class="text-center"><span
                                                        class="weighted_score_written_by_student"></span></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>


                                </div>
                                <div class="col-12 border border-dark mb-4">
                                    <p class="text-center fs-4 fw-bold">Performance Task (<small class="text-success">
                                            40%</small> )</p>
                                    <hr>
                                    <table class="table table-hover performance_task">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="text-center fw-bold col_index">1</th>
                                                <th class="text-center between_count PERFORMANCE">Total</th>
                                                <th class="text-center">PS</th>
                                                <th class="text-center">WA</th>
                                                <th class="text-center">Action</th>

                                            </tr>
                                            <tr>
                                                <th>Highest Possible Score</th>
                                                <th><input type="number" name="score_performance[]" min="1"
                                                        class="form-control written_output_score PERFORMANCE"></th>
                                                <th class="text-center text-success between_highest_score PERFORMANCE"><span
                                                        class="total_score PERFORMANCE">0</span></th>
                                                <th class="text-center text-success"><span
                                                        class="percentage_score_written PERFORMANCE">100</span></th>
                                                <th class="text-center text-success"><span
                                                        class="weighted_score_written PERFORMANCE">40%</span></th>
                                                <th class="text-center"><button type="button"
                                                        class="btn btn-success add_score PERFORMANCE"
                                                        data-gcomponent="performance_task">+</button></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select name="" id="" class="form-control">
                                                        <option selected disabled>Select Student</option>
                                                    </select>
                                                </td>
                                                <td><input type="number" min="1"
                                                        name="student_score_performance[]"
                                                        class="form-control fs-6 quizzes_exams PERFORMANCE"
                                                        placeholder="Enter Score">
                                                </td>
                                                <td class="total_score_by_learner PERFORMANCE text-center"><span
                                                        class="put_total_score_by_student PERFORMANCE"></span></td>
                                                <td class="text-center"><span
                                                        class="percentage_score_by_student PERFORMANCE"></span>
                                                </td>
                                                <td class="text-center"><span
                                                        class="weighted_score_written_by_student PERFORMANCE"></span></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>


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
    <script>
        let sy = '';
        let subject = 0;
        let section = 0;
        $(document).ready(function() {
            $('.select_sy').on('change', function() {
                sy = $(".select_sy :selected").val();

                $.ajax({
                    method: "POST",
                    url: '/teacher/student-grades/filter-school-year',
                    data: {
                        "sy": sy,
                    },
                    success: function(data) {
                        console.log(data.subjects);
                        let sub = '<option selected disabled>Select Subject</option>';
                        $.each(data.subjects, function(key, subject) {
                            sub +=
                                `<option value="${key}">${subject}</option>`;
                        });
                        $('.school_year_by_subject').html(sub);
                    }
                });
            });

            $('.school_year_by_subject').on('change', function() {
                subject = $(".school_year_by_subject :selected").val();
                $.ajax({
                    method: "POST",
                    url: '/teacher/student-grades/filter-subject',
                    data: {
                        "subject": subject,
                        "sy": sy,
                    },
                    success: function(data) {

                        console.log(data.sections);
                        let sec = '<option selected disabled>Select Section</option>';
                        $.each(data.sections, function(key, section) {
                            sec +=
                                `<option value="${section.sectionId}">${section.sectionName}</option>`;
                        });
                        $('.section_select').html(sec);
                    }
                });

            });

            $('.section_select').on('change', function() {
                section = $(".section_select :selected").val();
                $(".filter_grades").prop("disabled", false);

            });

            $('.filter_grades').on('click', function() {
                $.ajax({
                    method: "POST",
                    url: '/teacher/student-grades/filter-students',
                    data: {
                        "section": section,
                        "sy": sy,
                    },
                    success: function(data) {


                        console.log(data.students);
                        // let sec = '<option selected disabled>Select Section</option>';
                        // $.each(data.sections, function(key, section) {
                        //     sec +=
                        //         `<option value="${section.sectionId}">${section.sectionName}</option>`;
                        // });
                        // $('.section_select').html(sec);
                    }
                });
            });
        })
    </script>
@endsection
