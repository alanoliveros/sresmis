<script>
    $(document).ready(function() {
        let id = 0;
        $(".school_year_by_advisory").on('change', function() {
            id = $(".school_year_by_advisory :selected").val();

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
                                        <div class="dropdown dropstart">
                                        <button class="btn btn-sm btn-light border-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item edit-student-data" href="#"
                                                data-id="${student.studentId}"
                                                data-school_year="${student.school_year}"
                                                data-learning_modality="${student.learning_modality}"
                                                data-enrollment_status="${student.enrollment_status}"
                                                data-lrn="${student.lrn}"
                                                data-name="${student.name}"
                                                data-middlename="${student.middlename}"
                                                data-lastname="${student.lastname}"
                                                data-suffix="${student.suffix}"
                                                data-gender="${student.gender}"
                                                data-birth_date="${student.birthdate}"
                                                data-age="${student.age}"
                                                data-ethnicgroup="${student.ethnicgroup}"
                                                data-religion="${student.religion}"
                                                data-purok="${student.purok}"
                                                data-barangay="${student.barangay}"
                                                data-city="${student.city}"
                                                data-province="${student.province}"
                                                data-zipCode="${student.zipCode}"
                                                data-mothertongue="${student.mothertongue}"

                                                data-fathersFirstName="${student.fathersFirstName}"
                                                data-fathersMiddleName="${student.fathersMiddleName}"
                                                data-fathersLastName="${student.fathersLastName}"
                                                data-fathersSuffix="${student.fathersSuffix}"
                                                data-mothersFirstName="${student.mothersFirstName}"
                                                data-mothersMiddleName="${student.mothersMiddleName}"
                                                data-mothersLastName="${student.mothersLastName}"
                                                data-mothersSuffix="${student.mothersSuffix}"
                                                data-guardiansFirstName="${student.guardiansFirstName}"
                                                data-guardiansMiddleName="${student.guardiansMiddleName}"
                                                data-guardiansLastName="${student.guardiansLastName}"
                                                data-guardiansSuffix="${student.guardiansSuffix}"
                                                data-relationshiptoStudent="${student.relationshiptoStudent}"
                                                data-contactNumber="${student.relationshiptoStudent}"
                                                >Edit</a></li>
                                            <li><a  data-id="${student.studentId}" class="dropdown-item text-danger deleteStudentRecord" href="#">Delete</a></li>
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

        $('body').on('click', '.edit-student-data', function() {
            $('.editStudentModal').modal('show');
            let studentId = $(this).data('id');


            $('input.studentId').val(studentId);
            $('select.school_year').val($(this).data('school_year'));
            $('select.learning_modality').val($(this).data('learning_modality'));
            $('select.enrollment_status').val($(this).data('enrollment_status'));
            $('input.lrn').val($(this).data('lrn'));
            $('input.name').val($(this).data('name'));
            $('input.middlename').val($(this).data('middlename'));
            $('input.lastname').val($(this).data('lastname'));
            $('input.suffix').val($(this).data('suffix'));
            $('select.gender').val($(this).data('gender'));
            $('input.birth_date').val($(this).data('birth_date'));
            $('input.age').val($(this).data('age'));
            $('input.ethnicgroup').val($(this).data('ethnicgroup'));
            $('input.religion').val($(this).data('religion'));
            $('input.purok').val($(this).data('purok'));
            $('input.barangay').val($(this).data('barangay'));
            $('input.city').val($(this).data('city'));
            $('input.province').val($(this).data('province'));
            $('input.zipcode').val($(this).data('zipcode'));
            $('input.mothertongue').val($(this).data('mothertongue'));


            $('input.fathersFirstName').val($(this).data('fathersFirstName'));
            $('input.fathersMiddleName').val($(this).data('fathersMiddleName'));
            $('input.fathersLastName').val($(this).data('fathersLastName'));
            $('input.fathersSuffix').val($(this).data('fathersSuffix'));
            $('input.mothersFirstName').val($(this).data('mothersFirstName'));
            $('input.mothersMiddleName').val($(this).data('mothersMiddleName'));
            $('input.mothersLastName').val($(this).data('mothersLastName'));
            $('input.mothersSuffix').val($(this).data('mothersSuffix'));
            $('input.guardiansFirstName').val($(this).data('guardiansFirstName'));
            $('input.guardiansMiddleName').val($(this).data('guardiansMiddleName'));
            $('input.guardiansLastName').val($(this).data('guardiansLastName'));
            $('input.guardiansSuffix').val($(this).data('guardiansSuffix'));
            $('input.relationshiptoStudent').val($(this).data('relationshiptoStudent'));
            $('input.contactNumber').val($(this).data('contactNumber'));
        });

        $('body').on('click', '.btnEditStudent', function() {

            let studentId = $('.studentId').val();
            let school_year = $('.school_year :selected').val();
            let learning_modality = $('.learning_modality :selected').val();
            let enrollment_status = $('.enrollment_status :selected').val();
            let lrn = $('.lrn').val();
            let name = $('.name').val();
            let middlename = $('.middlename').val();
            let lastname = $('.lastname').val();
            let suffix = $('.suffix').val();
            let gender = $('.gender :selected').val();
            let birth_date = $('.birth_date').val();
            let age = $('.age').val();
            let ethnicgroup = $('.ethnicgroup').val();
            let religion = $('.religion').val();
            let purok = $('.purok').val();
            let barangay = $('.barangay').val();
            let city = $('.city').val();
            let province = $('.province').val();
            let zipcode = $('.zipcode').val();
            let mothertongue = $('.mothertongue').val();

            let fathersFirstName = $('.fathersFirstName').val();
            let fathersMiddleName = $('.fathersMiddleName').val();
            let fathersLastName = $('.fathersLastName').val();
            let fathersSuffix = $('.fathersSuffix').val();
            let mothersFirstName = $('.mothersFirstName').val();
            let mothersMiddleName = $('.mothersMiddleName').val();
            let mothersLastName = $('.mothersLastName').val();
            let mothersSuffix = $('.mothersSuffix').val();
            let guardiansFirstName = $('.guardiansFirstName').val();
            let guardiansMiddleName = $('.guardiansMiddleName').val();
            let guardiansLastName = $('.guardiansLastName').val();
            let guardiansSuffix = $('.guardiansSuffix').val();
            let relationshiptoStudent = $('.relationshiptoStudent').val();
            let contactNumber = $('.contactNumber').val();

            let student_data = {
                'studentId': studentId,
                'school_year': school_year,
                'learning_modality': learning_modality,
                'enrollment_status': enrollment_status,
                'lrn': lrn,
                'name': name,
                'middlename': middlename,
                'lastname': lastname,
                'suffix': suffix,
                'gender': gender,
                'birth_date': birth_date,
                'age': age,
                'ethnicgroup': ethnicgroup,
                'religion': religion,
                'purok': purok,
                'barangay': barangay,
                'city': city,
                'province': province,
                'zipcode': zipcode,
                'mothertongue': mothertongue,

                'fathersFirstName': fathersFirstName,
                'fathersMiddleName': fathersMiddleName,
                'fathersLastName': fathersLastName,
                'fathersSuffix': fathersSuffix,
                'mothersFirstName': mothersFirstName,
                'mothersMiddleName': mothersMiddleName,
                'mothersLastName': mothersLastName,
                'mothersSuffix': mothersSuffix,
                'guardiansFirstName': guardiansFirstName,
                'guardiansMiddleName': guardiansMiddleName,
                'guardiansLastName': guardiansLastName,
                'guardiansSuffix': guardiansSuffix,
                'relationshiptoStudent': relationshiptoStudent,
                'contactNumber': contactNumber
            };



            // ajax update student
            $.ajax({
                type: 'POST',
                url: "/teacher/student-data-advisory/update",
                data: {
                    'data': student_data,
                },
                success: function(data) {
                    console.log(data);
                    location.reload()
                }

            });

        });

        $('body').on('click', '.deleteStudentRecord', function() {
            let studentId = $(this).attr('data-id');

            $.ajax({
                type: 'POST',
                url: "/teacher/student-data-advisory/delete",
                data: {
                    'student_id': studentId,
                },
                success: function(data) {
                    console.log(data);
                    // location.reload()
                }

            });
        });
    });
</script>
