<script>
    $(document).ready(function() {
        function studentTransmutedGrade(initialGrade) {
            return new Promise(function(resolve, reject) {
                $.ajax({
                    method: "POST",
                    url: '/teacher/student-grades/transmuted-grade',
                    data: {
                        "initialGrade": parseInt(initialGrade),
                    },
                    success: function(data) {
                        var transmutedGrade = parseInt(data.transmuted);
                        resolve(transmutedGrade);
                    },
                    error: function(error) {
                        reject(error);
                    }
                });
            });
        }


        $('.school_year_select').on('change', function() {
            let sy = $('.school_year_select :selected').val();
            // ajax

            $.ajax({
                method: "POST",
                url: '/teacher/student-grades/get-sections-by-school-year',
                data: {
                    "sy": sy,
                },
                success: function(data) {
                    console.log(data);

                    let option = `<option disabled selected>Select Section</option>`;
                    $.each(data.sections, function(key, val) {
                        option += `
                            <option value="${key}">${val}</option>
                        `;
                    });
                    $('.section_select').html(option);
                }
            });

        });

        $('body').on('change', '.subject_select', function() {
            // search_button


            let subject = $('.subject_select :selected').val();

            console.log(subject);
            if ($.isNumeric(subject)) {
                $('input[name="student_score[]"]').prop('disabled', false);
                $('input[name="possible_score[]"]').prop('disabled', false);
            } else {
                $('input[name="student_score[]"]').prop('disabled', true);
                $('input[name="possible_score[]"]').prop('disabled', true);
            }

            $('.subject_name').text($('.subject_select :selected').text());

            $.ajax({
                method: "POST",
                url: "/teacher/grade-component/filter-sections/",
                data: {
                    "subject": subject,
                    "sy": $('.school_year_select :selected').val(),
                },
                success: function(data) {

                    let option = `<option disabled selected>Select Section</option>`;
                    // each
                    $.each(data.sections, function(key, val) {
                        option += `
                        <option value="${key}">${val}</option>
                        `;
                    });
                    $('.section_select').html(option);
                }
            });

        });

        $('#search_button').prop('disabled', false);

        $('input[name="student_score[]"]').prop('disabled', true);
        $('input[name="possible_score[]"]').prop('disabled', true);



        $('#search_button').on('click', function() {
            let section = $('.section_select :selected').val();
            let sy = $('.school_year_select :selected').val();

            // ajax
            $.ajax({
                method: "POST",
                url: "/teacher/grade-component/get-students",
                data: {
                    "section": section,
                    "sy": sy,
                },
                success: function(data) {



                    // var writtenWorkPercentage = data.subject
                    //     .written_work_percentage;
                    // var performanceTasksPercentage = data.subject
                    //     .performance_tasks_percentage;
                    // var quarterlyAssessmentPercentage = data.subject
                    //     .quarterly_assessment_percentage;

                    // $('.possible_weighted_average[data-component="written_works"]')
                    //     .text(
                    //         writtenWorkPercentage);
                    // $('.possible_weighted_average[data-component="performance_tasks"]')
                    //     .text(performanceTasksPercentage);
                    // $('.possible_weighted_average[data-component="quarterly_assessment"]')
                    //     .text(quarterlyAssessmentPercentage);


                    $('.header_container').html(`<span class="text-center mx-4 fs-5 subject_name">--------------</span>
                                                        <span class="float-md-end mx-4 fs-5 quarter_tabs">
                                                                <div class="messageTOUser mb-3">
                                                                    @foreach ($quarters as $key => $quarter)
                                                                        <input {{ $quarter->status == 1 ? 'checked' : 'disabled' }} type="radio" id="quarter{{ $key + 1 }}" name="per_quarter" class="per_quarter"
                                                                            value="{{ $quarter->id }}" />
                                                                        <label for="quarter{{ $key + 1 }}">{{ Str::limit($quarter->quarter_name, 4, '') }}</label>
                                                                    @endforeach
                                                                </div>
                                                     </span>`);
                    $('.components').html(`
                                                    <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified"
                                                        role="tablist">
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
                                            `);

                    let sub = ``;
                    // each subjects





                    $.each(data.subjects, function(key, val) {
                        sub += `
                        <input type="radio" id="subject_${key}" name="per_subject" class="per_subject"
                         value="${key}" />
                         <label for="subject_${key}">${val}</label>
                       

                       `;
                    });
                    $('.display_subjects').html(sub);

                    let written_datatable = ``;
                    let performance_datatable = ``;
                    let quarterly_assessment_datatable = ``;
                    let transmuted_grade_datatable = ``;

                    // each data.students
                    $.each(data.students, function(key, student) {
                        written_datatable += `
                                                <tr class="learner_score_container${student.studentId}"
                                                    data-student_id="${student.studentId}">
                                                    <td>${key+1}${ '. ' + student.lastname + ', ' + student.name }
                                                    </td>
                                                    <td><input type="number" name="student_score[]"
                                                            min="1" class="input-sm input-responsive">
                                                    </td>
                                                    <td><input type="number" name="student_score[]"
                                                            min="1" class="input-sm input-responsive">
                                                    </td>
                                                    <td><input type="number" name="student_score[]"
                                                            min="1" class="input-sm input-responsive">
                                                    </td>
                                                    <td><input type="number" name="student_score[]"
                                                            min="1" class="input-sm input-responsive">
                                                    </td>
                                                    <td><input type="number" name="student_score[]"
                                                            min="1" class="input-sm input-responsive">
                                                    </td>
                                                    <td><input type="number" name="student_score[]"
                                                            min="1" class="input-sm input-responsive">
                                                    </td>
                                                    <td><input type="number" name="student_score[]"
                                                            min="1" class="input-sm input-responsive">
                                                    </td>
                                                    <td><input type="number" name="student_score[]"
                                                            min="1" class="input-sm input-responsive">
                                                    </td>
                                                    <td><input type="number" name="student_score[]"
                                                            min="1" class="input-sm input-responsive">
                                                    </td>
                                                    <td><input type="number" name="student_score[]"
                                                            min="1" class="input-sm input-responsive">
                                                    </td>
                                                    <td class="student_total_score text-center"
                                                        data-table="written_works">0
                                                    </td>
                                                    <td class="student_percentage_score text-center"
                                                        data-table="written_works">0</td>
                                                    <td class="student_weighted_average text-center"
                                                        data-table="written_works">0</td>
                                                </tr>
                                                `;

                    });

                    $('.written_data_table').html(`<table class="student-table table-bordered table table-hover table-sticky"
                                                    id="written_works">
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
                                                        <tr class="possible_score_container text-center">
                                                            <th class="text-nowrap text-center">Highest Possible Score</th>
                                                            <th><input type="number" name="possible_score[]"
                                                                    min="1" class="input-sm input-responsive"></th>
                                                            <th><input type="number" name="possible_score[]"
                                                                    min="1" class="input-sm input-responsive"></th>
                                                            <th><input type="number" name="possible_score[]"
                                                                    min="1" class="input-sm input-responsive"></th>
                                                            <th><input type="number" name="possible_score[]"
                                                                    min="1" class="input-sm input-responsive"></th>
                                                            <th><input type="number" name="possible_score[]"
                                                                    min="1" class="input-sm input-responsive"></th>
                                                            <th><input type="number" name="possible_score[]"
                                                                    min="1" class="input-sm input-responsive"></th>
                                                            <th><input type="number" name="possible_score[]"
                                                                    min="1" class="input-sm input-responsive"></th>
                                                            <th><input type="number" name="possible_score[]"
                                                                    min="1" class="input-sm input-responsive"></th>
                                                            <th><input type="number" name="possible_score[]"
                                                                    min="1" class="input-sm input-responsive"></th>
                                                            <th><input type="number" name="possible_score[]"
                                                                    min="1" class="input-sm input-responsive"></th>
                                                            <th class="possible_total_score"
                                                                data-component="written_works">
                                                                0</th>
                                                            <th class="possible_percentage_score"
                                                                data-component="written_works">100</th>
                                                            <th class="possible_weighted_average"
                                                                data-component="written_works">WA</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        ${written_datatable}

                                                    </tbody>
                        </table>`);

                    $.each(data.students, function(key, student) {
                        performance_datatable += `
                                                <tr class="learner_score_container${student.studentId}"
                                                    data-student_id="${student.studentId}">
                                                    <td>${key+1}${ '. ' + student.lastname + ', ' + student.name }
                                                    </td>
                                                        <td><input type="number" name="student_score[]"
                                                                min="1" class="input-sm input-responsive">
                                                        </td>
                                                        <td><input type="number" name="student_score[]"
                                                                min="1" class="input-sm input-responsive">
                                                        </td>
                                                        <td><input type="number" name="student_score[]"
                                                                min="1" class="input-sm input-responsive">
                                                        </td>
                                                        <td><input type="number" name="student_score[]"
                                                                min="1" class="input-sm input-responsive">
                                                        </td>
                                                        <td><input type="number" name="student_score[]"
                                                                min="1" class="input-sm input-responsive">
                                                        </td>
                                                        <td><input type="number" name="student_score[]"
                                                                min="1" class="input-sm input-responsive">
                                                        </td>
                                                        <td><input type="number" name="student_score[]"
                                                                min="1" class="input-sm input-responsive">
                                                        </td>
                                                        <td><input type="number" name="student_score[]"
                                                                min="1" class="input-sm input-responsive">
                                                        </td>
                                                        <td><input type="number" name="student_score[]"
                                                                min="1" class="input-sm input-responsive">
                                                        </td>
                                                        <td><input type="number" name="student_score[]"
                                                                min="1" class="input-sm input-responsive">
                                                        </td>
                                                        <td class="student_total_score text-center"
                                                            data-table="performance_tasks">0</td>
                                                        <td class="student_percentage_score text-center"
                                                            data-table="performance_tasks">0</td>
                                                        <td class="student_weighted_average text-center"
                                                            data-table="performance_tasks">0</td>
                                                </tr>
                                                `;

                    });

                    $('.performance_data_table').html(`<table class="student-table table-bordered table table-hover table-sticky"
                                                id="performance_tasks">
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
                                                        <th class="text-nowrap text-center">Highest Possible Score</th>
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
                                                        <th class="possible_total_score text-center"
                                                            data-component="performance_tasks">0</th>
                                                        <th class="possible_percentage_score text-center"
                                                            data-component="performance_tasks">100</th>
                                                        <th class="possible_weighted_average text-center"
                                                            data-component="performance_tasks">WA</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        ${performance_datatable}
                                                </tbody>
                        </table>`);

                    $.each(data.students, function(key, student) {
                        quarterly_assessment_datatable += `
                                <tr class="learner_score_container${student.studentId}"
                                                        data-student_id="${student.studentId}">
                                    <td>${key+1}${ '. ' + student.lastname + ', ' + student.name }
                                    </td>
                                    <td class="text-center"><input type="number" name="student_score[]" min="1" class="input-sm input-responsive"></td>
                                    <td class="student_total_score text-center" data-table="quarterly_assessment">0</td>
                                    <td class="student_percentage_score text-center" data-table="quarterly_assessment">0</td>
                                    <td class="student_weighted_average text-center" data-table="quarterly_assessment">0</td>
                                </tr>             
                            `;

                    });

                    $('.assessment_data_table').html(`
                            <table class="student-table table-bordered table table-hover table-sticky"
                                                    id="quarterly_assessment">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="text-center">1</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">PS</th>
                                        <th class="text-center">WA</th>
                                    </tr>
                                    <tr class="possible_score_container">
                                        <th class="text-nowrap text-center">Highest Possible Score</th>
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
                                        ${quarterly_assessment_datatable}
                                </tbody>
                            </table>`);


                    $.each(data.students, function(key, student) {
                        transmuted_grade_datatable += `
                                <tr class="learner_score_container_${key}"
                                                            data-student_id="${student.studentId}">
                                        <td>${key+1}${ '. ' + student.lastname + ', ' + student.name }
                                        </td>
                                        <td class="text-center initial_grade">0</td>
                                        <td class="text-center student_quarterly_grade">0</td>
                                </tr>       
                            `;

                    });

                    $('.transmuted_data_table').html(`
                        <table class="student-table table table-hover table-sticky table-bordered"
                                            id="transmuted_grades_table">
                                <thead>
                                    <tr class="possible_score_container">
                                        <th class="text-nowrap">Student Name</th>
                                        <th class="text-center text-center">Initial Grade</th>
                                        <th class="text-center text-center">Quarterly Grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${transmuted_grade_datatable}
                                </tbody>
                    </table>`);


                }
            });
        });



        $('body').on('change', 'input[name="per_subject"]', function() {
            if ($(this).is(':checked')) {
                // Radio button is checked

                var subject_id = $(this).val();
                

                let data = {
                    subject_id: subject_id,
                    quarter: $('input[name="per_quarter"]:checked').val(),
                    sy: $('.school_year_select :selected').val(),
                    section: $('.section_select :selected').val(),
                };


                console.log(data);

                $.ajax({
                    type: "POST",
                    url: "/teacher/grade-component/filter-grades/display-grades",
                    data: {
                        subject_id: subject_id,
                        quarter: $('input[name="per_quarter"]:checked').val(),
                        sy: $('.school_year_select :selected').val(),
                        section: $('.section_select :selected').val(),
                    },
                    success: function(data) {

                        let query = data.display_grades.length > 0 ? true : false;
                        // console.log(data.display_grades[0].id);

                        var writtenWorkPercentage = data.subject
                            .written_work_percentage;
                        var performanceTasksPercentage = data.subject
                            .performance_tasks_percentage;
                        var quarterlyAssessmentPercentage = data.subject
                            .quarterly_assessment_percentage;

                        $('.possible_weighted_average[data-component="written_works"]')
                            .text(query ? data.display_grades[0].id :
                                writtenWorkPercentage);
                        $('.possible_weighted_average[data-component="performance_tasks"]')
                            .text(query ? data.display_grades[0].id :
                                performanceTasksPercentage);

                        $('.possible_weighted_average[data-component="quarterly_assessment"]')
                            .text(query ? data.display_grades[0].id :
                                quarterlyAssessmentPercentage);



                        let theadInputs = $('#written_works thead tr').find('input');

                        $('#written_works tbody tr').each(function(index, element) {
                            let inputs = $(this).find('input');
                            let totals = $('[data-table="written_works"]');

                            // console.log($(totals).text());



                            totals.each(function(i) {
                                let total = i;
                                // $(this).val(query ? (total !== '0' ? total : '') : '');
                                $(this).text(i);
                            });


                            let displayGrades = data.display_grades[index];

                            if (displayGrades && displayGrades
                                .written_student_score) {
                                let old = displayGrades.written_student_score.split(
                                    ",");
                                console.log(old);

                                inputs.each(function(i) {
                                    let inputValue = old[i];
                                    $(this).val(query ? (inputValue !==
                                        '0' ? inputValue : '') : '');
                                });













                            } else {
                                inputs.val(
                                    ''); // Clear the inputs if there is no data
                            }
                            // Assuming you have a unique identifier for each subject (e.g., subjectId)
                            // let subjectId = $(this).data('subject-id');
                            
                         
                            let thead = $('#written_works').find('thead').data('my-data', subject_id);
                            let theadInputs = thead.find('input');

                            let possibleScores = query? displayGrades
                                .written_possible_score.split(","): 0;
                            theadInputs.each(function(i) {
                                let possible_scores = possibleScores[i] ||
                                    '';
                                let value = 'Some value ' + (i +
                                1); // Example: Change this line with your desired logic
                                $(this).val(query ? (possible_scores !==
                                        '0' ? possible_scores : '') :
                                    '');
                            });


                        });



                        // if (data.display_grades.length > 0) {
                        //     console.log("Data value is greater than 0");
                        // } else {
                        //     console.log("No data found");
                        //     console.log('Students data has length of: ' + data.students
                        //         .length);
                        //     var writtenWorkPercentage = data.subject
                        //         .written_work_percentage;
                        //     var performanceTasksPercentage = data.subject
                        //         .performance_tasks_percentage;
                        //     var quarterlyAssessmentPercentage = data.subject
                        //         .quarterly_assessment_percentage;

                        //     $('.possible_weighted_average[data-component="written_works"]')
                        //         .text(
                        //             writtenWorkPercentage);
                        //     $('.possible_weighted_average[data-component="performance_tasks"]')
                        //         .text(performanceTasksPercentage);
                        //     $('.possible_weighted_average[data-component="quarterly_assessment"]')
                        //         .text(quarterlyAssessmentPercentage);
                        // }
                    }
                });
            }
        });
        $('body').on('input', 'input[name="student_score[]"]', function() {
            var container = $(this).closest('tr');
            var studentScores = container.find('input[name="student_score[]"]');
            var totalScore = 0;

            var possibleTotalScore = parseInt(container.closest('table').find(
                    '.possible_total_score')
                .text());
            var possible_weighted_average = parseInt(container.closest('table').find(
                '.possible_weighted_average').text());

            var wa = possible_weighted_average / 100;

            studentScores.each(function() {
                var score = parseInt($(this).val()) || 0;
                totalScore += score;
            });

            var percentageScore = (totalScore / possibleTotalScore) * 100;
            var student_weighted_average = percentageScore * wa;

            var tableId = container.closest('table').attr('id');

            container.find('.student_total_score[data-table="' + tableId + '"]').text(Math
                .round(
                    totalScore));
            container.find('.student_percentage_score[data-table="' + tableId + '"]').text(
                Math.round(
                    percentageScore));
            container.find('.student_weighted_average[data-table="' + tableId + '"]').text(
                Math.round(
                    student_weighted_average));




            var studentWeightedAverages = {
                written: [],
                performance: [],
                assessment: [],
            };
            // Table 1
            $('table#written_works tbody tr').each(function() {
                let container = $(this);
                let student_id = container.attr('data-student_id');

                let student_weighted_average = $(this).find(
                    '.student_weighted_average').text();
                studentWeightedAverages.written.push(student_weighted_average);
            });
            $('table#performance_tasks tbody tr').each(function() {
                let container = $(this);
                let student_id = container.attr('data-student_id');

                let student_weighted_average = $(this).find(
                    '.student_weighted_average').text();
                studentWeightedAverages.performance.push(student_weighted_average);
            });
            $('table#quarterly_assessment tbody tr').each(function() {
                let container = $(this);
                let student_id = container.attr('data-student_id');

                let student_weighted_average = $(this).find(
                    '.student_weighted_average').text();
                studentWeightedAverages.assessment.push(student_weighted_average);
            });


            console.log(studentWeightedAverages);

            $.each(studentWeightedAverages.assessment, function(key, val) {



                let a = parseFloat(val);
                let b = parseFloat(studentWeightedAverages.performance[key]);
                let c = parseFloat(studentWeightedAverages.written[key]);

                let initial_grade = Math.round(a + b + c);

                $(`.learner_score_container_${key}`).find('.initial_grade').text(initial_grade);
                // console.log($(`.learner_score_container_${key+1}`));
                studentTransmutedGrade(initial_grade).then(function(
                        transmutedGrade) {
                        $(`.learner_score_container_${key}`).find(
                            '.student_quarterly_grade').text(
                            transmutedGrade);
                    })
                    .catch(function(error) {
                        console.error("Error:", error);
                    });
            });

        });


        $('body').on('input', 'input[name="possible_score[]"]', function() {
            var row = $(this).closest('tr');
            var table = row.closest('table');
            var inputs = table.find('input[name="possible_score[]"]');
            var total = 0;
            inputs.each(function() {
                var value = parseInt($(this).val()) || 0;
                total += value;
            });
            table.find('.possible_total_score').text(total);
        });



        $('#saveButton').on('click', function() {
            var data = {
                sy: $('.school_year_select :selected').val(),
                subject_id: $('input[name="per_subject"]:checked').val(),
                section_id: $('.section_select :selected').val(),
                quarter_id: $('input[name="per_quarter"]:checked').val(),
                outputs: [],
                performance_outputs: [],
                assessment_outputs: [],
                transmuted_grade: [],
            };

            $('#written_works tbody tr').each(function() {
                let written = {
                    student_id: $(this).data('student_id'),
                    written_possible_scores: [],
                    written_student_scores: [],
                    written_possible_total_score: $(this).parents('table').find('thead')
                        .find('tr').find('.possible_total_score').text(),
                    written_student_total_score: $(this).find('.student_total_score')
                        .text(),
                    written_student_percentage_score: $(this).find(
                        '.student_percentage_score').text(),
                    written_student_weighted_average: $(this).find(
                        '.student_weighted_average').text(),

                };

                $(this).find('input[name="student_score[]"]').each(function() {
                    let score = parseInt($(this).val()) || 0;
                    written.written_student_scores.push(score);
                });
                $(this).parents('table').find('thead').find('tr').find(
                    'input[name="possible_score[]"]').each(function() {
                    let possibleScore = parseInt($(this).val()) || 0;
                    written.written_possible_scores.push(possibleScore);
                });
                data.outputs.push(written);
            });

            $('#performance_tasks tbody tr').each(function() {
                let performance = {
                    performance_possible_scores: [],
                    performance_student_scores: [],
                    performance_possible_total_score: $(this).parents('table').find('thead')
                        .find('tr').find('.possible_total_score').text(),
                    performance_student_total_score: $(this).find('.student_total_score')
                        .text(),
                    performance_student_percentage_score: $(this).find(
                        '.student_percentage_score').text(),
                    performance_student_weighted_average: $(this).find(
                        '.student_weighted_average').text(),

                };

                $(this).find('input[name="student_score[]"]').each(function() {
                    let score = parseInt($(this).val()) || 0;
                    performance.performance_student_scores.push(score);
                });
                $(this).parents('table').find('thead').find('tr').find(
                    'input[name="possible_score[]"]').each(function() {
                    let possibleScore = parseInt($(this).val()) || 0;
                    performance.performance_possible_scores.push(possibleScore);
                });
                data.performance_outputs.push(performance);
            });

            $('#quarterly_assessment tbody tr').each(function() {
                let assessment = {
                    assessment_possible_scores: [],
                    assessment_student_scores: [],
                    assessment_possible_total_score: $(this).parents('table').find('thead')
                        .find('tr').find('.possible_total_score').text(),
                    assessment_student_total_score: $(this).find('.student_total_score')
                        .text(),
                    assessment_student_percentage_score: $(this).find(
                        '.student_percentage_score').text(),
                    assessment_student_weighted_average: $(this).find(
                        '.student_weighted_average').text(),

                };

                $(this).find('input[name="student_score[]"]').each(function() {
                    let score = parseInt($(this).val()) || 0;
                    assessment.assessment_student_scores.push(score);
                });
                $(this).parents('table').find('thead').find('tr').find(
                    'input[name="possible_score[]"]').each(function() {
                    let possibleScore = parseInt($(this).val()) || 0;
                    assessment.assessment_possible_scores.push(possibleScore);
                });
                data.assessment_outputs.push(assessment);
            });

            $('#transmuted_grades_table tbody tr').each(function() {
                let transmuted = {
                    initial_grade: $(this).find('#initial_grade').text(),
                    final_grade: $(this).find('#student_quarterly_grade').text(),
                };

                data.transmuted_grade.push(transmuted);
            });

            console.log(data);

            $.ajax({
                method: 'POST',
                url: '/teacher/grade-component/save',
                data: data,
                success: function(response) {


                    // console.log(response.students);
                    //     console.log(response);
                    if (response.success) {
                        alert('Grades saved successfully.');
                    } else {
                        alert('Failed to save grades.');
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    alert('An error occurred while saving grades.');
                }
            });
        });

    });
</script>
