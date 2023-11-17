<?php
// profile picture upload 
include "config.php";

function uploadpic()
{
    global $conn;

    global $conn;
    $file = $_FILES["file"];
    $uploadDirectory = '../public/photos/userPhotos/'; // Directory where you save the uploaded files

    // Check if the file was uploaded successfully
    if (move_uploaded_file($file["tmp_name"], $uploadDirectory . $file["name"])) {
        $uploadedFileName = $file["name"];
        $fileUrl = $uploadDirectory . $uploadedFileName;
        // echo "<script>alert('The URL is: " . $fileUrl . "'); </script>";

        $id = $_SESSION["id"];
        $query = "UPDATE users SET profilepicture = '$fileUrl' WHERE  id = $id ";
        mysqli_query($conn, $query);


    } else {
        echo "<script>alert('File upload failed.'); </script>";
    }



}
// Account details 
function editdetails()
{
    global $conn;

    // echo "<script> alert('changes saved'); </script>";
    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'  ");
    $row = mysqli_fetch_assoc($result);
    // echo "<script> alert('Updatesd successfuly');</script> ";

    $query = "UPDATE users SET firstname = '$firstname' , lastname = '$lastname' ,username = '$username' , email = '$email' , phone = '$phone' WHERE  id = $id ";
    mysqli_query($conn, $query);
    //         $jjj = $row["firstname"];
// echo "<script>alert('$jjj');</script>";
    // $query = "INSERT INTO users VALUES('', '$firstname', '$lastname', '$email', '$password')";


}

function updateaddress(){
    global $conn;
$governorates = $_POST["governorates"];
    $city = $_POST["city"];
    $street = $_POST["street"];
    $house = $_POST["house"];
    $postalcode = $_POST["postalcode"];

    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'  ");
    $row = mysqli_fetch_assoc($result);
    // echo "<script> alert('Updatesd successfuly');</script> ";

    $query = "UPDATE users SET governorates = '$governorates' , city = '$city' , street = '$street' ,house = '$house' , postalcode = '$postalcode'  WHERE  id = $id ";
    mysqli_query($conn, $query);
    //         $jjj = $row["firstname"];
// echo "<script>alert('$jjj');</script>";
    // $query = "INSERT INTO users VALUES('', '$firstname', '$lastname', '$email', '$password')";


}
// socials update
function updatesocials()
{
    global $conn;
    // echo "<script> alert('changes saved'); </script>";
    $github = $_POST["github"];
    $instagram = $_POST["instagram"];

    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'  ");
    $row = mysqli_fetch_assoc($result);

    $query = "UPDATE users SET github = '$github' , instagram = '$instagram' WHERE  id = $id ";
    mysqli_query($conn, $query);
    // echo "<script> alert('Updatesd successfuly');</script> ";
    // $query = "INSERT INTO users VALUES('', '$firstname', '$lastname', '$email', '$password')";


}

//update security 
function updatepasswords()
{
    global $conn;

    $oldpassowrd = $_POST["oldpassword"];
    $newpassword = $_POST["newpassword"];
    $conpassword = $_POST["conpassword"];

    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'  ");
    $row = mysqli_fetch_assoc($result);

    if ($newpassword == $conpassword) {
        if ($newpassword != $oldpassowrd) {
            if (password_verify($oldpassowrd, $row['password'])) {
                $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
                $query = "UPDATE users SET password = '$hashedPassword' WHERE  id = $id ";
                mysqli_query($conn, $query);
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



if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'  ");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: registeration.php");
}



$instagramUsername = trim($row["instagram"]); // Remove leading/trailing whitespace
$instagramURL = "https://www.instagram.com/" . rawurlencode($instagramUsername);

$githubUsername = trim($row["github"]); // Remove leading/trailing whitespace
$githubURL = "https://github.com/" . rawurlencode($githubUsername);



?>