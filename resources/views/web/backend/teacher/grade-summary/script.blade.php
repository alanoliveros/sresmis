<script>
    $(document).ready(function() {
        function fetchData() {
            let sy = $('.school_year_select :selected').val();

            // ajax
            $.ajax({
                type: 'POST',
                url: '/teacher/grade-summary/filter-student',
                data: {
                    'sy': sy
                },
                success: function(data) {
                    // $('#student_list').html(data);
                    console.log(data);
                }
            });
        }



        $('.school_year_select').on('change', function() {

            let sy = $('.school_year_select :selected').val();

            console.log(sy);

            // Your code here...
        });
    });
</script>
