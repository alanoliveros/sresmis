<script>
    $(document).ready(function() {
        $('.select_subject').on('change', function() {
            var selectedValue = $(this).val();

            $.ajax({
                method: "POST",
                url: "/teacher/attendance/filter-section/by-subject",
                data: {
                    'subjectId': selectedValue,
                },
                success: function(data) {
                    // console.log(data.sections);
                    let sec = `<option selected disabled>Select Section</option>`;
                    $.each(data.sections, function(key, val) {
                        sec += `<option value="${key}">${val}</option>
                             `;
                    });

                    $('.select_section').html(sec);
                }

            });
        });

        $('.filter_by_sec_sub').on('click', function() {
            let subId = $('.select_subject').val();
            let secId = $('.select_section').val();
            let date = $('#date_val').val();



            $.ajax({
                method: "POST",
                url: "/teacher/attendance/view-student/by-subject/",
                data: {
                    'sub_id': subId,
                    'sec_id': secId,
                    'date': date,
                },
                success: function(data) {


                    console.log(data.students);

                    // let queryString = $.param(urlIds);

                    // let url = `{{ url('teacher/create-attendance-by-subject/${queryString}') }}`;

                    let add_attendance = ``;
                    $.each(data.students, function(key, val) {
                        add_attendance += `
                            <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        `;
                    });

                    $('.display_add').html(`
                        <a id="addAttendance"
                            href=""
                            class="btn btn-light border-dark rounded-0 fw-bold" data-bs-toggle="modal" data-bs-target="#add-attendance_subject">
                            <i class="bi bi-folder-plus"></i> Create
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="add-attendance_subject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content rounded-0">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ${add_attendance}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary rounded-0"><i class="bi bi-folder-plus"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `);




                    // console.log(data);
                    // subjects
                    // student

                    // let list = ``;

                    // $.each(data.students, function(key, val) {
                    //     list += `<tr>
                    //         <td>${key+1}</td>
                    //         <td>${val.name}</td>
                    //         <td>${val.status}</td>
                    //         <td>${val.date}</td>
                    //         <td>${val.section}</td>
                    //         <td>
                    //             <input type="checkbox" class="attendance_status" data-id="${val.id}" data-name="${val.name}" data-roll="${val.roll_no}" data-class="${val.class}" data-section="${val.section}" data-
                    //             status="${val.status}" >
                    //             </td>
                    //             </tr>
                    //             `;
                    // });


                    // let table = `
                    // <table class="table table-hover" id="student_info">
                    //         <thead>
                    //             <tr>
                    //                 <th>Sr.</th>
                    //                 <th>Image</th>
                    //                 <th>Student Name</th>
                    //                 <th>Birthdate</th>
                    //                 <th>Age</th>
                    //                 <th>Action</th>
                    //             </tr>
                    //         </thead>
                    //         <tbody>
                    //             ${info}
                    //         </tbody>
                    //     </table>
                    // `;

                    // $('.students_table').html(table);
                    // $('#student_info').DataTable();




                }
            });
        });
    });
</script>
