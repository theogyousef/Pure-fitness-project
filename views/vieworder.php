<script>
	if (window.history.replaceState) {
		window.history.replaceState(null, null, window.location.href);
	}
</script>

<?php


require '../controller/config.php';


if (!empty($_SESSION["id"])) {
	$id = $_SESSION["id"];
	$result = mysqli_query($conn, "SELECT a.*, p.*, u.* FROM addresses a JOIN permissions p ON a.user_id = p.user_id JOIN users u ON a.user_id = u.id WHERE a.user_id = '$id' AND u.id = '$id';");
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


// echo "order id " . $_SESSION['order_id'] . "<br>";
// echo "user id = " . $row['id'] . "<br>";
$total = $_SESSION['total'];
// echo "Total from session: " . $total . "<br>";
$totalquantity = 0;
// foreach ($_SESSION['confirmedorder'] as $product) :
// 	$totalquantity += $product['quantity'];
// 	echo $product['id'] . " " . $product['quantity'] . "<br>";
// 	$product_id = $product['id'];
// 	$quantity = $product['quantity'];
// 	echo "product id " . $product_id . "and quantity = " . $quantity . "<br>";

// endforeach;
// echo $totalquantity;


// echo "success";
$_SESSION['products'] = array();
include 'header.php';
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
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="../public/CSS/wishlist.css">
	<link rel="stylesheet" href="../public/CSS/cart_display.css">

	<title>View order</title>
</head>

<body>

<div class="row justify-content-center" style="margin-top: 50px;">

<div class="col-md-4 order-md-2 mb-4" id="cart">
    <?php
    if (isset($_GET['id'])) {
        $orderid = $_GET['id'];

        // Fetch order details based on the order ID
        $sql = "SELECT * FROM orders o JOIN orders_details od ON o.order_id = od.order_id WHERE o.order_id = $orderid";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $orderDetails = mysqli_fetch_assoc($result);

            // Fetch order products
            $sqlProducts = "SELECT opd.*, p.* FROM order_product_details opd JOIN products p ON opd.product_id = p.id WHERE opd.order_id = $orderid";
            $resultProducts = mysqli_query($conn, $sqlProducts);
            $orderProducts = mysqli_fetch_all($resultProducts, MYSQLI_ASSOC);
    ?>
    <h2 style="margin-bottom: 70px;">Admin viewing order </h2>
            <h3>Order id : #<?php echo $orderDetails['order_id']; ?></h3>
            <ul class="list-group mb-3">
                <?php
                $total = 0;
                foreach ($orderProducts as $product) {
                    $subtotal = $product['price'] * $product['quantity'];
                    $total += $subtotal;
                ?>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div class="d-flex align-items-center">
                            <img src="<?php echo $product['file']; ?>" alt="<?php echo $product['name']; ?>" style="width: 50px; height: auto; margin-right: 10px;">
                            <div>
                                <h6 class="my-0"><?php echo $product['name']; ?></h6>
                                <small class="text-muted">Quantity: <?php echo $product['quantity']; ?></small>
                            </div>
                        </div>
                        <span class="text-muted"><?php echo number_format($subtotal, 2); ?> LE</span>
                    </li>
                <?php
                }
                ?>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Subtotal</span>
                    <strong><?php echo number_format($total, 2); ?> LE</strong>
                </li>

                <li class="list-group-item d-flex justify-content-between">
                    <span>Shipping</span>
                    <span>Free</span>
                </li>

                <li class="list-group-item d-flex justify-content-between">
                    <span>TOTAL</span>
                    <strong><?php echo number_format($total, 2); ?> LE</strong>
                </li>
            </ul>
    <?php
        } else {
            echo '<p>No order details found.</p>';
        }
    } else {
        echo '<p>Order ID is not provided.</p>';
    }
    ?>
</div>

</div>
	<footer>
		<?php
		include "footer.php";
		?>
	</footer>
</body>
<?php #	$_SESSION['products'] = array(); 
?>

</html>