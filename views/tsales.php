<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php


require "../controller/generatereport.php";
ob_end_clean(); //
ob_start(); // Start output buffering

if (isset($_POST['tsales'])) {
    Generatereport::Tsales();
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
    button[name="tsales"] {
      background-color: blue;
      color: white; /* Set text color to white for better contrast */
      padding: 10px 20px; /* Adjust padding as needed */
      font-size: 16px; /* Adjust font size as needed */
      border: none;
      border-radius: 5px; /* Add border radius for rounded corners */
      cursor: pointer;
    }

    /* Add hover effect */
    button[name="tsales"]:hover {
      background-color: darkblue; /* Change color on hover */
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
                                    <button name="tsales" style="background-color:black;" type="submit">Total Sales Report</button>

                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>