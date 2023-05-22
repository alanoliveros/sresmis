<script>
    $(document).ready(function() {

        function finalRatingPerSubjectFunction(className) {
            let rating = 0;
            let lengthMapehAll = 0;
            lengthMapehAll = $(`.${className}`).filter(function() {
                let text = $(this).text().trim();
                return /^\d+$/.test(text);
            }).length;

            console.log(lengthMapehAll);
            $(`.${className}`).each(function(key, val) {
                let finalRatingMapeh = parseInt($(this).text()) || 0;
                rating += finalRatingMapeh;
            });

            console.log(rating);

            let totalRating = Math.ceil(rating / lengthMapehAll);
            console.log(totalRating);
            $('.general_average_value').text(totalRating);
        }


        function calculateQuarterMapeh(selector, outputSelector) {
            let total = 0;
            let length = 0;

            length = parseInt($(selector).filter(function() {
                return $(this).val().trim() !== '';
            }).length);

            $(selector).each(function(key, val) {
                let value = parseInt($(this).val()) || 0;
                total += value;
            });

            let result = Math.ceil(total / length);
            $(outputSelector).text(isNaN(result) ? '' : result);

            let rating = 0;
            let lengthMapehAll = 0;
            lengthMapehAll = $('.mapehall').filter(function() {
                let text = $(this).text().trim();
                return /^\d+$/.test(text);
            }).length;

            console.log(lengthMapehAll);
            $('.mapehall').each(function(key, val) {
                let finalRatingMapeh = parseInt($(this).text()) || 0;
                rating += finalRatingMapeh;
            });

            console.log(rating);

            let totalRating = Math.ceil(rating / lengthMapehAll);

            $('.finalRatingMapeh').text(totalRating);
            let remarks = (totalRating <= 74) ? 'Failed' : 'Passed';
            $('.remarksMapeh ').text(remarks);



        }
        $('.school_year_select').on('change', function() {
            let school_year_id = $(this).val();


            //    ajax
            $.ajax({
                type: "POST",
                url: "/teacher/report-card/filter-students",
                data: {
                    sy: school_year_id
                },
                success: function(data) {
                    console.log(data);

                    let tbody = '';
                    let classAverageAdded = false;

                    if (data.subjects.length === 0) {
                        tbody = `
                            <tr>
                                <td colspan="7" class="text-center text-danger">No subjects found</td>
                            </tr>
                        `;
                    } else {
                        $.each(data.subjects, function(key, val) {
                            if (val.subjectName === 'Music') {
                                tbody += `
                                    <tr class="mapeh">
                                        <td style="background-color:#e4e4e4">MAPEH</td>
                                        <td style="background-color:#e4e4e4" class="firstQuarterMapeh mapehall"></td>
                                        <td style="background-color:#e4e4e4" class="secondQuarterMapeh mapehall"></td>
                                        <td style="background-color:#e4e4e4" class="thirdQuarterMapeh mapehall"></td>
                                        <td style="background-color:#e4e4e4" class="fourthQuarterMapeh mapehall"></td>
                                        <td style="background-color:#e4e4e4" class="finalRatingMapeh finalRatingPerSubject"></td>
                                        <td style="background-color:#e4e4e4" class="remarksMapeh "></td>
                                    </tr>
                                    <tr class="${val.subject_id}">
                                        <td>${val.subjectName}</td>
                                        <td><input style="border:none;" class="text-center firstPart" name="grading_input[]"  min="1" type="number"/></td>
                                        <td><input style="border:none;" class="text-center secondPart" name="grading_input[]"  min="1" type="number"/></td>
                                        <td><input style="border:none;" class="text-center thirdPart" name="grading_input[]"  min="1" type="number"/></td>
                                        <td><input style="border:none;" class="text-center fourthPart" name="grading_input[]"  min="1" type="number"/></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                `;
                            } else {
                                tbody += `
                                    <tr class="${val.subject_id}">
                                        <td>${val.subjectName}</td>
                                        <td><input style="border:none;" class="text-center ${val.subject_id == 10? 'firstPart': val.subject_id == 11? 'firstPart': val.subject_id == 12? 'firstPart':''}" name="grading_input[]"  min="1" type="number"/></td>
                                        <td><input style="border:none;" class="text-center ${val.subject_id == 10? 'secondPart': val.subject_id == 11? 'secondPart': val.subject_id == 12? 'secondPart':''}" name="grading_input[]"  min="1" type="number"/></td>
                                        <td><input style="border:none;" class="text-center ${val.subject_id == 10? 'thirdPart': val.subject_id == 11? 'thirdPart': val.subject_id == 12? 'thirdPart':''}" name="grading_input[]"  min="1" type="number"/></td>
                                        <td><input style="border:none;" class="text-center ${val.subject_id == 10? 'fourthPart': val.subject_id == 11? 'fourthPart': val.subject_id == 12? 'fourthPart':''}" name="grading_input[]"  min="1" type="number"/></td>
                                        <td class="finalRatingPerSubject"></td>
                                        <td class="remarksPerSubject"></td>
                                    </tr>
                                `;
                            }

                            if (key === data.subjects.length - 1 && !
                                classAverageAdded) {
                                tbody += `
                                    <tr class="average">
                                        <td></td>
                                        <td colspan="4" class="text-end">General Average</td>
                                        <td class="general_average_value"></td>
                                        <td></td>
                                    </tr>
                                `;
                                classAverageAdded = true;
                            }
                        });
                    }

                    $('.summary_grade_tbody').html(tbody);
                    let stud = `<option disabled selected>Select Student</option>`;
                    $.each(data.students, function(key, val) {
                        stud +=
                            `<option data-studentLRN="${val.lrn}" value="${val.studentId}">${val.lastname+ ', '+ val.name}</option>`;
                    });

                    $('.student_select').html(stud);


                }
            });
        });

        $('.student_select').on('change', function() {
            $('.studentName').text($('.student_select :selected').text());
            $('.student_select :selected').attr('data-studentLRN');
            $('.studentLRN').text($('.student_select :selected').attr('data-studentLRN'));

        });



        $('body').on('input', 'input[name="grading_input[]"]', function() {
            let container = $(this).closest('tr');
            let excludedIds = [9, 10, 11, 12]; // IDs to exclude

            if (!excludedIds.includes(parseInt(container.attr('class')))) {
                let studentScores = container.find('input[name="grading_input[]"]');
                let finalRating = 0;
                let lengthVal = 0;

                lengthVal = parseInt(studentScores.filter(function() {
                    return $(this).val().trim() !== '';
                }).length);

                studentScores.each(function() {
                    let score = parseInt($(this).val()) || 0;
                    finalRating += score;
                });

                let final_grade_total = finalRating / lengthVal;
                let total = Math.ceil(final_grade_total);
                let remarks = '';

                if (total <= 74) {
                    remarks = 'Failed';
                } else if (total >= 75) {
                    remarks = 'Passed';
                }

                container.find('.finalRatingPerSubject').text(total);
                container.find('.remarksPerSubject').text(remarks);

                let values = 'finalRatingPerSubject';

                finalRatingPerSubjectFunction(values);
            }

            if (excludedIds.includes(parseInt(container.attr('class')))) {
                // first Quarter PE
                calculateQuarterMapeh('.firstPart', '.firstQuarterMapeh');

                // second Quarter PE
                calculateQuarterMapeh('.secondPart', '.secondQuarterMapeh');
                // third Quarter PE
                calculateQuarterMapeh('.thirdPart', '.thirdQuarterMapeh');
                // fourth Quarter PE
                calculateQuarterMapeh('.fourthPart', '.fourthQuarterMapeh');


                let values = 'finalRatingPerSubject';

                finalRatingPerSubjectFunction(values);
            }


        });
    });
</script>
