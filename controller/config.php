<?php
$DBservername = "localhost";
$DBusername = "root";
$DBpasswordd = "";
$DB = "swe";

 session_start();
$conn = mysqli_connect($DBservername, $DBusername, $DBpasswordd, $DB);

if (!$conn) {   
     echo "<script>alert('Database connection failed');</script>";
}
else{
     // echo "<script>alert('Database connection success');</script>";
}

?>