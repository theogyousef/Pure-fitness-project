<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php

//require "../controller/config.php";
require "../controller/admin_products_fun.php";

// Check for form submissions and perform the corresponding action
if (isset($_POST["add"])) {
    addproduct();
} else if (isset($_POST["update"])) {
    updateproduct();
} else if (isset($_POST["delete"])) {
    deleteproduct();
}


if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'  ");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: registeration.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    <title>Admin panel</title>
    <style>
        <?php include "../public/CSS/adminDasboard.css" ?>
    </style>

</head>


<body>
    <div class="container">
        <div class="topbar">
            <div class="logo">
                <h2>Pure Fitness</h2>
            </div>

            <div class="search">
                <h1>Welcome back 
                    <?php echo $row["firstname"] . " " . $row["lastname"] . " <3" ?>
                </h1>
            </div>
            <div class="user">
                <img src="<?php echo $row['profilepicture'] ?>" alt="">
            </div>
        </div>
        <!-- Sidebar -->
        <div class="sidebar">
            <ul>
                <li class="active" id="dashboard">
                    <a href="#" onclick="dasboardside()">
                        <i class="fas fa-th-large"></i>
                        <div>Dashboard</div>
                    </a>
                </li>

                <li class="dropdown" id="users">
                    <a href="#">
                        <i class="fas fa-users"></i>
                        <div>Users</div>
                    </a>
                    <div class="dropdown-content">

                        <a href="#">Add user</a>
                        <a href="#">edit User</a>
                        <a href="#">delete User</a>

                        <!-- Add more links as needed -->
                    </div>
                </li>
                <li class="dropdown" id="products">
                    <a href="#">
                        <i class="fas fa-dumbbell"></i>
                        <div>products</div>
                    </a>
                    <div class="dropdown-content">
                        <a href="#" onclick="addproductside()">Add product</a>
                        <a href="#" onclick="editproductside()">edit product</a>
                        <a href="#" onclick="deleteproductside()">delete product</a>
                        <!-- Add more links as needed -->
                    </div>
                </li>


                <li>
                    <a href="profilesettings.php">
                        <i class="fas fa-cog"></i>
                        <div>Profile Settings</div>
                    </a>
                </li>
                <li>
                    <a href="home.php">
                        <i class="fas fa-home"></i>
                        <div>Home</div>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Dashboard -->
        <div class="main" id="mainpart">
            <div class="cards">
                <div class="card">
                    <div class="card-content">
                        <div class="number">1217</div>
                        <div class="card-name">Tatal Users</div>
                    </div>
                    <div class="icon-box">
                    <i class="fas fa-user"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number">42</div>
                        <div class="card-name">pieces of equipment</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                </div>
              
            </div>
            <div class="charts">
                <div class="chart">
                    <h2>Earnings (past 12 months)</h2>
                    <div>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
                <div class="chart doughnut-chart">
                    <h2>Employees</h2>
                    <div>
                        <canvas id="doughnut"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add product  -->
        <div class="main" id="addproduct">
            <div class="cards">
                <div class="card">
                    <div class="card-content form-container">

                        <h1>ADD Product</h1>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="newProductName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="newProductName" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="newProductSlug" class="form-label">Type</label>
                                <input type="text" class="form-control" id="newProductSlug" name="type" required>
                            </div>
                            <div class="mb-3">
                                <label for="newProductSlug" class="form-label">Price</label>
                                <input type="text" class="form-control" id="newProductSlug" name="price" required>
                            </div>
                            <div class="mb-3">
                                <label for="newProductImage" class="form-label">Image</label>
                                <input type="file" class="form-control" id="newProductImage"
                                    accept="image/png, image/gif, image/jpeg" name="file" required>
                            </div>
                            <div class="mb-3">
                                <label for="newProductDescription" class="form-label">Description</label>
                                <input type="text" class="form-control" id="newProductDescription" name="description"
                                    required>
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="add" value="ADD Product"
                                    style="background-color: #007BFF; color: #fff; padding: 10px 20px; border: none; cursor: pointer;">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit product  -->
        <div class="main" id="editproduct">
            <div class="cards">
                <div class="card">
                    <div class="card-content form-container">

                        <h1>Update product</h1>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="newProductName" class="form-label">ID</label>
                                <input type="text" class="form-control" id="newProductName" name="id" required>
                            </div>
                            <div class="mb-3">
                                <label for="newProductName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="newProductName" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="newProductSlug" class="form-label">Type</label>
                                <input type="text" class="form-control" id="newProductSlug" name="type" required>
                            </div>
                            <div class="mb-3">
                                <label for="newProductSlug" class="form-label">Price</label>
                                <input type="text" class="form-control" id="newProductSlug" name="price" required>
                            </div>
                            <div class="mb-3">
                                <label for="newProductDescription" class="form-label">Description</label>
                                <input type="text" class="form-control" id="newProductDescription" name="description"
                                    required>
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="update" value="Update Product"
                                    style="background-color: #007BFF; color: #fff; padding: 10px 20px; border: none; cursor: pointer;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- delete product  -->
        <div class="main" id="deleteproduct">
            <div class="cards">
                <div class="card">
                    <div class="card-content form-container">

                        <h1>Delete product</h1>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="newProductName" class="form-label">ID</label>
                                <input type="text" class="form-control" id="newProductName" name="id" required>
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="delete" value="Delete Product"
                                    style="background-color: #007BFF; color: #fff; padding: 10px 20px; border: none; cursor: pointer;">
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="../public/JS/admindasboard.js"></script>
    <script>

        var dashboard = document.getElementById("dashboard");
        var users = document.getElementById("users");
        var products = document.getElementById("products");

        var mainpart = document.getElementById("mainpart");
        var addproduct = document.getElementById("addproduct");
        var edirproduct = document.getElementById("editproduct");
        var deleteproduct = document.getElementById("deleteproduct");

        function dasboardside() {
            addproduct.style.display = "none";
            edirproduct.style.display = "none";
            deleteproduct.style.display = "none";
            mainpart.style.display = "block";
        }
        function addproductside() {
            mainpart.style.display = "none";
            edirproduct.style.display = "none";
            deleteproduct.style.display = "none";
            addproduct.style.display = "block";
        }
        function editproductside() {
            mainpart.style.display = "none";
            addproduct.style.display = "none";
            deleteproduct.style.display = "none";
            edirproduct.style.display = "block";
        }
        function deleteproductside() {
            mainpart.style.display = "none";
            addproduct.style.display = "none";
            edirproduct.style.display = "none";
            deleteproduct.style.display = "block";


        }



        dasboardside()
    </script>

</body>

</html>