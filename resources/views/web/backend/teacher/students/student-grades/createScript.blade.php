<script>
    let score_count = 0;
    let data_by = <?php echo json_encode($data); ?>;

    function totalHighestScore(className, sub) {

        let total_highest_score = 0;
        let loop = $(`.${className}`).find(".written_score");

        // console.log($(loop.length));
        $.each(loop, function(key, val) {
            // console.log($(val).val());
            total_highest_score += parseFloat($(val).val());
        });
        $(`.${className}`).find('.total_high_score').text(isNaN(total_highest_score) ? 'Generating...' :
            total_highest_score);
        // return total_highest_score;
    }

    function createScoreColumn(gradeComponent) {
        let between_count_num = $(`.${gradeComponent}`).find('.between_count_num');
        let between_col_highest_score = $(`.${gradeComponent}`).find('.between_highest_score');
        let between_total_score_by_learner = $(`.${gradeComponent}`).find('.total_score_by_learner');

        let col_index = $(`.${gradeComponent}`).find('.col_index').length + 1;
        let data_this = gradeComponent == 'written_works' ? 'written_tasks_possible_score' :
            'performance_tasks_possible_score';



        // goods
        $(`<th class="text-center col_index col_num_${++col_index}">${col_index} <button data-column="col_num_${col_index}" class="bg-light text-danger border border-none remove_col">x</button></th>`)
            .insertBefore(between_count_num);

        $(`<th class="score_append fw-bold col_num_${col_index}" data-rows="score_append_${score_count}"><input type="number"   name="written_score[]" data-total_possible_score="${data_this}" min="1" class=" written_score"></th>`)
            .insertBefore(between_col_highest_score);


        // bad
        $(`<td class="col_num_${col_index}"><input type="number"  min="1" name="student_output_score[]" class=" fs-6 quizzes_exams" placeholder="Enter Score"></td>`)
            .insertBefore(between_total_score_by_learner);
    }

    function tableBody() {
        let users = <?php echo json_encode($students); ?>;

        let students_lists = '';
        $.each(users, function(key, student) {
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
                                    <td class="save_action text-center"><button type="button" data-save_button="student_score_${key+1}" class="save_student_tasks btn btn-light border-dark text-dark text-sm rounded-0"><i class="bi bi-folder2-open"></i> Save</td>
                                </tr>
                `;
        });

        $('.display_student_data').html(students_lists);

        let student_names = '';
        $.each(users, function(key, student) {
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
        let subject = <?php echo json_encode($subject); ?>;
        $('.written_works_average').text(subject.written_work_percentage + '%').attr("data-val",subject.written_work_percentage);
        $('.performance_tasks_average').text(subject.performance_tasks_percentage + '%');
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
                "_token": "{{ csrf_token() }}",
            },
            async: false,
            success: function(data) {
                retVal = parseInt(data.transmuted);
                // console.log(data.grade);
            }
        });
        return retVal;
    }

    function saveStudentGrade(cparent, cname, uid) {

        let quizzes = [];
        let inputs = $(`.${cname}`);
        let highestScore = $(`.${cname}`).parents('table')[2];
        let inputHead = $(highestScore).find('.written_tasks_possible_score').find('input');
        let possibleScores = [];
        $.each($(inputHead), function(key, val){
            possibleScores.push($(val).val());
        });
        
        
        

        // console.log(possibleScoreTotal);
        // console.log(possiblePercentageScore);
        // console.log(possibleWeightedAverage);

        let total_quizzes = $(`.${cparent}`).find(`.total_score_by_learner`).text();
        let ps_by_learner = $(`.${cparent}`).find(`.ps_by_learner`).text();
        let wa_by_learner = $(`.${cparent}`).find(`.wa_by_learner`).text();
        let com_type = cparent == 'written_works' ? 'written' : 'performance'
        
        // console.log(uid);
        // console.log(total_quizzes);
        // $.each(inputs, function(key, cont) {
        //     // quizzes.push($(cont).val());
        //     console.log(cont);
        // });
        // console.log($(inputs)[0]);
        let written = $(inputs)[0];
        let writtArrQuizzes = [];
        let writtenTotalScore = $(written).find('.total_score_by_learner').text();
        let writtenPSAverage = $(written).find('.ps_by_learner').text();
        let writtenWeightedAverage = $(written).find('.wa_by_learner').text();

        let performance = $(inputs)[1];
        let perArrQuizzes = [];
        let perFormanceTotalScore = $(performance).find('.total_score_by_learner').text();
        let perFormancePSAverage = $(performance).find('.ps_by_learner').text();
        let perFormanceWeightedAverage = $(performance).find('.wa_by_learner').text();

        let possibleScoreTotal = $(highestScore).find('.written_tasks_possible_score').find('.total_high_score').text();
        let possiblePercentageScore = $(highestScore).find('.written_tasks_possible_score').find('.percentage').attr('data-val');
        let possibleWeightedAverage = $(highestScore).find('.written_tasks_possible_score').find('.written_works_average').attr('data-val');


        $.each($(performance).find('input'), function(key, val) {
            perArrQuizzes.push($(val).val());
        });

        $.each($(written).find('input'), function(key, val) {
            writtArrQuizzes.push($(val).val());
        });

        // console.log(quizzes);
        let studentOutputs = {
            'st_id': uid,
            'section': data_by.sec,
            'subject': data_by.sub,
            'school_year': data_by.sy,
            'quarter': data_by.qtr,
            'outputs': [{
                "name": {
                    'written_works': [{
                        "quizzes": possibleScores,
                        "totalscore": possibleScoreTotal,
                        "ps": possiblePercentageScore,
                        "ps": writtenPSAverage,
                        "ww": possibleWeightedAverage,
                    }],
                    'student_written': [{
                        "quizzes": writtArrQuizzes,
                        "totalscore": writtenTotalScore,
                        "ps": writtenPSAverage,
                        "ps": writtenPSAverage,
                        "ww": writtenWeightedAverage,
                    }],
                    'student_performance': [{
                        "quizzes": writtArrQuizzes,
                        "totalscore": writtenTotalScore,
                        "ps": writtenPSAverage,
                        "ps": writtenPSAverage,
                        "ww": writtenWeightedAverage,
                    }],
                }
            }],
        };

        console.log(studentOutputs);


        // $.ajax({
        //     method: "POST",
        //     url: '/teacher/student-grades/save-grades',
        //     data: {
        //         "subject": subject,
        //         "sy": sy,
        //     },
        //     success: function(data) {

        //         console.log(data.sections);
        //         let sec = '<option selected disabled>Select Section</option>';
        //         $.each(data.sections, function(key, section) {
        //             sec +=
        //                 `<option value="${section.sectionId}">${section.sectionName}</option>`;
        //         });
        //         $('.section_select').html(sec);
        //     }
        // });

    }

    $(document).ready(function() {
        tableBody();
        $("body").on('click', ".save_student_tasks", function(e) {
            let parent = $(this).parents('table').attr('class').split(' ')[2];
            let data_save = $(this).data('save_button');
            let user_id = $(this).parents('tr').data('id');
            // console.log(user_id);
            saveStudentGrade(parent, data_save, user_id);
        });
        $('body').on('click', '.get_final_grade', function() {

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
        $("body").on('input', "input[name='written_score[]']", function(e) {
            e.preventDefault();

            let total_score = totalHighestScore();
            let data_this = $(this).data('total_possible_score');
            let subtotal = $(this).val();
            totalHighestScore(data_this, subtotal);
        });
        $("body").on('input', "input[name='student_output_score[]']", function(e) {
            let parent_ = $(this).parents('table').attr('class').split(' ')[2];
            let name = $(this).parents('tr').attr('class');
            student_score(parent_, name, $(this));
        });
        $('body').on('click', '.add_score', function() {
            var users = <?php echo json_encode($students); ?>;

            // console.log(users);
            createScoreColumn($(this).data('gcomponent'));
        });
        $('body').on('click', '.remove_col', function() {
            let parent = $(this).parents('table').attr('class').split(' ')[2];
            let col = $(this).data('column');
            $(`.${parent}`).find(`.${col}`).remove();
        });
    });
</script>
