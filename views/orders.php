<?php


require '../model/productModle.php';
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    $result = mysqli_query($conn, " SELECT p.*, u.* FROM permissions p JOIN users u ON p.user_id = u.id WHERE p.guest = '1' ");
    $row = mysqli_fetch_assoc($result);
    $_SESSION["login"] = true;
    $_SESSION["id"] = $row["id"];
  } 
  else if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn," SELECT p.*, u.* FROM permissions p JOIN users u ON p.user_id = u.id WHERE u.id = '$id'  ");
    $row = mysqli_fetch_assoc($result);
  } else {
    header("Location: login");
  }
if ($row["guest"] == 1) {
    header("Location: index");

}
include "header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <title>My orders</title>
    <style>
        <?php
        include "../public/CSS/orders.css";
        ?>
    </style>
</head>

<body>
    <div class="container-joe">
        <article class="card">
            <header class="card-header"> My Orders / Tracking </header>
            <div class="card-body">
                <h6>Order ID: #001</h6>
                <article class="card">
                    <div class="card-body row">
                        <div class="col"> <strong>Estimated Delivery time:</strong> <br>1 jan 2024 </div>
                        <div class="col"> <strong>Shipping BY:</strong> <br> DHL, | <i class="fa fa-phone"></i>
                            +0123456789 </div>
                        <div class="col"> <strong>Status:</strong> <br> Picked by the courier </div>
                        <div class="col"> <strong>Tracking #:</strong> <br> BD045903594059 </div>
                    </div>
                </article>
                <div class="track">
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                            class="text">Order confirmed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">
                            Picked by courier</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On
                            the way </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready
                            for pickup</span> </div>
                </div>
                <hr>


                <?php
                $result = ProductModle::allProducts();
                if (mysqli_num_rows($result) > 0) {
                    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    // Display only the first 4 products
                    for ($i = 0; $i < min(4, count($products)); $i++) {
                        $product = $products[$i];
                        ?>
                        <a href="product?id=<?php echo $product['id']; ?>">

                            <ul class="row">
                                <li class="col-md-3 ">
                                    <figure class="itemside mb-3">
                                        <div class="aside"><img src="<?php echo $product['file']; ?>" class="img-sm border">
                                        </div>
                                        <figcaption class="info align-self-center">
                                            <p class="title">
                                                <?php echo $product['name']; ?>
                                            </p>
                                            <span class="text-muted">
                                                <?php echo $product['price'] . " EGP"; ?>
                                            </span><br>
                                            <span class="text-muted">
                                                <?php echo "2" . " pieces"; ?>
                                            </span>
                                        </figcaption>
                                    </figure>
                                </li>
                            </ul>
                        </a>
                        <?php
                    }
                } else {
                    echo "<p>No products found.</p>";
                }
                ?>



                <hr>
                <a href="#" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to
                    orders</a>
            </div>
        </article>
    </div>

    <footer>
        <?php
        include "footer.php";
        ?>
    </footer>
</body>