<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require '../controller/config.php';

if (isset($_GET['remove'])) {
	$productIdToRemove = $_GET['remove'];

	if (isset($_SESSION['wishlist'])) {
		foreach ($_SESSION['wishlist'] as $key => $product) {
			if ($product['id'] == $productIdToRemove) {
				unset($_SESSION['wishlist'][$key]);
				header("Location: wishlist.php");
				exit();
			}
		}

		echo '<p>Product not found in the cart.</p>';
	} else {
		echo '<p>Cart is empty.</p>';
	}
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action']) && $_POST['action'] === 'add') {
	// Check if the required fields are set
	if (isset($_POST['id'])) {
		$productIdToAdd = $_POST['id'];

		// Check if the product exists in the wishlist
		$productInWishlist = false;
		foreach ($_SESSION['wishlist'] as $key => $wishlistProduct) {
			if ($wishlistProduct['id'] == $productIdToAdd) {
				// Add the product to the cart
				$_SESSION['products'][] = $wishlistProduct;
				$productInWishlist = true;

				// Remove the product from the wishlist
				unset($_SESSION['wishlist'][$key]);
				header("Location: wishlist.php"); // Redirect to wishlist page after processing
				exit();
			}
		}

		// Redirect to wishlist page if the product was not found in the wishlist
		header("Location: wishlist.php");
		exit();
	}
}


if (!empty($_SESSION["id"])) {
	$id = $_SESSION["id"];
	$result = mysqli_query($conn, "SELECT a.*, p.*, u.* FROM addresses a JOIN permissions p ON a.user_id = p.user_id JOIN users u ON a.user_id = u.id WHERE a.user_id = '$id' AND u.id = '$id';");
	$row = mysqli_fetch_assoc($result);
} else {
	header("Location: login");
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

	<title>Wishlist</title>
</head>

<body>
	<header>
		<h1>Wishlist</h1>
	</header>

	<div class="cart-wrap">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="table-wishlist">
						<table cellpadding="0" cellspacing="0" border="0" width="100%">
							<thead>
								<tr>
									<th width="45%">Product Name</th>
									<th width="15%">Unit Price</th>
									<th class="quantity" width="15%"></th>
									<th width="15%"></th>
									<th width="10%"></th>
								</tr>
							</thead>
							<tbody>
								<?php $total = 0; ?>
								<?php if (!empty($_SESSION['wishlist'])): ?>
									<?php foreach ($_SESSION['wishlist'] as $wishlistProduct): ?>
										<tr>
											<td width="45%">
												<div class="display-flex align-center">
													<div class="img-product">
														<?php if (isset($wishlistProduct['image'])): ?>
															<a href="product?id=<?php echo $wishlistProduct['id']; ?>">
																<img src="<?php echo $wishlistProduct['image']; ?>" alt=""
																	class="mCS_img_loaded">
															</a>
														<?php endif; ?>
													</div>
													<div class="name-product">
														<?php if (isset($wishlistProduct['name'])): ?>
															<a href="product?id=<?php echo $wishlistProduct['id']; ?>">
																<?php echo $wishlistProduct['name']; ?>
															</a>
														<?php endif; ?>
													</div>
												</div>
											</td>
											<td width="15%" class="price">
												<?php if (isset($wishlistProduct['price'])): ?>
													<a href="product?id=<?php echo $wishlistProduct['id']; ?>">
														<?php echo $wishlistProduct['price']; ?> EGP
													</a>
												<?php endif; ?>
											</td>
											<td width="10%" class="text-center">
												<?php if (isset($wishlistProduct)): ?>
													<form action="wishlist.php" method="post">
														<input type="hidden" name="action" value="add">
														<input type="hidden" name="id"
															value="<?php echo $wishlistProduct['id']; ?>">
														<?php $id = $wishlistProduct['id'];
														$query = "SELECT stock FROM products WHERE id = '$id'";
														$result = mysqli_query($conn, $query);
														$product = mysqli_fetch_assoc($result);
														
														if ($product['stock'] < 1) {
															echo '<span style="color: red;  font-size: 16px; "> Will be avilable soon</span>';
														} else {
															echo '<button type="submit" class="add-button">Add to Cart</button>';
														}
														?>


													</form>

												<?php endif; ?>
											</td>
											<td width="10%" class="text-center">
												<?php if (isset($wishlistProduct)): ?>
													<a href="wishlist.php?remove=<?php echo $wishlistProduct['id']; ?>"
														class="trash-icon"><i class="far fa-trash-alt"></i></a>
												<?php endif; ?>
											</td>
										</tr>
									<?php endforeach; ?>
								<?php else: ?>
									<p class="p-wishlist">Your wishlist is empty.</p>
								<?php endif; ?>
							</tbody>
						</table>
						<?php if (empty($_SESSION['wishlist'])): ?>
							<a href="index.php" class="add-button">Add Products to Wishlist</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer>
		<?php
		include "footer.php";
		?>
	</footer>
</body>

</html>