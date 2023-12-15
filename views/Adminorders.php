<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php

//require "../controller/config.php";
require "../controller/adminFunctions.php";



if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT a.*, p.*, u.* FROM addresses a JOIN permissions p ON a.user_id = p.user_id JOIN users u ON a.user_id = u.id WHERE a.user_id = '$id' AND u.id = '$id';");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: login");
}


if ($row["admin"] != 1) {
    header("Location: index.php");

}

if ($row["id"] == 1) {
    header("Location: index.php");

}

include "adminnav.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


    <title>Admin panel</title>
    <style>
        <?php include "../public/CSS/adminDasboard.css" ?>
    </style>


</head>


<body>
    <div class="container">

        <!-- Dashboard -->
        <div class="main" id="product">
            <div class="cards">

                <div class="card">
                    <div class="card-content">
                        <div class="number">
                            <?php
                            $sql = "SELECT * from orders  ";
                            $resultproduct = mysqli_query($conn, $sql);

                            $counterproducts = 0;
                            while ($row = mysqli_fetch_assoc($resultproduct)) {
                                $counterproducts++;
                            }
                            echo $counterproducts ?>
                        </div>
                        <div class="card-name"> Orders</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-box-open"></i>
                    </div>
                </div>

            </div>
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search for orders">
                <button class="search-button" style="background-color: black;">Search</button>
            </div>


            <div id="searchResult"></div>


            <div class="container-fluid">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Status</th>
                            <th>Date and time</th>
                            <th>Total</th>
                            <th>Edit</th>
                            <th>View order</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php




                        echo "<tr>
                        <td colspan='9' style='padding-top: 0px ;padding-bottom: 0px;padding-right: 0px;padding-left: 0px;'><div  style='margin-left: -19px'id='searchresult'></div></td>
                     </tr>";



                        $sql = "SELECT * FROM orders o join orders_details od ON o.order_id = od.order_id ";
                        $resultproduct = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($resultproduct)) {

                            echo "<tr>
                                  <td>" . $row["order_id"] . "</td> 
                                  <td class='" . $row["status"] . "'>" . $row["status"] . "</td>
                                  <td>" . $row["Date"] . ' at ' . $row["time"] . "</td>
                                  <td>" . $row["total"] . "</td>";
                            ?>
                            <?php echo "<td>
                        <a href='editorder?id=" . $row["order_id"] . "' style='color: orange; '>
                            <span class='fas fa-edit'></span> 
                        </a>
                                 </td>";
                            echo " <td>
                        <a href='vieworder?id=" . $row["order_id"] . "' style='color: green; '>
                            <span class='fas fa-list-ol'></span> 
                        </a>
                                 </td>
                                 </tr>  ";
                        }

                        // editorder?id=9926
                        // vieworder?id=9926
                        ?>
                    </tbody>
                </table>
            </div>


        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../public/JS/admindasboard.js"></script>
    <script src="../public/JS/searchorder.js"></script>
</body>

</html>