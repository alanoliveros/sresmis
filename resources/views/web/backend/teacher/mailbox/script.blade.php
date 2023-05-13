<script>
    function composeMessage() {

    }
    $(document).ready(function() {
        $('#composeMessage').on('click', function() {

        });

        $("input[name='messageTo']").on('change', function() {
            let messageTo = $("input[name='messageTo']:checked").val();

            $.ajax({
                method: "POST",
                url: '/teacher/filter-send-to',
                data: {
                    "messageTo": messageTo,
                },
                success: function(data) {
                    // console.log(data.messageTo);
                    let tem ='';
                    $.each(data.messageTo, function(key, val){
                        // tem +=`
                        // <option value="${val.}"></option>
                        // `;
                        console.log(val.id);
                    });
                }
            });
        });
    });
</script>
