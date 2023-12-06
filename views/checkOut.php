<?php


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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <title>Checkout</title>
    <style>
        <?php include "../public/CSS/checkOut.css"; ?>
    </style>
</head>

<body>
    <div class="containercheckout">
        <h1>Checkout Payment</h1>
        <form action="index.php" method="post">
            <div class="form-group">
                <label for="name">Name on Card</label>
                <div class="input-icon-container">
                    <input type="text" id="name" placeholder="John Doe">
                </div>
            </div>
            <div class="form-group">
                <label for="card">Card Number</label>
                <div class="input-icon-container">
                    <input type="text" id="card" placeholder="1234 5678 9012 3456">
                </div>
            </div>
            <div class="form-group">
                <div class="expiry-cvv-container">
                    <div class="expiry-group">
                        <label for="expiry">Expiration Date</label>
                        <div class="input-icon-container">
                            <input type="text" id="expiry" placeholder="MM/YY">
                        </div>
                    </div>
                    <div class="cvv-group">
                        <label for="cvv">CVV</label>
                        <div class="input-icon-container">
                            <input type="text" id="cvv" placeholder="123">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit">Pay Now</button>
        </form>
    </div>
    <footer>
        <?php include "footer.php"; ?>
    </footer>
</body>

</html>
