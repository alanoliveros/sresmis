<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

  let school_year_sf1 = 0;
  $(document).ready(function(){

    $('.add_subject').on('click', function(){
      $('.subject_tab').append(
            `<tr>
                <td><input type="text" name="subjectname[]" class="form-control"></td>
                <td><input type="text" name="description[]" class="form-control"></td>
                <td class="text-center"><button type="button" class="btn btn-danger remove_btn">x</button></td>
            </tr>`
         );
    });
    
    $('.gradeLevelTaught').on('change', function() {

        let gradeLevelTaughtId = $(this).val();
        $.ajax({
            type:"post",
            url:"/sresmis/admin/getSection",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": gradeLevelTaughtId
                },
            // dataType: "json",
            success:function(response) {
            
              
              let sectionTaught = '';
              $.each(response.gradeLevel, function(key, level) {
                sectionTaught = sectionTaught +'<option value="'+level.id+'">'+level.sectionName+'</option>';
              });
              $('#sectionTaught').html(sectionTaught);
            }
        });
    });

    $('.schoolYear_sf1').on('change', function(e){
      e.preventDefault();
      school_year_sf1 = $(this).val();
    });

    $('.filter_sf1').on('click', function(e){
      e.preventDefault();
      $.ajax({
            type:"POST",
            url:"/sresmis/teacher/get-student-sf1-by-school-year",
            data: {
                "_token": "{{ csrf_token() }}",
                "sy_id": school_year_sf1
                },
            // dataType: "json",
            success:function(response) {
            console.log(response);
           
              
              let students_sf1 = '';
              let male = (response.male).length;
              let female = (response.female).length;
              let totalStudents = male+female;
              let checkEnrolled = totalStudents <= 1?'student':'students';

              // $.each(response.students, function(key, student) {
                students_sf1 = students_sf1 +`
                      <a href="">
                            <div class="card">
                                <div class="box bg-dark text-light">
                                                <span class="d-block text-center fs-5">${response.section_gradeLevel.gradeLevelName} - ${response.section_gradeLevel.sectionName}</span>
                                                <hr>
                                                <div class="row ">
                                                    <div class="col-12 col-sm-4 d-flex justify-content-center">
                                                                <span class="d-block">${male} - Male</span>
                                                    </div>
                                                    <div class="col-12 col-sm-4 d-flex justify-content-center">
                                                                <span class="d-block">${female} - Female</span>
                                                    </div>
                                                    <div class="col-12 col-sm-4 d-flex justify-content-center">
                                                                <span class="d-block">${totalStudents} - Total</span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                                <span class="d-block">Enrolled : ${totalStudents} ${checkEnrolled}</span>
                                                                <span class="d-block">100 - Total students</span>
                                                                <span class="d-block">50 - Male</span>
                                                                <span class="d-block">50 - Female</span>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                                <span class="d-block">Grade 1 - Daisy</span>
                                                                <span class="d-block">100 - Total students</span>
                                                                <span class="d-block">50 - Male</span>
                                                                <span class="d-block">50 - Female</span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row text-center">
                                                    <div class="col-12 col-sm-6">
                                                        <a href="" class="btn btn-light">CSV</a>
                                                              
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <a href="{{url('sresmis/teacher/export-sf1/${school_year_sf1}')}}" class="btn btn-light">Excel</a>     
                                                    </div>
                                                </div>
                                </div>
                            </div>
                    </a>
                `;
              // });
              if((response.students).length > 0){
                $('.sf1_fetch_data').html(students_sf1);
              }
              else{
                $('.sf1_fetch_data').html(`
                                          
                                    <a href="">
                                        <div class="card">
                                        <div class="box bg-warning text-danger text-center">
                                          <span class="">No data found</span>
                                          
                                        </div>
                                        </div>
                                    </a>
                                              
                `);
              }
            }
      });
    });
    
    $(document).on('click', '.remove_btn', function(){
        $(this).parents('tr').remove();
    });

    $('#add-day').select2({
       
        placeholder: "Select Day",
        tags: true,
        tokenSeparators: ['/',',',','," "]
    });

    $('.status_student_attendance').on('click', function(){
      if($(this).data('status') == 'Present'){
        $(this).addClass('status_present');
      }
       if($(this).data('status') == 'Absent'){
        $(this).addClass('status_absent');
      }

    });

    $('.absent_all').on('click', function(){
        $.each($('.attendance_status_absent').prop("checked",true));
    });
  });
  </script>