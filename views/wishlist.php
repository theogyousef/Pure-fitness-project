<?php


require '../controller/config.php';
if(!empty($_SESSION["id"])){
$id = $_SESSION["id"];
$result = mysqli_query($conn , "SELECT * FROM users WHERE id = '$id'  ") ;
$row = mysqli_fetch_assoc($result);

}
else {
    header("Location: registeration.php");
}

    include "header.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Set the character encoding for your document -->
<meta charset="UTF-8">
  <!-- Set the viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/CSS/wishlist.css">
  <!-- Include Bootstrap CSS and Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <!-- Include Popper.js and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>

  <!-- Include Chart.js for charts and graphs -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

  <!-- Include your custom CSS file -->
  

  <!-- Include Google Fonts for Material Symbols Outlined -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <!-- Title for your web page -->


  <!-- Title for your web page -->
<!------ Include the above in your HEAD tag ---------->
	<title>Document</title>
</head>
<body>
	
</body>
</html>
<head>


</head>

<body>



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
		                                        Apple iPad Mini
		                                    </div>
	                                    </div>
	                                </td>
					        		<td width="15%" class="price">$110.00</td>
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
		                                        Apple iPad Mini
		                                    </div>
	                                    </div>
	                                </td>
					        		<td width="15%" class="price">$110.00</td>
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
		                                        Apple iPad Mini
		                                    </div>
	                                    </div>
	                                </td>
					        		<td width="15%" class="price">$110.00</td>
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
    include "footer.php" ?>
  </footer>
    </body>

	