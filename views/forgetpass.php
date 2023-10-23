<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="forgetpass.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/0b0cd0c012.js" crossorigin="anonymous"></script>
  <title>Registration</title>
  <style>
    <?php include "../public/CSS/forgetpass.css" ?>
  </style>
</head>

<body>
  <div class="containerbox">
    <nav class="nav">
      <div class="nav-button">
        <button class="btn white-btn" id="loginBtn" onclick="Email()">Email</button>
        <button class="btn" id="registerBtn" onclick="Code()">Code</button>
        <button class="btn " id="resetPasswordBtn" onclick="resetPassword()">Reset Password</button>
      </div>
      <div class="nav-menu-btn">
        <i class="bx bx-menu" onclick="myMenuFunction()"></i>
      </div>
    </nav>

    <div class="form-box">
      <!-- Email -->
      <div class="login-container" id="login">
        <div class="top">
          <h3>Enter your email</h3>
        </div>
        <form name="loginForm" id="loginForm" onsubmit="validateLogin(event)">
          <div class="input-box">
            <input type="email" class="input-field" placeholder="Email" />
            <i class="bx bx-user"></i>
          </div>
          
          <div class="input-box">
            <input type="submit" class="submit" value="Continue" />
            <div class="forgotpass">
              <a href="registeration.html">Already have an account ?</a>
            </div>
          </div>         

        </form>
      </div>

      <form name="myform" id="myform" onsubmit="validations(event)">
        <!-- code -->
        <div class="register-container" id="register" >
          <div class="top">
            <h3>please enter the code</h3>
    
          </div>
          <div class="otp-input-container">
            <input type="text" class="input-field"  name="digit1" onkeyup="clickEvent(this,'sec')" />
            <input type="text"class="input-field"  id="sec"  maxlength="1" name="digit2" onkeyup="clickEvent(this,'third')" />
            <input type="text" class="input-field" id="third" maxlength="1" name="digit3" onkeyup="clickEvent(this,'fourth')" />
            <input type="text" class="input-field" id="fourth" maxlength="1" name="digit4" onkeyup="clickEvent(this,'fifth')" />
            <input type="text" class="input-field" id="fifth" maxlength="1" name="digit5" onkeyup="clickEvent(this,'sixth')" />
            <input type="text" class="input-field"  id="sixth" maxlength="1" name="digit6" />
          </div>
          <!-- Add the span element for error messages -->
          <div style="height: 20px;">
            <span id="errorMessages" class="error-message"></span>
          </div>
          <div class="input-box">
            <input type="submit" class="submit" value="Register" />
          </div>
        </div>
      </form>

<form name="resetForm" id="resetForm" onsubmit="resetPasswordSubmit(event)">
  <div class="reset-password-container" id="resetPassword" style="right:500px; opacity: 0;">
    <div class="top">
      <h3>Enter your new password</h3>
    </div>
    <div class="input-box">
          <i  class="bx bx-hide eye-icon" id="toggleResetPassword" onclick="togglePasswordVisibility('reset-password')"></i>

      <input
        id="reset-password"
        type="password"
        class="input-field"
        placeholder="Password"
      /><i class="bx bx-lock-alt lock-icon"></i>  
    </div>
    <div class="input-box">
     <i class="bx bx-hide eye-icon" id="toggleConfirmResetPassword" onclick="togglePasswordVisibility('confirm-reset-password')"></i>

      <input
        id="confirm-reset-password"
        type="password"
        class="input-field"
        placeholder="Confirm Password"
      />     <i class="bx bx-lock-alt lock-icon"></i>  
    </div>
    <div style="height: 20px;">
      <span id="errorMessage" class="error-message"></span>
    </div>
    <div class="input-box">
      <input type="submit" class="submit" value="Save" />
    </div>
  </div>
</form>


    </div>
  </div>
