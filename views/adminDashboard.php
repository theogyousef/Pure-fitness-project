<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php

//require "../controller/config.php";
require "../controller/adminFunctions.php";

if (isset($_POST["addproduct"])) {
    addproduct();
} else if (isset($_POST["updateproduct"])) {
    updateproduct();
} else if (isset($_POST["deleteproduct"])) {
    deleteproduct();
} else if (isset($_POST["adduserb"])) {
    adduser();
} else if (isset($_POST["updateuser"])) {
    updateuser();
} else if (isset($_POST["deleteuser"])) {
    deleteuser();
}



if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'  ");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: registeration.php");
}

$sql = "SELECT * from products ";
$result = mysqli_query($conn, $sql);


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
                    <?php echo $row["firstname"] . " (:" ?>
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

                        <a href="#" onclick="adduserside()">Add user</a>
                        <a href="#" onclick="edituserside()">edit User</a>
                        <a href="#" onclick="deleteuserside()">delete User</a>

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
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>name</th>
                                <th>type</th>
                                <th>price</th>
                                <th>description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while ($row = mysqli_fetch_assoc($result)) {
                        echo   " <tr>
                                <td>" . $row["id"] . "</td>
                                <td> ". $row["name"] . "</td>
                                <td> ". $row["type"] . "</td>
                                <td> ". $row["price"] . "</td>
                                <td> ". $row["description"] . "</td>


                            </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
               
            </div>
        </div>
        <!-- Add product  -->
        <div class="main" id="addproduct">
            <div class="formcards">
                <div class="formcard">
                    <div class="card-content form-container">

                        <h1>ADD Product</h1>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Type</label>
                                <input type="text" class="form-control" name="type" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="text" class="form-control" name="price" required>
                            </div>
                            <div class="mb-3">
                                <label for="newProductImage" class="form-label">Image</label>
                                <input type="file" class="form-control" id="newProductImage"
                                    accept="image/png, image/gif, image/jpeg" name="file" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" required>
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="addproduct" value="ADD Product"
                                    style="background-color: #007BFF; color: #fff; padding: 10px 20px; border: none; cursor: pointer;">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit product  -->
        <div class="main" id="editproduct">
            <div class="formcards">
                <div class="formcard">
                    <div class="card-content form-container">

                        <h1>Update product</h1>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">ID</label>
                                <input type="text" class="form-control" name="id" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="newProductSlug" class="form-label">Type</label>
                                <input type="text" class="form-control" name="type" required>
                            </div>
                            <div class="mb-3">
                                <label for="newProductSlug" class="form-label">Price</label>
                                <input type="text" class="form-control" name="price" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" required>
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="updateproduct" value="Update Product"
                                    style="background-color: #007BFF; color: #fff; padding: 10px 20px; border: none; cursor: pointer;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- delete product  -->
        <div class="main" id="deleteproduct">
            <div class="formcards">
                <div class="formcard">
                    <div class="card-content form-container">

                        <h1>Delete product</h1>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">ID</label>
                                <input type="text" class="form-control" name="id" required>
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="deleteproduct" value="Delete Product"
                                    style="background-color: #007BFF; color: #fff; padding: 10px 20px; border: none; cursor: pointer;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        <!-- Add user -->

        <div class="main" id="adduser">
            <div class="formcards">
                <div class="formcard">
                    <div class="card-content form-container">

                        <h1>ADD User</h1>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="two-forms">
                                <div class="input-box">
                                    <input type="text" class="input-field" placeholder="First name" name="fname">
                                    <i class="bx bx-user"></i>
                                </div>
                                <div class="input-box">
                                    <input type="text" class="input-field" placeholder="Last name" name="lname">
                                    <i class="bx bx-user"></i>
                                </div>
                            </div>
                            <div class="input-box">
                                <input type="email" class="input-field" placeholder="Email" name="email">
                                <i class="bx bx-envelope"></i>
                            </div>
                            <div class="input-box">
                                <input id="reg-password" type="password" class="input-field" placeholder="Password"
                                    name="password">
                            </div>
                            <div class="input-box">
                                <input id="conpassword" type="password" class="input-field"
                                    placeholder="Confirm password" name="confirmpassword">
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="adduserb" value="add user"
                                    style="background-color: #007BFF; color: #fff; padding: 10px 20px; border: none; cursor: pointer;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit user  -->
        <div class="main" id="edituser">
            <div class="formcards">
                <div class="formcard">
                    <div class="card-content form-container">

                        <h1>Update user</h1>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">ID</label>
                                <input type="text" class="form-control" name="id" required>
                            </div>
                            <div class="two-forms">
                                <div class="input-box">
                                    <input type="text" class="input-field" placeholder="First name" name="fname">
                                    <i class="bx bx-user"></i>
                                </div>
                                <div class="input-box">
                                    <input type="text" class="input-field" placeholder="Last name" name="lname">
                                    <i class="bx bx-user"></i>
                                </div>
                            </div>
                            <div class="input-box">
                                <input type="email" class="input-field" placeholder="Email" name="email">
                                <i class="bx bx-envelope"></i>
                            </div>
                            <div class="input-box">
                                <input id="reg-password" type="password" class="input-field" placeholder="Password"
                                    name="password">
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="updateuser" value="Update Product"
                                    style="background-color: #007BFF; color: #fff; padding: 10px 20px; border: none; cursor: pointer;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- delete product  -->
        <div class="main" id="deleteuser">
            <div class="formcards">
                <div class="formcard">
                    <div class="card-content form-container">

                        <h1>Delete user</h1>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">ID</label>
                                <input type="text" class="form-control" name="id" required>
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="deleteuser" value="Delete Product"
                                    style="background-color: #007BFF; color: #fff; padding: 10px 20px; border: none; cursor: pointer;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="../public/JS/admindasboard.js"></script>
    <script>

        // var dashboard = document.getElementById("dashboard");
        // var users = document.getElementById("users");
        // var products = document.getElementById("products");

        var mainpart = document.getElementById("mainpart");
        // product forms 
        var addproduct = document.getElementById("addproduct");
        var edirproduct = document.getElementById("editproduct");
        var deleteproduct = document.getElementById("deleteproduct");
        //user forms 
        var adduser = document.getElementById("adduser");
        var edituser = document.getElementById("edituser");
        var deleteuser = document.getElementById("deleteuser");

        function dasboardside() {
            addproduct.style.display = "none";
            edirproduct.style.display = "none";
            deleteproduct.style.display = "none";

            adduser.style.display = "none";
            edituser.style.display = "none";
            deleteuser.style.display = "none";

            mainpart.style.display = "block";
        }
        function addproductside() {
            mainpart.style.display = "none";
            edirproduct.style.display = "none";
            deleteproduct.style.display = "none";

            adduser.style.display = "none";
            edituser.style.display = "none";
            deleteuser.style.display = "none";

            addproduct.style.display = "block";
        }
        function editproductside() {
            mainpart.style.display = "none";
            addproduct.style.display = "none";
            deleteproduct.style.display = "none";

            adduser.style.display = "none";
            edituser.style.display = "none";
            deleteuser.style.display = "none";

            edirproduct.style.display = "block";
        }
        function deleteproductside() {
            mainpart.style.display = "none";
            addproduct.style.display = "none";
            edirproduct.style.display = "none";

            adduser.style.display = "none";
            edituser.style.display = "none";
            deleteuser.style.display = "none";

            deleteproduct.style.display = "block";
        }

        function adduserside() {
            mainpart.style.display = "none";
            edirproduct.style.display = "none";
            deleteproduct.style.display = "none";

            adduser.style.display = "block";
            edituser.style.display = "none";
            deleteuser.style.display = "none";

            addproduct.style.display = "none";
        }
        function edituserside() {
            mainpart.style.display = "none";
            addproduct.style.display = "none";
            deleteproduct.style.display = "none";

            adduser.style.display = "none";
            edituser.style.display = "block";
            deleteuser.style.display = "none";

            edirproduct.style.display = "none";
        }
        function deleteuserside() {
            mainpart.style.display = "none";
            addproduct.style.display = "none";
            edirproduct.style.display = "none";

            adduser.style.display = "none";
            edituser.style.display = "none";
            deleteuser.style.display = "block";

            deleteproduct.style.display = "none";
        }



        dasboardside()
    </script>

</body>

</html>