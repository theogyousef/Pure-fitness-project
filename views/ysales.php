<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php


require "../controller/generatereport.php";
ob_end_clean(); //
ob_start(); // Start output buffering
if (isset($_POST['ysales'])) {
    $selectedYear = isset($_POST['yearSelect']) ? $_POST['yearSelect'] : null;
            Generatereport::Ysales($selectedYear);
}


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
        button[name="ysales"] {
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
        button[name="ysales"]:hover {
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
                <div class="card">
                    <div class="card-content">
                        <div class="number">

                            <form method="post">
                                <div class="col-md-2">
                                    <input type="text" name="yearSelect" id="yearInput" placeholder="Enter year">
                                    <button name="ysales" style="background-color:black;" type="submit">Yearly Sales Report</button>

                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>