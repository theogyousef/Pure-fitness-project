<?php
//include "config.php";
include "../model/adminModle.php";
// products funvtions
function addproduct()
{
    $name = $_POST["name"];
    $price = $_POST["price"];
    $type = $_POST["type"];
    $stock = $_POST["stock"];
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
    adminModel::addproduct($name, $type, $stock , $price, $description, $fileUrl);

    header("Location: products");


}
function updateproduct()
{

    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $type = $_POST["type"];
    $description = $_POST["description"];
    $stock = $_POST["stock"];
   
   
    /// apply th query to db by pass to the handler func
    adminModel::updateproduct($id, $name, $price, $type, $description, $stock);
    header("Location: products");


}
function deleteproduct()
{


    $id = $_POST["id"];
    adminModel::deleteproduct($id);
    header("Location: products");

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
    //if you found any duplicate 
    if (adminModel::checkduplicate($email)) {
        echo "<script> alert(' email has already been taken ');</script> ";
    } else {
        // reaching here means email is unique so we check
        //if the password == confirm password 
        if ($password == $confirmpassword) {
            // we create a query with the inputs of the form to insert into the databse 
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            adminModel::adduser($firstname, $lastname, $email, $hashedPassword);
            // echo "<script> alert('Regsitered successfully');</script> ";
            header("Location: users");

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

    adminModel::updateuser($firstname, $lastname, $email, $id);

    header("Location: users");

}

function deleteuser()
{

    global $conn;
    $id = $_POST["id"];
    adminModel::deleteuser($id);
    header("Location: users");

}

function makeadmin()
{
    global $conn;
    $id = $_POST["id"];
    adminModel::makeadmin($id);
    header("Location: users");

}

function makeuser()
{
    global $conn;
    $id = $_POST["id"];
    adminModel::makeuser($id);
    header("Location: users");

}

function reactivateaccount($id)
{
    adminModel::activateaccount($id);

}
function updateorder(){
    global $conn;
    $id = $_POST["id"];
    $status = $_POST["status"];
    adminModel::updateorder($id , $status);
}