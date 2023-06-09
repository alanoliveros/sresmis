<script>
    $(document).ready(function(){
        function selected_sy(selected){
            $.ajax({
                method: "POST",
                url: "/teacher/class-schedule/filter_sy",
                data: {
                    'sy': selected,
                },
                success: function(data) {
                    // console.log(data.sy);
                    let sy  = data.sy;
                    let td = ``;
                    $.each(sy, function(key , val){
                        td +=`
                            <tr>
                                <td>${val.startTime}</td>
                            </tr>
                            `;
                    });

                    $('.schedule-data').html(td);
                }
            });
        }
       $('.sy_select').on('change', function(){
            let sy = $(this).val();
            selected_sy(sy);
       });
    });
</script>