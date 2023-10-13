<!DOCTYPE html>
<html lang="en">
<?php  
     //include_once "../controller/dbh.inc.php";
    // include_once "../controller/userFun.php";

  ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../CSS/registeration.css">
  <script src="https://kit.fontawesome.com/0b0cd0c012.js" crossorigin="anonymous"></script>
  <title>Registration</title>
  <style>
    <?php include "../CSS/registeration.css" ?>
  </style>
</head>
<body>
  <div class="containerbox">
    <!-- Nav menu -->
    <nav class="nav">
      <div class="nav-name">
        <p>Website Name</p>
      </div>
      <div class="nav-menu" id="navMenu">
        <ul>
          <li><a href="#" class="link">Home</a></li>
          <li><a href="#" class="link">Services</a></li>
          <li><a href="#" class="link">Contact us</a></li>
          <li><a href="#" class="link">About</a></li>
        </ul>
      </div>
      <!-- Nav 2 buttons -->
      <div class="nav-button">
        <button class="btn white-btn" id="loginBtn" onclick="login()">Log in</button>
        <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
      </div>
      <!-- Responsive nav -->
      <div class="nav-menu-btn">
        <i class="bx bx-menu" onclick="myMenuFunction()"></i>
      </div>
    </nav>

    <div class="form-box">
      <!-- Login -->
      <div class="login-container" id="login">
        <div class="top">
          <h3>Welcome back ...</h3>
          <header>Log in</header>
        </div>
        <form action="<?php include_once "../controller/userFun.php";  FindUser(); ?>" name="loginForm" id="loginForm" onsubmit="validateLogin(event)">
          <div class="input-box">
            <input type="email" class="input-field" placeholder="Email" name="email">
            <i class="bx bx-user"></i>
          </div>
          <div class="input-box">
            <input id="id_password" type="password" class="input-field" placeholder="Password" name="pass">
            <i class="bx bx-lock-alt"></i>
            <i id="togglePassword" class="fa-regular fa-eye-slash"></i>
            <div class="forgotpass">
              <a href="forgetpass.html">Forgot password?</a>
            </div>
          </div>
          <div class="input-box">
            <input type="submit" class="submit" value="Log in" style="margin-top: 15px;">
          </div>
          <div style="height: 20px;">
            <span id="loginErrorMessages" style="display: none;"></span>
          </div>
        </form>
      </div>

      <!-- Register -->
      <form action="<?php include_once "../controller/userFun.php";  insertUser(); ?>" method="post" name="myform" id="myform" onsubmit="validateRegistration(event)">
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
            <input type="text" class="input-field" placeholder="Email" name="email">
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
            <input id="conpassword" type="password" class="input-field" placeholder="Confirm password" name="confirmpassword">
            <i class="bx bx-lock-alt"></i>
            <i id="togglePassword3" class="fa-regular fa-eye-slash"></i>
          </div>
          <!-- Add the span element for error messages -->
          <div style="height: 20px;">
            <span id="errorMessages" class="error-message"></span>
          </div>
          <div class="input-box">
            <input type="submit" class="submit" value="Register" id="submit-button">

          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="../JS/Registeration.js"></script>
</body>
</html>

