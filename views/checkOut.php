<?php

require '../controller/config.php';
session_start();
if(!empty($_SESSION["id"])){
$id = $_SESSION["id"];
$result = mysqli_query($conn , "SELECT * FROM users WHERE id = '$id'  ") ;
$row = mysqli_fetch_assoc($result);

}
else {
  header("Location: registeration.php");
}
if ($row["deactivated"] == 1) {
  header("Location: deactivated");
  
}
include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Checkout Payment Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
<style>
     <?php include "../public/CSS/checkOut.css" ?> 
  </style></head>
<body>
  <div class="containercheckout">
    <h1>Checkout Payment</h1>
    <form action="index.php" method="post">
      <div class="form-group">
        <label for="name">Name on Card</label>
        <div class="input-icon-container">
          <i class="far fa-user"></i>
          <input type="text" id="name" placeholder="John Doe">
        </div>
      </div>
      <div class="form-group">
        <label for="card">Card Number</label>
        <div class="input-icon-container">
          <i class="far fa-credit-card"></i>
          <input type="text" id="card" placeholder="1234 5678 9012 3456">
        </div>
      </div>
      <div class="form-group">
        <div class="expiry-cvv-container">
          <div class="expiry-group">
            <label for="expiry">Expiration Date</label>
            <div class="input-icon-container">
              <i class="far fa-calendar-alt"></i>
              <input type="text" id="expiry" placeholder="MM/YY">
            </div>
          </div>
          <div class="cvv-group">
            <label for="cvv">CVV</label>
            <div class="input-icon-container">
              <i class="fas fa-lock"></i>
              <input type="text" id="cvv" placeholder="123">
            </div>
          </div>
        </div>
      </div>
      <button type="submit">Pay Now</button>
    </form>
  </div>
  <!-- <script src="script.js"></script> -->
  <footer>
    <?php
    include "footer.php"?>
  </footer>

</body>
</html>