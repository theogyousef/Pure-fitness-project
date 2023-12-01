<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php

//require "../controller/config.php";
require "../controller/adminFunctions.php";
require"../model/searchModle.php";



if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'  ");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: registeration.php");
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
                            $sql = "SELECT * from products ";
                            $resultproduct = mysqli_query($conn, $sql);

                            $counterproducts = 0;
                            while ($row = mysqli_fetch_assoc($resultproduct)) {
                                $counterproducts++;
                            }
                            echo $counterproducts ?>
                        </div>
                        <div class="card-name">pieces of equipment</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-dumbbell"></i>
                    </div>
                </div>



            </div>
            <input type="search" name="productsearch" class="form-control rounded-0 bg-dark border" style="height: 40px; width: 800px;" placeholder="Search" id="search"/>
            <button class="btn btn-dark border-0" type="button" id="search-addon">
            <i class="bi bi-search text-white"></i>
            </button>
           

            <div class="container-fluid">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Stock</td>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       

                     
                      
                      echo "<tr>
                        <td colspan='9' style='padding-top: 0px ;padding-bottom: 0px;padding-right: 0px;padding-left: 0px;'><div  style='margin-left: -19px'id='searchresult'></div></td>
                     </tr>";
                        
                    
                        
                        $sql = "SELECT * FROM products";
                        $resultproduct = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($resultproduct)) {
                            
                            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["type"] . "</td>
                    <td>" . $row["price"] . "</td>" ?>
                            <?php
                            if ($row["outofstock"] == 1) {
                                $outofstock = "Out of stock";
                                echo '<td><span style="color: red;  font-size: 16px;">' . $outofstock . '</span> </td>';
                            } else if ($row["outofstock"] == 0) {
                                $outofstock = "In stock";
                                echo '<td><span style="color: green; font-size: 16px;">' . $outofstock . '</span> </td>';
                            }
                            ?>
                            <?php
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
                        }
                        ?>
                    </tbody>
                </table>
            </div>


        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../public/JS/adminSearch.js"></script>
    <script src="../public/JS/admindasboard.js"></script>


</body>

</html>