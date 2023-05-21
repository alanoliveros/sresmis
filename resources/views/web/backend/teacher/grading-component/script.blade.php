<script>
    $(document).ready(function() {

        $('.school_year_select').on('change', function() {

            let sy = $('.school_year_select :selected').val();
            // ajax
            $.ajax({
                method: "POST",
                url: "/teacher/grade-component/get_section",
                data: {
                    'sy': sy,
                },
                success: function(data) {
                    // console.log(data);
                    let option = `<option selected disabled>Select Section</option>`;

                    $.each(data.sections, function(key, val) {
                        option += `
                        <option value="${key}">${val}</option>
                        `;
                    });
                    $('.per_section').html(option);
                }
            });
        });
        $('.per_section').on('change', function() {

            let section = $('.per_section :selected').val();
            // ajax
            $.ajax({
                method: "POST",
                url: "/teacher/grade-component/get_subjects",
                data: {
                    'section_id': section,
                },
                success: function(data) {
                    let option = `<option selected disabled>Select Subject</option>`;

                    $.each(data.subjects, function(key, val) {
                        option += `
                        <option value="${key}">${val}</option>
                        `;
                    });
                    $('.per_subject').html(option);
                }
            });
        });

        $('body').on('click', '.quarterly_grade', function() {
            let x = $(this).closest('li').find('input[name="quarterly_grade"]').prop('checked', true);
            // console.log($('input[name="quarterly_grade"]:checked').val());
            // console.log($(x).val());
            
            // $('input[name="yourRadioGroupName"]:checked').val();
        });


        $('.per_subject').on('change', function() {

            let section = $('.per_subject :selected').val();
            $('.filter_data').prop('disabled', false);
        });


        $('.filter_data').on('click', function() {
            let sy = $('.school_year_select :selected').val();
            let section_id = $('.per_section :selected').val();
            let subject_id = $('.per_subject :selected').val();

            console.log(sy);
            console.log(section_id);
            console.log(subject_id);


            // ajax
            $.ajax({
                method: "POST",
                url: "/teacher/quarter-grades/get_student_summary_grade",
                data: {
                    'sy': sy,
                    'section_id': section_id,
                    'subject_id': subject_id,
                },
                success: function(data) {
                    console.log(data);
                    // <a class="btn btn-primary rounded-0 print_excel_summary">Print</a>

                    let table = ``;

                    $.each(data.students, function(key, student){
                        table += `<tr>
                                    <td class="">${student.lastname+ ', '+student.name}</td>
                                    <td class="text-center">${student.quarter_1 != null? student.quarter_1 : '---'}</td>
                                    <td class="text-center">${student.quarter_2 != null? student.quarter_2 : '---'}</td>
                                    <td class="text-center">${student.quarter_3 != null? student.quarter_3 : '---'}</td>
                                    <td class="text-center">${student.quarter_4 != null? student.quarter_4 : '---'}</td>
                                    <td class="text-center">Final</td>
                                    <td class="text-center">Initial</td>
                                  </tr>
                                  `;


                    });
                    $('.summary_grade_tbody').html(table);
                }
            });
        });
        $('.print_excel_summary').on('click', function() {
            let quarter_name = $('input[name="quarterly_grade"]:checked').val();
            console.log(quarter_name);

            // if ($('.quarterly_grade').hasClass('active')) {
            //     var dataValue = $('.quarterly_grade').attr('data-per_quarter');
            //     console.log(dataValue);
            // }
            // console.log(quarterly_grade);

            // let quarter = $('.quarter_select :selected').val();

            // // ajax
            // $.ajax({
            //     method: "POST",
            //     url: "/teacher/grade-component/display_subjects",
            //     data: {
            //         'sy': sy,
            //         'quarter': quarter,
            //     },
            //     success: function(data) {
            //         // console.log(data);
            //     }
            // });
        });
    });
</script>
