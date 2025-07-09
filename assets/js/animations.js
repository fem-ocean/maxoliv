/**
 * Loading animation handler for Maxoliv theme
 * @package Maxoliv
 */

// About section animation
// document.addEventListener("DOMContentLoaded", function () {
//   const aboutSection = document.getElementById("about-section");

//   if (aboutSection) {
//     const observer = new IntersectionObserver(
//       (entries) => {
//         entries.forEach((entry) => {
//           if (entry.isIntersecting) {
//             aboutSection.style.opacity = "1";
//             aboutSection.style.transform = "translateY(0)";
//           }
//         });
//       },
//       { threshold: 0.1 }
//     );

//     observer.observe(aboutSection);
//   }
// });

// **************Loading Animation********************

// Loading Animation - Production Ready
document.addEventListener("DOMContentLoaded", () => {
  const loadingOverlay = document.querySelector(".loading-overlay");
  if (!loadingOverlay) return;

  // Animation sequence (total duration: ~3.6s)
  const startTime = Date.now();

  const animationSequence = () => {
    loadingOverlay.classList.add('animate-out');
    setTimeout(() => {
      loadingOverlay.remove(); // Better than display: none
    }, 800); // Matches reveal animation duration
  };

  setTimeout(animationSequence, 3600); // 1s appear + 2.5s grow + 0.1s buffer
});
 
