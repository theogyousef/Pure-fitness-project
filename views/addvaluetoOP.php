<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php



include "adminnav.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


    <title>Admin panel</title>

    <style>
        /* Style for the Total Sales Report button */
        button[name="addOption"] {
            background-color: blue;
            color: white;
            /* Set text color to white for better contrast */
            padding: 10px 20px;
            /* Adjust padding as needed */
            font-size: 16px;
            /* Adjust font size as needed */
            border: none;
            border-radius: 5px;
            /* Add border radius for rounded corners */
            cursor: pointer;
        }

        /* Add hover effect */
        button[name="addOption"]:hover {
            background-color: darkblue;
            /* Change color on hover */
        }

        #yearInput {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px 0;
            box-sizing: border-box;
        }
    </style>
</head>


<body>
    <div class="container">
        <div class="main">
            <div class="cards">
                <form method="post">
                    <div class="card">
                        <div class="card-content">
                            <div class="number">
                                <div class="col-md-2">
                                    <input type="text" id="yearInput" name="option_name" placeholder="Enter Value">
                                    <br>
                                    <!-- Your HTML form with the dynamic dropdown -->
                                    <form method="post">
                                        <select id="yearInput" name="option_id">
                                            <?php
                                            // Establish a connection to your MySQL database

                                            include "../controller/config.php";
                                            // Check the connection
                                           

                                            if ($conn->connect_error) {
                                                die("Connection failed: " . $conn->connect_error);
                                            }

                                            // Query to retrieve data from the 'options' table
                                            $sql = "SELECT * FROM options";
                                            $result = $conn->query($sql);
                                            // Populate the dropdown with options
                                            while ($row = $result->fetch_assoc()) {
                                                $id = $row['id'];
                                               
                                                $optionName = $row['option_name'];

                                                echo "<option  value='$id'>$optionName</option>";
                                               
                                            }
                                        
                                            // Close the database connection
                                            $conn->close();
                                            ?>
                                            
                                          
                                        </select>
                                        <select id="yearInput" >
                                            <?php
                                            // Establish a connection to your MySQL database
                                            include "../controller/config.php";

                                            // Check the connection
                                            if ($conn->connect_error) {
                                                die("Connection failed: " . $conn->connect_error);
                                            }

                                            // Query to retrieve data from the 'products' table
                                            $sql = "SELECT id, name FROM products";
                                            $result = $conn->query($sql);

                                            // Populate the dropdown with options
                                            while ($row = $result->fetch_assoc()) {
                                                $id = $row['id'];
                                                $productName = $row['name'];
                                                echo "<option   value='$id'>$productName    id = $id</option>";
                                                
                                              
                                            }

                                            // Close the database connection
                                            $conn->close();

                                            ?>
                                            <input type="text" id="yearInput" name="product_id" placeholder="Enter ID">
                                           
                                            
                                            
                                        </select>

                                       

                                        
                                        <button name="addOption" style="background-color:black;" type="submit"> Add Value </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
          
        </div>
    </div>

  
    <?php
    // Assuming you have a database connection established

    // Your PHP backend to handle form submissions
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['addOption'])) {
            include "../controller/config.php";
        
                
            // Retrieve the values from the second form
            $optionValue = $_POST['option_name'];
            $productId = $_POST['product_id'];
            $id = $_POST['option_id'];  

            // Your SQL query to insert into the product_options_values table
            $sql = "INSERT INTO product_options_values (value, product_id, product_option_id)
                VALUES ('$optionValue', '$productId', '$id')";
             

               
            // Execute the query
            if ($conn->query($sql) === TRUE) {
                $log = "Run addvalueforoption&product function";
                logger($log);
               
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Close the database connection
        $conn->close();
    }
    ?>
</body>