<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        include_once"dbh.inc.php";
        

        $firstname=htmlspecialchars($_POST["fname"]);
        $lastname=htmlspecialchars($_POST["lname"]);
        $email=htmlspecialchars($_POST["email"]);
        $password=htmlspecialchars($_POST["password"]);

        $sqle="SELECT * FROM users WHERE email='$email'";
        $result=$connection->query($sqle);

    if ($result->num_rows == 1) 
    {
        echo "User Allready Exist";

    }else {

        $sql = "INSERT INTO users (firstname, lastname, email,password) VALUES ('$firstname', '$lastname','$email', '$password')";

        if ($connection->query($sql) === TRUE) {
            echo "Data inserted successfully.";
            
        } else {
            echo "Error: " . $connection->error;
        }

        $connection->close();
          }
    } 