<!-- To move from otp input to next one on key up -->
  <script>
    function clickEvent(first,last){
      if(first.value.length){
        document.getElementById(last).focus();
      }
    }
  </script>

  <script>
    function myMenuFunction() {
      var i = document.getElementById("navMenu");
      if (i.className === "nav-menu") {
        i.className += " responsive";
      } else {
        i.className = "nav-menu";
      }
    }

    function Email() {
      var x = document.getElementById("login");
      var y = document.getElementById("register");
      var z = document.getElementById("resetPassword");

      x.style.left = "4px";
      y.style.right = "-520px";
      z.style.right = "-1000px";
      document.getElementById("loginBtn").classList.add("white-btn");
      document.getElementById("registerBtn").classList.remove("white-btn");
      document.getElementById("resetPasswordBtn").classList.remove("white-btn");
      x.style.opacity = 1;
      y.style.opacity = 0;
      z.style.opacity = 0;
    }

    function Code() {
      var x = document.getElementById("login");
      var y = document.getElementById("register");
      var z = document.getElementById("resetPassword");

      x.style.left = "-510px";
      y.style.right = "5px";
      z.style.right = "500px"; // Add this line to fix the transition issue
      document.getElementById("loginBtn").classList.remove("white-btn");
      document.getElementById("registerBtn").classList.add("white-btn");
      document.getElementById("resetPasswordBtn").classList.remove("white-btn");
      x.style.opacity = 0;
      y.style.opacity = 1;
      z.style.opacity = 0;
    }

    function resetPassword() {
      var x = document.getElementById("login");
      var y = document.getElementById("register");
      var z = document.getElementById("resetPassword");

      x.style.left = "-1000px";
      y.style.right = "5px";
      z.style.right = "5px"; 
      document.getElementById("loginBtn").classList.remove("white-btn");
      document.getElementById("registerBtn").classList.remove("white-btn");
      document.getElementById("resetPasswordBtn").classList.add("white-btn");
      x.style.opacity = 0;
      y.style.opacity = 0;
      z.style.opacity = 1;
    }

    function togglePasswordVisibility(inputId) {
  const input = document.getElementById(inputId);
  const toggleIcon = document.getElementById("toggle" + inputId);

  if (input.type === "password") {
    input.type = "text";
    toggleIcon.classList.remove("bx-hide");
    toggleIcon.classList.add("bx-show");
  } else {
    input.type = "password";
    toggleIcon.classList.remove("bx-show");
    toggleIcon.classList.add("bx-hide");
  }
}

  
    function resetPasswordSubmit(event) {
      event.preventDefault();
      const resetPassword = document.getElementById("reset-password").value;
      const confirmResetPassword = document.getElementById("confirm-reset-password").value;
      const errorSpan = document.getElementById("errorMessage");
      let errorMessages = "";
      let showError = false;

      if (resetPassword === "") {
        errorMessages = "You must fill the password field<br>";
        showError = true;
      } else if (confirmResetPassword === "") {
        errorMessages = "You must fill the confirm password field<br>";
        showError = true;
      } else if (resetPassword !== confirmResetPassword) {
        errorMessages = "Passwords do not match<br>";
        showError = true;
      }

      if (showError) {
        errorSpan.innerHTML = errorMessages;
        errorSpan.style.display = "block";
      } else {
        errorSpan.style.display = "none";
      }
    }

    document.getElementById("myform").addEventListener("submit", validations);
    document.getElementById("resetForm").addEventListener("submit", resetPasswordSubmit);
  </script>

<script>
  function focusNextInput(currentDigit) {
    const input = document.getElementsByName("digit" + currentDigit)[0];
    if (input.value.length === input.maxLength) {
      const nextInput = document.getElementsByName("digit" + (currentDigit + 1))[0];
      if (nextInput) {
        nextInput.focus();
      }
    }
  }

  function validations(event) {
    event.preventDefault();
    let errorMessages = "";
    let showError = false;
    const otpInputs = document.getElementsByClassName("otp-input");
    let otpValue = "";

    for (let i = 0; i < otpInputs.length; i++) {
      if (otpInputs[i].value === "") {
        errorMessages = "Please fill all OTP fields<br>";
        showError = true;
        break;
      } else {
        otpValue += otpInputs[i].value;
      }
    }

    if (otpValue.length !== 6) {
      errorMessages = "Please fill all OTP fields<br>";
      showError = true;
    }

    const errorSpan = document.getElementById("errorMessages");
    if (showError) {
      errorSpan.innerHTML = errorMessages;
      errorSpan.style.display = "block";
    } else {
      errorSpan.style.display = "none";
    }
  }

  document.getElementById("myform").addEventListener("submit", validations);
</script>


</body>
</html>