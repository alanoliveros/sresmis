<script>
    $(document).ready(function() {
        $('#studentAttendance').DataTable();

        $('#filter_date_attendance').on('click', function() {
            $.ajax({
                method: "POST",
                url: '/teacher/filter-attendance/by-advisory',
                data: {
                    'date': $('#date_val').val(),
                },
                success: function(data) {
                    console.log(data.date);

                    if (data.response == 'error') {
                        sweetAlert("Oops...", "Date is required", "error");
                    } else {

                        console.log(data.response);
                        let tbody = ``;
                        $.each(data.response, function(key, val) {
                            tbody +=`<tr>
                                        <td>${key+1}</td>
                                        <td>${val.name}</td>
                                        <td>${val.date}</td>
                                        <td>${val.status}</td>
                                        <td>Delete</td>
                                    </tr>
                                    `;
                        });


                        let table = `
                                    <table id="dataforStudent" class="table table-hover" style="width:100%">
                                        <thead>
                                            <tr class="fs-5">
                                                <th scope="col" class="text-success">Sr.</th>
                                                <th scope="col" class="text-success">Complete name</th>
                                                <th scope="col" class="text-success">Date</th>
                                                <th scope="col" class="text-success">Status</th>
                                                <th scope="col" class="text-success">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ${tbody}
                                        </tbody>
                                    </table>
                                    `;

                        $('.students_table').html(table);
                        $('#dataforStudent').DataTable();
                    }


                }
            });
        });
    });
</script>
