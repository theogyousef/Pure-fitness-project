<?php
include "config.php"; 
require '../phpmailer/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submitemail']) && isset($_POST['email'])) {
    sendmail($_POST['email']);
}


function sendmail($email) {
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

        $htmlContent = file_get_contents('../views/newsettler_mail.php');
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


?>
