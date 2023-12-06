<?php
session_start();

require '../controller/config.php';

// Check if remove parameter is set in the URL
if (isset($_GET['remove'])) {
    $indexToRemove = $_GET['remove'];

    // Check if the index exists in the session array
    if (isset($_SESSION['products'][$indexToRemove])) {
        // Unset the specified index
        unset($_SESSION['products'][$indexToRemove]);
    }

    // Redirect back to the cart page to avoid resubmission on refresh
    header("Location: cart_display.php");
    exit();
}

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <title>My Cart</title>
    <link rel="stylesheet" href="../public/CSS/cart_display.css">
    <style>
        .checkout-button {
            display: inline-block;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: #e44d26;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .checkout-button {
            background-color: #333333;
        }

        .checkout-button :hover {
            color: red;
        }

        .add-button {
            display: inline-block;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: #e44d26;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .add-button {
            background-color: #333333;
        }

        .add-button :hover {
            color: red;
        }
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
                                        <tr>
                                            <td width="45%">
                                                <div class="display-flex align-center">
                                                    <div class="img-product">
                                                        <?php if (isset($_SESSION['products'][$i]['image'])) : ?>
                                                            <img src="<?php echo $_SESSION['products'][$i]['image']; ?>" alt="" class="mCS_img_loaded">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="name-product">
                                                        <?php if (isset($_SESSION['products'][$i]['name'])) : ?>
                                                            <?php echo $_SESSION['products'][$i]['name']; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="15%" class="price">
                                                <?php if (isset($_SESSION['products'][$i]['price'])) : ?>
                                                    <?php echo $_SESSION['products'][$i]['price']; ?> EGP
                                                <?php endif; ?>
                                            </td>
                                            <td width="10%" class="text-center">
                                                <?php if (isset($_SESSION['products'][$i])) : ?>
                                                    <a href="cart_display.php?remove=<?php echo $i; ?>" class="trash-icon"><i class="far fa-trash-alt"></i></a>
                                                <?php endif; ?>
                                            </td>

                                        </tr>

                                    <?php endfor; ?>
                                <?php else : ?>
                                    <p>Your cart is empty.</p>
                                <?php endif; ?>
                            </tbody>

                        </table>
                        <?php if (empty($_SESSION['products'])) : ?>
                            <a href="index.php" class="add-button">Add Products</a>
                        <?php endif; ?>
                        <?php if (!empty($_SESSION['products'])) : ?>
                            <a href="checkOut.php" class="checkout-button">Proceed to Checkout</a>
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