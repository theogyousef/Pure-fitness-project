<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php

require "../controller/adminFunctions.php";

if (isset($_POST["updatephotos"])) {
    updatephotos();
}
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


if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id = $productId";
    $sql2 = "SELECT * FROM products p join product_photos pp on p.id = pp.product_id WHERE id = $productId";

    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);

    if ($result && mysqli_num_rows($result) > 0) {
        $productDetails = mysqli_fetch_assoc($result);
        $productfiles = mysqli_fetch_assoc($result2);


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

                    <h1>change photos of product</h1>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">ID</label>
                            <input type="text" class="form-control" name="" required
                                value="<?php echo $productDetails['id'] ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ID</label>
                            <input type="text" class="form-control" name="id" required
                                value="<?php echo $productDetails['id'] ?>" hidden>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required
                                value="<?php echo $productDetails['name'] ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="newProductImage" class="form-label">Main Image</label>
                            <input type="file" class="form-control" id="newProductImage"
                                accept="image/png, image/gif, image/jpeg , image/webp" name="file" value="<?php echo $productDetails['file'] ?>">
                            <span>
                                <?php echo !empty($productDetails['file']) ? $productDetails['file'] : ''; ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="newProductImage" class="form-label">2nd Image</label>
                            <input type="file" class="form-control" id="newProductImage"
                                accept="image/png, image/gif, image/jpeg , image/webp" name="file1" required>
                            <span>
                                <?php echo !empty($productfiles['file1']) ? $productfiles['file1'] : ''; ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="newProductImage" class="form-label">3rd Image</label>
                            <input type="file" class="form-control" id="newProductImage"
                                accept="image/png, image/gif, image/jpeg , image/webp" name="file2" required>
                            <span>
                                <?php echo !empty($productfiles['file2']) ? $productfiles['file2'] : ''; ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="newProductImage" class="form-label">4th Image</label>
                            <input type="file" class="form-control" id="newProductImage"
                                accept="image/png, image/gif, image/jpeg , image/webp" name="file3" required>
                            <span>
                                <?php echo !empty($productfiles['file3']) ? $productfiles['file3'] : ''; ?>
                            </span>
                        </div>

                        <div class="mb-3">
                            <input type="submit" name="updatephotos" value="Update photos"
                                style="background-color: #007BFF; color: #fff; padding: 10px 20px; border: none; cursor: pointer;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>