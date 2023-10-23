<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>

<?php

//require "../controller/config.php";
require "../controller/profilesettingsfun.php";

// Check for form submissions and perform the corresponding action
if (isset($_POST["fileupload"])) {
    uploadpic();
} else if (isset($_POST["accountdetails"])) {
    editdetails();
} else if (isset($_POST["socialsave"])) {
    updatesocials();
} else if (isset($_POST["updatesecurity"])) {
    updatepasswords();
}


if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'  ");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: registeration.php");
}



$instagramUsername = trim($row["instagram"]); // Remove leading/trailing whitespace
$instagramURL = "https://www.instagram.com/" . rawurlencode($instagramUsername);

$githubUsername = trim($row["github"]); // Remove leading/trailing whitespace
$githubURL = "https://github.com/" . rawurlencode($githubUsername);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../CSS/prfilesettings.css" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/3a2eaf6206.js"></script>
    <title>profile settings</title>
    <style>
        <?php include "../public/CSS/profilesettings.css" ?>
    </style>
       <script src="../public/JS/profilesettings.js"></script>
</head>

<body>
    <div class="container-md px-10 mt-2">

        <!-- prfile settings nav bar -->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" id="detailsnav" href="" onClick="detailsa()">Profile</a>
            <a class="nav-link" href="#" id="socilanav" onClick="sociala()">Social</a>
            <a class="nav-link" href="#" id="securitysnav" onClick="securitya()">Security</a>
            <a class="nav-link" href="#" id="notificationsnav" onClick="notificationsa()">Notifications</a>
            <a class="nav-link home" id="homenav" href="index.php">Home</a>


        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <!-- personal card -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="<?php echo $row['profilepicture'] ?> " alt="picture"
                                class="rounded-circle p-1 bg-primary" width="110">
                            <div class="mt-3">
                                <h4>
                                    <?php echo $row['firstname'] . " " . $row['lastname'] ?>
                                </h4>
                                <p class="text-secondary mb-1">Junior developer </p>

                            </div>
                        </div>
                        <hr class="my-4">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-github me-2 icon-inline">
                                        <path
                                            d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                        </path>
                                    </svg>Github</h6>
                                <a href="<?php echo $githubURL; ?>" class="text-secondary">
                                    <?php echo $githubUsername; ?>
                                </a>

                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-instagram me-2 icon-inline text-danger">
                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                    </svg>Instagram</h6>
                                <a href="<?php echo $instagramURL; ?>" class="text-secondary">
                                    <?php echo $instagramUsername; ?>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>



            <!--    Account details -->
            <div class="col-xl-8" id="details">
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">


                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3 photoselect">
                                <label for="inputTag">
                                    Select Image <br />
                                    <i class="fa fa-2x fa-camera"></i>

                                    <input id="inputTag" type="file" name="file"
                                        accept="image/png, image/jpg, image/gif, image/jpeg" />
                                    <br />
                                    <span id="imageName"></span>
                                </label>
                            </div>
                            <input name="fileupload" type="submit" class="btn btn-primary" value="Update photo">

                        </form>


                        <form method="post" id="detailss" name="details" onsubmit="validatedetails(event)">
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username (how your name will appear to
                                    other users on the site)</label>
                                <input class="form-control" id="inputUsername" type="text" name="username"
                                    placeholder="Enter your username" value="<?php echo $row['username'] ?>">
                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                    <input name="fname" class="form-control" id="inputFirstName" type="text"
                                        placeholder="Enter your first name" value="<?php echo $row['firstname'] ?>">
                                </div>

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                    <input name="lname" class="form-control" id="inputLastName" type="text"
                                        placeholder="Enter your last name" value="<?php echo $row['lastname'] ?>">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input name="email" class="form-control" id="inputEmailAddress" type="email"
                                    placeholder="Enter your email address" value="<?php echo $row['email'] ?>">
                            </div>


                            <div style="height: 20px;">
                                <span id="DetailserrorMessages" style="display: none;"></span>
                            </div>
                            <br>
                            <input name="accountdetails" type="submit" class="btn btn-primary" value="Save changes">
                        </form>
                    </div>
                </div>
            </div>

           
            <!-- Social -->
            <div class="col-xl-8" style="display: none;" id="social">
                <div class="card mb-4">
                    <div class="card-header">Social</div>
                    <div class="card-body">
                        <form method="post" id="socialss" name="socialss">

                            <div class="mb-3">
                                <label class="small mb-1" for="github">Github :</label>
                                <input class="form-control" name="github" id="github" type="text"
                                    value="<?php echo $row['github'] ?>">
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="instagram">Instagram :</label>
                                <input class="form-control" name="instagram" id="instagram" type="text"
                                    value="<?php echo $row['instagram'] ?> ">
                            </div>



                            <!-- // Save changes button -->
                            <button name="socialsave" class="btn btn-primary" type="submit">Update my socials</button>
                        </form>
                    </div>
                </div>
            </div>

             <!-- Security -->
             <div class="col-xl-8" style="display: none;" id="security">
                <div class="card mb-4">
                    <div class="card-header">Security</div>
                    <div class="card-body">
                        <form method="post" id="security" name="security" onsubmit="validatesecurity(event)">

                            <div class="mb-3">
                                <label class="small mb-1" for="oldpassword">Old passowrd</label>
                                <input name="oldpassword" class="form-control" id="oldpassword" type="password">
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="newpassword">New passowrd</label>
                                <input name="newpassword" class="form-control" id="newpassword" type="password">
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="conpassword">Confirm new passowrd</label>
                                <input name="conpassword" class="form-control" id="conpassword" type="password">
                            </div>
                            <div style="height: 20px;">
                                <span id="SecurityerrorMessages" style="display: none;"></span>
                            </div><br>

                            <!-- // Save changes button -->
                            <input name="updatesecurity" type="submit" class="btn btn-primary" value="Update password">

                        </form>
                    </div>
                </div>
            </div>


            <!-- Notifications -->
            <div class="col-xl-8" style="display: none;" id="notifications">
                <div class="card mb-4">
                    <div class="card-header">Notifications</div>
                    <div class="card-body">
                        <form>

                            <div class="form-check form-switch ">
                                <label class="form-check-label" for="notificationemail">Get daily updates on your
                                    e-mail</label>
                                <input class="form-check-input" id="#" type="checkbox">
                            </div>

                            <div class="form-check form-switch ">
                                <label class="form-check-label" for="notificationemail">Get an SMS for important
                                    events</label>
                                <input class="form-check-input" id="#" type="checkbox">
                            </div>

                            <!-- // Save changes button -->
                            <button class="btn btn-primary" type="button">Save updates</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

 
