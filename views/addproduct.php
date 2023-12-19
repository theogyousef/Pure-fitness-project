<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php

//require "../controller/config.php";
require "../controller/adminFunctions.php";

if (isset($_POST["addproduct"])) {
    AdminFunctions::addproduct();
}

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn,"SELECT a.*, p.*, u.* FROM addresses a JOIN permissions p ON a.user_id = p.user_id JOIN users u ON a.user_id = u.id WHERE a.user_id = '$id' AND u.id = '$id';" );
    $row = mysqli_fetch_assoc($result);
  } else {
    header("Location: login");
  }


if ($row["admin"] != 1) {
    header("Location: index.php");

}

if ($row["guest"] == 1) {
    header("Location: index.php");

}


include "adminnav.php";



?>

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


<div class="container">
    


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
                        <label for="stock">Select a type:</label>
                            <select class="form-control" id="type" name="type">
                                <option value=" " >
                                    
                                </option>
                                <option value="Dumbell">Dumbell</option>
                                <option value="Barbell">Barbell</option>
                                <option value="Collars">Collars</option>
                                <option value="Plates">Plates</option>
                                <option value="Kettlebell ">Kettlebell </option>
                                <option value="Benches">Benches</option>
                                <option value="Bicycle">Bicycle</option>
                                <option value="Cable Extensions">Cable Extensions</option>
                                <option value="Racks">Racks</option>
                                <option value="Machines">Machines</option>
                                <option value="Cardio">Cardio</option>
                                <option value="Mat">Mat</option>
                                <option value="Rope">Rope</option>
                                <option value="Box">Box</option>
                                <option value="Power Bag">Power Bag</option>
                                <option value="Step">Step</option>
                                <option value="Weighted balls">Weighted balls</option>
                                <option value="Smith machine">Smith machine</option>
                                <option value="Sandbag">Sandbag</option>




                            </select>

                        </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="text" class="form-control" name="price" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stock</label>
                                <input type="text" class="form-control" name="stock" required>
                            </div>
                            <div class="mb-3">
                                <label for="newProductImage" class="form-label">Image</label>
                                <input type="file" class="form-control" id="newProductImage"
                                    accept="image/png, image/gif, image/jpeg , image/webp" name="file" required>
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
</div>
</body>