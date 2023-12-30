<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php

require "../controller/adminFunctions.php";

if (isset($_POST["updateorder"])) {
    AdminFunctions::updatereview();
    header("Location: Adminreviews");

}
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn,"SELECT a.*, p.*, u.* FROM addresses a JOIN permissions p ON a.user_id = p.user_id JOIN users u ON a.user_id = u.id WHERE a.user_id = '$id' AND u.id = '$id';" );
    $row = mysqli_fetch_assoc($result);
  } else {
    header("Location: login");
  }


if ($row["admin"] != 1) {
    header("Location: index");

}

if ($row["id"] == 1) {
    header("Location: index");

}


if (isset($_GET['id'])) {
    $reviewid = $_GET['id'];

    $sql = "SELECT * FROM reviews where review_id = $reviewid";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $reviewdetails = mysqli_fetch_assoc($result);

      
    } else {
        echo '<p>No review details found.</p>';
    }
} else {
    echo '<p>review ID is not provided.</p>';
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



    <div class="main" id="editproduct">
        <div class="formcards">
            <div class="formcard">
                <div class="card-content form-container">

                    <h1>Update Review</h1>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">ID</label>
                            <input type="text" class="form-control" name="id" required
                                value="<?php echo $reviewdetails['review_id'] ?>">
                        </div>
                      
                        <div class="mb-3">
                        <label for="stock">Admit :</label>
                            <select class="form-control" id="type" name="status">
                                <option value="<?php echo $reviewdetails['status'] ?>" selected>
                                    <?php echo $reviewdetails['status'] ?>
                                </option>
                                <option value="0">Not approved</option>
                                <option value="1">Approved</option>
                
                            

                            </select>

                        </div>


                  
                        <div class="mb-3">
                            <label for="newProductSlug" class="form-label">Price</label>
                            <input type="text" class="form-control" name="price" required
                                value="<?php echo $reviewdetails['review_text'] ?>" disabled >
                        </div>
                      
                        <div class="mb-3">
                            <input type="submit" name="updateorder" value="Update Order"
                                style="background-color: #007BFF; color: #fff; padding: 10px 20px; border: none; cursor: pointer;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>