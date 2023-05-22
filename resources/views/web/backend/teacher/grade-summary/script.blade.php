<script>
    $(document).ready(function() {
        function fetchData() {
            let sy = $('.school_year_select :selected').val();

            // ajax
            $.ajax({
                type: 'POST',
                url: '/teacher/grade-summary/filter-student/advisory',
                data: {
                    'sy': sy
                },
                success: function(data) {
                    // $('#student_list').html(data);
                    console.log(data);



                    let th = ``;
                    let quarter = ``;
                    let grades = ``;
                    let tdId = ``;

                    $.each(data.subjects, function(key, subject){

                        // console.log(subject);

                        // quarter += `<th colspan="5" class="text-center">Quarter</th>`;
                        th += `<th class="text-center subject_id_${subject.subject_id}">${subject.subjectName}</th> `;
                        tdId += `<td class="text-center subject_id_${subject.subject_id}">1</th> `;
                        grades+= `
                                <td>Final Grades</td>`;
                    });
                    let studentCOunt =``;
                    
                    $.each(data.students, function(key, student){
                            // console.log(student);


                            $.each(student.subjects, function(subKey, subject){
                                // console.log(subject.quarter_values);
                            });
                        studentCOunt+= `
                        <tr>
                       
                        <td>${student.lastname+', '+ student.name}</td>
                        ${tdId}

                        </tr>
                        `;
                    });
                    $('.summary_grade_table').html(`
                    <table class="table table-bordered border-dark">
                            <thead>
                                <tr>
                                    <th class="th_parent" rowspan="3">Name of Learners</th>
                                    ${th}
                                </tr>
                               
                                <tr class="text-center">
                                    ${grades}
                                    <th class="text-center">General Average</th>
                                    <th class="text-center">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                ${studentCOunt}
                            </tbody>
                    </table>
                    `);
                }
            });
        }




        $('.filter_data').on('click', function() {

            fetchData();
        });
        
        $('.school_year_select').on('change', function() {

            let sy = $('.school_year_select :selected').val();

            // console.log(sy);

            // Your code here...
        });
    });
</script>
