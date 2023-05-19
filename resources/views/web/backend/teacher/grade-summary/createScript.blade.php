<script>
    $(document).ready(function() {
        // function filtelterData() {
        //     let sy = $('.school_year_select :selected').val();
        //     let subject_id = $('.subject_select :selected').val();
        //     let quarter_id = $('.subject_select :selected').val();

        //     // ajax
        //     $.ajax({
        //         method: "POST",
        //         url: "/teacher/grade-component/search-students",
        //         data: {
        //             'sy': sy,
        //             'subject_id': subject_id,
        //             'quarter_id': quarter_id,
        //         },
        //         success: function(data) {

        //         }
        //     });
        // }

        // filtelterData();

        // function studentTransmutedGrade(initialGrade) {
        //     var retVal;
        //     $.ajax({
        //         method: "POST",
        //         url: '/teacher/student-grades/transmuted-grade',
        //         data: {
        //             "initialGrade": parseInt(initialGrade),
        //             "_token": "{{ csrf_token() }}",
        //         },
        //         async: false,
        //         success: function(data) {
        //             retVal = parseInt(data.transmuted);
        //             // console.log(data.grade);
        //         }
        //     });
        //     return retVal;
        // }

        function studentTransmutedGrade(initialGrade) {
            return new Promise(function(resolve, reject) {
                $.ajax({
                    method: "POST",
                    url: '/teacher/student-grades/transmuted-grade',
                    data: {
                        "initialGrade": parseInt(initialGrade),
                        "_token": "{{ csrf_token() }}",
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
            let selectedSchoolYear = $('.school_year_select :selected').val();
            console.log('Selected School Year:', selectedSchoolYear);
            // Your code here...
        });

        $('.subject_select').on('change', function() {
            let subject = $('.subject_select :selected').val();
            if ($.isNumeric(subject)) {
                $('input[name="student_score[]"]').prop('disabled', false);
                $('input[name="possible_score[]"]').prop('disabled', false);
            } else {
                $('input[name="student_score[]"]').prop('disabled', true);
                $('input[name="possible_score[]"]').prop('disabled', true);
            }

            $.ajax({
                method: "POST",
                url: "/teacher/grade-component/filter-subject/",
                data: {
                    "subject": subject,
                },
                success: function(data) {
                    var writtenWorkPercentage = data.subject.written_work_percentage;
                    var performanceTasksPercentage = data.subject
                        .performance_tasks_percentage;
                    var quarterlyAssessmentPercentage = data.subject
                        .quarterly_assessment_percentage;

                    $('.possible_weighted_average[data-component="written_works"]').text(
                        writtenWorkPercentage);
                    $('.possible_weighted_average[data-component="performance_tasks"]')
                        .text(performanceTasksPercentage);
                    $('.possible_weighted_average[data-component="quarterly_assessment"]')
                        .text(quarterlyAssessmentPercentage);
                }
            });
            // Your code here...
        });

        $('input[name="student_score[]"]').prop('disabled', true);
        $('input[name="possible_score[]"]').prop('disabled', true);

        $('input[name="student_score[]"]').on('input', function() {
            var container = $(this).closest('tr');
            var studentScores = container.find('input[name="student_score[]"]');
            var totalScore = 0;

            var possibleTotalScore = parseInt(container.closest('table').find('.possible_total_score')
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

            container.find('.student_total_score[data-table="' + tableId + '"]').text(Math.round(
                totalScore));
            container.find('.student_percentage_score[data-table="' + tableId + '"]').text(Math.round(
                percentageScore));
            container.find('.student_weighted_average[data-table="' + tableId + '"]').text(Math.round(
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

                let student_weighted_average = $(this).find('.student_weighted_average').text();
                studentWeightedAverages.written.push(student_weighted_average);
            });
            $('table#performance_tasks tbody tr').each(function() {
                let container = $(this);
                let student_id = container.attr('data-student_id');

                let student_weighted_average = $(this).find('.student_weighted_average').text();
                studentWeightedAverages.performance.push(student_weighted_average);
            });
            $('table#quarterly_assessment tbody tr').each(function() {
                let container = $(this);
                let student_id = container.attr('data-student_id');

                let student_weighted_average = $(this).find('.student_weighted_average').text();
                studentWeightedAverages.assessment.push(student_weighted_average);
            });

            $.each(studentWeightedAverages.assessment, function(key, val) {
                let a = parseFloat(val);
                let b = parseFloat(studentWeightedAverages.performance[key]);
                let c = parseFloat(studentWeightedAverages.written[key]);

                let initial_grade = Math.round(a + b + c);

                $(`.learner_score_container_${key+1}`).find('#initial_grade').text(
                    initial_grade);

                studentTransmutedGrade(initial_grade).then(function(transmutedGrade) {

                        $(`.learner_score_container_${key+1}`).find(
                            '#student_quarterly_grade').text(transmutedGrade);
                        // console.log("Transmuted Grade:", );
                        // Continue with further processing or display the transmuted grade
                    })
                    .catch(function(error) {
                        console.error("Error:", error);
                        // Handle the error case if necessary
                    })






                // console.log(a+b+c);
            });

        });


        $('input[name="possible_score[]"]').on('input', function() {
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
                subject_id: $('.subject_select :selected').val(),
                quarter_id: $('.quarter_select :selected').val(),
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
