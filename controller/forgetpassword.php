<?php
include "config.php";
require '../phpmailer/vendor/autoload.php';
include "../controller/logs.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Forgetpassword
{
    public static function forgetpassword($conn)
    {
        global $email;

        if (isset($_REQUEST['submit'])) {

            $email = $_REQUEST['email'];
            $_SESSION['email'] = $email;

            $check_query = mysqli_query($conn, "SELECT * FROM users where email ='$email'");
            $rowCount = mysqli_num_rows($check_query);
            if ($rowCount > 0) {
                $data =  mysqli_fetch_assoc($check_query);
                $otp = rand(100000, 999999);
                $mail = new PHPMailer(true);

                try {

                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'purefitness.equipments@gmail.com';
                    $mail->Password   = 'kbuq sdsx dlpc ceig';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port       = 465;

                    $mail->setFrom('purefitness.equipments@gmail.com', 'Pure Fitness');
                    $mail->addAddress($email, 'user');

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
                        $log = "Run forgetpassword function";
                        logger($log);
                        header("Location: otp");
                    }
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
        }
    }


    public static function otp($conn)
    {

        if (isset($_REQUEST['submitOTP'])) {
            $otp = $_REQUEST['otp'];
            $check_query = mysqli_query($conn, "SELECT * FROM users WHERE otp = '$otp'");
            $rowCount = mysqli_num_rows($check_query);

            if ($rowCount > 0) {
                $update_query = mysqli_query($conn, "UPDATE users SET otp = 0 WHERE otp = '$otp'");

                if ($update_query) {
                    $log = "Run otp function";
                    logger($log);
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


    public static function newpassword($conn)
    {

        if (isset($_POST['submitpass'])) {
            $password = $_POST["password"];
            $confirmpassword = $_POST["confirmpassword"];

            $email = $_SESSION['email'];

            if ($password == $confirmpassword) {

                $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
                $row = mysqli_fetch_assoc($result);

                if ($result) {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    $update_query = mysqli_query($conn, "UPDATE users SET password = '$hashedPassword' WHERE email = '$email'");

                    if ($update_query) {
                    $log = "Run newpassword function";
                    logger($log);
                        header("Location: login");
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
}
