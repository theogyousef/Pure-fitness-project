<?php
include "config.php";
include "../model/adminModle.php";
// products funvtions
function addproduct()
{
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

    /// apply th query to db by pass to the handler func
    adminModel::addproduct($name,$price,$type,$description,$fileUrl);


}
function updateproduct()
{
    
    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $type = $_POST["type"];
    $description = $_POST["description"];

    /// apply th query to db by pass to the handler func

    adminModel::updateproduct($id,$name, $price,$type,$description);


}
function deleteproduct()
{

   
    $id = $_POST["id"];
     /// apply th query to db by pass to the handler func
    adminModel::deleteproduct($id);

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
            /// apply th query to db by pass to the handler func
            adminModel::adduser($firstname,$lastname,$email,$hashedPassword);

        } else {
            echo "<script> alert('Passwords do not match');</script> ";
        }
    }

}

function updateuser()
{

    
    $id = $_POST["id"];
    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    /// apply th query to db by pass to the handler func
    adminModel::updateuser($firstname,$lastname,$email,$password,$id);
}

function deleteuser()
{

    
    $id = $_POST["id"];
    /// apply th query to db by pass to the handler func
    adminModel::deleteuser($id);

}

function makeadmin(){
    
    $id = $_POST["id"];
   /// apply th query to db by pass to the handler func
    adminModel::makeadmin($id);

}

function makeuser(){
   
    $id = $_POST["id"];
    adminModel::makeuser($id);

}