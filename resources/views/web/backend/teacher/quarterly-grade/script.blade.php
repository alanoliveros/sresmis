<script>
    $(document).ready(function(){

        function selected_year(){
            console.log($('.school_year :selected').val());
        }

        selected_year();
        $('.school_year').on('change', function(){
            console.log($(this).value());
        });
    });
</script>