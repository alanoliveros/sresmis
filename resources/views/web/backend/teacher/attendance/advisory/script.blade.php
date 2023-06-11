<script>
    $(document).ready(function() {
        $('#studentAttendance').DataTable();

        $('#date_val').on('change', function() {


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

                    } else if (!data.response || data.response.length === 0) {
                        $('.students_table').html(`<img src="{{ asset('storage/image/empty_box.png') }}" alt="No data found" class="w-25">
                                                    <div>
                                                        <span class="text-danger">No data found</span>
                                                    </div>`);
                        $('.total_male').text(0);
                        $('.total_female').text(0);
                        $('.total_present').text(0);
                        $('.total_absent').text(0);


                    } else {
                        console.log(data.response);

                        let maleCount = 0;
                        let femaleCount = 0;
                        let presentCount = 0;
                        let absentCount = 0;

                        let tbody = ``;
                        $.each(data.response, function(key, val) {
                            tbody += `
                            <tr>
                                <td>${key+1}</td>
                                <td>${val.name}</td>
                                <td>${val.dt}</td>
                                <td>${val.st}</td>
                                <td>
                                    <div class="btn-group dropend">
                                        <button class="btn btn-sm btn-light border-dark rounded-pill fw-bold "
                                            data-bs-toggle="dropdown" type="button" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li class="student-cell"><a class="dropdown-item " href="#">view</a></li>
                                            <li><a class="dropdown-item text-primary" href="{{url('/teacher/daily-attendance/edit/${val.daily_id}')}}">Edit</a></li>
                                            <li><a class="dropdown-item text-danger" id="deleteStudentAttendance" data-id="${val.daily_id}" href="#">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        `;

                            // Increment male or female count
                            if (val.gender == 'Male') {
                                maleCount++;
                            } else {
                                femaleCount++;
                            }

                            // Increment present or absent count
                            if (val.status == 'Present') {
                                presentCount++;
                            } else {
                                absentCount++;
                            }
                        });

                        let table = `
                        <table id="dataforStudent" class="table table-hover" style="width:100%">
                            <thead>
                                <tr class="fs-5">
                                    <th scope="col" class="">Sr.</th>
                                    <th scope="col" class="">Complete name</th>
                                    <th scope="col" class="">Date</th>
                                    <th scope="col" class="">Status</th>
                                    <th scope="col" class="">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${tbody}
                            </tbody>
                        </table>
                    `;

                        $('.students_table').html(table);
                        $('#dataforStudent').DataTable();

                        console.log("Total Male: " + maleCount);
                        console.log("Total Female: " + femaleCount);
                        console.log("Total Present: " + presentCount);
                        console.log("Total Absent: " + absentCount);
                        $('.total_male').text(maleCount);
                        $('.total_female').text(femaleCount);
                        $('.total_present').text(presentCount);
                        $('.total_absent').text(absentCount);



                    }
                }
            });
        });
        $('body').on('click', '#deleteStudentAttendance', function() {
            let id = $(this).attr('data-id');
            // ajax
            $.ajax({
                type: 'get',
                url: "/teacher/daily-attendance/delete/"+id,
                success: function(data) {
                    console.log(data);
                }

            });
        });
    });
</script>
