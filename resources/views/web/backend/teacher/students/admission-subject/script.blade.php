<script>
    $(document).ready(function() {
        $(".select_sy").on('change', function() {
            let sy_id = $(".select_sy :selected").val();
            // if (sy_id != 0 && sub_id != 0) {
            //     $('.filter_by').prop('disabled', false);
            // }
        });
        $(".school_year_by_subject").on('change', function() {
            let subject = $(".school_year_by_subject :selected").val();

            $.ajax({
                method: "POST",
                url: '/teacher/student-information/filter-section',
                data: {
                    "sy_id": $(".select_sy :selected").val(),
                    "sub_id": subject,
                },
                success: function(data) {
                    let opt = `<option selected disabled>Select Section</option>`;
                    $.each(data.sections, function(key, val){
                        opt+= `
                        <option value="${key}">${val}</option>
                        `;
                    });
                    $('.school_year_by_section').html(opt);
                    
                    // console.log(data.sections);

                }
            });
            // if (sy_id != 0 && sub_id != 0) {
            //     $('.filter_by').prop('disabled', false);
            // }
        });
        $(".school_year_by_section").on('change', function() {
            $('.filter_by').prop('disabled', false);
        });
     
        $(".filter_by").on('click', function(e) {
            e.preventDefault();
            $.ajax({
                method: "POST",
                url: '/teacher/student-information/by-subject/filter',
                data: {
                    "sy": $(".select_sy :selected").val(),
                    "sub_id": $(".school_year_by_subject :selected").val(),
                    "sec_id": $(".school_year_by_section :selected").val(),
                },
                success: function(data) {
                    console.log(data.students);
                }
            });
        });

    });
</script>
