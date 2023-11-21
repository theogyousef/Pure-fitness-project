<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php

//require "../controller/config.php";



if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'  ");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: registeration");
}

if ($row["admin"] != 1) {
    header("Location: index");

}

if ($row["id"] == 1) {
    header("Location: index");

}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


    <title>Admin panel</title>
    <style>
        <?php include "../public/CSS/adminDasboard.css" ?>
    </style>

</head>


<body>
    <div class="container">
        <div class="topbar">
            <div class="logo">
                <h2>Pure Fitness</h2>
            </div>

            <div class="search">
                <h1>Welcome back
                    <?php echo $row["firstname"] . " (:" ?>
                </h1>
            </div>
            <div class="user">
                <img src="<?php echo $row['profilepicture'] ?>" alt="">
            </div>
        </div>
        <!-- Sidebar -->
        <div class="sidebar">
            <ul>
                <li class="active" id="dashboard">
                    <a href="adminDashboard" >
                        <i class="fas fa-th-large"></i>
                        <div>Dashboard</div>
                    </a>
                </li>

                <li class="dropdown" id="users">
                    <a href="users">
                        <i class="fas fa-users"></i>
                        <div>Users</div>
                    </a>
                    <div class="dropdown-content">

                        <a href="adduser" >Add user</a>
                       


                        <!-- Add more links as needed -->
                    </div>
                </li>
                <li class="dropdown" id="products">
                    <a href="products">
                        <i class="fas fa-dumbbell"></i>
                        <div>products</div>
                    </a>
                    <div class="dropdown-content">
                        <a href="addproduct" >Add product</a>
                        <!-- Add more links as needed -->
                    </div>
                </li>


                <li>
                    <a href="profilesettings">
                        <i class="fas fa-cog"></i>
                        <div>Profile Settings</div>
                    </a>
                </li>
                <li>
                    <a href="index">
                        <i class="fas fa-home"></i>
                        <div>Home</div>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Dashboard -->
       
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="../public/JS/admindasboard.js"></script>

      

</body>

</html>