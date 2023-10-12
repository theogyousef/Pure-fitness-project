<?php
function insertUser(){
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
            header("Location:dashboard.php");
        } else {
            echo "Error: " . $connection->error;
        }

        $connection->close();
          }
    }
}
function FindUser()
{
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
         // var_dump($row);
            echo "Login Done";

        } else {
            echo "Incorrect Password";
        }
    }else {
        echo "User not Found";

    }

    
    $connection->close(); 


    }
}