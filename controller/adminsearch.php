<?php
// Include your connfiguration file
include("../model/searchModle.php");
include("../controller/config.php");




if (isset($_POST['input'])) {
    // Get the search input from the POST data
    
        $input=$_POST['input'];
        $name=$_POST['name'];

    // Perform the search query
    //searchModle::indexsearch($input);
    $result = searchModle::adminsearch($input);
   
    // Check if the query was successful
    if ($result) {
        // Check if there are rows returned
        if (mysqli_num_rows($result) > 0) {
            // Loop through the results and display them
        
            while ($row = mysqli_fetch_assoc($result)) {
       // Check if 'username' key exists in the $row array
      
       if ($name=='usersearch'){
       
       if (isset($row['firstname'])) {
        echo "<table class='table custom-tables'>
            
            <tbody>";

   

   
        if ($row["admin"] == 1) {
            $admin = "Admin";
        } elseif ($row["admin"] == 0) {
            $admin = " ";
        }
        if ($row["deactivated"] == 1) {
            $deactivated = "Deactivated";
        } elseif ($row["deactivated"] == 0) {
            $deactivated = " ";
        }

        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["firstname"] . " " . $row["lastname"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $admin . "</td>
                <td>" . $deactivated . "</td>
                <td><a href='edituser?id=" . $row["id"] . "' style='color: orange;'><span class='fas fa-edit'></span></a></td>
                <td><a href='deleteuser?id=" . $row["id"] . "' style='color: red;'><span class='fas fa-trash-alt'></span></a></td>
                <td><a href='makeuser?id=" . $row["id"] . "' style='color: green;'><span class='fas fa-user'></span></a></td>
                <td><a href='makeadmin?id=" . $row["id"] . "' style='color: black;'><span class='fas fa-user-shield'></span></a></td>
            </tr>";
    

    echo "</tbody></table>";
}}elseif ($name=='productsearch'){

    // Check if 'name' key exists in the $row array
    if (isset($row['name'])) {
    echo "<table class='table custom-table'>
     
        <tbody>";

    echo "<tr>
            <td>" . $row["id"] . "</td>
            <td>" . $row["name"] . "</td>
            <td>" . $row["type"] . "</td>
            <td>" . $row["price"] . "</td>";

    $outofstock = ($row["outofstock"] == 1) ? "Out of stock" : "In stock";
    $color = ($row["outofstock"] == 1) ? "red" : "green";

    echo '<td><span style="color: ' . $color . '; font-size: 16px;">' . $outofstock . '</span> </td>';
    echo "<td>
            <a href='editproduct?id=" . $row["id"] . "' style='color: orange; '>
                <span class='fas fa-edit'></span> 
            </a>
        </td>
        <td>
            <a href='deleteproduct?id=" . $row["id"] . "' style='color: red;'>
                <span class='fas fa-trash-alt'></span> 
            </a>
        </td>
    </tr>";

    echo "</tbody></table>";
}
// Adjust this to match your database structure
            }
        }} else {
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

// Check if 'input' is set in the POST data
