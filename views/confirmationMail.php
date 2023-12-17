<?php
require '../controller/config.php';


//     $orderQuery = "SELECT * FROM orders WHERE user_id = '$id' ORDER BY created_at DESC LIMIT 1";
//         $orderResult = mysqli_query($conn, $orderQuery);

//     if (mysqli_num_rows($orderResult) > 0) {
//         $orderRow = mysqli_fetch_assoc($orderResult);
//         $orderNumber = $orderRow['order_id'];

//         $orderDetailsQuery = "SELECT * FROM orders_details WHERE order_id = '$orderNumber'";
//         $orderDetailsResult = mysqli_query($conn, $orderDetailsQuery);
//         $orderDetailsRow = mysqli_fetch_assoc($orderDetailsResult);
//         $orderDate = $orderDetailsRow['status'];
//         $totalPrice = $orderDetailsRow['total'];

//         $addressQuery = "SELECT * FROM addresses WHERE user_id = '$id'";
//         $addressResult = mysqli_query($conn, $addressQuery);
//         $addressRow = mysqli_fetch_assoc($addressResult);
//         $shippingAddress = $addressRow['street'] . ', ' . $addressRow['city'] . ', ' . $addressRow['governorates'] . ', ' . $addressRow['postalcode']; // Concatenate address parts

//         // Fetch products in the order
//         $productsQuery = "SELECT prod.*, opd.quantity, prod.file FROM products prod
//             JOIN order_product_details opd ON prod.id = opd.product_id
//             WHERE opd.order_id = '$orderNumber'";
//         $productsResult = mysqli_query($conn, $productsQuery);
//         $products = mysqli_fetch_all($productsResult, MYSQLI_ASSOC);
//     } else {
//         // Handle the case where there are no orders for the user
//         $orderNumber = "No Orders Found";
//         $orderDate = "";
//         $totalPrice = 0;
//         $shippingAddress = "";
//         $products = [];
//     }
// } else {
//     header("Location: login");
//     exit;
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style type="text/css">
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 40px;
        }

        .email-header {
            color: #333;
            padding-bottom: 20px;
            border-bottom: 2px solid #eeeeee;
        }

        .email-body {
            padding: 20px 0;
        }

        .email-body p {
            margin: 20px 0;
        }

        .email-footer {
            text-align: center;
            padding-top: 20px;
            border-top: 2px solid #eeeeee;
            color: #333;
        }

        .highlight {
            color: #0056b3;
            /* Choose an accent color */
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .summary-item .label {
            font-weight: bold;
        }

        .email-body img {
            max-width: 100px;
            height: auto;
            margin-right: 20px;
        }

        .email-header {
            background-color: #f3f3f3;
            border-top: 3px solid black;
            text-align: center;
            padding: 20px;
        }

        .order-confirmation {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .order-confirmation-subtext {
            color: #666;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div id="logo" class="col-md-8 text-center">
        </div>
        <?php if (!empty($_SESSION['confirmedorder'])) {
        ?>
            <?php
            $orderid = $_SESSION['order_id'];
            $result = mysqli_query($conn, "SELECT * from orders where order_id = '$orderid'");
            $rowoforders = mysqli_fetch_assoc($result);

            $user_id = $rowoforders['user_id'];

            $result2 = mysqli_query($conn, "SELECT * from users where id = '$user_id'");
            $rowofuser = mysqli_fetch_assoc($result2);

            $customerName = $rowofuser['firstname'] . " " .  $rowofuser['lastname'];
            ?>




            <div class="email-header" style="background-color: #eeeeee; color: #fff; padding: 20px; text-align: center;">
                <img src="https://purefitness-eg.com/wp-content/uploads/2023/07/IMG_%D9%A2%D9%A0%D9%A2%D9%A3%D9%A0%D9%A7%D9%A2%D9%A3_%D9%A1%D9%A9%D9%A1%D9%A0%D9%A4%D9%A0-1400x623.png" alt="Pure Fitness Equipment" style="max-width: 200px; height: auto; margin: 0 auto; display: block;">
                <h1 class="order-confirmation" style="font-weight: bold; font-size: 28px; margin: 10px 0;">ORDER CONFIRMATION</h1>
                <h3 style="font-family: 'Arial', sans-serif; color: #000;">Order ID: <?php echo $_SESSION['order_id']; ?></h3>

                <p class="order-confirmation-subtext" style="font-size: 16px; color: black; margin: 10px 0;">
                    Dear <?php echo $customerName; ?>, thank you for your order!
                    <br>
                    We've received your order and will contact you as soon as your package is shipped. You can find your purchase information below.
                </p>
            </div>


            <div class="email-body">
                <div class="order-details">
                    <h3>Ordered Products</h3>
                    <?php
                    $total = 0;

                    foreach ($_SESSION['confirmedorder'] as $product) {
                        $subtotal = $product['price'] * $product['quantity'];

                        $total += $subtotal;
                        $product_id = $product['id'];
                        $result3 = mysqli_query($conn, "SELECT * from products where id = '$product_id'");
                        $rowofproduct = mysqli_fetch_assoc($result3);
                    ?>
                        <div class="order-item">
                            <img src="<?php echo $rowofproduct['file']; ?>" alt="<?php echo $rowofproduct['file']; ?>">
                            <div class="order-item-info">
                                <h3><?php echo $product['name']; ?></h3>
                                <p>Quantity: <?php echo $product['quantity']; ?></p>
                                <p>Subtotal: <?php echo number_format($subtotal, 2); ?> LE</p>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                <div class="total-price">Total: <?php echo number_format($total, 2); ?> LE</div>
                </div>

                <div class="email-footer">
                    <p>Thank you for shopping with us!</p>
                </div>
            </div>
    </div>
</body>

</html>