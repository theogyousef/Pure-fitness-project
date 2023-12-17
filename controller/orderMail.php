<?php
include "config.php";
require '../phpmailer/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function confirmation($conn)
{
    if (isset($_REQUEST['submit'])) {
        $id = $_REQUEST['id'];
        $_SESSION['id'] = $id;

        $check_query = mysqli_query($conn, "SELECT * FROM users where id ='$id'");
        if (mysqli_num_rows($check_query) > 0) {
            $data = mysqli_fetch_assoc($check_query);
            $email = $data['email'];

            $mail = new PHPMailer(true);

            try {
                // SMTP server configuration
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'purefitness.equipments@gmail.com';                    
                $mail->Password   = 'kbuq sdsx dlpc ceig';   
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;

                // Recipient
                $mail->setFrom('purefitness.equipments@gmail.com', 'Pure Fitness');
                $mail->addAddress($email, 'user');

                // Email subject and body content
                $mail->isHTML(true);
                $mail->Subject = 'Order Confirmation';

                // Capture the PHP processed output
                ob_start();
                include('../views/confirmationMail.php'); // Path to the PHP file that outputs the email content
                $htmlContent = ob_get_clean();

                $mail->Body = $htmlContent; // Assign the processed output to email body
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if ($mail->send()) {
                    header("Location: confirmation");
                    exit; // Make sure no further code is executed once the redirect header is sent
                } else {
                    echo 'Message could not be sent.';
                }
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "No user found with the provided ID.";
        }
    }
}

