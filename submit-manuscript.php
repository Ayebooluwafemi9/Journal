<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submit Manuscript</title>
  <link rel="stylesheet" href="./css/manuscript.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <!-- header -->
    <?php include 'navbar.php'; ?>
  <!-- Body --> 
  <div class="container bg-white p-4 rounded shadow mx-auto my-5" style="max-width: 600px;">
  <h2 class="mb-4 text-center text-secondary">Submit Your Manuscript</h2>
  <form action="submit_form_handler.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Author Name</label>
      <input type="text" name="author_name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="author_email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Paper Title</label>
      <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Abstract</label>
      <textarea name="abstract" class="form-control" rows="4" required></textarea>
    </div>
    <div class="mb-3">
      <label>Upload Manuscript (PDF/DOCX)</label>
      <input type="file" name="manuscript_file" class="form-control" accept=".pdf,.doc,.docx" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Submit Manuscript</button>
  </form>
  </div>
  <!-- FOOTER SECTION -->
    <?php include 'footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
