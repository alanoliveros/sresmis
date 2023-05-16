<script>
    $(document).ready(function() {
        function countStudentAttendance() {
            var presentCount = 0;
            var absentCount = 0;
            var totalCount = 0;

            $.each($('.attendance_status_absent'), function(key, val) {
                if ($(val).is(':checked')) {
                    absentCount++;
                } else {
                    presentCount++;
                }
                totalCount++;
            });

            // console.log('Present Count: ' + presentCount);
            // console.log('Absent Count: ' + absentCount);
            // console.log('Total Count: ' + totalCount);
            let total_male = $('.total_male').attr('data-total');
            let total_female = $('.total_female').attr('data-total');

            $('.all_student').text(totalCount);
            $('.total_male_count').text(total_male);
            $('.total_female_count').text(total_female);
            $('.total_present').text(presentCount);
            $('.total_absent').text(absentCount);
        }

        countStudentAttendance();

        $('.absent_all').on('click', function() {
            $('.attendance_status_absent').prop('checked', true);
            $('.attendance_status_present').prop('checked', false);
            countStudentAttendance();
        });

        $('.present_all').on('click', function() {
            $('.attendance_status_absent').prop('checked', false);
            $('.attendance_status_present').prop('checked', true);
            countStudentAttendance();
        });

        $('.attendance_status_absent, .attendance_status_present').on('click', function() {
            countStudentAttendance();
        });
    });
</script>
