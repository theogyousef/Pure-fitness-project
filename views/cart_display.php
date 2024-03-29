<?php


require '../controller/config.php';

if (isset($_GET['remove'])) {
    $productIdToRemove = $_GET['remove'];

    if (isset($_SESSION['products'])) {
        foreach ($_SESSION['products'] as $key => $product) {
            if ($product['id'] == $productIdToRemove) {
                unset($_SESSION['products'][$key]);
                header("Location: cart_display");
                exit();
            }
        }

        echo '<p>Product not found in the cart.</p>';
    } else {
        echo '<p>Cart is empty.</p>';
    }
}

else if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT a.*, p.*, u.* FROM addresses a JOIN permissions p ON a.user_id = p.user_id JOIN users u ON a.user_id = u.id WHERE a.user_id = '$id' AND u.id = '$id';");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: login");
}

$result2 = mysqli_query($conn, "SELECT * from permissions where user_id = '$id';");
$row2 = mysqli_fetch_assoc($result2);
if (!empty($_SESSION['products']) && $row2['guest'] == 1) {
  header("Location: login");
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
                        <form action="" method="post">
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <thead>
                                    <tr>
                                        <th width="45%">Product Name</th>
                                        <th width="15%">Unit Price</th>
                                        <th width="15%">Unit Options</th>
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
                                            $totalproduct = $product['price'] * $product['quantity'];
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
                                                <td width="15%" class="options">
                                                    <?php if (isset($product['options'])) : ?>
                                                      <p>
                                                        <?php echo $product['options']?>
                                                      </p>
                                                    <?php endif; ?>
                                                </td>
                                                <td width="15%" class="quantity">
                                                    <div class="input-group mb-2 quantity-selector" id="input-group">
                                                        <button type="button" class="btn btn-outline-secondary decrement" data-product-id="<?php echo $product['id']; ?>">-</button>
                                                        <input type="text" name="quantity[<?php echo $product['id']; ?>]" data-product-id="<?php echo $product['id']; ?>" class="form-control text-center small quantity-input" style="background-color: transparent; border: none;" value="<?php echo $product['quantity']; ?>" readonly>
                                                        <button type="button" class="btn btn-outline-secondary increment" data-product-id="<?php echo $product['id']; ?>">+</button>
                                                    </div>
                                                </td>
                                                <td width="10%" class="text-center">
                                                    <?php if (isset($product)) : ?>
                                                        <a href="cart_display?remove=<?php echo $product['id']; ?>" class="trash-icon"><i class="far fa-trash-alt"></i></a>
                                                    <?php endif; ?>
                                                </td>
                                                
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <p class="p-cart">Your cart is empty.</p>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <div class="thetotal">
                                <h3 class=""> Total :
                                    <?php echo $total;
                                    $_SESSION['total'] = $total;
                                    ?>
                                </h3>
                            </div>
                        </form>
                        <?php if (empty($_SESSION['products'])) : ?>
                            <a href="index" class="add-button">Add Products</a>
                        <?php endif; ?>
                        <?php if (!empty($_SESSION['products'])) : ?>
                            <a href="confirmaddress" class="checkout-button">Proceed to Checkout</a>
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