<script>
    $(document).ready(function() {

        function selected_year() {
            let sy = $('.school_year :selected').val();
            // console.log(sy);
            $.ajax({
                method: "POST",
                url: "/teacher/student-grade/quarterly",
                data: {
                    "sy": sy,
                },
                success: function(data) {
                    console.log(data);
                    // let option = '';
                    // $.each(data.students, function(key, val){
                    //     option += `
                    //             <option value="${val.studentId}">${val.name}</option>
                    //              `;

                    // });

                    // $('.students_select').html(option);

                    // let tbody = '';
                    // $.each(data.subjects, function(key, val){
                    //     tbody += `
                    //     <tr>
                    //         <td>${val.subjectName}</td>
                    //         <td></td>
                    //         <td></td>
                    //         <td></td>
                    //         <td></td>
                    //         <td></td>
                    //         <td>

                    //         </td>
                    //     </tr>
                    //     `;
                    // });
                    // $('.tbody_data').html(tbody);
                }
            });
        }


        selected_year();
        $('.school_year').on('change', function() {
            // console.log($(this).value());
            selected_year();
        });


        $('.quarter').on('input', function() {
            var row = $(this).closest('tr');
            var quarter1 = parseFloat(row.find('input[name="quarter1[]"]').val()) || 0;
            var quarter2 = parseFloat(row.find('input[name="quarter2[]"]').val()) || 0;
            var quarter3 = parseFloat(row.find('input[name="quarter3[]"]').val()) || 0;
            var quarter4 = parseFloat(row.find('input[name="quarter4[]"]').val()) || 0;

            var total = quarter1 + quarter2 + quarter3 + quarter4;
            var finalGrade = (total / 4).toFixed(2);

            row.find('.final-grade').text(finalGrade);

            var maximumGrade = 100; // Define the maximum possible grade here
            var passingGrade = maximumGrade / 2; // Set passing grade as half of the maximum possible grade

            if (finalGrade >= passingGrade) {
                row.find('.remarks').text('Passed');
                row.find('.remarks').removeClass('text-danger').addClass('text-success');
            } else {
                row.find('.remarks').text('Failed');
                row.find('.remarks').removeClass('text-success').addClass('text-danger');
            }
        });



    });
</script>
