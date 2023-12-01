<?php

session_start();

require '../controller/config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'  ");
    $row = mysqli_fetch_assoc($result);

} else {
    header("Location: registeration");
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

    <title>My Cart</title>
    <link rel="stylesheet" href="../public/CSS/cart_display.css">
</head>

<body>
    <header>
        <h1>My Cart</h1>
    </header>

	<div class="cart-wrap">
		<div class="container">
	        <div class="row">
			    <div class="col-md-12">
			        <div class="main-heading mb-10">My Cart</div>
			        <div class="table-wishlist">
				        <table cellpadding="0" cellspacing="0" border="0" width="100%">
				        	<thead>
                                <tr>
                                    <th width="45%">Product Name</th>
					        		<th width="15%">Unit Price</th>
					        		
					        		<th width="15%"></th>
					        		<th width="10%"></th>
					        	</tr>
					        </thead>
					        <tbody>
                                <?php if (!empty($_SESSION['products'])) : ?>
                                    <?php for ($i = 0; $i < sizeof($_SESSION['products']); $i++) : ?>
					        	<tr>
					        		<td width="45%">
					        			<div class="display-flex align-center">
		                                    <div class="img-product">
		                                        <img src=<?php echo $_SESSION['products'][$i]['image'];?> alt="" class="mCS_img_loaded">
		                                    </div>
		                                    <div class="name-product">
											
                                            <?php
                                            echo $_SESSION['products'][$i]['name']; ?>
		                                    </div>
	                                    </div>
	                                </td>
					        		<td width="15%" class="price"><?php echo $_SESSION['products'][$i]['price'];?> EGP </td>
					        		
					        		<td width="10%" class="text-center"><a href="cart_display.php" class="trash-icon"><i class="far fa-trash-alt"></i></a></td>
                                    <?php 
                                    unset($_SESSION['products'][$i]); 
                                    ?>
					        	</tr>
                                <?php endfor; ?>
                            <?php else : ?>
                                <p>Your cart is empty.</p>
                            <?php endif; ?>
					        	
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