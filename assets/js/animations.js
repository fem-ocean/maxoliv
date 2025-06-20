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



// **************Loading Animation********************
document.addEventListener('DOMContentLoaded', function() {
  const loadingOverlay = document.querySelector('.loading-overlay');
  
  // Start the animation sequence
  setTimeout(() => {
    // After line animation completes (3.6s total)
    setTimeout(() => {
      loadingOverlay.classList.add('animate-out');
      
      // Remove overlay after animation completes
      setTimeout(() => {
        loadingOverlay.style.display = 'none';
      }, 2000);
    }, 800); // This starts at 3.6s (1s delay + 2.5s growth + 0.1s buffer)
  }, 2500); // Small delay to ensure DOM is ready. ##########Dont know how this would be modified in production
});