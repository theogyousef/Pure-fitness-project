<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require '../controller/Singlton.php';

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT a.*, p.*, u.* FROM addresses a JOIN permissions p ON a.user_id = p.user_id JOIN users u ON a.user_id = u.id WHERE a.user_id = '$id' AND u.id = '$id';");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: login");
}
include 'header.php';


$databaseSingleton = DatabaseSingleton::getInstance();
$connection = $databaseSingleton->getConnection();

if (isset($_POST["addreview"])) {
    $description = $_POST["description"];
    $userId = $_SESSION["id"];

    $result = $databaseSingleton->insertReview($userId, $description);

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

    <style>
        <?php include "../public/CSS/wishlist.css";
        include "../public/CSS/cart_display.css" ?>

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <title>Wishlist</title>
</head>

<body>
    <header>
    <h1 class="text-center">Write a review</h1>

    </header>

    <main>
        <div class="container">
            <div class="row justify-content-center" style="margin-top: 50px;">
                <div class="col-md-6">

                <form method="POST" action="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="description" required style="height :300px; border : 2px solid black ;">
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="addreview" value="Add this review " 
                                style="background-color: black ; color: #fff; padding: 10px 20px; border: none; cursor: pointer; margin-left :40%">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <?php include "footer.php"; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
