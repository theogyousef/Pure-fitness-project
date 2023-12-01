<?php
include "config.php"; 
require '../phpmailer/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendmail($email) {
    global $conn;

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        return; 
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowCount = $result->num_rows;


if ($rowCount > 0) {
    $data = $result->fetch_assoc();
    $firstName = $data['firstname']; // Replace with the actual column name for the first name
    $mail = new PHPMailer(true);



        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'purefitness.equipments@gmail.com';
            $mail->Password   = 'kbuq sdsx dlpc ceig';           
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Recipients
        // Recipients
        $mail->setFrom('purefitness.equipments@gmail.com', 'Pure Fitness');
        $mail->addAddress($email, $firstName); // Use the first name as the recipient's name
            // $mail->addReplyTo('info@example.com', 'Information');
        
        
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    
            $htmlContent = file_get_contents('../views/newsettler_mail.php');
            // Replace the placeholder with the actual first name
            $htmlContent = str_replace('{{FirstName}}', $firstName, $htmlContent);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Welcome to pure fitness!';
            $mail->Body = $htmlContent; // Set the HTML content from the file
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo "Message has been sent to {$email}";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "No user found with that email address.";
    }
}

if (isset($_POST['submitemail'])) {
    sendmail($_POST['email']);
}
?>
