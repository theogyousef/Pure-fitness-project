<?php


require '../controller/config.php';

if (isset($_GET['remove'])) {
    $productIdToRemove = $_GET['remove'];

    if (isset($_SESSION['products'])) {
        foreach ($_SESSION['products'] as $key => $product) {
            if ($product['id'] == $productIdToRemove) {
                unset($_SESSION['products'][$key]);
                header("Location: cart_display.php");
                exit();
            }
        }

        echo '<p>Product not found in the cart.</p>';
    } else {
        echo '<p>Cart is empty.</p>';
    }
}
if (isset($_POST['updatecart'])) {
    foreach ($_SESSION['products'] as $key => $product) {
        $productId = $product['id'];

        // Check if the quantity for this product is submitted in the form
        if (isset($_POST['quantity_' . $productId])) {
            $newQuantity = $_POST['quantity_' . $productId];

            // Update the quantity in the session
            $_SESSION['products'][$key]['quantity'] = $newQuantity;
        }
    }
    // Redirect back to cart display page or handle success as needed
    header("Location: cart_display.php");
    exit();
}



require '../controller/config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'  ");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: registeration");
}

// if (!empty($_SESSION["id"])) {
//     $id = $_SESSION["id"];
//     $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
//     $row = mysqli_fetch_assoc($result);
// } else {
//     header("Location: registeration");
// } 
//  if (!empty($_SESSION['products'])) { 
//     foreach ($_SESSION['products'] as $product):
//         echo $product['id'] . " " . $product['name'] . " " . $product['price'] . " " . $product['quantity'] . "<br>";
//     endforeach;
// } else if (empty($_SESSION['products'])) {
//     echo "joe";
// }

//add the update product and an foreach that updates the session['products'] to update the quantity of each product (using id )

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <title>My Cart</title>
    <style>
        <?php
        include "../public/css/cart_display.css";
        ?>
    </style>
</head>

<body>
    <header>
        <h1>My Cart</h1>
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
                                    <th class="quantity" width="15%">Quantity</th>
                                    <th width="15%"></th>
                                    <th width="10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; ?>
                                <?php if (!empty($_SESSION['products'])) : ?>
                                    <?php foreach ($_SESSION['products'] as $product) : ?>
                                        <?php
                                        $totalproduct = $product['price'] * $product['quantity'];;
                                        $total += $totalproduct;
                                        ?>

                                        <tr>
                                            <td width="45%">
                                                <div class="display-flex align-center">
                                                    <div class="img-product">
                                                        <?php if (isset($product['image'])) : ?>
                                                            <a href="product?id=<?php echo $product['id']; ?>">

                                                                <img src="<?php echo $product['image']; ?>" alt="" class="mCS_img_loaded">
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="name-product">

                                                        <?php if (isset($product['name'])) : ?>
                                                            <a href="product?id=<?php echo $product['id']; ?>">

                                                                <?php echo $product['name']; ?>
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="15%" class="price">
                                                <?php if (isset($product['price'])) : ?>
                                                    <a href="product?id=<?php echo $product['id']; ?>">

                                                        <?php echo $product['price']; ?> EGP
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                            <td width="15%" class="quantity">

                                                <form action="" method="post">
                                                    <div class="input-group mb-2 quantity-selector" id="input-group">
                                                        <button class="btn btn-outline-secondary decrement" type="button" id="decrement">-</button>
                                                        <!-- Modify the input field name and ID to include the product ID -->
                                                        <input type="text" name="quantity_<?php echo $product['id']; ?>" id="quantity_<?php echo $product['id']; ?>" class="form-control text-center small quantity-input" style="background-color: transparent; border: none;" value="<?php echo isset($product['quantity']) ? $product['quantity'] : 1; ?>">

                                                        <!-- Add a hidden input to store the product ID -->
                                                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                                        <button class="btn btn-outline-secondary increment" type="button" id="increment">+</button>
                                                    </div>
                                                    <button class="btn btn-primary bg-dark update-cart-button" name="updatecart" type="submit">Update Cart</button>
                                                </form>


                                            </td>

                                            <!-- <td width="15%" class="quantity">
                                                <?php #if (isset($product['quantity'])) :
                                                #echo $product['quantity']; 
                                                #endif; 
                                                ?>
                                            </td> -->
                                            <td width="10%" class="text-center">
                                                <?php if (isset($product)) : ?>
                                                    <a href="cart_display.php?remove=<?php echo $product['id']; ?>" class="trash-icon"><i class="far fa-trash-alt"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <p>Your cart is empty.</p>
                                <?php endif; ?>
                            </tbody>

                        </table>
                        <h3 class="thetotal"> Total :
                            <?php echo $total; ?>
                        </h3>
                        <?php if (empty($_SESSION['products'])) : ?>
                            <a href="index" class="add-button">Add Products</a>
                        <?php endif; ?>
                        <?php if (!empty($_SESSION['products'])) : ?>
                            <a href="confirm" class="checkout-button">Proceed to Checkout</a>
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
    <script src="../public/JS/cart_display.js">
        src = "https://code.jquery.com/jquery-3.6.0.min.js"
    </script>

</body>