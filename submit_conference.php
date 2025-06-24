<?php
session_start();

// Only allow admin to post
if (!isset($_SESSION['email']) || $_SESSION['email'] !== 'calebuniversitycujpas@gmail.com') {
    echo "<script>alert('Unauthorized Access'); window.location.href='login.html';</script>";
    exit();
}

// Connect to DB
$conn = new mysqli("localhost", "root", "", "store");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$title = $_POST['title'];
$description = $_POST['description'];
$event_date = $_POST['event_date'];
$type = $_POST['conference_type'];

// Handle flyer upload
$uploadDir = "uploads/conference/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);  // Create folder if not exists
}

$fileName = time() . "_" . basename($_FILES["flyer"]["name"]);
$targetFile = $uploadDir . $fileName;

if (move_uploaded_file($_FILES["flyer"]["tmp_name"], $targetFile)) {
    // Insert into DB
    $stmt = $conn->prepare("INSERT INTO conference_announcements (title, description, event_date, flyer_path, conference_type) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $title, $description, $event_date, $targetFile, $type);
    $stmt->execute();
    $stmt->close();

    echo "<script>alert('Conference posted successfully!'); window.location.href='post_conference.php';</script>";
} else {
    echo "<script>alert('Flyer upload failed.'); window.location.href='post_conference.php';</script>";
}

$conn->close();
?>
