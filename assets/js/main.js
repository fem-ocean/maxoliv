document.addEventListener("DOMContentLoaded", () => {
  // Mobile detection (replicating your React logic)
  const breakPoint = 1024;
  const checkMobile = () => window.innerWidth <= breakPoint;

  // Section refs implementation
  const sectionRefs = {
    about: document.getElementById("about-section"),
    certifications: document.getElementById("certifications-section"),
    // Add other sections...
  };

  // Smooth scrolling for anchor links
  document.querySelectorAll('.left-panel a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const targetId = this.getAttribute("href");
      const target = document.querySelector(targetId);
      console.log(target)
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }
    });
  });

  // Responsive handling (like your useEffect)
  let isMobile = checkMobile();

  const handleResize = () => {
    const nowMobile = checkMobile();
    if (nowMobile !== isMobile) {
      isMobile = nowMobile;
      // Add any logic needed when crossing breakpoint
    }
  };

  // Debounced resize listener
  let resizeTimeout;
  window.addEventListener("resize", () => {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(handleResize, 250);
  });

  // Optional: Initialize based on current view
  handleResize();
});
