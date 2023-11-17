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
} else if (isset($_POST["makeadminn"])) {
    makeadmin();
} else if (isset($_POST["makeuserr"])) {
    makeuser();
}



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
        <div class="main" id="mainpart">
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
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                </div>

             

            </div>

            <div class="container-fluid">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM products";
                        $resultproduct = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($resultproduct)) {
                            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["type"] . "</td>
                    <td>" . $row["price"] . "</td>
                    <td>" . $row["description"] . "</td>
                    <td>
                        <a href='editproduct.php?id=" . $row["id"] . "' style='color: orange; '>
                            <span class='fas fa-edit'></span> 
                        </a>
                    </td>
                    <td>
                        <a href='deleteproduct.php?id=" . $row["id"] . "' style='color: red;'>
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
        <!-- Add product  -->
        <!-- <div class="main" id="addproduct">
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
        </div> -->
        <!-- Edit product  -->
        <!-- <div class="main" id="editproduct">
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
        </div> -->
        <!-- delete product  -->
        <!-- <div class="main" id="deleteproduct">
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
 -->



        <!-- Add user -->

        <!-- <div class="main" id="adduser">
            <div class="formcards">
                <div class="formcard">
                    <div class="form-container">

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
        </div> -->
        <!-- Edit user  -->
        <!-- <div class="main" id="edituser">
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
        </div> -->
        <!-- delete user  -->
        <!-- <div class="main" id="deleteuser">
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
        </div> -->

        <!-- make admin  -->
        <!-- <div class="main" id="makeadmin">
            <div class="formcards">
                <div class="formcard">
                    <div class="card-content form-container">

                        <h1>Make admin</h1>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">ID</label>
                                <input type="text" class="form-control" name="id" required>
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="makeadminn" value="Update"
                                    style="background-color: #007BFF; color: #fff; padding: 10px 20px; border: none; cursor: pointer;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- make user  -->
        <!-- <div class="main" id="makeuser">
            <div class="formcards">
                <div class="formcard">
                    <div class="card-content form-container">

                        <h1>Make user</h1>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">ID</label>
                                <input type="text" class="form-control" name="id" required>
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="makeuserr" value="Update"
                                    style="background-color: #007BFF; color: #fff; padding: 10px 20px; border: none; cursor: pointer;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->

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
        var makeadmin = document.getElementById("makeadmin");
        var makeuser = document.getElementById("makeuser");


        function dasboardside() {
            addproduct.style.display = "none";
            edirproduct.style.display = "none";
            deleteproduct.style.display = "none";

            adduser.style.display = "none";
            edituser.style.display = "none";
            deleteuser.style.display = "none";
            makeadmin.style.display = "none";
            makeuser.style.display = "none";

            mainpart.style.display = "block";
        }
        function addproductside() {
            mainpart.style.display = "none";
            edirproduct.style.display = "none";
            deleteproduct.style.display = "none";

            adduser.style.display = "none";
            edituser.style.display = "none";
            deleteuser.style.display = "none";
            makeadmin.style.display = "none";
            makeuser.style.display = "none";

            addproduct.style.display = "block";
        }
        function editproductside() {
            mainpart.style.display = "none";
            addproduct.style.display = "none";
            deleteproduct.style.display = "none";

            adduser.style.display = "none";
            edituser.style.display = "none";
            deleteuser.style.display = "none";
            makeadmin.style.display = "none";
            makeuser.style.display = "none";

            edirproduct.style.display = "block";
        }
        function deleteproductside() {
            mainpart.style.display = "none";
            addproduct.style.display = "none";
            edirproduct.style.display = "none";

            adduser.style.display = "none";
            edituser.style.display = "none";
            deleteuser.style.display = "none";
            makeadmin.style.display = "none";
            makeuser.style.display = "none";

            deleteproduct.style.display = "block";
        }

        function adduserside() {
            mainpart.style.display = "none";
            edirproduct.style.display = "none";
            deleteproduct.style.display = "none";

            adduser.style.display = "block";
            edituser.style.display = "none";
            deleteuser.style.display = "none";
            makeadmin.style.display = "none";
            makeuser.style.display = "none";

            addproduct.style.display = "none";
        }
        function edituserside() {
            mainpart.style.display = "none";
            addproduct.style.display = "none";
            deleteproduct.style.display = "none";

            adduser.style.display = "none";
            edituser.style.display = "block";
            deleteuser.style.display = "none";
            makeadmin.style.display = "none";
            makeuser.style.display = "none";

            edirproduct.style.display = "none";
        }
        function deleteuserside() {
            mainpart.style.display = "none";
            addproduct.style.display = "none";
            edirproduct.style.display = "none";

            adduser.style.display = "none";
            edituser.style.display = "none";
            deleteuser.style.display = "block";
            makeadmin.style.display = "none";
            makeuser.style.display = "none";

            deleteproduct.style.display = "none";
        }

        function makeadminside() {
            mainpart.style.display = "none";
            addproduct.style.display = "none";
            edirproduct.style.display = "none";

            adduser.style.display = "none";
            edituser.style.display = "none";
            deleteuser.style.display = "none";
            makeadmin.style.display = "block";
            makeuser.style.display = "none";


            deleteproduct.style.display = "none";
        }
        function makeuserside() {
            mainpart.style.display = "none";
            addproduct.style.display = "none";
            edirproduct.style.display = "none";

            adduser.style.display = "none";
            edituser.style.display = "none";
            deleteuser.style.display = "none";
            makeadmin.style.display = "none";
            makeuser.style.display = "block";


            deleteproduct.style.display = "none";
        }



        dasboardside();
    </script>

</body>

</html>