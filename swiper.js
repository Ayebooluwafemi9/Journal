var swiper = new Swiper(".mySwiper", {
  loop: true, // Infinite loop
  autoplay: {
    delay: 4000, // 4-second delay before changing slides
    disableOnInteraction: false, // Keeps autoplay active
  },
  effect: "fade", // Smooth fade effect between slides
  pagination: {
    el: ".swiper-pagination",
    clickable: true, // Allows clicking pagination dots
  },
  speed: 1500, // Controls the transition speed
});

  