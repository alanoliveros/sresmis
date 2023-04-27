<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
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
            
              
              
              $.each(response.gradeLevel, function(key, level) {
                  $('#sectionTaught').append('<option value="'+level.id+'">'+level.sectionName+'</option>');
              });
            }
        });
    });
    
    $(document).on('click', '.remove_btn', function(){
        $(this).parents('tr').remove();
    });

    $('#select-day').select2({
       
        placeholder: "Select Day",
        tags: true,
        tokenSeparators: ['/',',',','," "]
    });
  });
  </script>