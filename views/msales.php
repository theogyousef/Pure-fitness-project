<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php


require "../controller/generatereport.php";
ob_end_clean(); //
ob_start(); // Start output buffering
if (isset($_POST['msales'])) {
    $selectedMonth = isset($_POST['monthSelect']) ? $_POST['monthSelect'] : null;

    switch ($selectedMonth) {
        case '1':
            Generatereport::Msales(1);
            break;
        case '2':
            Generatereport::Msales(2);
            break;
        case '3':
            Generatereport::Msales(3);
            break;
        case '4':
            Generatereport::Msales(4);
            break;
        case '5':
            Generatereport::Msales(5);
            break;
        case '6':
            Generatereport::Msales(6);
            break;
        case '7':
            Generatereport::Msales(7);
            break;
        case '8':
            Generatereport::Msales(8);
            break;
        case '9':
            Generatereport::Msales(9);
            break;
        case '10':
            Generatereport::Msales(10);
            break;
        case '11':
            Generatereport::Msales(11);
            break;
        case '12':
            Generatereport::Msales(12);
            break;
        default:
            // Handle other cases or set a default behavior
            break;
    }
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
        button[name="msales"] {
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
        button[name="msales"]:hover {
            background-color: darkblue;
            /* Change color on hover */
        }
        select[name="monthSelect"] {
      padding: 8px;
      font-size: 14px;
      border-radius: 5px;
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
                                    <select name="monthSelect" id="monthSelect">
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>


                                    <button name="msales" style="background-color:black;" type="submit">Monthly Sales Report</button>

                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>