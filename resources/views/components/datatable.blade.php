@section('scripts')
    <script>
        $(document).ready(function () {
            $('#components-datatable').DataTable();

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
                    success: function (response) {

                        // console.log(response);
                        let sectionTaught = `<option selected disabled>Select Section</option>`;
                        $.each(response.gradeLevel, function (key, level) {
                            sectionTaught+=`<option value="${level.id}">${level.sectionName}</option>`;
                        });
                        $('#sectionTaught').html(sectionTaught);
                    }
                });
            })

        });
    </script>
@endsection
