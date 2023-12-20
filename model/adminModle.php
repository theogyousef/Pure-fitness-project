<?php
include "../controller/config.php";

class adminModel
{

    public static function addproduct($name, $type, $stock, $price, $description, $fileUrl)
    {
        include "../controller/config.php";
        $query = "insert into products (name,type,stock,price,description,file) values (' $name','$type', '$stock ' ,'$price','$description','$fileUrl')";

        mysqli_query($conn, $query);
    }
    public static function updateproduct($id, $name, $price, $type, $description, $stock)
    {
        include "../controller/config.php";
        $query = "update products set name ='$name',type ='$type',price ='$price',description ='$description', stock = '$stock' where id = '$id'";

        mysqli_query($conn, $query);
    }

    public static function deleteproduct($id)
    {
        include "../controller/config.php";
        $query = "DELETE FROM products WHERE id = '$id'";
        mysqli_query($conn, $query);
    }
    public static function adduser($firstname, $lastname, $email, $hashedPassword)
    {
        echo "wasal";
        include "../controller/config.php";
        $query = "insert into users (firstname, lastname , email , password ) values ('$firstname' , '$lastname', '$email','$hashedPassword')";
        mysqli_query($conn, $query);
        $result = mysqli_query($conn, "SELECT * FROM users where email = '$email'");
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        $query2 = "INSERT INTO addresses (user_id) VALUES ('$id')";
        $query3 = "INSERT INTO permissions (user_id) VALUES ('$id')";

        mysqli_query($conn, $query2);
        mysqli_query($conn, $query3);

    }
    public static function checkduplicate($email)
    {
        include "../controller/config.php";
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        return mysqli_num_rows($result) > 0; // Returns true if duplicate, false otherwise
    }
    public static function updateuser($firstname, $lastname, $email, $id)
    {
        include "../controller/config.php";
        $query = "update users set firstname ='$firstname',lastname ='$lastname',email ='$email'  where id = '$id'";
        mysqli_query($conn, $query);
    }
    public static function deleteuser($id)
    {
        include "../controller/config.php";
        $query = "DELETE FROM addresses WHERE user_id = '$id'";
        $query2 = "DELETE FROM permissions WHERE user_id = '$id'";        
        $query3 = "DELETE FROM users WHERE id = '$id'";
        mysqli_query($conn, $query);
        mysqli_query($conn, $query2);
        mysqli_query($conn, $query3);

    }
    public static function makeadmin($id)
    {
        include "../controller/config.php";
        $query = "UPDATE permissions set admin = '1' WHERE user_id = '$id'";
        mysqli_query($conn, $query);
    }
    public static function makeuser($id)
    {

        include "../controller/config.php";
        $query = "UPDATE permissions set admin = '0' WHERE user_id = '$id'";
        mysqli_query($conn, $query);
    }
    public static function activateaccount($id)
    {

        include "../controller/config.php";
        $query = "UPDATE users SET deactivated = '0' WHERE  id = $id ";
        mysqli_query($conn, $query);
    }

    public static function updateorder($id, $status)
    {

        include "../controller/config.php";
        $query = "UPDATE orders_details SET status = '$status' WHERE order_id = $id ";
        mysqli_query($conn, $query);
    }
    public static function updatephotos($id, $fileUrl, $fileUrl1, $fileUrl2, $fileUrl3)
    {
        include "../controller/config.php";
        $result = mysqli_query($conn, "SELECT * from product_photos where product_id = '$id';");
        $row = mysqli_fetch_assoc($result);
    
        if (!empty($row)) {
            $query = "UPDATE products SET file = '$fileUrl' WHERE id = $id ";
            mysqli_query($conn, $query);
            $query2 = "UPDATE product_photos SET file1 = '$fileUrl1', file2 = '$fileUrl2', file3 = '$fileUrl3' WHERE product_id = $id ";
            mysqli_query($conn, $query2);
        } else if (empty($row)) {
            $query3 = "UPDATE products SET file = '$fileUrl' WHERE id = $id ";
            mysqli_query($conn, $query3);
            $query4 = "INSERT into product_photos (product_id, file1, file2, file3) VALUES ('$id', '$fileUrl1', '$fileUrl2', '$fileUrl3')";
            mysqli_query($conn, $query4);
        }
    }
    

}
