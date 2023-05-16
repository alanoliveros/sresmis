<script>
    $(document).ready(function() {
        let id = 0;
        $(".school_year_by_advisory").on('change', function() {
            id = $(".school_year_by_advisory :selected").val();
        });

        $('.filter_student').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                method: "POST",
                url: '/teacher/student-information/advisory/' + id,
                success: function(data) {
                    let lists = data.students;
                    let info = '';

                    if (lists.length > 0) {
                        let maleCount = 0;
                        let femaleCount = 0;

                        $.each(lists, function(key, student) {
                            let genderIcon = (student.gender == 'Male') ?
                                'bi-gender-male' : 'bi-gender-female';
                            let genderText = (student.gender == 'Male') ? 'Male' :
                                'Female';
                            let image = (student.image == "avatar.png") ?
                                "{{ asset('storage/student_img/boy.png') }}" :
                                "{{ asset('storage/student_img/girl.png') }}";

                            let dt = new Date(student.birthdate);
                            info += `
                                <tr>
                                    <td>${key+1}</td>
                                    <td><img class="w-25 rounded-pill" src="${image}"></td>
                                    <td>${student.lastname+ ', '+student.name+(student.middlename == null? '': ', '+student.middlename)}</td>
                                    <td>${dt.toLocaleString('default', { month: 'long' }) + " " + (dt.getDate()) + ", " + dt.getFullYear()}</td>
                                    <td>${student.age}</td>
                                    <td>
                                        <div class="dropdown dropend">
                                            <button class="btn btn-light rounded-pill border-dark btn-sm" data-bs-toggle="dropdown" type="button" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">View</a></li>
                                                <li><a class="dropdown-item text-primary edit-student" href="#" 
                                                    data-id="${student.id}"
                                                    data-name="${student.name}"
                                                    data-lrn="${student.lrn}"
                                                    data-lastname="${student.lastname}"
                                                    data-gender="${student.gender}"
                                                    
                                                    
                                                    
                                                    
                                                    >Edit</a></li>
                                                <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            `;

                            // Increment male or female count
                            if (student.gender == 'Male') {
                                maleCount++;
                            } else {
                                femaleCount++;
                            }
                        });

                        let table = `
                        <hr>
                        <div class="row justify-content-md-center">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-2">
                                <div class="card card_hov border border-dark rounded-0">
                                    <div class="card-body p-2 text-center">
                                        <span class=""><i class="bi bi-gender-male"></i></span><span> | Male</span><br>
                                        <span>Total: ${maleCount}</span><br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-2">
                                <div class="card card_hov border border-dark rounded-0">
                                    <div class="card-body p-2 text-center">
                                        <span class=""><i class="bi bi-gender-female"></i></span><span> | Female</span><br>
                                        <span>Total: ${femaleCount}</span><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <table class="table table-hover" id="student_info">
                            <thead>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Image</th>
                                    <th>Student Name</th>
                                    <th>Birthdate</th>
                                    <th>Age</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${info}
                            </tbody>
                        </table>
                    `;

                        $('.students_table').html(table);
                        $('#student_info').DataTable();
                    } else {
                        $('.students_table').html(`
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center">
                                    <img style="width: 100px" src="{{ asset('storage/image/empty_box.png') }}">
                                    <p class="text-danger">No data found</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                    `);
                    }
                }
            });
        });

        // Edit student modal
        $(document).on('click', '.edit-student', function(e) {
            e.preventDefault();
            $('.editStudentModal').modal('show');
            let studentId = $(this).data('id');

            $('.lrn').val(studentId);
            $('.name').val($(this).data('name'));
            $('.gender').val($(this).data('gender'));
            $('.lastname').val($(this).data('lastname'));

            // Fetch student data for editing
            $.ajax({
                method: "GET",
                url: '/teacher/student-information/edit/' + studentId,
                success: function(data) {
                    let student = data.student;
                    // Update modal fields with student data
                    $('#editStudentForm #studentId').val(student.id);
                    $('#editStudentForm #editLastName').val(student.lastname);
                    $('#editStudentForm #editFirstName').val(student.name);
                    $('#editStudentForm #editMiddleName').val(student.middlename);
                    // Open the modal

                }
            });
        });

        // Handle form submission for updating student data
        $('#updateStudentBtn').on('click', function(e) {
            e.preventDefault();
            let form = $('#editStudentForm');
            let studentId = form.find('#studentId').val();
            let formData = form.serialize();

            // Send AJAX request to update student data
            $.ajax({
                method: "POST",
                url: '/teacher/student-information/update/' + studentId,
                data: formData,
                success: function(response) {
                    // Update the student information on the page if needed
                    if (response.success) {
                        // Perform necessary UI updates here
                        // Close the modal
                        $('#editStudentModal').modal('hide');
                    }
                }
            });
        });
    });
</script>
