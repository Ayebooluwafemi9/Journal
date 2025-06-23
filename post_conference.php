<?php
session_start();

// Only allow admin
if (!isset($_SESSION['email']) || $_SESSION['email'] !== 'calebuniversitycujpas@gmail.com') {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Post Conference</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="bg-light">

  <!-- Navbar (optional) -->
  <?php include 'navbar.php'; ?> <!-- Only if you have a separate navbar file -->

  <div class="container mt-5 mb-5">
    <h2 class="text-center mb-4">Post New Conference</h2>

    <form action="submit_conference.php" method="POST" enctype="multipart/form-data" class="p-4 bg-white shadow rounded">
        <div class="mb-3">
            <label class="form-label">Conference Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter title" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Conference Description</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Enter description" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Event Date</label>
            <input type="date" name="event_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Conference Type</label>
            <select name="conference_type" class="form-select" required>
                <option value="">Select Type</option>
                <option value="School Conference">School Conference</option>
                <option value="College Conference">College Conference</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Flyer Image</label>
            <input type="file" name="flyer" class="form-control" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Post Conference</button>
    </form>

    <div class="text-center mt-4">
      <a href="admin_review.php" class="btn btn-outline-dark">Back to Admin Panel</a>
    </div>
  </div>

  <!-- Optional Footer -->
  <?php include 'footer.php'; ?> <!-- Only if you have a separate footer file -->

</body>
</html>
