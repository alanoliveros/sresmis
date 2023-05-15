<script>
    $(document).ready(function() {
        $('.absent_all').on('click', function() {
            $('.attendance_status_absent').prop("checked", true);
            $('.attendance_status_present').prop("checked", false);

        });
        $('.present_all').on('click', function() {
            $('.attendance_status_absent').prop("checked", false);
            $('.attendance_status_present').prop("checked", true);
        });
    });
</script>
