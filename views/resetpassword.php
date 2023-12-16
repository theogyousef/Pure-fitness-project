<?php

require "../controller/forgetpassword.php";

if (isset($_POST["submitpass"])) {
  newpassword($conn);
}

include "header.php";

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <title>New Password</title>
  <style>
    <?php include "../public/CSS/forgetpassword.css" ?>
  </style>

</head>

<body>
<div class="container mx-auto forgetpassword">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="text-center mt-5">
          <h3>NEW PASSWORD</h3>
          <hr class="thin-line">
          <p>Please enter your new password.</p>
        </div>
        <div class="mt-3">
        <form method="post" onsubmit="return validatePassword();">
            <div class="form-floating mb-3">
              <input type="password" name="password" class="form-control" id="newPasswordInput" placeholder="Enter New Password">
              <label for="newPasswordInput">Enter New Password</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" name="confirmpassword" class="form-control" id="confirmPasswordInput" placeholder="Confirm Password">
              <label for="confirmPasswordInput">Confirm Password</label>
            </div>
            <div class="text-center">
            <button type="submit" name="submitpass" class="btn btn-dark w-30" id="submitnewpassword" style="font-size: 15px;">SUBMIT</button>
            </div>
            <div id="error-message" class="text-danger mt-2"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../public/JS/resetpassword.js"></script>

  <footer>
    <?php
    include "footer.php";

    ?>
  </footer>
</body>

</html>