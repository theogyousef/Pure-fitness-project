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
        <?php include "../CSS/prfilesettings.css" ?>
    </style>
</head>

<body>
    <div class="container-md px-10 mt-2">

        <!-- prfile settings nav bar -->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" id="detailsnav" href="#" onClick="detailsa()">Profile</a>
            <a class="nav-link" href="#" id="securitysnav" onClick="securitya()">Security</a>
            <a class="nav-link" href="#" id="notificationsnav" onClick="notificationsa()">Notifications</a>
            <a class="nav-link" href="home.php" >Home</a>


        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <!-- personal card -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="../photos/yousef.jpg" alt="picture" class="rounded-circle p-1 bg-primary"
                                width="110">
                            <div class="mt-3">
                                <h4>Yousef Ehab</h4>
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
                                <a class="text-secondary" href="https://github.com/theogyousef">theogyousef</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-twitter me-2 icon-inline text-info">
                                        <path
                                            d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                        </path>
                                    </svg>Twitter</h6>
                                <span class="text-secondary">@joeehab</span>
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
                                <span class="text-secondary">@joeehabb</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-facebook me-2 icon-inline text-primary">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                        </path>
                                    </svg>Facebook</h6>
                                <span class="text-secondary">Yousef ehab</span>
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
                        <form>

                            <div class="mb-3 photoselect">


                                <label for="inputTag">
                                    Select Image <br />
                                    <i class="fa fa-2x fa-camera"></i>
                                    <input id="inputTag" type="file"
                                        accept="image/png, image/jpg, image/gif, image/jpeg" />
                                    <br />
                                    <span id="imageName"></span>
                                </label>
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username (how your name will appear to
                                    other users on the site)</label>
                                <input class="form-control" id="inputUsername" type="text"
                                    placeholder="Enter your username" value="joeehab">
                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                    <input class="form-control" id="inputFirstName" type="text"
                                        placeholder="Enter your first name" value="Yousef">
                                </div>

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                    <input class="form-control" id="inputLastName" type="text"
                                        placeholder="Enter your last name" value="Ehab">
                                </div>
                            </div>



                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" type="email"
                                    placeholder="Enter your email address" value="youssef2101042@miuegypt.edu.eg">
                            </div>


                            Save changes button
                            <button class="btn btn-primary" type="button">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Security -->
            <div class="col-xl-8" style="display: none;" id="security">
                <div class="card mb-4">
                    <div class="card-header">Security</div>
                    <div class="card-body">
                        <form>

                            <div class="mb-3">
                                <label class="small mb-1" for="oldpassword">Old passowrd</label>
                                <input class="form-control" id="oldpassword" type="password">
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="newpassword">New passowrd</label>
                                <input class="form-control" id="newpassword" type="password">
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="conpassword">Confirm new passowrd</label>
                                <input class="form-control" id="conpassword" type="password">
                            </div>


                            <!-- // Save changes button -->
                            <button class="btn btn-primary" type="button">Update password</button>
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
        var notificationsnav = document.getElementById("notificationsnav");

        var details = document.getElementById("details");
        var security = document.getElementById("security");
        var notifications = document.getElementById("notifications")

        function detailsa() {
            detailsnav.classList.add("active");
            securitysnav.classList.remove("active");
            notificationsnav.classList.remove("active");


            details.style.display = "block";
            security.style.display = "none";
            notifications.style.display = "none";
        }

        function securitya() {
            detailsnav.classList.remove("active");
            securitysnav.classList.add("active");
            notificationsnav.classList.remove("active");

            details.style.display = "none";
            security.style.display = "block";
            notifications.style.display = "none";

        }

        function notificationsa() {

            detailsnav.classList.remove("active");
            securitysnav.classList.remove("active");
            notificationsnav.classList.add("active");

            details.style.display = "none";
            security.style.display = "none";
            notifications.style.display = "block";

        }


    </script>

</body>

</html>