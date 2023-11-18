<?php
include "config.php";

class adminModel{
    
    public static function addproduct( $name,$type,$price,$description,$fileUrl)
    {
        global $conn;
        $query = "insert into products (name,type,price,description,file) values (' $name','$type','$price','$description','$fileUrl')";

        mysqli_query($conn, $query);
    }
    public static function updateproduct($id,$name,$price,$type, $description)
    {
        global $conn;
        $query = "update products set name ='$name',type ='$type',price ='$price',description ='$description'  where id = '$id'";

        mysqli_query($conn, $query);
    }

    public static function deleteproduct($id)
    {
        global $conn;
        $query = "DELETE FROM products WHERE id = '$id'";
        mysqli_query($conn, $query);
    }
    public static function adduser($firstname,$lastname,$email,$hashedPassword)
    {
        global $conn;
        $query = "INSERT INTO users (firstname, lastname , email , password ) VALUES ('$firstname' , '$lastname', '$email','$hashedPassword');";
         mysqli_query($conn, $query);
    }
    public static function updateuser($firstname,$lastname,$email,$password,$id)
    {
        global $conn;
        $query = "update users set firstname ='$firstname',lastname ='$lastname',email ='$email',password ='$password'  where id = '$id'";
        mysqli_query($conn, $query);
    }
    public static function deleteuser($id)
    {
        global $conn;
        $query = "DELETE FROM users WHERE id = '$id'";
         mysqli_query($conn, $query);
    }
    public static function makeadmin($id)
    {
        global $conn;
        $query = "UPDATE users  set admin = '1' WHERE id = '$id'";
         mysqli_query($conn, $query);
    }
    public static function makeuser($id)
    {

        global $conn;
        $query = "UPDATE users  set admin = '0' WHERE id = '$id'";
         mysqli_query($conn, $query);
    }
}