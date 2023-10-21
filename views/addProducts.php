<!DOCTYPE html>
<html>
<head>
    <?php include "../includes/head.php"; 
    require"../controller/admin_products_fun.php";
    if(isset($_POST["add"])){
        addproduct();
    }
    ?>
</head>
<body>

    <div class="row">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
            <?php   include "../includes/aside.php"   ?>
            </div>
        </div>
        <div class="col">
            <h1>Update Resource</h1>
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
                <!-- < -->
                <div class="mb-3">
                    <label for="newProductImage" class="form-label">Image</label>
                    <input type="file" class="form-control" id="newProductImage" accept="image/png, image/gif, image/jpeg" name="file" required>
                </div>
                <div class="mb-3">
                    <label for="newProductDescription" class="form-label">Description</label>
                    <input type="text" class="form-control" id="newProductDescription" name="description" required>
                </div>
                <div class="mb-3">
                    <input type="submit" name="add" value="ADD Product">
                </div>
            </form>
        </div>
    </div>

</body>
</html>
