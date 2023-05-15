<script>
    // function fetchMessage() {
    //     $.ajax({
    //         method: "get",
    //         url: '/teacher/fetchMessage-for-teacher',
    //         success: function(data) {
    //             console.log(data.sentMessages);
    //             let inputMessage = '';
    //             $.each(data.sentMessages, function(key, val) {
    //                 inputMessage += `
    //                              <li>${val.message}</li>
    //                          `;
    //             });
    //             $('.fetchMessageHere').html(inputMessage);

    //         }
    //     });
    // }

    let editor;
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(newEditor => {
            editor = newEditor;
        })
        .catch(error => {
            console.error(error);
        });
    $(document).ready(function() {
        // fetchMessage();
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
                    let tem = '';
                    $.each(data.messageTo, function(key, val) {
                        tem += `
                        <option value="${val.id}">${val.lastname+', '+ val.name}</option>
                        `;

                        $('.sentTouser').html(tem);

                    });

                }
            });
        });

        $('.submitMessage').on('click', function() {

            // console.log(editorData);

            let sendToWho = $(".sentTouser :selected").map(function(i, el) {
                return $(el).val();
            }).get();

            let subjectMessage = $("input[name='subjectContent']").val();
            let editorData = editor.getData();


            let dataSubmit = {
                'sendTo': sendToWho,
                'subjectMessage': subjectMessage,
                'editorData': editorData,
            };
            // console.log(dataSubmit);
            $.ajax({
                method: "POST",
                url: '/teacher/submit-message-to',
                data: {
                    "dataSubmit": JSON.stringify(dataSubmit),
                },
                success: function(data) {
                    if (data == 'success') {
                        swal("Deleted!", "Your imaginary file has been deleted.",
                            "success");
                    }
                }
            });

        });

        // $("body").on('input', "input[name='subjectContent']", function() {
        //    let sujectTo = $("input[name='subjectContent']").val();

        //     console.log(sujectTo);

        // });


        // const editorData = editor.setData('');
        // console.log(editorData);
        // ...

        $('.fetchMessage').on('click', function() {
            $.ajax({
                method: "get",
                url: '/teacher/fetchMessage-for-teacher',
                success: function(data) {
                    console.log(data.sentMessages);
                    let inputMessage = '';
                    $.each(data.sentMessages, function(key, val) {
                        inputMessage += `
                                 <li>${val.message}</li>
                             `;
                    });
                    $('.fetchMessageHere').html(inputMessage);

                }
            });
        })
    });
</script>
