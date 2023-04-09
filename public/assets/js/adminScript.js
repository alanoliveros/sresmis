$(document).ready(function(){
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
              console.log(response.gradeLevel);
            }
        });
      });
});