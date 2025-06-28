
document.addEventListener("DOMContentLoaded", function () {
  const container = document.querySelector(".projects-carousel-container");
  const prevBtn = document.querySelector(".project-carousel-prev");
  const nextBtn = document.querySelector(".project-carousel-next");
  const cards = Array.from(document.querySelectorAll(".project-card"));
  const projectLinkButton = document.querySelector(".project-link");
  const projectCardContent = document.querySelector(".project-card-content")

  if (!container || cards.length === 0) return;

  // Get the background colors from the inline style of each card
  const cardColors = cards.map(
    (card) => card.style.backgroundColor || "#0cdcf7"
  );

  let currentIndex = 0;

  // Hide all cards except the current one
  function updateCarousel() {
    cards.forEach((card, i) => {
      card.style.animation = "slideOut 0.3s ease-out forwards";
      setTimeout(() => {
        card.style.display = i === currentIndex ? "block" : "none";
        card.style.margin = "0 auto"; // Center the card
        card.style.animation = "slideIn 0.4s ease-out forwards"; // Add animation for entry
      
        let bgColor = cardColors[currentIndex];
        if (bgColor.startsWith("rgb(")) {
          // Convert rgb to rgba
          bgColor = bgColor.replace("rgb(", "rgba(").replace(")", ", 0.8)");
        } else if (bgColor.startsWith("#")) {
          // Convert hex to rgba
          const hex = bgColor.replace("#", "");
          let r = 0, g = 0, b = 0;
          if (hex.length === 3) {
            r = parseInt(hex[0] + hex[0], 16);
            g = parseInt(hex[1] + hex[1], 16);
            b = parseInt(hex[2] + hex[2], 16);
          } else if (hex.length === 6) {
            r = parseInt(hex.substring(0, 2), 16);
            g = parseInt(hex.substring(2, 4), 16);
            b = parseInt(hex.substring(4, 6), 16);
          }
          bgColor = `rgba(${r}, ${g}, ${b}, 0.8)`;
        }
        card.querySelector(".project-card-content").style.backgroundColor = bgColor;
      }, 300); // Wait for animation to finish before changing display

    });
    // Update button colors to match card
    const color = cardColors[currentIndex];
    prevBtn.style.background = color;
    nextBtn.style.background = color;
    projectLinkButton.style.color = color;
  }

  // Infinite loop navigation
  function goToNext() {
    currentIndex = (currentIndex + 1) % cards.length;
    updateCarousel();
  }
  function goToPrev() {
    currentIndex = (currentIndex - 1 + cards.length) % cards.length;
    updateCarousel();
  }

  // Event listeners
  nextBtn.addEventListener("click", goToNext);
  prevBtn.addEventListener("click", goToPrev);

  document.addEventListener("keydown", function (e) {
    if (e.key === "ArrowRight") goToNext();
    if (e.key === "ArrowLeft") goToPrev();
  });

  // Initial state
  updateCarousel();
});