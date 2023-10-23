<?php
include "config.php";
// products funvtions
function addproduct()
{
    global $conn;
    $name = $_POST["name"];
    $price = $_POST["price"];
    $type = $_POST["type"];
    $description = $_POST["description"];
    $file = $_FILES["file"];

    $uploadDirectory = '../public/photos/productPhotos/'; // Directory where you save the uploaded files

    // Check if the file was uploaded successfully
    if (move_uploaded_file($file["tmp_name"], $uploadDirectory . $file["name"])) {
        $uploadedFileName = $file["name"];
        $fileUrl = $uploadDirectory . $uploadedFileName;
        //echo "<script>alert('The URL is: " . $fileUrl . "'); </script>";

    } else {
        echo "<script>alert('File upload failed.'); </script>";
    }



    $query = "insert into products (name,type,price,description,file) values (' $name','$type','$price','$description','$fileUrl')";

    mysqli_query($conn, $query);

}
function updateproduct()
{
    global $conn;
    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $type = $_POST["type"];
    $description = $_POST["description"];


    $query = "update products set name ='$name',type ='$type',price ='$price',description ='$description'  where id = '$id'";

    mysqli_query($conn, $query);


}
function deleteproduct()
{

    global $conn;
    $id = $_POST["id"];
    $query = "DELETE FROM products WHERE id = '$id'";
    mysqli_query($conn, $query);

}

// users functions 

function adduser()
{

    global $conn;

    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    // making sure the useranme and email from registeration is unique 
    $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' ");
    //if you found any duplicate 
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script> alert(' email has already been taken ');</script> ";
    } else {
        // reaching here means email is unique so we check
        //if the password == confirm password 
        if ($password == $confirmpassword) {
            // we create a query with the inputs of the form to insert into the databse 
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO users (firstname, lastname , email , password ) VALUES ('$firstname' , '$lastname', '$email','$hashedPassword');";

            // we pass the connection of the database and the quarey 
            mysqli_query($conn, $query);
            // echo "<script> alert('Regsitered successfully');</script> ";

        } else {
            echo "<script> alert('Passwords do not match');</script> ";
        }
    }

}

function updateuser()
{

    global $conn;
    $id = $_POST["id"];
    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    $query = "update users set firstname ='$firstname',lastname ='$lastname',email ='$email',password ='$password'  where id = '$id'";

    mysqli_query($conn, $query);
}

function deleteuser()
{

    global $conn;
    $id = $_POST["id"];
    $query = "DELETE FROM users WHERE id = '$id'";
    mysqli_query($conn, $query);

}

function makeadmin(){
    global $conn;
    $id = $_POST["id"];
    $query = "UPDATE users  set admin = '1' WHERE id = '$id'";
    mysqli_query($conn, $query);

}