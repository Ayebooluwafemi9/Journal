<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/ED.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
          <!-- NAV header -->
              <?php include 'navbar.php'; ?>
          <!-- Body Section -->
          <div class="editorial-container my-4 p-3 d-flex flex-wrap">
          <img src="./image/IMG-20250517-WA0047.jpg" alt="Editor-in-Chief" class="editor-image">
          <div class="profile-info">
            <p class="name">Prof. Adesola Ajayi</p>
            <p class="title">(Editor-in-Chief)</p>
          </div>
        </div>

        <!-- Editorial board -->
        <section class="container p-5 mb-5 bg-warning">
          <h2 class="section-title">Editorial Board</h2>
            <div class="row g-4">
            <div class="col-md-6 col-lg-4">
               <div class="editor-card">
                  <h5>Prof. Ogunniran Kehinde Olurotimi</h5>
                  <p class="text-muted">Editor (Chemistry)</p>
               </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="editor-card">
                  <h5>Prof. Aregbesola Moses Kehinde</h5>
                  <p class="text-muted">Editor (Software Engineering)</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="editor-card">
                <h5>Prof. Adewale Sunday</h5>
                <p class="text-muted">Editor (Mathematics)</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="editor-card">
                  <h5>Prof. Adekunle Adeoye Eludire</h5>
                  <p class="text-muted">Editor (Computer Science)</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="editor-card">
                  <h5>Prof. Abimbola Orukutan</h5>
                  <p class="text-muted">Editor (Biology)</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="editor-card">
                  <h5>Prof.Adesanya Olaide. A</h5>
                  <p class="text-muted">Editor (Computational Mathematics)</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="editor-card">
                  <h5>Dr. Adeniyi Akanni.</h5>
                  <p class="text-muted">Editor (Cyber Security)</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="editor-card">
                  <h5>Dr. Maria Adeyemi</h5>
                  <p class="text-muted">Editor (Biochemistry)</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="editor-card">
                  <h5>Dr. Bakpa Ezenbaya</h5>
                  <p class="text-muted">Editor (Medical Microbiology)</p>
              </div>
            </div>
          </div>
        </section>

        <!-- Editorial Secretary -->
        <section class="container p-5 mb-5 bg-light">
          <h2 class="section-title">Editorial Secretary</h2>
            <div class="row g-4">
              <div class="col-md-6 col-lg-4">
                <div class="editor-card">
                    <h5>Dr. I. Oludehinwa</h5>
                     <p class="text-muted">Editor Secretary</p>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                  <div class="editor-card">
                    <h5>Dr. Ruth Olusola</h5>
                    <p class="text-muted">Assistance. Editor Secretary</p>
                  </div>
              </div>
            </div>
        </section>

        <!-- Board Advisor -->
        <section class="container p-5 mb-5 bg-success">
          <h2 class="section-title">Editorial Board Advisor</h2>
          <div class="row g-4">
            <!-- Example editor -->
            <div class="col-lg-3 col-md-6">
              <div class="editor-card">
                <h5>1.Prof. Adegbite Adegoke </h5>
                <p class="text-muted">(Nigeria)</p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="editor-card">
                <h5>2.Dr.Ragasamy Thangamuthu </h5>
                <p class="text-muted">(India)</p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="editor-card">
                <h5>3.Prof. Oluwatobi Oluwafemi </h5>
                <p class="text-muted">(South Africa)</p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="editor-card">
                <h5>4.Prof. Ibrahim M.O </h5>
                <p class="text-muted">(Nigeria)</p>
              </div>
            </div>
            <!-- Add remaining editors similarly -->
          </div>
        </section>

        <!-- Footer -->
          <?php include 'footer.php'; ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>