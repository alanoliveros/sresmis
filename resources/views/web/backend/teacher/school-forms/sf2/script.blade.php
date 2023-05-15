<script>
    $(document).ready(function(){
        $('.filter_Sy').on('click', function(){
          let sy = $('.school_year_by_advisory :selected').val();

          alert(sy);
          
        })
    });
</script>