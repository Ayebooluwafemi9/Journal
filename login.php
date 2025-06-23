<?php
session_start();

// Connect to your database
$conn = new mysqli("localhost", "root", "", "store");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get input values from the form
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and execute the query
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verify hashed password
    if (password_verify($password, $user['password'])) {
        // Store session data
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];

        // Check if this is the admin
        if ($user['email'] === 'calebuniversitycujpas@gmail.com') {
            $_SESSION['admin'] = true;
            header("Location: admin_review.php"); // Redirect to admin dashboard
        } else {
            header("Location: index.html"); // Redirect regular user to homepage
        }
        exit();
    } else {
        echo "<script>alert('Incorrect password'); window.location.href='login.html';</script>";
    }
} else {
    echo "<script>alert('User not found'); window.location.href='login.html';</script>";
}

$stmt->close();
$conn->close();
?>
