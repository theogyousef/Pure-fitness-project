$(document).ready(function(){
  // Event listener for keyup on the search input
  $("#search").keyup(function(){
      // Get the input value
      var input = $(this).val();

      var name=$(this).attr("name");
     
    
      // Check if the input is not empty
      if (input !== "") {
        // Check if the name attribute is equal to "usersearch"
        if ($(this).attr("name") === "usersearch") {
            // AJAX request to your PHP endpoint for user search
            $.ajax({
                url: "../controller/adminsearch.php",
                method: "POST",
                data: { input: input, name: name },
                success: function (data) {
                    $("#searchresulte").html(data);
                },
                error: function (xhr, status, error) {
                    console.error("AJAX request failed: " + status + ", " + error);
                }
            });
        } else if ($(this).attr("name") === "productsearch") {
            // AJAX request to your PHP endpoint for product search
            $.ajax({
                url: "../controller/adminsearch.php",
                method: "POST",
                data: { input: input, name: name },
                success: function (data) {
                    $("#searchresult").html(data);
                },
                error: function (xhr, status, error) {
                    console.error("AJAX request failed: " + status + ", " + error);
                }
            });
        }
    } else {
        $("#searchresult").html("");
        $("#searchresulte").html("");
    }
  });
});
