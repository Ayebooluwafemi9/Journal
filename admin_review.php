<?php
session_start();

// ✅ Only allow the admin to access this page
if (!isset($_SESSION['user_id']) || $_SESSION['email'] !== 'calebuniversitycujpas@gmail.com') {
    header("Location: login.html");
    exit();
}

// 📦 Load PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

// 📡 Connect to MySQL
$conn = new mysqli("localhost", "root", "", "store");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ✅ Process approval or rejection
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['manuscript_id'], $_POST['action'])) {
    $id = intval($_POST['manuscript_id']);
    $status = $_POST['action'] === 'accept' ? 'Accepted' : 'Rejected';

    // 🔍 Get author info
    $stmt = $conn->prepare("SELECT author_email, title FROM manuscripts WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($author_email, $manuscript_title);
    $stmt->fetch();
    $stmt->close();

    // 📝 Update status in DB
    $stmt = $conn->prepare("UPDATE manuscripts SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();
    $stmt->close();

    // ✉️ Email author
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'calebuniversitycujpas@gmail.com';
        $mail->Password   = 'xpxfjrjgcwmzczkw'; // ✅ Your Gmail app password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('calebuniversitycujpas@gmail.com', 'CUJPAS Editorial');
        $mail->addAddress($author_email);

        $mail->isHTML(true);
        $mail->Subject = "Manuscript Review Status: $manuscript_title";
        $mail->Body = "
            Dear Author,<br><br>
            Your manuscript titled <strong>$manuscript_title</strong> has been <strong>$status</strong> by the CUJPAS editorial board.<br><br>
            Regards,<br>CUJPAS Team
        ";

        $mail->send();
    } catch (Exception $e) {
        error_log("Email Error: " . $mail->ErrorInfo);
    }

    header("Location: admin_review.php");
    exit();
}

// 📄 Fetch submitted manuscripts
$result = $conn->query("SELECT * FROM manuscripts ORDER BY id DESC");
?>

<!-- 🌐 HTML Display -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Manuscript Review</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4 text-center">CUJPAS Manuscript Review Panel</h2>

        <?php if ($result->num_rows > 0): ?>
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Author</th>
                        <th>Email</th>
                        <th>Title</th>
                        <th>Abstract</th>
                        <th>File</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= htmlspecialchars($row['author_name']) ?></td>
                            <td><?= htmlspecialchars($row['author_email']) ?></td>
                            <td><?= htmlspecialchars($row['title']) ?></td>
                            <td><?= nl2br(htmlspecialchars($row['abstract'])) ?></td>
                            <td>
                                <a href="<?= htmlspecialchars($row['file_path']) ?>" target="_blank" class="btn btn-sm btn-primary">Download</a>
                            </td>
                            <td>
                                <span class="badge 
                                    <?= $row['status'] === 'Accepted' ? 'bg-success' : 
                                        ($row['status'] === 'Rejected' ? 'bg-danger' : 'bg-secondary') ?>">
                                    <?= $row['status'] ?>
                                </span>
                            </td>
                            <td>
                                <form method="POST" class="d-flex gap-2">
                                    <input type="hidden" name="manuscript_id" value="<?= $row['id'] ?>">
                                    <button type="submit" name="action" value="accept" class="btn btn-success btn-sm">Accept</button>
                                    <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm">Reject</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center">No manuscript submissions yet.</p>
        <?php endif; ?>

        <div class="text-center mt-4">
            <a href="index.html" class="btn btn-outline-dark">Back to Home</a>
        </div>
    </div>
</body>
</html>

<?php $conn->close(); ?>
