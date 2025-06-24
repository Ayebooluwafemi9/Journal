<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  body {
  font-family: "Segoe UI", sans-serif;
  background-color: #f8f9fa;
  color: #333;
}
.nav-item:hover .dropdown-menu {
  display: block;
  transition: all 0.3s;
}
.nav-item-special:hover .dropdown-menu {
  display: block;
  transition: all 0.3s;
}
.dropdown-menu {
  display: none;
  border: 1px solid black;
}
.dropdown-menu .dropdown-item:hover {
  color: blue;
  transition: all 0.3s;
}
.active{
  color: #007bff !important; /* Bootstrap primary color */
  font-weight: bold;
}

</style>
<body>
  <header class="container-fluid bg-white py-2 px-5">
  <div class="logo-container d-flex justify-content-between align-item-center">
    <div class="logo p-2">
      <img src="/Journal/image/original caleb logo.jpg" alt="" height="80">
    </div>
    <div class="logo-2 p-1">
      <img src="/Journal/image/copas logo.jpg" alt="" height="100" width="100">
    </div>
  </div>

  <!-- Nav Section -->
  <nav class="navbar navbar-expand-sm navbar-dark">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon text-dark bg-dark"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav mt-4 ps-3 gap-2">
        <li class="nav-item">
          <a class="nav-link text-dark" href="/Journal/about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="/Journal/announcement/announcement.php">Announcement</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#" data-bs-toggle="dropdown">Conference</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/Journal/college_conference.php">College Conference</a></li>
            <li><a class="dropdown-item" href="/Journal/school_conference.php">School Conference</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="/Journal/ED.php">Editorial Board</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="/Journal/article.php">Author's Guide</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="/Journal/submit-manuscript.php">Manuscript Submission</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="/Journal/conttact.php">Contact Us</a>
        </li>
      </ul>
    </div>
    <div class="buuton mt-3">
      <a href="/Journal/login.php" class="bg-primary text-decoration-none text-white text-center px-5 py-1 border rounded-pill">Login</a>
    </div>
  </nav>
</header>

</body>
</html>
