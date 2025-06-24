<?php
require 'db_connection.php';
$result = $conn->query("SELECT * FROM conference_announcements WHERE conference_type = 'School Conference' ORDER BY event_date DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>School Conferences</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">School Conference Announcements</h2>

    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h4 class="card-title"><?= htmlspecialchars($row['title']) ?></h4>
                <p><strong>Date:</strong> <?= htmlspecialchars($row['event_date']) ?></p>
                <img src="<?= htmlspecialchars($row['flyer_path']) ?>" class="img-fluid mb-3" width="300">
                <p class="card-text"><?= nl2br(htmlspecialchars($row['description'])) ?></p>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

