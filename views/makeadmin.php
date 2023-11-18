<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php

//require "../controller/config.php";
require "../controller/adminFunctions.php";

if (isset($_POST["makeadminn"])) {
    makeadmin();
} 

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'  ");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: registeration.php");
}

if ($row["admin"] != 1) {
    header("Location: index.php");

}

if ($row["id"] == 1) {
    header("Location: index.php");

}


if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Fetch product details based on the product ID
    $sql = "SELECT * FROM users WHERE id = $userId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $userDetails = mysqli_fetch_assoc($result);

        // Display the product details on the page
        // ...

    } else {
        echo '<p>No user details found.</p>';
    }
} else {
    echo '<p>user ID is not provided.</p>';
}

include "adminnav.php";



?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    <title>Admin panel</title>
    <style>
        <?php include "../public/CSS/adminDasboard.css" ?>
    </style>

</head>


<div class="container">
    
<!-- make admin  -->
        <div class="main" id="makeadmin">
            <div class="formcards">
                <div class="formcard">
                    <div class="card-content form-container">

                        <h1>Make admin</h1>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">ID</label>
                                <input type="text" class="form-control" name="id" required value="<?php echo $userDetails['id'] ?>">
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="makeadminn" value="Update"
                                    style="background-color: #007BFF; color: #fff; padding: 10px 20px; border: none; cursor: pointer;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

       
</div>
</body>