<script> 

var detailsnav = document.getElementById("detailsnav");
  var securitysnav = document.getElementById("securitysnav");
  var socilanav = document.getElementById("socilanav");
  var notificationsnav = document.getElementById("notificationsnav");

  var details = document.getElementById("details");
  var security = document.getElementById("security");
  var social = document.getElementById("social");
  var notifications = document.getElementById("notifications");


  function detailsa() {
      detailsnav.classList.add("active");
      securitysnav.classList.remove("active");
      socilanav.classList.remove("active");
      notificationsnav.classList.remove("active");


      details.style.display = "block";
      security.style.display = "none";
      social.style.display = "none";
      notifications.style.display = "none";
  }

  function securitya() {
      detailsnav.classList.remove("active");
      securitysnav.classList.add("active");
      socilanav.classList.remove("active");
      notificationsnav.classList.remove("active");

      details.style.display = "none";
      security.style.display = "block";
      social.style.display = "none";
      notifications.style.display = "none";

  }

  function sociala() {

      detailsnav.classList.remove("active");
      securitysnav.classList.remove("active");
      socilanav.classList.add("active");
      notificationsnav.classList.remove("active");

      details.style.display = "none";
      security.style.display = "none";
      social.style.display = "block";
      notifications.style.display = "none";

  }

  function notificationsa() {

      detailsnav.classList.remove("active");
      securitysnav.classList.remove("active");
      socilanav.classList.remove("active");
      notificationsnav.classList.add("active");

      details.style.display = "none";
      security.style.display = "none";
      social.style.display = "none";
      notifications.style.display = "block";

  }
  </script>
</body>

</html>