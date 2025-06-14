// About section animation
document.addEventListener("DOMContentLoaded", function () {
  const aboutSection = document.getElementById("about-section");

  if (aboutSection) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            aboutSection.style.opacity = "1";
            aboutSection.style.transform = "translateY(0)";
          }
        });
      },
      { threshold: 0.1 }
    );

    observer.observe(aboutSection);
  }
});
