<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About CULJPAS</title>
    <link rel="stylesheet" href="./css/about.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    </head>
    <body>

     <!-- NAV header -->
      <?php include 'navbar.php'; ?>
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide"  style="background-image:url(./image/IMG-20250518-WA0019.jpg) ">
            <div class="overlay">
              <h1 class="">CUL Journal of Pure and Applied Sciences</h1>
              <p class="lead mb-4">Official Academic Publication of Caleb University, Lagos, Nigeria</p>
              <!-- <a href="https://www.cujpas.calebuniversity.edu.ng" target="_blank" class="btn btn-light">Visit Journal Website</a> -->
            </div>
          </div>
          <div class="swiper-slide" style="background-image:url(./image/IMG-20250518-WA0051.jpg) ">
            <div class="overlay">
              <h1 class="">CUL Journal of Pure and Applied Sciences</h1>
              <p class="lead mb-4">Official Academic Publication of Caleb University, Lagos, Nigeria</p>
              <!-- <a href="https://www.cujpas.calebuniversity.edu.ng" target="_blank" class="btn btn-light">Visit Journal Website</a> -->
            </div>
          </div>
          <div class="swiper-slide" style="background-image: url(./image/IMG-20250518-WA0018.jpg)">
            <div class="overlay">
              <h1 class="">CUL Journal of Pure and Applied Sciences</h1>
              <p class="lead mb-4">Official Academic Publication of Caleb University, Lagos, Nigeria</p>
              <!-- <a href="https://www.cujpas.calebuniversity.edu.ng" target="_blank" class="btn btn-light">Visit Journal Website</a> -->
            </div>
          </div>
        </div>
      
        <!-- Pagination Dots -->
        <div class="swiper-pagination"></div>
      </div>
      
      <!-- About -->
      <section class="container py-5">
        <h2 class="section-title">About the Journal</h2>
        <div class="info-card mb-4">
          <p>
            The CUL Journal of Pure and Applied Sciences (CULJPAS) is a peer-reviewed, open-access journal published by Caleb University, Nigeria. Released quarterly in April, August, and November, it focuses on advancing knowledge in diverse science fields.
          </p>
          <p>
            It serves as a platform to disseminate research on quality products, emerging technologies, innovation policy, digital solutions, and indigenous knowledge, especially relevant to least-developed countries recognized by the UN.
          </p>
        </div>
      </section>
    
      <!-- Scope & Mission -->
      <section class="container pb-5">
        <h2 class="section-title">Scope & Mission</h2>
        <div class="info-card mb-4">
          <p>
            CULJPAS publishes original research, scholarly reviews, surveys, and experimental studies in all areas of pure and applied sciences. Its mission is to promote innovative research that contributes to sustainable societal development.
          </p>
        </div>
      </section>
    
      <!-- Publication Process -->
      <section class="container pb-5">
        <h2 class="section-title">Publication & Review Process</h2>
        <div class="info-card mb-4">
          <p>The journal adheres to a quarterly publication cycle, with issues released in "April, August, and November". All submissions undergo a double-blind peer-review process to ensure academic integrity and quality. The journal welcomes a range of manuscript types, including research articles, review papers, case studies, short communications, and letters to the editor.
          Manuscripts must be written in British English and are subject to a plagiarism threshold of 10% or less, as part of the journal’s commitment to originality. All published content is made available under an Open Access model, providing unrestricted access to readers worldwide.</p>
        </div>
      </section>
    
      <!-- Footer -->
        <?php include 'footer.php'; ?>
      <!-- js -->
       <script>
        document.addEventListener("DOMContentLoaded", function () {
  var swiper = new Swiper(".mySwiper", {
    loop: true, // Infinite loop
    autoplay: {
      delay: 4000, // 4 seconds before changing slides
      disableOnInteraction: false,
    },
    effect: "fade", // Smooth fade effect
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    speed: 1500,
  });

  console.log("Swiper initialized:", swiper); // Check if Swiper is created
});
       </script>
          <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
      <!-- Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>