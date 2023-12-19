<?php
include "config.php";
require '../phpmailer/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class RegisterationMail{
public static function registeration($conn)
{
    global $email;

    if (isset($_REQUEST['submit'])) {

        $email = $_REQUEST['email'];
        $_SESSION['email'] = $email; 

        $check_query = mysqli_query($conn, "SELECT * FROM users where email ='$email'");
        $rowCount = mysqli_num_rows($check_query);
        if ($rowCount > 0) {
            $data =  mysqli_fetch_assoc($check_query);
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'purefitness.equipments@gmail.com';
                $mail->Password   = 'kbuq sdsx dlpc ceig';           
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;
        
                // Recipients
                $mail->setFrom('purefitness.equipments@gmail.com', 'Pure Fitness');
                $mail->addAddress($email, "Hi " . $email); 
        
                $htmlContent = file_get_contents('../views/signupMail.php');
                $htmlContent = str_replace('{{FirstName}}', "Hi " . $email, $htmlContent);
                $mail->isHTML(true);
                $mail->Subject = 'Welcome to Pure Fitness!';
                $mail->Body = $htmlContent; 
        
                $mail->send();
                echo "Message has been sent to {$email}";
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
}
}
?>