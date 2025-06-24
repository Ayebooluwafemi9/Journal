<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "store";
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $age = $_POST["age"];
    $sex = $_POST["sex"];
    $dob = $_POST["dob"];
    $nationality = $_POST["nationality"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validate password strength
    if (strlen($password) < 8 || 
        !preg_match('/[A-Z]/', $password) ||  
        !preg_match('/[a-z]/', $password) ||  
        !preg_match('/[0-9]/', $password) ||  
        !preg_match('/[\W]/', $password)) {  
        $_SESSION['error'] = "Password must be at least 8 characters with uppercase, lowercase, numbers, and symbols.";
        header("Location: reg.php");
        exit;
    }

    // Confirm password match
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Passwords do not match!";
        header("Location: reg.php");
        exit;
    }

    // Prevent duplicate emails
    $check_email = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($check_email);
    
    if ($result->num_rows > 0) {
        $_SESSION['error'] = "Email already exists!";
        header("Location: reg.php");
        exit;
    }

    // Hash password before storing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $sql = "INSERT INTO users (first_name, last_name, age, sex, dob, nationality, email, phone_number, password) 
            VALUES ('$first_name', '$last_name', '$age', '$sex', '$dob', '$nationality', '$email', '$phone', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "Registration successful!";
        
        //  FIX: Clear output buffer and Redirect Instantly
        ob_clean();  
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['error'] = "Error: " . $conn->error;
        header("Location: reg.php");
        exit;
    }
}

$conn->close();
?>



