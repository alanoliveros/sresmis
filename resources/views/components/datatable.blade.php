@section('scripts')
    <script>
        $(document).ready(function () {
            function students_masterlists() {
                let select_sy = $('.select_sy :selected').val();
                let grade_level_id = $('.grade_level_id :selected').val();

                console.log(select_sy);
                console.log(grade_level_id);

                //    ajax
                $.ajax({
                    type: "POST",
                    url: "/admin/manage-users/getStudents/by-school-year-and-grade-level",
                    data: {
                        "select_sy": select_sy,
                        "grade_level_id": grade_level_id,
                    },
                    // dataType: "json",

                    success: function (response) {
                        console.log(response);
                        // Handle the response object
                        let students_masterlists = ``;
                        $.each(response.enrollments, function (key, enrollment) {
                            console.log(enrollment);
                            students_masterlists += `
                           <tr>
                            <td>${enrollment.lrn}</td>
                            <td>${enrollment.last_name + ', ' + (enrollment.middle_name == null ? '' : enrollment.middle_name + ', ') + enrollment.first_name + (enrollment.suffix == null ? '' : ', ' + enrollment.suffix)}</td>
                            <td>${enrollment.current_status}</td>
                            <td>
                                ${enrollment.academic_status == 1 ? 'Active' : enrollment.academic_status == 2 ? 'Enactive' : enrollment.academic_status}
                            </td>
                            <td>
                                <a href="" class="bi bi-eye" style="margin-right: 6px"></a>
                                <a href="" class="bi bi-pencil-square" style="margin-right: 6px"></a>
                                <a href="" class="bi bi-trash"></a>
                            </td>
                            </tr>
                        `;
                        });
                        $('.student_data_container').html(`
                        <table class="table" id="data-studen-enrollment">
                <thead>
                <tr>
                    <th scope="col">LRN</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Current Status</th>
                    <th scope="col">Academic Status</th>
                    <th scope="col">Action</th>

                </tr>
                </thead>
                <tbody>
                    ${students_masterlists}
                </tbody>
            </table>
                        `);
                        $('#data-studen-enrollment').DataTable({
                            "pageLength": 25,
                        });
                    },
                    error: function (xhr, status, error) {
                        // Handle any error that occurs during the AJAX request
                        console.log(xhr.responseText);
                    }
                });
            }

            <!-- End Table with stripped rows -->

            $('.select_sy').on('change', function () {
                students_masterlists();
            });

            // grade_level_id on change
            $('.grade_level_id').on('change', function () {
                students_masterlists();
            });

            $('#components-datatable').DataTable();
            $('#subject-datatable').DataTable({
                "pageLength": 25,
            });


            $('.gradeLevelTaught').on('change', function () {

                let gradeLevelTaughtId = $(".gradeLevelTaught :selected").val();
                // console.log(gradeLevelTaughtId);

                // alert(gradeLevelTaughtId);
                $.ajax({
                    method: "post",
                    url: "/admin/academic/getSection",
                    data: {
                        "id": gradeLevelTaughtId
                    },
                    // dataType: "json",

                    success: function (response) {
                        // Handle the response object
                        let sectionTaught = `<option selected disabled>Select Section</option>`;

                        $.each(response.gradeLevel, function (key, level) {
                            let taken = level.status === 2 ? ' taken by ' + level.name : '';
                            sectionTaught += `<option ${level.status === 1 ? '' : 'disabled'} value="${level.id}">${level.sectionName} ${taken}</option>`;
                        });
                        $('#sectionTaught').html(sectionTaught);
                    },
                    error: function (xhr, status, error) {
                        // Handle any error that occurs during the AJAX request
                        console.log(xhr.responseText);
                    }
                });
            })

        });
    </script>
@endsection
