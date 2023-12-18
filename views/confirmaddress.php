<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php
require '../controller/config.php';

require "../controller/profilesettingsfun.php";

if (isset($_POST["addressdetails"])) {
    updateaddressandphone();
    header("Location: payment ");
}

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT a.*, p.*, u.* FROM addresses a JOIN permissions p ON a.user_id = p.user_id JOIN users u ON a.user_id = u.id WHERE a.user_id = '$id' AND u.id = '$id';");
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
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
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb-navigation">
                <li class="breadcrumb-item cart" style="color: maroon;"><a href="cart_display">Cart</a></li>
                <li class="breadcrumb-item separator"><i class="bi bi-chevron-right"></i></li>

                <li class="breadcrumb-item information"><a href="confirmaddress">Address Information</a></li>
                <li class="breadcrumb-item separator"><i class="bi bi-chevron-right"></i></li>

                <li class="breadcrumb-item payment"><a href="payment">Payment</a></li>
                <li class="breadcrumb-item separator"><i class="bi bi-chevron-right"></i></li>

                <li class="breadcrumb-item confirmation"><a href="/payment">Confirmation</a></li>
            </ol>
        </nav>
        <div class="py-3 text-center">
            <h3>Shipping address</h3>
        </div>

        <div class="row row-divider equal-height">
            <div class="col-md-7 billing-col">
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
                            <input name="city" class="form-control" id="inputcity" type="text" placeholder="Enter your city" value="<?php echo $row['city'] ?>">
                        </div>

                        <div class="col-md-6">
                            <label class="small mb-1" for="inputstreet">Street address</label>
                            <input name="street" class="form-control" id="inputstreet" type="text" placeholder="Enter your street name / number" value="<?php echo $row['street'] ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="inputhouse">House number / apartment / suite</label>
                        <input name="house" class="form-control" id="inputhouse" type="text" placeholder="Enter your house number" value="<?php echo $row['house'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="inputpostalcode">Postal code / zip</label>
                        <input name="postalcode" class="form-control" id="inputpostalcode" type="text" placeholder="Enter your house number" value="<?php echo $row['postalcode'] ?>">
                    </div>
                    <div class="mb-3" id="phonenumberdiv">
                                <label class="small mb-1" for="inputphonenumber">Phone number</label>
                                <div class="phone-input-container">
                                    <select class="form-control" name="international" id="international">
                                        <option value="Egypt">+20</option>
                                    </select>
                                    <input name="phone" class="form-control" type="tel" id="youridhere" class="phone"
                                        value="<?php echo $row['phone'] ?>">
                                </div>
                            </div>
                    <div style="height: 20px;">
                        <span id="AddresserrorMessages" class="errormessage" style="display: none;"></span>
                    </div>
                    <br>
                    <input name="addressdetails" type="submit" class="btn btn-primary" value="Next Step" style="background-color: black;">
                </form>
            </div>

            
            <div class="col-md-4 order-md-2 mb-4" id="cart">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted" style="margin-left: 130px;">Your cart</span>
                    <span class="badge badge-secondary badge-pill"><?php echo count($_SESSION['products']); ?></span>
                </h4>
                <ul class="list-group mb-3">
                    <?php
                    $total = 0;
                    if (!empty($_SESSION['products'])) {
                        foreach ($_SESSION['products'] as $product) {
                            $subtotal = $product['price'] * $product['quantity'];
                            $total += $subtotal;
                    ?>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" style="width: 50px; height: auto; margin-right: 10px;">
                                    <div>
                                        <h6 class="my-0"><?php echo $product['name']; ?></h6>
                                        <small class="text-muted">Quantity: <?php echo $product['quantity']; ?></small>
                                    </div>
                                </div>
                                <span class="text-muted"><?php echo number_format($subtotal, 2); ?> LE</span>
                            </li>
                    <?php
                        }
                    } else {
                        echo '<p class="text-muted">Your cart is empty.</p>';
                    }
                    ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Subtotal</span>
                        <strong><?php echo number_format($total, 2); ?> LE</strong>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Shipping</span>
                        <span>Free</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>All taxes included</span>
                       
                    </li>
                    
                    <li class="list-group-item d-flex justify-content-between">
                        <span>TOTAL</span>
                        <strong><?php echo number_format($total, 2); ?> LE</strong>
                    </li>
                </ul>

            </div>

            <div class="vertical-divider"></div>
        </div>

    </div>
    <footer>
        <?php
        include "footer.php";
        ?>
    </footer>
</body>