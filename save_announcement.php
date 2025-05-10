<?php
$conn = new mysqli("localhost", "root", "", "your_database_name");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $message = $_POST['message'];
    $event_date = $_POST['event_date'];

    // Handle image upload
    $flyer_name = $_FILES['flyer']['name'];
    $flyer_tmp = $_FILES['flyer']['tmp_name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($flyer_name);

    if (move_uploaded_file($flyer_tmp, $target_file)) {
        $stmt = $conn->prepare("INSERT INTO announcements (title, message, event_date, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $message, $event_date, $flyer_name);
        $stmt->execute();

        echo "Announcement posted successfully.";
    } else {
        echo "Image upload failed.";
    }

    $conn->close();
}
?>


