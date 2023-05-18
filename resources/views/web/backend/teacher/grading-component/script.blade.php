<script>
    $(document).ready(function() {



        function filtelterData() {
            let sy = $('.school_year_select :selected').val();
            let subject_id = $('.subject_select :selected').val();
            let quarter_id = $('.subject_select :selected').val();



            // ajax
            $.ajax({
                method: "POST",
                url: "/teacher/grade-component/search-students",
                data: {
                    'sy': sy,
                    'subject_id': subject_id,
                    'quarter_id': quarter_id,
                },
                success: function(data) {

                }


            });
        }
        filtelterData();

        $('.school_year_select').on('change', function() {

            let selectedSchoolYear = $('.school_year_select :selected').val();

            console.log('Selected School Year:', selectedSchoolYear);

            // Your code here...
        });
        $('.subject_select').on('change', function() {

            let selectedSchoolYear = $('.subject_select :selected').val();

            console.log('Selected School Year:', selectedSchoolYear);

            // Your code here...
        });
        // $('.filter_data').on('click', function() {

        // });
    });
</script>
