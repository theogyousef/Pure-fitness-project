<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }

</script>

<?php

//require "../controller/config.php";
require "../controller/registerationsystem.php";

 if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'  ");
    $row = mysqli_fetch_assoc($result);
} 


// Check for form submissions and perform the corresponding action
if (isset($_POST["submit"])) {
  signup();
} else if (isset($_POST["login"])) {
  signin();
}




?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../CSS/registeration.css">
  <script src="https://kit.fontawesome.com/0b0cd0c012.js" crossorigin="anonymous"></script>
  <title>Registration</title>
  <style>
    <?php include "../public/CSS/registeration.css" ?>
  </style>
</head>

<body>
  <div class="containerbox">
    <!-- Nav menu -->
    <nav class="nav">
      <!-- Nav 2 buttons -->
      <div class="nav-button">
        <button class="btn white-btn" id="loginBtn" onclick="login()">Log in</button>
        <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
        <a href="index" style="text-decoration: none; color: black;"> <button class="btn" id="registerBtn">
            Home
          </button></a>

      </div>
      <!-- Responsive nav -->
    </nav>

    <div class="form-box">
      <!-- Login -->
      <div class="login-container" id="login">
        <div class="top">
          <h3>Welcome back ...</h3>
          <header>Log in</header>
        </div>
        <form method="post" name="loginForm" id="loginForm" onsubmit="validateLogin(event)">
          <div class="input-box">
            <input type="email" class="input-field" placeholder="Email" name="email">
            <i class="bx bx-user"></i>
          </div>
          <div class="input-box">
            <input id="id_password" type="password" class="input-field" placeholder="Password" name="pass">
            <i class="bx bx-lock-alt"></i>
            <i id="togglePassword" class="fa-regular fa-eye-slash"></i>
            <div class="forgotpass">
              <a href="../views/forgetpass.php">Forgot password?</a>
            </div>
          </div>
          <div style="height: 20px;">
            <span id="loginErrorMessages" style="display: none;"></span>
          </div>
          <div class="input-box">
            <input name="login" type="submit" class="submit" value="Log in" style="margin-top: 15px;">
          </div>

        </form>
      </div>
      <!-- Register -->
      <form method="post" name="signupform" id="myform" onsubmit="validateRegistration(event)">
        <div class="register-container" id="register" style="height: 580px;">
          <div class="top">
            <h3>Become a member?</h3>
            <header>Register now</header>
          </div>
          <div class="two-forms">
            <div class="input-box">
              <input type="text" class="input-field" placeholder="First name" name="fname">
              <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
              <input type="text" class="input-field" placeholder="Last name" name="lname">
              <i class="bx bx-user"></i>
            </div>
          </div>
          <div class="input-box">
            <input type="email" class="input-field" placeholder="Email" name="email">
            <i class="bx bx-envelope"></i>
          </div>
          <div class="input-box">
            <input id="reg-password" type="password" class="input-field" placeholder="Password" name="password">
            <i class="bx bx-lock-alt"></i>
            <i id="togglePassword2" class="fa-regular fa-eye-slash"></i>
          </div>
          <div class="content">
            <div class="strength-box">
              <p>Password must contain</p>
              <ul class="requirement-list">
                <li>
                  <i class="fa-solid fa-circle"></i>
                  <span>At least 8 characters in length</span>
                </li>
                <li>
                  <i class="fa-solid fa-circle"></i>
                  <span>At least 1 number (0-9)</span>
                </li>
                <li>
                  <i class="fa-solid fa-circle"></i>
                  <span>At least 1 lowercase letter (a-z)</span>
                </li>
                <li>
                  <i class="fa-solid fa-circle"></i>
                  <span>At least 1 special symbol (@#$..)</span>
                </li>
                <li>
                  <i class="fa-solid fa-circle"></i>
                  <span>At least 1 uppercase letter (A-Z)</span>
                </li>
              </ul>
            </div>
          </div>
          <div class="input-box">
            <input id="conpassword" type="password" class="input-field" placeholder="Confirm password"
              name="confirmpassword">
            <i class="bx bx-lock-alt"></i>
            <i id="togglePassword3" class="fa-regular fa-eye-slash"></i>
          </div>
          <!-- Add the span element for error messages -->
          <div style="height: 20px;">
            <span id="errorMessages" class="error-message"></span>
          </div>
          <div class="input-box">
            <input name="submit" type="submit" class="submit" value="Register" id="submit-button">

          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="../public/JS/Registeration.js"></script>
</body>

</html>