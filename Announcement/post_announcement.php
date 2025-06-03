<!DOCTYPE html>
<html>
<head>
    <title>Post Announcement</title>
    <link rel="stylesheet" href="styles.css"> <!-- optional -->
</head>
<body>
    <h2>Post a New Announcement</h2>
    <form action="save_announcement.php" method="POST" enctype="multipart/form-data">
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Message:</label><br>
        <textarea name="message" rows="5" required></textarea><br><br>

        <label>Event Date:</label><br>
        <input type="date" name="event_date" required><br><br>

        <label>Upload Flyer (Image):</label><br>
        <input type="file" name="flyer" accept="image/*" required><br><br>

        <input type="submit" value="Post Announcement">
    </form>
</body>
</html>