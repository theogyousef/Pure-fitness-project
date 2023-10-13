<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();
        include_once "dbh.inc.php"; // Include your database connection
 //prevent SQL injection using mysqli_real_escape_string
    $email=mysqli_real_escape_string($connection,$_POST["email"]);
    $password=$_POST["password"];

    $sql="SELECT * FROM users WHERE email='$email'";
    $result=$connection->query($sql);

    if ($result->num_rows == 1) {
//fetch_assoc() If a single user is found, this line fetches the user's data as an associative array
        $row=$result->fetch_assoc();

        if($password==$row['password'])
        {
          $_SESSION["ID"] = $row["user_id"];
          $_SESSION["FName"]=$row["firstname"];
          $_SESSION["LName"]=$row["lastname"];
          $_SESSION["Email"]=$row["email"];
          $_SESSION [ "Password"]=$row["email"];
            echo "Login Done";

        } else {
            echo "Incorrect Password";
        }
    }else {
        echo "User not Found";

    }

    
    $connection->close(); 


    }