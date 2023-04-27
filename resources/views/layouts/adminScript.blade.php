<script>
  $(document).ready(function(){

    $('.add_subject').on('click', function(){
      $('.subject_tab').append(
            `<tr>
           
            <td><input type="date" class="form-control" value="{{date('Y-m-d')}}" name="game_date[]"></td>
            <td><input type="time" class="form-control" name="game_time[]"></td>
            <td><input type="number" class="form-control" name="round_number[]"></td>
            <td><input type="number" class="form-control" name="match_number[]"></td>
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
  });
  </script>