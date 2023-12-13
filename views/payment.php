<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php
require '../controller/config.php';

//require "../controller/config.php";
require "../controller/profilesettingsfun.php";

if (isset($_POST["addressdetails"])) {
    updateaddress();
    // header("Location: ");
}

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT a.*, p.*, u.* FROM addresses a JOIN permissions p ON a.user_id = p.user_id JOIN users u ON a.user_id = u.id WHERE a.user_id = '$id' AND u.id = '$id';");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: login");
}



if ($row["deactivated"] == 1) {
    header("Location: deactivated");
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

    <title>Confirm address</title>
    <style>
        <?php
        include "../public/CSS/confirm.css";
        ?>
    </style>
    <script src="../public/JS/profilesettings.js"></script>

</head>

<body>
    <div class="container">
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb-navigation">
                <li class="breadcrumb-item cart" style="color: maroon;"><a href="cart_display">Cart</a></li>
                <li class="breadcrumb-item separator"><i class="bi bi-chevron-right"></i></li>

                <li class="breadcrumb-item information"><a href="confirmaddress">Address Information</a></li>
                <li class="breadcrumb-item separator"><i class="bi bi-chevron-right"></i></li>

                <li class="breadcrumb-item payment"><a href="payment">Payment</a></li>
                <li class="breadcrumb-item separator"><i class="bi bi-chevron-right"></i></li>

                <li class="breadcrumb-item confirmation"><a href="/payment">Confirmation</a></li>
            </ol>
        </nav>
        <div class="py-3 text-center">
            <h3>Payment</h3>
        </div>

        <div class="row row-divider equal-height">
            <div class="col-md-7 billing-col">
                <div class="accordion" id="paymentAccordion">
                    <div>
                        <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard" data-bs-toggle="collapse" data-bs-target="#creditCardCollapse">
                        <label class="form-check-label" for="creditCard">Visa/Mastercard</label>

                        <div id="creditCardCollapse" class="collapse show" data-bs-parent="#paymentAccordion">
                            <div class="card card-body">
                                <div class="mb-3">
                                    <img src="https://cdn.shopify.com/shopifycloud/shopify/assets/payment_icons/visa-319d545c6fd255c9aad5eeaad21fd6f7f7b4fdbdb1a35ce83b89cca12a187f00.svg" alt="Visa" />
                                    <img src="https://cdn.shopify.com/shopifycloud/shopify/assets/payment_icons/master-173035bc8124581983d4efa50cf8626e8553c2b311353fbf67485f9c1a2b88d1.svg" alt="MasterCard" />
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="cardNumber" placeholder="Card Number">
                                    <label for="cardNumber">Card Number</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nameOnCard" placeholder="Name on Card">
                                    <label for="nameOnCard">Name on Card</label>
                                </div>

                                <div class="row g-2">
                                    <div class="col-sm-6 form-floating mb-3">
                                        <input type="date" class="form-control" id="expiryDate" placeholder="Expiry Date">
                                        <label for="expiryDate">Expiry Date</label>
                                    </div>
                                    <div class="col-sm-6 form-floating mb-3">
                                        <input type="password" class="form-control" id="cvv" placeholder="CVV">
                                        <label for="cvv">CVV</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div>
                        <input class="form-check-input" type="radio" name="paymentMethod" id="cashOnDelivery" data-bs-toggle="collapse" data-bs-target="#cashOnDeliveryCollapse">
                        <label class="form-check-label" for="cashOnDelivery">Cash on Delivery</label>

                        <div id="cashOnDeliveryCollapse" class="collapse" data-bs-parent="#paymentAccordion">
                            <div>
                            <br>
                    <input name="addressdetails" type="submit" class="btn btn-primary" value="Confirm order" style="background-color: black;">
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>

            
            <div class="col-md-4 order-md-2 mb-4" id="cart">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted" style="margin-left: 130px;">Your cart</span>
                    <span class="badge badge-secondary badge-pill"><?php echo count($_SESSION['products']); ?></span>
                </h4>
                <ul class="list-group mb-3">
                    <?php
                    $total = 0;
                    if (!empty($_SESSION['products'])) {
                        foreach ($_SESSION['products'] as $product) {
                            $subtotal = $product['price'] * $product['quantity'];
                            $total += $subtotal;
                    ?>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" style="width: 50px; height: auto; margin-right: 10px;">
                                    <div>
                                        <h6 class="my-0"><?php echo $product['name']; ?></h6>
                                        <small class="text-muted">Quantity: <?php echo $product['quantity']; ?></small>
                                    </div>
                                </div>
                                <span class="text-muted"><?php echo number_format($subtotal, 2); ?> LE</span>
                            </li>
                    <?php
                        }
                    } else {
                        echo '<p class="text-muted">Your cart is empty.</p>';
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

            </div>

            <div class="vertical-divider"></div>
        </div>

    </div>
    <footer>
        <?php
        include "footer.php";
        ?>
    </footer>
</body>