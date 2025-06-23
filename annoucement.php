<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "store");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch announcements
$result = $conn->query("SELECT * FROM announcements ORDER BY event_date DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Conference Announcements</title>
  <link rel="stylesheet" href="../includes/styles.css"> <!-- Optional: If you have CSS -->
</head>
<body>
  <h2 style="text-align: center; margin-top: 20px;">Conference Announcements</h2>

  <div style="max-width: 800px; margin: auto;">
    <?php if ($result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <div style="border:1px solid #ccc; padding:15px; margin:15px 0; border-radius: 6px;">
          <h3><?= htmlspecialchars($row['title']) ?> (<?= htmlspecialchars($row['conference_type']) ?>)</h3>
          <p><?= nl2br(htmlspecialchars($row['description'])) ?></p>
          <p><strong>Date:</strong> <?= htmlspecialchars($row['event_date']) ?></p>
          <?php if (!empty($row['flyer_path'])): ?>
            <img src="<?= htmlspecialchars($row['flyer_path']) ?>" alt="Flyer" style="width:100%; max-width: 300px; border-radius: 5px;">
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>No announcements yet.</p>
    <?php endif; ?>
  </div>
</body>
</html>

