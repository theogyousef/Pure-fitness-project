<head>  <?php include "../includes/head.php"; 
    require"../controller/admin_products_fun.php";
    if(isset($_POST["delete"])){
        deleteproduct();
    }

    ?></head>
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
                    <label for="newProductName" class="form-label">ID</label>
                    <input type="text" class="form-control" id="newProductName" name="id" required>
                </div>
                <div class="mb-3">
                    <input type="submit" name="delete" value="Delete Product"  style="background-color: #007BFF; color: #fff; padding: 10px 20px; border: none; cursor: pointer;">
                </div>
</div>