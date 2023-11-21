
<?php

//require "../controller/config.php";
require "../controller/forgetpassword.php";

 if (isset($_POST["submitpass"])) {
    newpassword($conn);
  }

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>New Password</title>

  <style>
    .form-floating>.form-control:focus, .form-floating>.form-control:not(:placeholder-shown) {
      border-color: transparent;
      box-shadow: none;
      border-bottom: 1px solid #ced4da;
    }

    .form-floating>.form-control {
      border: none;
      border-bottom: 1px solid #ced4da; 
      border-radius: 0; 
    }

    .form-floating>.form-control:focus {
      border-bottom-color: #000; 
    }

    .form-floating {
      position: relative;
    }

    .form-floating>label {
      background: none; 
      padding: 0;
    }

    .form-floating>.form-control:not(:-moz-placeholder-shown)~label {
      top: -1.25rem;
      left: 0;
      z-index: 3;
      scale: .85;
      padding: 0 .75rem; 
      color: #495057; 
    }

    .thin-line {
      height: 1px;
      background-color: #000; 
      border: none;
      margin: 0.5rem 0;
    }
    .container{
        margin-left: -200px;
    }
    #submitnewpassword {
        font-family: "Your-Font-Family", sans-serif;
        font-size: 15px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="text-center mt-5">
          <h2>NEW PASSWORD</h2>
          <hr class="thin-line"> 
          <p>Please enter your new password.</p>
        </div>
        <div class="mt-3">
          <form  method ="post"> 
            <div class="form-floating mb-3">
              <input type="password"  name="password" class="form-control" id="newPasswordInput" placeholder="Enter New Password">
              <label for="newPasswordInput">Enter New Password</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" name="confirmpassword" class="form-control" id="confirmPasswordInput" placeholder="Confirm Password">
              <label for="confirmPasswordInput">Confirm Password</label>
            </div>
            <button type="submit"  name="submitpass" class="btn btn-dark w-30" id="submitnewpassword">SUBMIT</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
