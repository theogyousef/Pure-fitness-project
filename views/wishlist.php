<?php


require '../controller/config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'  ");
    $row = mysqli_fetch_assoc($result);

} else {
    header("Location: registeration.php");
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

    <title>About Us</title>
    <style>
        <?php
        include "../public/CSS/wishlist.css";
        ?>
    </style>
</head>

<body>
    <header>
        <h1>Wishlist</h1>
    </header>

	<div class="cart-wrap">
		<div class="container">
	        <div class="row">
			    <div class="col-md-12">
			        <div class="main-heading mb-10">My wishlist</div>
			        <div class="table-wishlist">
				        <table cellpadding="0" cellspacing="0" border="0" width="100%">
				        	<thead>
					        	<tr>
					        		<th width="45%">Product Name</th>
					        		<th width="15%">Unit Price</th>
					        		<th width="15%">Stock Status</th>
					        		<th width="15%"></th>
					        		<th width="10%"></th>
					        	</tr>
					        </thead>
					        <tbody>
					        	<tr>
					        		<td width="45%">
					        			<div class="display-flex align-center">
		                                    <div class="img-product">
		                                        <img src="../public/photos/productPhotos/ASSAULT AIRBIKE.webp" alt="" class="mCS_img_loaded">
		                                    </div>
		                                    <div class="name-product">
											ASSAULT AIRBIKE
		                                    </div>
	                                    </div>
	                                </td>
					        		<td width="15%" class="price">72,000 EGP </td>
					        		<td width="15%"><span class="in-stock-box">In Stock</span></td>
					        		<td width="15%"><button class="round-black-btn small-btn">Add to Cart</button></td>
					        		<td width="10%" class="text-center"><a href="#" class="trash-icon"><i class="far fa-trash-alt"></i></a></td>
					        	</tr>
					        	<tr>
					        		<td width="45%">
					        			<div class="display-flex align-center">
		                                    <div class="img-product">
		                                        <img src="../public/photos/productPhotos/Bumber-Plates-2-scaled-1200x1200.webp" alt="" class="mCS_img_loaded">
		                                    </div>
		                                    <div class="name-product">
		                                       Bumper plates 
		                                    </div>
	                                    </div>
	                                </td>
					        		<td width="15%" class="price">15,000 EGP</td>
					        		<td width="15%"><span class="in-stock-box">In Stock</span></td>
					        		<td width="15%"><button class="round-black-btn small-btn">Add to Cart</button></td>
					        		<td width="10%" class="text-center"><a href="#" class="trash-icon"><i class="far fa-trash-alt"></i></a></td>
					        	</tr>
					        	<tr>
					        		<td width="45%">
					        			<div class="display-flex align-center">
		                                    <div class="img-product">
		                                        <img src="../public/photos/productPhotos/Wall-Balls-3-scaled-1200x1200.webp" alt="" class="mCS_img_loaded">
		                                    </div>
		                                    <div class="name-product">
		                                        Wall balls
		                                    </div>
	                                    </div>
	                                </td>
					        		<td width="15%" class="price">23,000 EGP</td>
					        		<td width="15%"><span class="in-stock-box">In Stock</span></td>
					        		<td width="15%"><button class="round-black-btn small-btn">Add to Cart</button></td>
					        		<td width="10%" class="text-center"><a href="#" class="trash-icon"><i class="far fa-trash-alt"></i></a></td>
					        	</tr>
				        	</tbody>
				        </table>
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