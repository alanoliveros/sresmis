<script>
    $(document).ready(function() {

        function finalRatingPerSubjectRate() {
            let finalRatingTextLength = $('.finalRatingPerSubject').filter(function() {
                return $(this).text().trim() !== '';
            }).length;

            // let total = 0;
            let overallTotal = 0;

            $('.finalRatingPerSubject').each(function() {
                let text = parseInt($(this).text().trim());
                if (!isNaN(text)) {
                    overallTotal += text;
                }
            });

            let result = overallTotal / finalRatingTextLength;

            $('.general_average_value').text(result + '%');
            // console.log(result);
            // console.log(finalRatingTextLength);
            // console.log(overallTotal);


            // console.log(total);
            // let result = Math.round(total / finalRatingTextLength);
            // $('.general_average_value').text(total);
        }

        function calculateQuarterMapeh(selector, outputSelector) {
            let total = 0;
            let length = 0;
            // console.log(selector);
            // console.log(outputSelector);

            length = parseInt($(selector).filter(function() {
                return $(this).val().trim() !== '';
            }).length);

            $(selector).each(function(key, val) {
                let value = parseInt($(this).val()) || 0;
                total += value;
                // console.log($(val).val());
            });



            let result = Math.round(total / length);
            $(outputSelector).text(isNaN(result) ? '' : result);
        }

        function calculateRating(className) {
            let rating = 0;
            let length = 0;

            length = $(`.mapehall`).filter(function() {
                let text = $(this).text().trim();
                return /^\d+$/.test(text);
            }).length;



            $.each($(`.mapehall`), function(key, val) {
                let value = parseInt($(this).text()) || 0;
                rating += value;
            });
            // console.log('rating ' + rating);
            // console.log('length ' + length);
            // console.log('className ' + className);

            let totalRating = Math.round(rating / length);
            $(`.${className}`).text(totalRating);

            let remarks = (totalRating <= 74) ? 'Failed' : 'Passed';
            $('.remarksMapeh').text(remarks);
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
                    // console.log(data);

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
                                        <td style="background-color:#e4e4e4" class="firstQuarterMapeh mapehall text-center"></td>
                                        <td style="background-color:#e4e4e4" class="secondQuarterMapeh mapehall text-center"></td>
                                        <td style="background-color:#e4e4e4" class="thirdQuarterMapeh mapehall text-center"></td>
                                        <td style="background-color:#e4e4e4" class="fourthQuarterMapeh mapehall text-center"></td>
                                        <td style="background-color:#e4e4e4" class="finalRatingMapeh finalRatingPerSubject text-center"></td>
                                        <td style="background-color:#e4e4e4" class="remarksMapeh text-center"></td>
                                    </tr>
                                    <tr data-id="${val.subject_id}" class="subjectReference ${val.subject_id}">
                                        <td>${val.subjectName}</td>
                                        <td><input style="border:none;" class="text-center firstPart" name="grading_input[]"  min="60" type="number"/></td>
                                        <td><input style="border:none;" class="text-center secondPart" name="grading_input[]"  min="60" type="number"/></td>
                                        <td><input style="border:none;" class="text-center thirdPart" name="grading_input[]"  min="60" type="number"/></td>
                                        <td><input style="border:none;" class="text-center fourthPart" name="grading_input[]"  min="60" type="number"/></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                `;
                            } else {
                                tbody += `
                                    <tr data-id="${val.subject_id}" class="subjectReference ${val.subject_id}">
                                        <td>${val.subjectName}</td>
                                        <td><input style="border:none;" class="text-center ${val.subject_id == 10? 'firstPart': val.subject_id == 11? 'firstPart': val.subject_id == 12? 'firstPart':''}" name="grading_input[]"  min="60" type="number"/></td>
                                        <td><input style="border:none;" class="text-center ${val.subject_id == 10? 'secondPart': val.subject_id == 11? 'secondPart': val.subject_id == 12? 'secondPart':''}" name="grading_input[]"  min="60" type="number"/></td>
                                        <td><input style="border:none;" class="text-center ${val.subject_id == 10? 'thirdPart': val.subject_id == 11? 'thirdPart': val.subject_id == 12? 'thirdPart':''}" name="grading_input[]"  min="60" type="number"/></td>
                                        <td><input style="border:none;" class="text-center ${val.subject_id == 10? 'fourthPart': val.subject_id == 11? 'fourthPart': val.subject_id == 12? 'fourthPart':''}" name="grading_input[]"  min="60" type="number"/></td>
                                        <td class=" text-center ${val.subject_id == 10 ? 'skip' : (val.subject_id == 11 ? 'skip' : (val.subject_id == 12 ? 'skip' : 'finalRatingPerSubject'))}"></td>
                                        <td class="${val.subject_id == 10 ? 'skip' : (val.subject_id == 11 ? 'skip' : (val.subject_id == 12 ? 'skip' : 'remarksPerSubject'))} text-center"></td>
                                    </tr>
                                `;
                            }

                            if (key === data.subjects.length - 1 && !
                                classAverageAdded) {
                                tbody += `
                                    <tr class="average">
                                        <td></td>
                                        <td colspan="4" class="text-end">General Average</td>
                                        <td class="general_average_value text-center"></td>
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

            // ajax
            $.ajax({
                type: "GET",
                url: "/teacher/report-card/get-data",
                data: {
                    'student_id': $('.student_select :selected').val(),
                    'sy': $('.school_year_select :selected').val(),
                },
                success: function(data) {


                    console.log(data);

                    if (data.core_values.length > 0) {
                        $.each(data.core_values, function(index, val) {
                            let rowValues =
                                val; // Assuming each core_value object has properties quarter_1, quarter_2, quarter_3, and quarter_4
                            let selectElements = $(
                                `tr[data-values="${val.core_values}"]`).find(
                                'select');

                            selectElements.each(function(index) {
                                let quarterValue = rowValues[
                                    `quarter_${index + 1}`
                                ]; // Get the value for the corresponding quarter (quarter_1, quarter_2, etc.)
                                $(this).val(quarterValue);
                            });
                        });
                    }

                    // Assuming you have an existing table with an ID of "existingTable"
                    let table = $('.report_card').find('tbody');

                    let container = $('.report_card').find('tbody').find('tr');
                    let excludedIds = [9, 10, 11, 12]; // IDs to exclude

                    $.each(data.students, function(index, subject) {
                        let subjectId = subject.subject_id;
                        let grades = [subject.quarter_1, subject.quarter_2,
                            subject
                            .quarter_3, subject.quarter_4
                        ];
                        let finalGrading = subject.final_grade;
                        let remarks = subject.remarks;

                        // Check if the subject ID is in the excluded IDs array
                        if (!excludedIds.includes(parseInt(subjectId))) {
                            // Find the table row with matching subjectId
                            let row = table.find('tr.' + subjectId);

                            // Populate the input values
                            row.find('input[name="grading_input[]"]').each(
                                function(
                                    index) {
                                    $(this).val(grades[index]);
                                });

                            // Populate the final grading
                            row.find('.finalRatingPerSubject').text(
                                finalGrading);

                            // Populate the remarks
                            row.find('.remarksPerSubject').text(remarks);
                            finalRatingPerSubjectRate()
                        } else if (excludedIds.includes(parseInt(subjectId))) {


                            let row = table.find('tr.' + subjectId);

                            // Populate the input values
                            row.find('input[name="grading_input[]"]').each(
                                function(
                                    index) {
                                    $(this).val(grades[index]);
                                });

                            calculateQuarterMapeh('.firstPart',
                                '.firstQuarterMapeh');
                            // console.log(container.attr('class'));
                            // second Quarter PE
                            calculateQuarterMapeh('.secondPart',
                                '.secondQuarterMapeh');
                            // third Quarter PE
                            calculateQuarterMapeh('.thirdPart',
                                '.thirdQuarterMapeh');
                            // fourth Quarter PE
                            calculateQuarterMapeh('.fourthPart',
                                '.fourthQuarterMapeh');

                            let val = 'finalRatingMapeh';
                            calculateRating(val);
                            finalRatingPerSubjectRate();

                        }
                    });


                }
            });

        });

        $('body').on('input', 'input[name="grading_input[]"]', function() {

            console.log('asdasd');
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
                let total = Math.round(final_grade_total);
                let remarks = '';

                if (total <= 74) {
                    remarks = 'Failed';
                } else if (total >= 75) {
                    remarks = 'Passed';
                }

                container.find('.finalRatingPerSubject').text(total);
                container.find('.remarksPerSubject').text(remarks);

                // console.log(excludedIds);
                finalRatingPerSubjectRate();
            }

            if (excludedIds.includes(parseInt(container.attr('data-id')))) {
                let studentScores = container.find('input[name="grading_input[]"]');

                // console.log(excludedIds);

                // first Quarter PE
                calculateQuarterMapeh('.firstPart', '.firstQuarterMapeh');
                // console.log(container.attr('class'));
                // second Quarter PE
                calculateQuarterMapeh('.secondPart', '.secondQuarterMapeh');
                // third Quarter PE
                calculateQuarterMapeh('.thirdPart', '.thirdQuarterMapeh');
                // fourth Quarter PE
                calculateQuarterMapeh('.fourthPart', '.fourthQuarterMapeh');




                calculateRating('finalRatingMapeh');
                finalRatingPerSubjectRate();
            }


        });

        $('body').on('click', '.btnSaveCard', function() {
            let data = {
                student_id: $('.student_select :selected').val(),
                sy: $('.school_year_select :selected').val(),
                subject_ids: [],
                makadiyos: [],
                makatao: [],
                makakalikasan: [],
                makabansa_first: [],
                makabansa_second: [],
            };


            $('select[name^="makadiyos"]').each(function() {
                let selectedValue = $(this).val();
                data.makadiyos.push(selectedValue);
            });
            $('select[name^="makatao"]').each(function() {
                let selectedValue = $(this).val();
                data.makatao.push(selectedValue);
            });
            $('select[name^="makakalikasan"]').each(function() {
                let selectedValue = $(this).val();
                data.makakalikasan.push(selectedValue);
            });
            $('select[name^="makabansa_first"]').each(function() {
                let selectedValue = $(this).val();
                data.makabansa_first.push(selectedValue);
            });
            $('select[name^="makabansa_second"]').each(function() {
                let selectedValue = $(this).val();
                data.makabansa_second.push(selectedValue);
            });


            $('.subjectReference').each(function() {
                let parent = $(this);
                let id = parent.attr('data-id');
                let subjectId = parent.attr('class').split(' ')[0];
                let inputValues = [];
                let finalGrading = '';
                let remarks = '';

                parent.find('td input[name="grading_input[]"]').each(function() {
                    let inputValue = $(this).val();
                    inputValues.push(inputValue);
                });

                finalGrading = parent.find('.finalRatingPerSubject').text();
                remarks = parent.find('.remarksPerSubject').text();

                data.subject_ids.push({
                    id: id,
                    grades: inputValues,
                    finalGrading: finalGrading,
                    remarks: remarks
                });
            });

            // console.log(data);

            $.ajax({
                type: 'POST',
                url: '/teacher/report-card/create',
                data: {
                    data: data
                },
                success: function(data) {
                    // console.log(data);


                    if (data.status == 'success') {
                        sweetAlert("Save successfully", "success");
                    } else {
                      
                    }
                }
            });


        });
    });
</script>
