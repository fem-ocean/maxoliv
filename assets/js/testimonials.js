document.addEventListener("DOMContentLoaded", function () {
  const testimonialsSwiper = new Swiper(".testimonials-swiper", {
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
  });
});
