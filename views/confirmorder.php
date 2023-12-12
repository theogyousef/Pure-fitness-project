<script>
	if (window.history.replaceState) {
		window.history.replaceState(null, null, window.location.href);
	}
</script>

<?php


require '../controller/config.php';


if (!empty($_SESSION["id"])) {
	$id = $_SESSION["id"];
	$result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
	$row = mysqli_fetch_assoc($result);
} else {
	header("Location: login");
}

if (isset($_POST["confirm"])) {
	require '../controller/config.php';
	$order_id = rand(1000, 9999);
	echo "order id " . $order_id . " <br>";
	$user_id = $id ;
	echo "user id = " . $user_id;
	//insert into orders 
	mysqli_query($conn,"INSERT into orders (order_id , user_id ) VALUES ('$order_id' , '$user_id')");
	$total = $_SESSION['total'];
	echo "Total from session: " . $total . "<br>";
	//insert into orders_details 
	mysqli_query($conn,"INSERT into orders_details (order_id , status , total ) VALUES ('$order_id' , 'pending' , '$total' )");
	$totalquantity = 0 ;
	foreach ($_SESSION['products'] as $product):
		$totalquantity += $product['quantity'];
		echo $product['id'] . " " . $product['quantity'] . "<br>";
		$product_id = $product['id'];
		$quantity = $product['quantity'];
		echo "product id " . $product_id . "and quantity = " . $quantity . "<br>";
		//insert into orders_product_details 
		mysqli_query($conn,"INSERT into  order_product_details  (order_id , product_id , quantity ) VALUES ('$order_id' , '$product_id' , '$quantity' )");

	endforeach;
	echo $totalquantity;


echo "                    success                ";
header("Location: orders");
}
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
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="../public/CSS/wishlist.css">
	<link rel="stylesheet" href="../public/CSS/cart_display.css">

	<title>Confrim order</title>
</head>
<!-- mmmmmmmmmmmmmmooooooooooooooooaaaaaaaaazzzzzzzzzzzzz -->

<body>

	<form method="post">
		<input type="submit" name="confirm" value="confrim order">
	</form>

	<footer>
		<?php
		include "footer.php";
		?>
	</footer>
</body>

</html>