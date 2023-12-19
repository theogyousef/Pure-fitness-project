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
        button[name="addOption1"] {
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
        button[name="addOption1"]:hover {
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
                                    <input type="text" id="yearInput" name="option_name1" placeholder="Option Name">
                                    <br>
                                    <label for="type1">Type:</label>
                                    <select id="yearInput" id="type1" name="type1">
                                        <option value="int">Integer</option>
                                        <option value="text">Text</option>
                                        <option value="data">Data</option>
                                    </select>
                                    <button name="addOption1" style="background-color:black;" type="submit">Add Option</button>
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addOption1'])) {
        include "../controller/config.php";
        include "../controller/logs.php";
        // Handle the form submission
        $option_name = $_POST['option_name1'];
        $type = $_POST['type1'];

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare the statement
        $stmt = $conn->prepare("INSERT INTO options (option_name, type) VALUES (?, ?)");

        // Bind parameters
        $stmt->bind_param("ss", $option_name, $type);

        // Execute the query
        $stmt->execute();
        $log = "Run addoption function";
        logger($log);

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
}
?>

</body>