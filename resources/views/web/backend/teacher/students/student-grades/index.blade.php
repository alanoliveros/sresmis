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
                <div class="col-12 ">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body ">
                            <div class="row my-3 ">
                                <div class="col-12 col-md-2">
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
                                <div class="col-12 col-md-2">
                                    <div class="mb-3">
                                        <select class="form-select school_year_by_subject filter_for" required
                                            aria-label="select example" name="school_year">
                                            <option selected disabled>Select Subject</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="mb-3">
                                        <select class="form-select section_select filter_for" required
                                            aria-label="select example" name="school_year">
                                            <option selected disabled>Select Section</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="mb-3">
                                        <button type="button" disabled
                                            class="btn btn-secondary  rounded-0 filter_grades">Filter</button>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">

                                    <section class="section bg-light text-center"
                                        style="
                                        border-top:    1px solid  black;
                                        border-right:  1px solid black;
                                        border-left:   1px solid  black;">
                                        <p class="text-center">GRADING</p>
                                        <hr>
                                        <div class="row ">
                                            <div class="col-lg-12 d-flex justify-content-center">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                                            data-bs-target="#home" type="button" role="tab"
                                                            aria-controls="home" aria-selected="true">1st</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                                            data-bs-target="#profile" type="button" role="tab"
                                                            aria-controls="profile" aria-selected="false">2nd</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                                            data-bs-target="#contact" type="button" role="tab"
                                                            aria-controls="contact" aria-selected="false">3rd</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                                            data-bs-target="#home" type="button" role="tab"
                                                            aria-controls="contact" aria-selected="false">4th</button>
                                                    </li>
                                                </ul>


                                            </div>


                                        </div>
                                    </section>
                                </div>


                                <hr>
                                <div class="wrapper">
                                    <div class="row">
                                        {{-- <div class="col-3 h-100 gx-0 students_lists_container">
                                            <table class="table ">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>-----------</th>
                                                    </tr>
                                                    <tr class="text-center">
                                                        <th>Student Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="students_name ">
                                                    <tr class="p-2">
                                                        <td>Alan</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div> --}}
                                        {{-- <div class="col h-100 gx-0 grade_component_container">
                                            <div class="written_work_container">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>----------</th>
                                                            <th class="text-center">1</th>
                                                            <th>Total</th>
                                                            <th>PS</th>
                                                            <th>WA</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Highest Possible Score</th>
                                                            <th><input type="number" min="1"></th>
                                                            <th>Total</th>
                                                            <th>PS</th>
                                                            <th>WA</th>
                                                            <th><button type="button" class="btn btn-success">+</button>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col h-100 gx-0 grade_component_container">
                                            <div class="written_work_container">
                                                <table class="table written_works">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th class="text-center">1</th>
                                                            <th class="between_count_num">Total</th>
                                                            <th>PS</th>
                                                            <th>WA</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        <tr class="text-success">
                                                            <th>Highest Possible Score</th>
                                                            <th><input type="number" class="form-control" min="1">
                                                            </th>
                                                            <th class="between_highest_score">Total</th>
                                                            <th>PS</th>
                                                            <th>WA</th>
                                                            <th><button type="button" disabled
                                                                    class="btn btn-success add_score"
                                                                    data-gcomponent="written_works">+</button>
                                                            </th>
                                                        </tr>
                                                    <tbody class="display_student_data">
                                                    </tbody>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div> --}}
                                    </div>

                                </div>





                                <div class="col-12 ">
                                    <div class="tab-content pt-2" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <div class="written_work_container">
                                                <table class="table written_works">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th class="text-center">1</th>
                                                            <th class="between_count_num">Total</th>
                                                            <th>PS</th>
                                                            <th>WA</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tr class="text-success">
                                                        <th>Highest Possible Score</th>
                                                        <th><input type="number" name="written_score[]"
                                                                class="form-control written_score" min="1">
                                                        </th>
                                                        <th class="between_highest_score total_high_score">Total</th>
                                                        <th>PS</th>
                                                        <th>WA</th>
                                                        <th><button type="button" disabled
                                                                class="btn btn-success add_score"
                                                                data-gcomponent="written_works">+</button>
                                                        </th>
                                                    </tr>
                                                    <tbody class="display_student_data">
                                                    </tbody>

                                                </table>

                                                <div class="float-md-end ">
                                                    <button class="btn btn-success rounded-0">Save</button>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="profile" role="tabpanel"
                                            aria-labelledby="profile-tab">
                                            Nesciunt totam et. Consequuntur magnam aliquid eos nulla
                                            dolor iure eos quia. Accusantium distinctio omnis et atque
                                            fugiat. Itaque doloremque aliquid sint quasi quia distinctio
                                            similique. Voluptate nihil recusandae mollitia dolores. Ut
                                            laboriosam voluptatum dicta.
                                        </div>
                                        <div class="tab-pane fade" id="contact" role="tabpanel"
                                            aria-labelledby="contact-tab">
                                            Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis
                                            animi debitis cumque. Accusantium quibusdam perspiciatis qui
                                            qui omnis magnam. Officiis accusamus impedit molestias
                                            nostrum veniam. Qui amet ipsum iure. Dignissimos fuga
                                            tempore dolor.
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="col-12 border border-dark mb-4">
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
                                                <th class="text-center text-success between_highest_score PERFORMANCE">
                                                    <span class="total_score PERFORMANCE">0</span>
                                                </th>
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
                                                    <span class="student_click_paste"></span>
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


                                </div> --}}



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
                        // console.log(data.students);
                        // let students_lists = '<option selected disabled>Select Student</option>';
                        // $.each(data.students, function(key, student) {
                        //     students_lists +=
                        //         `<option value="${student.studentId}">${student.name}</option>`;
                        // });
                        // $('.select_student_by').html(students_lists);
                        console.log(data.students);
                        if (data.students.length > 0) {
                            let students_lists = '';
                            $.each(data.students, function(key, student) {
                                students_lists +=
                                    `
                                <tr class="student_score_${key+1}">
                                    <td >${student.name}</td>
                                    <td ><input type="number" name="student_written_score[]" class="form-control student_score_columnn" min="1" placeholder="Enter Score"></td>
                                    <td class="total_score_by_learner"></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                `;
                            });
                            $('.display_student_data').html(students_lists);
                            $('.add_score').prop('disabled', false);
                        } else {
                            return false;
                        }

                    }
                });
            });
        })
    </script>
    <script>
        let sy_id = 0;
        let sub_id = 0;
        let grade_component = 0;
        let first_score = 0;
        let score_count = 1;
        let total_score = [];
        let total = 0;

        function createScoreColumn(gradeComponent) {
            let between_count_num = $(`.${gradeComponent}`).find('.between_count_num');
            let between_col_highest_score = $(`.${gradeComponent}`).find('.between_highest_score');
            let between_total_score_by_learner = $(`.${gradeComponent}`).find('.total_score_by_learner');

            let col_index = $(`.${gradeComponent}`).find('.col_index').length + 1;

            $(`<th class="text-center col_index">${++col_index}</th>`).insertBefore(between_count_num);

            $(`<th class="score_append fw-bold" data-rows="score_append_${score_count}"><input type="number"  name="written_score[]" min="1" class="form-control written_score"></th>`)
                .insertBefore(between_col_highest_score);

            $(`<td><input type="number"  min="1" name="student_written_score[]" class="form-control fs-6 quizzes_exams" placeholder="Enter Score"></td>`)
                .insertBefore(between_total_score_by_learner);
        }

        function totalHighestScore() {
            let total_highest_score = 0;
            $.each($(".written_score"), function(key, val) {
                total_highest_score += parseInt($(val).val());

            });
            return total_highest_score;
        }

        function student_score(cname) {
            let total_student_score = 0;
            let student_score = '';


            $.each(cname, function(key, val) {
                total_student_score += parseInt($(val).val());
            });
          
            console.log(total_student_score);
            // $('.put_total_score_by_student').text(total_student_score);
            // let ps = parseInt(total / sum * 100);
            // $('.percentage_score_by_student').text(ps);
            // let ws = 0.5;
            // $('.weighted_score_written_by_student').text(ps * ws + '%'); 
        }

        $(document).ready(function() {
            $("body").on('input', "input[name='student_written_score[]']", function(e) {

                let name = $(this).parent('td').parent('tr').attr('class');

                let getInput = $(`.${name}`).find('input');

                // let data_name = $(this).data('name');
                console.log(getInput);
                student_score(getInput);
                // let findData = $(this).attr('data');
                // alert(findData);
                // let val = $(this).val();
                // $(this).attr('data-info', val);

            });
            $('.add_score').on('click', function() {
                createScoreColumn($(this).data('gcomponent'));
            });

            grade_component = $('.grade_component').text();

            $(".select_sy").on('change', function() {
                sy_id = $(".select_sy :selected").val();
                if (sy_id != 0 && sub_id != 0) {
                    $('.filter_grades').prop('disabled', false);
                }
            });
            $(".school_year_by_subject").on('change', function() {
                sub_id = $(".school_year_by_subject :selected").val();
                if (sy_id != 0 && sub_id != 0) {
                    $('.filter_grades').prop('disabled', false);
                }
            });

            $(".select_student_by").on('change', function(e) {

                let student_click = $(".select_student_by :selected").text();

                $('.student_click_paste').text(student_click);

            });
            $(".filter_grades").on('click', function(e) {
                e.preventDefault();
                $.ajax({
                    method: "POST",
                    url: '/sresmis/teacher/student-information/by-subject/filter',
                    data: {
                        "sy_id": sy_id,
                        "sub_id": sub_id,
                    },
                    success: function(data) {
                        console.log(data.students);
                    }
                });
            });

            $("body").on('input', "input[name='written_score[]']", function(e) {
                e.preventDefault();
                let total_score = totalHighestScore();
                let total = $(this).val();
                // $(this).attr('data-info', total);
                $('.total_high_score').text(total_score);

            });

            // $("body").on('input', "input[name='student_written_score[]']", function(e) {

            //     student_score();
            //     let val = $(this).val();
            //     $(this).attr('data-info', val);

            // });
        });
    </script>
@endsection
