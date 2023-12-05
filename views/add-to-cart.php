<?php
session_start();
if (empty($_SESSION['products'])) {
    $_SESSION['products'] = array();
}
if (isset($_GET['id']))
    // Add the product ID to the cart
    array_push($_SESSION['products'], $_GET['id']);
    
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Added</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }

        .containercheckout {
            width: 700px;
            margin: 30px auto;
            padding: 20px;
            background-color: #333333;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            color: #fff;
            text-align: center;
        }

        button {
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

        button:hover {
            background-color: #333333;
        }
    </style>
</head>

<body>
    <div class="containercheckout">
        <h1>Product added to your cart</h1>
        <a href="cart_display.php"><button>View Cart</button></a>
        <a href="index.php"><button>Add More Products</button></a>
    </div>
</body>
<footer>
    <?php include 'footer.php';?>
</footer>

</html>





   
