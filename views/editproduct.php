<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php

//require "../controller/config.php";
require "../controller/adminFunctions.php";

if (isset($_POST["updateproduct"])) {
    updateproduct();
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


if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Fetch product details based on the product ID
    $sql = "SELECT * FROM products WHERE id = $productId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $productDetails = mysqli_fetch_assoc($result);

        // Display the product details on the page
        // ...

    } else {
        echo '<p>No product details found.</p>';
    }
} else {
    echo '<p>Product ID is not provided.</p>';
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



    <div class="main" id="editproduct">
        <div class="formcards">
            <div class="formcard">
                <div class="card-content form-container">

                    <h1>Update product</h1>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">ID</label>
                            <input type="text" class="form-control" name="id" required
                                value="<?php echo $productDetails['id'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required
                                value="<?php echo $productDetails['name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="newProductSlug" class="form-label">Type</label>
                            <input type="text" class="form-control" name="type" required
                                value="<?php echo $productDetails['type'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="stock">Select a state:</label>
                            <select class="form-control" id="stock" name="stock">
<?php 
if($productDetails["outofstock"] == 1){echo'
                                <option value="0">In Stock</option>
                                <option selected value="1">Out of Stock</option> ' ; }
                                else if($productDetails["outofstock"] == 0){echo'
                                    <option selected value="0">In Stock</option>
                                    <option value="1">Out of Stock</option> ' ; }
?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="newProductSlug" class="form-label">Price</label>
                            <input type="text" class="form-control" name="price" required
                                value="<?php echo $productDetails['price'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" required
                                value="<?php echo $productDetails['description'] ?>">
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
</div>
</body>