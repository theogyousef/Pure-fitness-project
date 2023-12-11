<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php

//require "../controller/config.php";
require "../controller/profilesettingsfun.php";

 if (isset($_POST["addressdetails"])) {
    updateaddress();
        // header("Location: ");
}

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn,"SELECT a.*, p.*, u.* FROM addresses a JOIN permissions p ON a.user_id = p.user_id JOIN users u ON a.user_id = u.id WHERE a.user_id = '$id' AND u.id = '$id';" );
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: login");
}



if ($row["deactivated"] == 1) {
    header("Location: deactivated");

}

include "header.php";
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

    <title>Confirm address</title>
    <style>
        <?php
        include "../public/CSS/confirm.css";
        ?>
    </style>
    <script src="../public/JS/profilesettings.js"></script>

</head>

<body>
    <div class="container-address">
        <div class="col-xl-8" id="Address">
            <div class="card mb-4">
                <div class="card-header">Address Details</div>
                <div class="card-body">

                    <form method="post" id="Addresss" name="Address" onsubmit="validateaddress(event)">
                        <div class="col-md-6">

                            <h4 for="inputUsername" style="color : black ;">Egypt</h4>
                            <label for="governorates">Select a state:</label>
                            <select class="form-control" id="governorates" name="governorates">
                                <option value="<?php echo $row['governorates'] ?>" selected>
                                    <?php echo $row['governorates'] ?>
                                </option>
                                <option value="Al Daqahliyah">Al Daqahliyah</option>
                                <option value="Al Bahr al Ahmar">Al Bahr al Ahmar (Red Sea)</option>
                                <option value="Al Buhayrah">Al Buhayrah (Beheira)</option>
                                <option value="Al Fayyum">Al Fayyum</option>
                                <option value="Al Gharbiyah">Al Gharbiyah (Gharbia)</option>
                                <option value="Al Iskandariyah">Al Iskandariyah (Alexandria)</option>
                                <option value="Al Isma'iliyah">Al Isma'iliyah (Ismailia)</option>
                                <option value="Al Jizah">Al Jizah (Giza)</option>
                                <option value="Al Minufiyah">Al Minufiyah (Menufia)</option>
                                <option value="Al Minya">Al Minya</option>
                                <option value="Al Qahirah">Al Qahirah (Cairo)</option>
                                <option value="Al Qalyubiyah">Al Qalyubiyah (Qalyubia)</option>
                                <option value="Al Wadi al Jadid">Al Wadi al Jadid (New Valley)</option>
                                <option value="As Suways">As Suways (Suez)</option>
                                <option value="Ash Sharqiyah">Ash Sharqiyah (Eastern)</option>
                                <option value="Aswan">Aswan</option>
                                <option value="Asyut">Asyut</option>
                                <option value="Bur Sa'id">Bur Sa'id (Port Said)</option>
                                <option value="Dumyat">Dumyat (Damietta)</option>
                                <option value="Janub Sina'">Janub Sina' (South Sinai)</option>
                                <option value="Kafr ash Shaykh">Kafr ash Shaykh</option>
                                <option value="Matruh">Matruh</option>
                                <option value="Qina">Qina (Qena)</option>
                                <option value="Shamal Sina'">Shamal Sina' (North Sinai)</option>
                                <option value="Suhaj">Suhaj (Sohag)</option>
                                <option value="The 6th of October">The 6th of October</option>
                                <option value="Luxor">Luxor</option>
                            </select>
                        </div>
                        <div class="row gx-3 mb-3">

                            <div class="col-md-6">
                                <label class="small mb-1" for="inputcity">Town/city</label>
                                <input name="city" class="form-control" id="inputcity" type="text"
                                    placeholder="Enter your city" value="<?php echo $row['city'] ?>">
                            </div>

                            <div class="col-md-6">
                                <label class="small mb-1" for="inputstreet">Street address</label>
                                <input name="street" class="form-control" id="inputstreet" type="text"
                                    placeholder="Enter your street name / number"
                                    value="<?php echo $row['street'] ?>">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputhouse">House number / apartment / suite</label>
                            <input name="house" class="form-control" id="inputhouse" type="text"
                                placeholder="Enter your house number" value="<?php echo $row['house'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputpostalcode">Postal code / zip</label>
                            <input name="postalcode" class="form-control" id="inputpostalcode" type="text"
                                placeholder="Enter your house number" value="<?php echo $row['postalcode'] ?>">
                        </div>

                        <div style="height: 20px;">
                            <span id="AddresserrorMessages" class="errormessage" style="display: none;"></span>
                        </div>
                        <br>
                        <input name="addressdetails" type="submit" class="btn btn-primary" value="Next Step"
                            style="background-color: black;">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <?php
        include "footer.php";
        ?>
    </footer>
</body>