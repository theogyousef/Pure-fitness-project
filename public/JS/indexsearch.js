$(document).ready(function(){
    // Event listener for keyup on the search input
    $("#search").keyup(function(){
      // Get the input value
      var input = $(this).val();
  
      // Check if the input is not empty
      if (input !== "") {
        // AJAX request to liveqearch.php
        $.ajax({
          url: "../controller/livesearch.php",
          method: "POST",
          data: { input: input },
          success: function (data) {
            // Update the content of the element with id "searchresult" with the data received from the server
            $("#searchresult").html('<a href="#" style="text-decoration: none;">' + data + '</a>');
          },
          error: function (xhr, status, error) {
            console.error("AJAX request failed: " + status + ", " + error);
          }
        });
      } else {
        // Handle the case when the input is empty (optional)
        $("#searchresult").html("");
      }
    });
  });
  