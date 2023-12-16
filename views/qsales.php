<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php


require "../controller/generatereport.php";
ob_end_clean(); //
ob_start(); // Start output buffering
if (isset($_POST['qsales'])) {
    $selectedMonth = isset($_POST['quartarSelect']) ? $_POST['quartarSelect'] : null;

    switch ($selectedMonth) {
        case '1':
            Generatereport::Qsales(1);
            break;
        case '2':
            Generatereport::Qsales(2);
            break;
        case '3':
            Generatereport::Qsales(3);
            break;
        case '4':
            Generatereport::Qsales(4);
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
        button[name="qsales"] {
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
        button[name="qsales"]:hover {
            background-color: darkblue;
            /* Change color on hover */
        }
        select[name="quartarSelect"] {
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
                                    <select name="quartarSelect" id="quartarSelect">
                                        <option value="1">Quarter One</option>
                                        <option value="2">Quarter Two</option>
                                        <option value="3">Quarter Three</option>
                                        <option value="4">Quarter Four</option>
                                      
                                    </select>


                                    <button name="qsales" style="background-color:black;" type="submit">Quarterly Sales Report</button>

                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>