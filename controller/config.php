<?php
$DBservername = "localhost";
$DBusername = "root";
$DBpasswordd = "";
$DB = "swe";

session_start();
$conn = mysqli_connect($DBservername, $DBusername, $DBpasswordd, $DB);


if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    $result = mysqli_query($conn, "SELECT * FROM users where guest = '1' ");
    $row = mysqli_fetch_assoc($result);
    $_SESSION["login"] = true;
    $_SESSION["id"] = $row["id"];
}

if (!$conn) {
    echo "<script>alert('Database connection failed');</script>";
} else {
    // echo "<script>alert('Database connection success');</script>";
}
?>
