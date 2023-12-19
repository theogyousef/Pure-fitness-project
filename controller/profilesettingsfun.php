<?php
// profile picture upload 
// include "config.php";
include "../model/userModel.php";
include "../controller/logs.php";

class Profilesettingsfun{
public static function uploadpic()
{



    $file = $_FILES["file"];
    $uploadDirectory = '../public/photos/userPhotos/'; // Directory where you save the uploaded files

    // Check if the file was uploaded successfully
    if (move_uploaded_file($file["tmp_name"], $uploadDirectory . $file["name"])) {
        $uploadedFileName = $file["name"];
        $fileUrl = $uploadDirectory . $uploadedFileName;
        // echo "<script>alert('The URL is: " . $fileUrl . "'); </script>";

        $id = $_SESSION["id"];
        UserModel::uploadpic($fileUrl, $id);
        $log = "Run uploadpicture function";
        logger($log);



    } else {
        echo "<script>alert('File upload failed.'); </script>";
    }



}
// Account details 
public static function editdetails()
{

    // echo "<script> alert('changes saved'); </script>";
    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $id = $_SESSION["id"];
    //$result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'  ");
    //$row = mysqli_fetch_assoc($result);
    // echo "<script> alert('Updatesd successfuly');</script> ";

    UserModel::editdetails($firstname, $lastname, $username, $email, $phone, $id);
    $log = "Run editdetails function";
    logger($log);

    //         $jjj = $row["firstname"];
// echo "<script>alert('$jjj');</script>";
    // $query = "INSERT INTO users VALUES('', '$firstname', '$lastname', '$email', '$password')";


}

public static function updateaddress()
{

    $governorates = $_POST["governorates"];
    $city = $_POST["city"];
    $street = $_POST["street"];
    $house = $_POST["house"];
    $postalcode = $_POST["postalcode"];

    $id = $_SESSION["id"];
    // $row = $row = UserModel::selectAddress($id);
    // echo "<script> alert('Updatesd successfuly');</script> ";


    UserModel::updateaddress($governorates, $city, $street, $house, $postalcode, $id);
    $log = "Run updateaddress function";
        logger($log);
    //         $jjj = $row["firstname"];
// echo "<script>alert('$jjj');</script>";
    // $query = "INSERT INTO users VALUES('', '$firstname', '$lastname', '$email', '$password')";


}


public static function updateaddressandphone()
{

    $governorates = $_POST["governorates"];
    $city = $_POST["city"];
    $street = $_POST["street"];
    $house = $_POST["house"];
    $postalcode = $_POST["postalcode"];
    $phone = $_POST["phone"];
    $id = $_SESSION["id"];
    // $row = $row = UserModel::selectAddress($id);
    // echo "<script> alert('Updatesd successfuly');</script> ";


    UserModel::updateaddress($governorates, $city, $street, $house, $postalcode, $id);
    UserModel::updatephone($phone, $id);
    $log = "Run updateaddressandphone function";
        logger($log);

    //         $jjj = $row["firstname"];
// echo "<script>alert('$jjj');</script>";
    // $query = "INSERT INTO users VALUES('', '$firstname', '$lastname', '$email', '$password')";


}
// socials update
public static function updatesocials()
{
    global $conn;
    // echo "<script> alert('changes saved'); </script>";
    $github = $_POST["github"];
    $instagram = $_POST["instagram"];

    $id = $_SESSION["id"];
    $row = $row = UserModel::selectUser($id);


    UserModel::updatesocials($github, $instagram, $id);
    $log = "Run updatesocials function";
        logger($log);
    // echo "<script> alert('Updatesd successfuly');</script> ";
    // $query = "INSERT INTO users VALUES('', '$firstname', '$lastname', '$email', '$password')";


}

//update security 
public static function updatepasswords()
{
    global $conn;

    $oldpassowrd = $_POST["oldpassword"];
    $newpassword = $_POST["newpassword"];
    $conpassword = $_POST["conpassword"];

    $id = $_SESSION["id"];

    $row = UserModel::selectUser($id);

    if ($newpassword == $conpassword) {
        if ($newpassword != $oldpassowrd) {
            if (password_verify($oldpassowrd, $row['password'])) {
                $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);

                UserModel::UpdatePassword($hashedPassword, $id);
                $log = "Run updatepasswords function";
                    logger($log);
                // echo "<script> alert('Updatesd successfuly');</script> ";
            } else {
                echo "<script> alert('old passes do not match ');</script> ";

            }
        } else {
            echo "<script> alert('password did not change ');</script> ";
        }

    } else {
        echo "<script> alert('New passwords do not match');</script> ";

    }




}

public static function deactivateaccount()
{

    $password = $_POST["password"];
    $id = $_SESSION["id"];

    $row = UserModel::selectUser($id);
    if (password_verify($password, $row['password'])) {
        UserModel::deactivateaccount($id);
        $log = "Run deactivateaccount function";
        logger($log);

    } else {
        echo "<script> alert('wrong password ');</script> ";
    }

}

public static function cancelorder($id)
{
    UserModel::cancelorder($id);
    $log = "Run cancelorder function";
        logger($log);
    header("Location: orders");
}
}


?>