<?php
// Include your connfiguration file
include("../model/searchModle.php");

// Check if 'input' is set in the POST data
if (isset($_POST['input'])) {
    // Get the search input from the POST data
    
        $input=$_POST['input'];
    // Perform the search query
    //searchModle::indexsearch($input);
    $result = searchModle::indexsearch($input);
    // Check if the query was successful
    if ($result) {
        // Check if there are rows returned
        if (mysqli_num_rows($result) > 0) {
            // Loop through the results and display them
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p>{$row['name']}</p>"; // Adjust this to match your database structure
            }
        } else {
            //echo "<h6 class='text-center mt-3'>No data found</h6>";
        }
    } else {
        // Handle the case when the query fails
        echo "Query failed: " . mysqli_error($conn);
    }

    // Free the result set
    mysqli_free_result($result);

    //
} else {
    // Handle the case when 'input' is not set
    echo "No input received.";
}
?>
