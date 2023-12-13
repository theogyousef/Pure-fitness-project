<?php

class UserModel {
    public static function uploadpic($fileUrl,$id)
    {
        include "../controller/config.php";
        $query = "UPDATE users SET profilepicture = '$fileUrl' WHERE  id = $id ";
        mysqli_query($conn, $query);

    }
    public static function editdetails($firstname,$lastname,$username,$email,$phone,$id)
    {
        include "../controller/config.php";
        $query = "UPDATE users SET firstname = '$firstname' , lastname = '$lastname' ,username = '$username' , email = '$email' , phone = '$phone' WHERE  id = $id ";
    mysqli_query($conn, $query);

    }
    public static function updateaddress($governorates,$city,$street,$house,$postalcode,$id)
    {
        include "../controller/config.php";
        $query = "UPDATE addresses SET governorates = '$governorates' , city = '$city' , street = '$street' ,house = '$house' , postalcode = '$postalcode'  WHERE  user_id = $id ";
    mysqli_query($conn, $query);

    }
    public static function updatesocials($github,$instagram,$id)
    {
        include "../controller/config.php";
        $query = "UPDATE users SET github = '$github' , instagram = '$instagram' WHERE  id = $id ";
        mysqli_query($conn, $query);
    }
    public static function selectUser($id)
    {
        include "../controller/config.php";
        $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'  ");
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    // public static function selectAddress($id)
    // {
    //     include "../controller/config.php";
    //     $result = mysqli_query($conn, "SELECT * FROM addresses WHERE user_id = '$id'  ");
    //     $row = mysqli_fetch_assoc($result);
    //     return $row;
    // }
    public static function UpdatePassword($hashedPassword,$id)
    {
        include "../controller/config.php";
        $query = "UPDATE users SET password = '$hashedPassword' WHERE  id = $id ";
        mysqli_query($conn, $query);
    }

    public static function deactivateaccount($id)
    {
        include "../controller/config.php";
        $query = "UPDATE users SET deactivated = '1' WHERE  id = $id ";
        mysqli_query($conn, $query);
    }
}