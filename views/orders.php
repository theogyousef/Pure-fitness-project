<?php


require '../model/productModle.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, " SELECT p.*, u.* FROM permissions p JOIN users u ON p.user_id = u.id WHERE u.id = '$id'  ");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: login");
}
if ($row["guest"] == 1) {
    header("Location: index");
}

// echo "user id : " . $id . "<br>";
$query = "SELECT o.*, od.* FROM orders o JOIN orders_details od WHERE o.user_id = '$id' AND o.order_id = od.order_id";
$result = mysqli_query($conn, $query);
$orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($orders as $order):
    // echo "<br>";
    // echo "order id : " . $order['order_id'] . "<br>";

    $orderid = $order['order_id'];
    $query2 = "SELECT opd.* FROM order_product_details opd WHERE opd.order_id = '$orderid'";
    $result2 = mysqli_query($conn, $query2);
    $products = mysqli_fetch_all($result2, MYSQLI_ASSOC);

    foreach ($products as $product):
        // echo "product id : " . $product['product_id'] . " and quantity " . $product['quantity'] . "<br>";
    endforeach;

    // echo "total " . $order['total'];
endforeach;

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


    <?php
    $query = "SELECT o.*, od.* FROM orders o JOIN orders_details od WHERE o.user_id = '$id' AND o.order_id = od.order_id";
    $result = mysqli_query($conn, $query);
    $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <div class="container-joe">
        <div class="container" style="margin: 0 42% ;">
            <h1>My orders</h1>
        </div>
        <?php if (!empty($orders)) { ?>
            <?php foreach ($orders as $order):
             
                ?>
                <article class="card" style="margin: 20px;">
                    <div class="card-body">
                        <h6>
                            <?php
                            echo "<h6>Order ID: " . "#" . $order['order_id'] . "<br>";
                            echo $order['Date'] . " at " . $order['time'] . "<br>";
                            $orderid = $order['order_id'];
                         
                    
                            if ($order['status'] == 'Pending' || $order['status'] == 'Confirmed') {
                                echo "<a href='cancelorder?id=" . $orderid . "' class='cancelorder'>Cancel order?</a></h6>";
                                echo "Order is Pending or Confirmed";
                            } elseif ($order['status'] == 'Out for delivery' || $order['status'] == 'Delivered') {
                                echo " <p style='color : black ; text-decoration :underline ;'>Order can not be cancelled ";
                            }
                            elseif ($order['status'] == 'Cancelled'){
                                echo " <p style='color : black ; text-decoration :underline ;'>Order alreday cancelled";
                            }
                            ?>


                        </h6>
                     
                        <?php

                      
                        $status = $order['status'];
                        switch ($status) {
                            case 'Cancelled':
                                echo '<div class="track">
                            <div class="step Cancelled"> </span> </div>
                            <div class="step Cancelled"> <span class="icon"> <i class="fas fa-times"></i>
                                    </i></span> <span class="text">
                                    Order Cancelled</span> </div>
                            <div class="step Cancelled"> </span> </div>

                        </div>';
                                break;
                            case 'Pending':
                                echo '  <div class="track">
                            <div class="step "> <span class="icon"> <i class="fas fa-question"></i> </span> <span
                            class="text">Order Pending</span> </div>
                    <div class="step  "> <span class="icon"> <i class="fa fa-user"></i> </span> <span
                            class="text">
                            Out for delivery </span> </div>
                    <div class="step  "> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                            class="text">Delivered</span> </div>
                </div>';
                                break;
                            case 'Confirmed':
                                echo '<div class="track">
                                <div class="step active Confirmed"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                                        class="text">Order confirmed</span> </div>
                                <div class="step "> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">
                                        Out for delivery </span> </div>
                                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                                        class="text">Delivered</span> </div>
                            </div>';
                                break;
                            case 'Out for delivery':
                                echo '  <div class="track">
                                <div class="step active Confirmed"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                                        class="text">Order confirmed</span> </div>
                                <div class="step active Confirmed"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">
                                        Out for delivery </span> </div>
                                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                                        class="text">Delivered</span> </div>
                            </div>';
                                break;
                            case 'Delivered':
                                echo '  <div class="track">
                                <div class="step active Delivered"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                                        class="text">Order confirmed</span> </div>
                                <div class="step active Delivered "> <span class="icon"> <i class="fa fa-user"></i> </span> <span
                                        class="text">
                                        Out for delivery </span> </div>
                                <div class="step active Delivered"> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                                        class="text">Delivered</span> </div>
                            </div>';
                                break;
                        } ?>

                    </div>

                    <?php
                    $orderid = $order['order_id'];
                    $query2 = "SELECT opd.* FROM order_product_details opd WHERE opd.order_id = '$orderid'";
                    $result2 = mysqli_query($conn, $query2);
                    $products = mysqli_fetch_all($result2, MYSQLI_ASSOC);
                    foreach ($products as $product):
                        $productid = $product['product_id'];
                        $query3 = "SELECT * FROM products WHERE id = '$productid'";
                        $result3 = mysqli_query($conn, $query3);
                        $productdetails = mysqli_fetch_assoc($result3);
            
                        if ($productdetails) { 
                            ?>
                            <a href="product?id=<?php echo $productid; ?>">
                                <ul class="row">
                                    <li class="col-md-3">
                                        <figure class="itemside mb-3">
                                            <div class="aside"><img src="<?php echo $productdetails['file']; ?>" class="img-sm border">
                                            </div>
                                            <figcaption class="info align-self-center">
                                                <p class="title">
                                                    <?php echo $productdetails['name']; ?> <span class="text-muted">
                                                        <?php echo $productdetails['id']; ?>
                                                    </span>
                                                </p>
                                                <span class="text-muted">
                                                    <?php echo $productdetails['price'] . " EGP"; ?>
                                                </span><br>
                                                <span class="text-muted">
                                                    <?php echo $product['quantity'] . " pieces"; ?>
                                                </span>

                                            </figcaption>
                                        </figure>
                                    </li>
                                </ul>
                            </a>
                            <?php
                        } else {
                            echo "Product details not found.";
                        }
                    endforeach; ?>
                    <div class="row">
                        <h3>Total :
                            <?php echo $order['total']; ?>
                        </h3>
                    </div>
                </article>
                <?php
            endforeach;
        } else {
            ?>
            <h2>You have no orders yet </h2>
            <?php
        }
        ?>

    </div>
    <footer>
        <?php
        include "footer.php";
        ?>
    </footer>

</body>