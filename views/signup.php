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


include "header.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <title>Create Account</title>

    <style>
        <?php
        include "../public/CSS/signup.css";
        ?>
    </style>

</head>

<body>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h3 class="h3 mb-3 fw-bold text-center">CREATE ACCOUNT</h3>

                <form method="post" name="signupform" id="myform" onsubmit="validateRegistration(event)">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputEmail" name="fname" placeholder="First name">
                        <label for="floatingInputEmail">First name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingPassword" name="lname" placeholder="Last name">
                        <label for="floatingPassword">Last name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingPassword" name="email" placeholder="Email">
                        <label for="floatingPassword">Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" name="confirmpassword" placeholder="Confirm password">
                        <label for="floatingPassword">confirm password</label>
                    </div>
                    <div style="height: 20px;">
                        <span id="errorMessages" class="error-message"></span>
                    </div>

                    <div class="d-grid center-btn">
                        <input name="submit" type="submit" class="btn btn-lg btn-dark" value="Register" id="submit-button">
                    </div>

                </form>

                <div class="divider-or my-4">
                    <span>OR</span>
                </div>

                <a href="#" class="social-button">
                    <img src="https://eg.hm.com/themes/custom/transac/alshaya_white_label/imgs/social-icons/google-login-logo.svg" alt="Google" class="social-icon"> Continue with Google
                </a>
                <!-- <a href="#" class="social-button">
        <img src="logo-apple-48.png" alt="Apple" class="social-icon"> Continue with Apple
      </a> -->
                <a href="#" class="social-button">
                    <img src="https://eg.hm.com/themes/custom/transac/alshaya_white_label/imgs/social-icons/facebook-login-logo.svg" alt="Facebook" class="social-icon"> Continue with Facebook
                </a>

                <p class="mt-4 text-center">
                    <a href="login" class="text-muted">Already have an account?</a>
                </p>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../public/JS/Registeration.js"></script>

    <footer>
        <?php
        include "footer.php";
        ?>
    </footer>
</body>

</html>