<?php
include "config.php";
require '../phpmailer/vendor/autoload.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// session_start();

function forgetpassword($conn)
{
    global $email;

    if (isset($_REQUEST['submit'])) {

        $email = $_REQUEST['email'];
        $_SESSION['email'] = $email; // Store email in session

        $check_query = mysqli_query($conn, "SELECT * FROM users where email ='$email'");
        $rowCount = mysqli_num_rows($check_query);
        if ($rowCount > 0) {
            //Load Composer's autoloader
            $data =  mysqli_fetch_assoc($check_query);
            $otp = rand(100000, 999999);
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings

                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'purefitness.equipments@gmail.com';                     //SMTP username
                $mail->Password   = 'kbuq sdsx dlpc ceig';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('purefitness.equipments@gmail.com', 'Pure Fitness');
                $mail->addAddress($email, 'user');     //Add a recipient
                // $mail->addReplyTo('info@example.com', 'Information');


                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

                $htmlContent = file_get_contents('password-recovery-email.php');
                $htmlContent = str_replace('{{otp_code}}', $otp, $htmlContent);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset for Pure Fitness Equipment';
                $mail->Body = $htmlContent; // Set the HTML content from the file
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if ($mail->send()) {
                    echo $email;
                    $query = "UPDATE users SET otp = '$otp' WHERE email = '$email'";
                    mysqli_query($conn, $query);
                    header("Location: otp");
                    echo "elhumdallah tam bengah";
                }
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
}


function otp($conn)
{

    if (isset($_REQUEST['submitOTP'])) {
        $otp = $_REQUEST['otp'];
        $check_query = mysqli_query($conn, "SELECT * FROM users WHERE otp = '$otp'");
        $rowCount = mysqli_num_rows($check_query);

        if ($rowCount > 0) {
            $update_query = mysqli_query($conn, "UPDATE users SET otp = 0 WHERE otp = '$otp'");

            if ($update_query) {
                header("Location: newpassword");
                echo "OTP successfully updated to 0.";
            } else {
                echo "Error updating OTP: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Invalid OTP. Please try again.";
    }
}


function newpassword($conn)
{

    if (isset($_POST['submitpass'])) {
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        
        // $email = $_REQUEST['email'];
        $email = $_SESSION['email']; // Retrieve email from session


        // Check if the passwords match
        if ($password == $confirmpassword) {
            // Retrieve the email from the global variable
            // Check if a user with the provided email exists

            $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
            $row = mysqli_fetch_assoc($result);

            if ($result) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Update the password for the user with the provided email
                $update_query = mysqli_query($conn, "UPDATE users SET password = '$hashedPassword' WHERE email = '$email'");

                if ($update_query) {
                    echo "Password updated successfully.";
                    unset($_SESSION['email']);
                } else {
                    echo "Error updating password: " . mysqli_error($conn);
                }
            } else {
                echo "Email not found. Please try again.";
            }
        } else {
            echo "Passwords do not match. Please try again.";
        }
    }
}



// function newpassword(){
//     global $conn;


//     if (isset($_POST['submit'])) {
//         $password = $_POST["password"];
//         $confirmpassword = $_POST["confirmpassword"];

//         // Check if the passwords match
//         if ($password == $confirmpassword) {
//             // Get the email associated with the OTP from the previous step

//             $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$otp'");
//             $row = mysqli_fetch_assoc($result);
//             $email=$row['email'];
//             echo "<script> alert('Email is $email ');</script> ";

//             // Check if a user with the provided OTP exists
//             if ($row) {
//                 // Update the password for the user associated with the OTP
//                 $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
//                 $email = $row["email"];
//                 $update_query = mysqli_query($conn, "UPDATE users SET password = '$hashedPassword' WHERE email = '$email'");

//                 if ($update_query) {
//                     echo "Password updated successfully.";
//                 } else {
//                     echo "Error updating password: " . mysqli_error($conn);
//                 }
//             } else {
//                 echo "Invalid OTP. Please try again.";
//             }
//         } else {
//             echo "Passwords do not match. Please try again.";
//         }
//     }
// }
