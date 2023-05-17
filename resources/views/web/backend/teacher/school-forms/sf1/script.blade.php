<script>
    $(document).ready(function() {
        $('#studentSF1').DataTable();

       
        $('.school_year').on('change', function() {
            let sy = $('.school_year :selected').val();
            alert(sy);
        });



        $('.exportToExcel').on('click', function() {
            $.ajax({
                method: "POST",
                url: '/teacher/exportToExcel-sf1',
                data: {
                  'sy' : $('.school_year :selected').val(),
                },
                success: function() {

                }
              });
        });
    });
</script>

<script>
  // Add an event listener to the delete button
  document.getElementById('deleteStudent').addEventListener('click', function() {
    // Display the Sweet Alert
    swal({
      title: "Delete Confirmation",
      text: "Are you sure you want to delete this item?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        // Perform the delete action
        // You can add your delete code here
        // Show success message after delete
        swal("Success!", "Item has been deleted successfully.", "success");
      } else {
        // User clicked cancel or closed the Sweet Alert
        swal("Cancelled", "Item deletion has been cancelled.", "error");
      }
    });
  });
</script>
