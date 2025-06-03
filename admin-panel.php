<?php
$conn = new mysqli("localhost", "root", "", "store");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If status is being updated
if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];
    $stmt = $conn->prepare("UPDATE manuscripts SET status=? WHERE id=?");
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();
    $stmt->close();

    // Optional: Fetch email and send notification
    $result = $conn->query("SELECT author_email, title FROM manuscripts WHERE id = $id LIMIT 1");
    if ($row = $result->fetch_assoc()) {
        $to = $row['author_email'];
        $subject = "Manuscript Submission Status";
        $message = "Dear Author,\n\nYour manuscript titled \"{$row['title']}\" has been marked as '$status'.\n\nRegards,\nEditorial Board";
        $headers = "From: yourjournal@example.com";

        // Suppress error if mail not configured
        @mail($to, $subject, $message, $headers);
    }

    header("Location: admin-panel.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Manuscripts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
<div class="container bg-white p-4 rounded shadow">
    <h2 class="mb-4">Admin Panel - Review Manuscripts</h2>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Email</th>
                <th>Title</th>
                <th>File</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $result = $conn->query("SELECT * FROM manuscripts ORDER BY submitted_at DESC");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['author_name']}</td>
                    <td>{$row['author_email']}</td>
                    <td>{$row['title']}</td>
                    <td><a href='{$row['file_path']}' download>Download</a></td>
                    <td>{$row['status']}</td>
                    <td>
                        <a href='admin-panel.php?id={$row['id']}&status=Approved' class='btn btn-success btn-sm'>Approve</a>
                        <a href='admin-panel.php?id={$row['id']}&status=Rejected' class='btn btn-danger btn-sm'>Reject</a>
                    </td>
                </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
