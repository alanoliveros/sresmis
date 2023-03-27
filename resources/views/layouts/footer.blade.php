<footer class="footer text-center">
SRESMIS
</footer>

<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script>
    $('document').ready(function(){
        $('#session_sf9').change(function(e){
            e.preventDefault();

            let value = $(this).find(":selected").val();



            alert(value);

                
        });
        
       
    });
</script>