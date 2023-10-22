<?php
require '../controller/config.php';
$_SESSION = [] ;
session_unset();
session_destroy();
header("Location: registeration.php");
?>