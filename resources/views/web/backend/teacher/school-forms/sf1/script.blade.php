<script>
    $(document).ready(function(){
        $('.filter_Sy').on('click', function(){
          let sy = $('.school_year_by_advisory :selected').val();
          $('.addstudent-button').html(`
          <a href="" class="float-md-end btn btn-light rounded-0 border-dark"
                                            data-bs-toggle="modal" data-bs-target="#addstudent_click">+ Add student</a>
          `);


          
        });
    });
</script>