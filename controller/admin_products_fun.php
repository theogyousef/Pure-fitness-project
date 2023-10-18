<?php
include"config.php";
function addproduct()
{
    global $conn;
    $name = $_POST["name"];
    $price = $_POST["price"];
    $type = $_POST["type"];
    $description = $_POST["description"];
    $file = $_FILES["file"];


    
    $uploadDirectory = '../productPhotos/'; // Directory where you save the uploaded files

    // Check if the file was uploaded successfully
    if (move_uploaded_file($file["tmp_name"], $uploadDirectory . $file["name"])) {
        $uploadedFileName = $file["name"];
        $fileUrl = $uploadDirectory . $uploadedFileName;
        //echo "<script>alert('The URL is: " . $fileUrl . "'); </script>";

     } else {
             echo "<script>alert('File upload failed.'); </script>";
    }


   
    $query="insert into products (name,type,price,description,file) values (' $name','$type','$price','$description','$fileUrl')";

    mysqli_query($conn,$query);
    
}
function updateproduct()
{
    global $conn;
    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $type = $_POST["type"];
    $description = $_POST["description"];


    $query="update products  set name ='$name',type ='$type',price ='$price',description ='$description'  where id = '$id'";

    mysqli_query($conn,$query);
    

}
function deleteproduct()
{

    global $conn;
    $id = $_POST["id"];


    $query="DELETE FROM products WHERE id = '$id'";

    mysqli_query($conn,$query);

}