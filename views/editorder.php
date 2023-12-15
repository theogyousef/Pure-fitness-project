<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php

//require "../controller/config.php";
require "../controller/adminFunctions.php";

if (isset($_POST["updateorder"])) {
    updateorder();
    header("Location: Adminorders");

}
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn,"SELECT a.*, p.*, u.* FROM addresses a JOIN permissions p ON a.user_id = p.user_id JOIN users u ON a.user_id = u.id WHERE a.user_id = '$id' AND u.id = '$id';" );
    $row = mysqli_fetch_assoc($result);
  } else {
    header("Location: login");
  }


if ($row["admin"] != 1) {
    header("Location: index");

}

if ($row["id"] == 1) {
    header("Location: index");

}


if (isset($_GET['id'])) {
    $orderid = $_GET['id'];

    // Fetch product details based on the product ID
    $sql = "SELECT * FROM orders o join orders_details od ON o.order_id = od.order_id where o.order_id = $orderid";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $orderDetails = mysqli_fetch_assoc($result);

      
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

                    <h1>Update Order</h1>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">ID</label>
                            <input type="text" class="form-control" name="id" required
                                value="<?php echo $orderDetails['order_id'] ?>">
                        </div>
                      
                        <div class="mb-3">
                        <label for="stock">Select a type:</label>
                            <select class="form-control" id="type" name="status">
                                <option value="<?php echo $orderDetails['status'] ?>" selected>
                                    <?php echo $orderDetails['status'] ?>
                                </option>
                                <option value="Cancelled">Cancelled</option>
                                <option value="Pending">Pending</option>
                                <option value="Confirmed">Confirmed</option>
                                <option value="Out for delivery">Out for delivery</option>
                                <option value="Delivered">Delivered</option>
                            

                            </select>

                        </div>


                  
                        <div class="mb-3">
                            <label for="newProductSlug" class="form-label">Price</label>
                            <input type="text" class="form-control" name="price" required
                                value="<?php echo $orderDetails['total'] ?>" disabled >
                        </div>
                      
                        <div class="mb-3">
                            <input type="submit" name="updateorder" value="Update Order"
                                style="background-color: #007BFF; color: #fff; padding: 10px 20px; border: none; cursor: pointer;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>