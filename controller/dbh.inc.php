<?php
$serverName="localhost";
$username="root";
$password="";
$BD="swe";


// creat a connection
$connection=mysqli_connect($serverName,$username,$password,$BD);
/// checck if connection is done 
if(!$connection)
{
    die("connection failed : $mysqli_connect_error()");
}else {
    
}
