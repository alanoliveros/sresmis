@section('scripts')
    <script>
        $(document).ready(function () {
            $('#components-datatable').DataTable();
            $('#subject-datatable').DataTable({
                "pageLength": 25,
            });

            $('.gradeLevelTaught').on('change', function () {

                let gradeLevelTaughtId = $(".gradeLevelTaught :selected").val();
                // console.log(gradeLevelTaughtId);

                // alert(gradeLevelTaughtId);
                $.ajax({
                    method: "post",
                    url: "/admin/academic/getSection",
                    data: {
                        "id": gradeLevelTaughtId
                    },
                    // dataType: "json",

                    success: function(response) {
                        // Handle the response object
                        let sectionTaught = `<option selected disabled>Select Section</option>`;

                        $.each(response.gradeLevel, function(key, level) {
                            let taken = level.status === 2 ? ' taken by ' + level.name : '';
                            sectionTaught += `<option ${level.status === 1 ? '' : 'disabled'} value="${level.id}">${level.sectionName} ${taken}</option>`;
                        });
                        $('#sectionTaught').html(sectionTaught);
                    },
                    error: function(xhr, status, error) {
                        // Handle any error that occurs during the AJAX request
                        console.log(xhr.responseText);
                    }
                });
            })

        });
    </script>
@endsection
