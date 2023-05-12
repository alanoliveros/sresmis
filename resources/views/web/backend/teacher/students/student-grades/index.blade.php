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
                                <div class="col-md-4">

                                </div>
                                <hr>
                                <div class="col d-flex justify-content-end">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                                data-bs-target="#written_works" type="button" role="tab"
                                                aria-controls="home" aria-selected="true">Written Works</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                                data-bs-target="#performance_tasks" type="button" role="tab"
                                                aria-controls="contact" aria-selected="false">Performance Tasks</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link get_final_grade" id="contact-tab" data-bs-toggle="tab"
                                                data-bs-target="#contact" type="button" role="tab"
                                                data-students_final_grade='["written_works", "performance_tasks"]'
                                                aria-controls="contact" aria-selected="false">Transmuted Grade</button>
                                        </li>
                                    </ul>


                                </div>

                                <div class="col-12">
                                    <div class="tab-content pt-2" id="myTabContent">
                                        <div class="tab-pane fade show active" id="written_works" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <div class="written_work_container table-responsive">
                                                <table data-grade_component="Written Works" class="table table-stripped written_works">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th class="text-center">1</th>
                                                            <th class="between_count_num">Total</th>
                                                            <th>PS</th>
                                                            <th>WA</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tr class="text-success written_tasks_possible_score">
                                                        <th class="text-center">HIGHEST POSSIBLE SCORE</th>
                                                        <th><input type="number" name="written_score[]"
                                                                data-total_possible_score="written_tasks_possible_score"
                                                                class="written_score" min="1">
                                                        </th>
                                                        <th class="between_highest_score total_high_score">Total</th>
                                                        <th>100%</th>
                                                        <th class="tasks_average written_works_average"></th>
                                                        <th class="text-center"><button type="button" disabled
                                                                class="btn btn-success rounded-0  add_score"
                                                                data-gcomponent="written_works">+</button>
                                                        </th>
                                                    </tr>
                                                    <tbody class="display_student_data">
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        {{-- performance tasks --}}
                                        <div class="tab-pane fade" id="performance_tasks" role="tabpanel"
                                            aria-labelledby="profile-tab">
                                            <div class="table-responsive">
                                                <table data-grade_component="Performance Tasks" class="table table-stripped performance_tasks">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>1</th>
                                                            <th class="between_count_num">Total</th>
                                                            <th>PS</th>
                                                            <th>WA</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tr class="text-success performance_tasks_possible_score">
                                                        <th class="text-center">HIGHEST POSSIBLE SCORE</th>
                                                        <th><input
                                                                data-total_possible_score="performance_tasks_possible_score"
                                                                type="number" name="written_score[]"
                                                                class="written_score" min="1">
                                                        </th>
                                                        <th class="between_highest_score total_high_score">Total</th>
                                                        <th>100%</th>
                                                        <th class="tasks_average performance_tasks_average"></th>

                                                        <th class="text-center"><button type="button" disabled
                                                                class="btn btn-success rounded-0  add_score"
                                                                data-gcomponent="performance_tasks">+</button>
                                                        </th>
                                                    </tr>
                                                    <tbody class="display_student_data">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- performance tasks --}}
                                        <div class="tab-pane fade" id="contact" role="tabpanel"
                                            aria-labelledby="contact-tab">
                                            <div class=" table-responsive">
                                                <table data-grade_component="Quarterly Grades"  class="table table-stripped quarterly_grade">
                                                    <thead>
                                                        <tr>

                                                            <th class="text-center">Student Name</th>
                                                            <th class="initial_grade">Initial Grade</th>
                                                            <th class="transumted_grade">Transmuted Grade</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody class="display_student_grade">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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
        let sy_id = 0;
        let sub_id = 0;
        let grade_component = 0;
        let first_score = 0;
        let score_count = 1;
        let total_score = [];
        let total = 0;

        let sy = '';
        let subject = 0;
        let section = 0;

        function createScoreColumn(gradeComponent) {
            let between_count_num = $(`.${gradeComponent}`).find('.between_count_num');
            let between_col_highest_score = $(`.${gradeComponent}`).find('.between_highest_score');
            let between_total_score_by_learner = $(`.${gradeComponent}`).find('.total_score_by_learner');

            let col_index = $(`.${gradeComponent}`).find('.col_index').length + 1;
            let data_this = gradeComponent == 'written_works' ? 'written_tasks_possible_score' :
                'performance_tasks_possible_score';

            $(`<th class="text-center col_index col_num_${++col_index}">${col_index} <button data-column="col_num_${col_index}" class="bg-danger remove_col">x</button></th>`).insertBefore(between_count_num);

            $(`<th class="score_append fw-bold col_num_${col_index}" data-rows="score_append_${score_count}"><input type="number"   name="written_score[]" data-total_possible_score="${data_this}" min="1" class=" written_score"></th>`)
                .insertBefore(between_col_highest_score);

            $(`<td class="col_num_${col_index}"><input type="number"  min="1" name="student_output_score[]" class=" fs-6 quizzes_exams" placeholder="Enter Score"></td>`)
                .insertBefore(between_total_score_by_learner);
        }

        function totalHighestScore(className, sub) {

            let total_highest_score = 0;
            let loop = $(`.${className}`).find(".written_score");

            console.log($(loop.length));
            $.each(loop, function(key, val) {
                console.log($(val).val());
                total_highest_score += parseFloat($(val).val());
            });
            $(`.${className}`).find('.total_high_score').text(isNaN(total_highest_score) ? 'Generating...' :
                total_highest_score);
            // return total_highest_score;
        }

        function student_score(parent, pname, input) {
            let student_final_score = 0;
            // console.log(input);
            $.each($(`.${parent}`).find(`.${pname} :input[name='student_output_score[]']`), function(key, val) {
                student_final_score += parseFloat($(val).val());
            });

            $(`.${parent}`).find(`.${pname}`).find('.total_score_by_learner').text(isNaN(student_final_score) ?
                'Generating...' : student_final_score);

            let total_highest_possible_score = $(`.${parent}`).find('.total_high_score').text();

            let ps = parseFloat(student_final_score / total_highest_possible_score * 100);
            $(`.${parent}`).find(`.${pname}`).find('.ps_by_learner').text(isNaN(ps.toFixed(2)) ? 'Generating...' : ps
                .toFixed(0));
            let ww_valued = parseInt($(`.${parent}`).find('.tasks_average').text());
            let ws = ww_valued / 100;

            let ww = ps * ws;
            let weighted_avarage_per_student = $(`.${parent}`).find(`.${pname}`).find('.wa_by_learner').text(isNaN(ww
                .toFixed(2)) ? 'Generating...' : ww.toFixed(0));


            // let written_works = parent == "written_works"? weighted_avarage_per_student : '';
            // let performance_tasks = parent == "performance_tasks"? weighted_avarage_per_student : '';

            // console.log(written_works.text());
            // console.log(performance_tasks.text());

            // $(`.${pname}`).find('.student_initial_grade').text('hehehe');
            // let written_works = parent == 'written_works'? $(`.${parent}`).find(`.${pname}`).find('.wa_by_learner').text() : '';
            // let performance_tasks = parent == 'performance_tasks'? $(`.${parent}`).find(`.${pname}`).find('.wa_by_learner').text() : '';
            // // console.log();

        }

        function studentTransmutedGrade(initialGrade) {
            var retVal;
            $.ajax({
                method: "POST",
                url: '/teacher/student-grades/transmuted-grade',
                data: {
                    "initialGrade": parseInt(initialGrade),
                },
                async: false,
                success: function(data) {
                    retVal = parseInt(data.transmuted);
                    console.log(data.grade);
                }
            });
            return retVal;
        }

        function saveStudentGrade(cparent, cname) {

            
            let inputs = $(`.${cparent}`).find(`.${cname} :input`);
            $.each(inputs, function(key, cont) {
                console.log($(cont).val());
            });
        }
        $(document).ready(function() {
            $("body").on('click', ".save_student_tasks", function(e) {
                let parent = $(this).parents('table').attr('class').split(' ')[2];
                let data_save = $(this).data('save_button');
                saveStudentGrade(parent, data_save);
            });
            $('.get_final_grade').on('click', function() {

                let written = JSON.parse($(this).attr('data-students_final_grade'))[0];
                let performance = JSON.parse($(this).attr('data-students_final_grade'))[1];
                let task1 = $(`.${written}`).find('.wa_by_learner');
                let task2 = $(`.${performance}`).find('.wa_by_learner');

                let getTotal = '';
                $.each(task2, function(key, val) {
                    let xy = parseInt($(val).text());
                    let xx = $(task1)[key];
                    let zz = parseInt($(xx).text());
                    let total = xy + zz;

                    $(`.student_initial_grade_${key+1}`).text(isNaN(total) ? 'Pending' : total);
                    $(`.student_final_grade_${key+1}`).text(studentTransmutedGrade(total));
                });
                // console.log($(`.${written}`).find('.wa_by_learner').length);


            });
            grade_component = $('.grade_component').text();
            $("body").on('input', "input[name='student_output_score[]']", function(e) {
                let parent_ = $(this).parents('table').attr('class').split(' ')[2];
                let name = $(this).parents('tr').attr('class');
                student_score(parent_, name, $(this));
            });
            $('.add_score').on('click', function() {
                createScoreColumn($(this).data('gcomponent'));
            });
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
                            console.log(key);
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
                        "subject": subject,
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
                                let gender = student.gender == 'Male' ? 'text-primary' :
                                    'text-danger';
                                students_lists +=
                                    `
                                    <tr data-id="${student.studentId}" class="student_score_${key+1}">
                                        <td  class="${gender}">${key+1}${'. '+student.lastname+', '+student.name+', '+student.middlename}</td>
                                        <td><input type="number" name="student_output_score[]" class=" student_score_columnn" min="1" placeholder="Enter Score"></td>
                                        <td class="total_score_by_learner"></td>
                                        <td class="ps_by_learner"></td>
                                        <td class="wa_by_learner"></td>
                                        <td class="save_action text-center"><button type="button" data-save_button="student_score_${key+1}" class="save_student_tasks btn btn-primary text-light text-sm rounded-0"><i class="bi bi-folder2-open"></i> Save</td>
                                    </tr>
                                `;
                            });
                            $('.display_student_data').html(students_lists);
                            let student_names = '';
                            $.each(data.students, function(key, student) {
                                let gender = student.gender == 'Male' ? 'text-primary' :
                                    'text-danger';
                                student_names += `
                                    <tr data-id="${student.studentId}" class="student_score_${key+1}">
                                        <td class="${gender}">${key+1}${'. '+student.lastname+', '+student.name+', '+student.middlename}</td>
                                        <td class="student_initial_grade_${key+1}"></td>
                                        <td class="student_final_grade_${key+1}"></td>
                                    </tr>
                                `;
                            });

                            $('.display_student_grade').html(student_names);

                            $('.add_score').prop('disabled', false);
                            $('.written_works_average').text(data.subject
                                .written_work_percentage + '%');
                            $('.performance_tasks_average').text(data.subject
                                .performance_tasks_percentage + '%');

                        } else {
                            return false;
                        }

                    }
                });
            });
            $('body').on('click','.remove_col',function(){
                let parent =  $(this).parents('table').attr('class').split(' ')[2];
                let col = $(this).data('column');
                $(`.${parent}`).find(`.${col}`).remove();
            });

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
                // let total_score = totalHighestScore();
                let data_this = $(this).data('total_possible_score');
                let subtotal = $(this).val();
                totalHighestScore(data_this, subtotal);
            });
        });
    </script>
@endsection
