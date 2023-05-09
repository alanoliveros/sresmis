<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('storage/backend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('storage/backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('storage/backend/assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('storage/backend/assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('storage/backend/assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('storage/backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('storage/backend/assets/vendor/php-email-form/validate.js') }}"></script>
{{-- <script src="{{ asset('storage/backend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script> --}}
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" defer></script>

<!-- Template Main JS File -->
<script src="{{ asset('storage/backend/assets/js/main.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    let id = 0;
    $(document).ready(function() {
        $(".school_year_by_advisory").on('change', function() {
            id = $(".school_year_by_advisory :selected").val();
        });
        $('.filter_student').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                method: "POST",
                url: '/sresmis/teacher/student-information/advisory/' + id,
                success: function(data) {
                    let lists = data.students;
                    let info = '';
                    console.log(lists);
                    $.each(lists, function(key, student){
                    let boy = (student.image == "avatar.png"? "{{asset('storage/student_img/boy.png')}}":"");
                    let girl = (student.image == "avatar.png"? "{{asset('storage/student_img/girl.png')}}":"");
                    let dt = new Date(student.birthdate);
                        info+=`
                        <tr>
                            <td>${key+1}</td>
                            <td><img class="w-50 rounded-pill" src="${student.gender == 'Male'? boy:girl}"></td>
                            <td>${student.lastname+ ', '+student.name+(student.middlename == null? '': ', '+student.middlename)}</td>
                            <td>${dt.toLocaleString('default', { month: 'long' }) + " " + (dt.getDate()) + ", " + dt.getFullYear()}</td>
                            <td>${student.age}</td>
                            <td>
                                <div class="dropdown dropend">
                                    <button class="btn btn-light rounded-pill border-dark btn-sm" data-bs-toggle="dropdown" type="button"  aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                    </div>
                              
                            </td>
                            
                            
                        </tr>
                              `;
                    });

                    let table = `
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
                              <thead>
                              <tbody>
                                ${info}
                              </tbody>
                    </table>`;
                  
                    $('.students_table').html(table);
                    $('#student_info').DataTable();
                }
            });
           
        })

    });
</script>
@yield('scripts')
