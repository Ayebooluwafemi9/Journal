<?php
include 'db_connection.php';
$result = $conn->query("SELECT * FROM announcements ORDER BY event_date DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Announcements</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .announcement {
            border: 1px solid #ccc;
            margin: 15px;
            padding: 20px;
            border-radius: 8px;
            transition: transform 0.5s;
        }
        .announcement img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Journal Announcements</h1>
    <?php while($row = $result->fetch_assoc()): ?>
        <div class="announcement" data-aos="fade-up">
            <h3><?= htmlspecialchars($row['title']) ?></h3>
            <img src="uploads/<?= htmlspecialchars($row['image']) ?>" alt="Event Flyer">
            <p><?= nl2br(htmlspecialchars($row['message'])) ?></p>
            <small>Event Date: <?= $row['event_date'] ?></small>
        </div>
    <?php endwhile; ?>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
</body>
</html>

