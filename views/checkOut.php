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
        <form action="checkOut.php" method="post">
            <div class="form-group">
                <label for="name" style="color: black;">Name on Card</label>
                <div class="input-icon-container">
                    <input type="text" id="name" placeholder="John Doe" class="form-control" value="<?php echo $row['name_on_card'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="card" style="color: black;">Card Number</label>
                <div class="input-icon-container">
                    <input type="text" id="card" placeholder="1234 5678 9012 3456" class="form-control" value="<?php echo $row['card_no'] ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="expiry-cvv-container">
                    <div class="expiry-group">
                        <label for="expiry" style="color: black;">Expiration Date</label>
                        <div class="input-icon-container">
                            <input type="text" id="expiry" placeholder="MM/YY" class="form-control" value="<?php echo $row['Expiration_date'] ?>">
                        </div>
                    </div>
                    <div class="cvv-group">
                        <label for="cvv" style="color: black;">CVV</label>
                        <div class="input-icon-container">
                            <input type="text" id="cvv" placeholder="123" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: black;">Pay Now</button>
        </form>
    </div>

    <footer>
        <?php include "footer.php"; ?>
    </footer>
</body>

</html>