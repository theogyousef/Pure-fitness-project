<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php
require '../controller/adminFunctions.php';

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'  ");
    $row = mysqli_fetch_assoc($result);

} else {
    header("Location: registeration");
}

if ($row["deactivated"] != 1) {
    header("Location: index");

}



include "header.php";

if (isset($_POST["activate"])) {
    //echo "<script> alert(' wasal ');</script> ";
     reactivateaccount($id);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Deactivated account</title>
    <style>
        <?php
        include "../public/css/deactivated.css"
            ?>
    </style>
</head>

<body>

    <div class="containergym">

        <div class="bench-containergym">
            <div class="seat"></div>
            <div class="left"></div>
            <div class="right"></div>
        </div>
        <div class="man">
            <div class="legs">
                <div class="leg one"></div>
                <div class="leg two"></div>
                <div class="thy"></div>
            </div>
            <div class="main-parts">
                <div class="lower"></div>
                <div class="upper">
                    <div class="above"></div>
                </div>
            </div>
            <div class="neck">
                <div class="head">

                </div>
            </div>
            <div class="arm"></div>
            <div class="nose">
                <div></div>
                <div></div>
            </div>
            <div class="hairs">
                <div class="lower"></div>
                <div class="upper">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <div class="hand"></div>
            <div class="weight"></div>
        </div>
        <div class="bicept-machine"></div>

        <div class="rod1"></div>
        <div class="top-left-sentence">
    <p>Your account is deactivated, do you want to reactivate it again?  <form method="POST" action="" enctype="multipart/form-data" id="formedactivate">
    <input type="submit" name="activate" value="click here" id="deactivatebutton">
 </form>
    </p>
</div>

</div>



    </div>

    <footer>
        <?php
        include "footer.php" ?>
    </footer>


</body>

</html>