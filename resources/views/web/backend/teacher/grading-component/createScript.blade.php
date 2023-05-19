<script>
    $(document).ready(function() {
        function filtelterData() {
            let sy = $('.school_year_select :selected').val();
            let subject_id = $('.subject_select :selected').val();
            let quarter_id = $('.subject_select :selected').val();

            // ajax
            $.ajax({
                method: "POST",
                url: "/teacher/grade-component/search-students",
                data: {
                    'sy': sy,
                    'subject_id': subject_id,
                    'quarter_id': quarter_id,
                },
                success: function(data) {

                }
            });
        }

        filtelterData();

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
                    // console.log(data.sub);
                    $('.possible_weighted_average').text(data.subject
                        .written_work_percentage);
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
            var possibleTotalScore = parseInt($('.possible_total_score').text());
            var possible_weighted_average = parseInt($('.possible_weighted_average').text());
            var wa = possible_weighted_average / 100;

            studentScores.each(function() {
                var score = parseInt($(this).val()) || 0;
                totalScore += score;
            });

            var percentageScore = (totalScore / possibleTotalScore) * 100;
            var student_weighted_average = percentageScore * wa;

            container.find('.student_percentage_score').text(Math.round(percentageScore));
            container.find('.student_total_score').text(Math.round(totalScore));
            container.find('.student_weighted_average').text(Math.round(student_weighted_average));
        });


        $('input[name="possible_score[]"]').on('input', function() {
            var row = $(this).closest('tr');
            var inputs = row.find('input[name="possible_score[]"]');
            var total = 0;
            inputs.each(function() {
                var value = parseInt($(this).val()) || 0;
                total += value;
            });
            row.find('.possible_total_score').text(total);
        });

        $('#saveButton').on('click', function() {
            var data = {
                sy: $('.school_year_select :selected').val(),
                subject_id: $('.subject_select :selected').val(),
                quarter_id: $('.quarter_select :selected').val(),
                students: [],
            };

            $('tbody tr').each(function() {
                var student = {
                    student_id: $(this).data('student_id'),
                    student_total_score: $(this).find('.student_total_score').text(),
                    possible_total_score: $(this).parents('table').find('thead').find('tr').find('.possible_total_score').text(),
                    student_percentage_score: $(this).find('.student_percentage_score').text(),
                    student_weighted_average: $(this).find('.student_weighted_average').text(),
                    scores: [],
                    possible_scores: [],
                    
                };

                $(this).find('input[name="student_score[]"]').each(function() {
                    var score = parseInt($(this).val()) || 0;
                    student.scores.push(score);
                });

                
                $(this).parents('table').find('thead').find('tr').find('input[name="possible_score[]"]').each(function() {
                    var possibleScore = parseInt($(this).val()) || 0;
                    student.possible_scores.push(possibleScore);
                });

                data.students.push(student);


            });

            console.log(data);

            $.ajax({
                method: 'POST',
                url: '/teacher/grade-component/save',
                data: data,
                success: function(response) {
                    console.log(response);
                    // if (response.success) {
                    //     alert('Grades saved successfully.');
                    // } else {
                    //     alert('Failed to save grades.');
                    // }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    alert('An error occurred while saving grades.');
                }
            });
        });

    });
</script>
