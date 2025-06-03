<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Manual include (since you're not using Composer)
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

// Main function to send email to both author and admin
function sendNotification($authorEmail, $authorName) {
    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'calebuniversitycujpas@gmail.com';  // Admin Gmail
        $mail->Password   = 'xpxfjrjgcwmzczkw';                  // Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Email sender
        $mail->setFrom('calebuniversitycujpas@gmail.com', 'CUJPAS Journal System');

        // Recipients
        $mail->addAddress($authorEmail, $authorName);  // To the author
        $mail->addAddress('calebuniversitycujpas@gmail.com'); // Admin receives a copy

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = 'Manuscript Submission Received';
        $mail->Body    = nl2br("Dear $authorName,

Thank you for submitting your manuscript to CUJPAS. We have successfully received your file and our editorial team will begin reviewing it shortly.

Best regards,
CUJPAS Editorial Team");

        $mail->send();
        return true;

    } catch (Exception $e) {
        error_log("Mailer Error: {$mail->ErrorInfo}");
        return false;
    }
}
?>

