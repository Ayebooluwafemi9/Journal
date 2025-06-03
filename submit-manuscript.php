<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

// Admin email for notifications
$adminEmail = "calebuniversitycujpas@gmail.com";

// Connect to database
$conn = new mysqli("localhost", "root", "", "store");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$author_name = $_POST['author_name'];
$author_email = $_POST['author_email'];
$title = $_POST['title'];
$abstract = $_POST['abstract'];

// Handle file upload
$targetDir = "uploads/";
if (!is_dir($targetDir)) {
    mkdir($targetDir);
}
$fileName = basename($_FILES["manuscript_file"]["name"]);
$targetFile = $targetDir . time() . "_" . $fileName;

if (move_uploaded_file($_FILES["manuscript_file"]["tmp_name"], $targetFile)) {
    // Save to database
    $stmt = $conn->prepare("INSERT INTO manuscripts (author_name, author_email, title, abstract, file_path, status) VALUES (?, ?, ?, ?, ?, 'Pending')");
    $stmt->bind_param("sssss", $author_name, $author_email, $title, $abstract, $targetFile);
    $stmt->execute();
    $stmt->close();

    // Send email to admin
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $adminEmail;
        $mail->Password   = 'xpxfjrjgcwmzczkw'; // App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom($adminEmail, 'CUJPAS Submission');
        $mail->addAddress($adminEmail);  // Send to admin

        $mail->isHTML(true);
        $mail->Subject = "New Manuscript Submission: $title";
        $mail->Body    = "A new manuscript has been submitted by <strong>$author_name</strong>.<br><br>
                          <strong>Title:</strong> $title<br>
                          <strong>Email:</strong> $author_email<br>
                          <strong>Abstract:</strong><br>$abstract";

        $mail->send();
    } catch (Exception $e) {
        error_log("Mailer Error: {$mail->ErrorInfo}");
    }

    echo "<script>alert('Manuscript submitted successfully!'); window.location.href='index.html';</script>";
} else {
    echo "File upload failed.";
}

$conn->close();
?>

