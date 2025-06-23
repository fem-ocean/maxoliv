// document.addEventListener("DOMContentLoaded", function () {
//   const container = document.querySelector(".projects-carousel-container");

//   const prevBtn = document.querySelector(".project-carousel-prev");
//   const nextBtn = document.querySelector(".project-carousel-next");

//   const cards = Array.from(document.querySelectorAll(".project-card"));

//   if (!container || cards.length === 0) return;

//   // Get the background colors from the inline style of each card
//   const cardColors = cards.map(
//     (card) => card.style.backgroundColor || "#0cdcf7"
//   );

//   let currentIndex = 0;

//   // Hide all cards except the current one
//   function updateCarousel() {
//     cards.forEach((card, i) => {
//       card.style.display = i === currentIndex ? "block" : "none";
//       card.style.margin = "0 auto"; // Center the card
//     });
//     // Update button colors to match card
//     const color = cardColors[currentIndex];
//     prevBtn.style.background = color;
//     nextBtn.style.background = color;
//   }

//   // Infinite loop navigation
//   function goToNext() {
//     currentIndex = (currentIndex + 1) % cards.length;
//     updateCarousel();
//   }
//   function goToPrev() {
//     currentIndex = (currentIndex - 1 + cards.length) % cards.length;
//     updateCarousel();
//   }


//   // Event listeners
//   nextBtn.addEventListener("click", goToNext);
//   prevBtn.addEventListener("click", goToPrev);

//   document.addEventListener("keydown", function (e) {
//     if (e.key === "ArrowRight") goToNext();
//     if (e.key === "ArrowLeft") goToPrev();
//   });

//   // Initial state
//   updateCarousel();
// });

//   // Initialize - center the first card
//   if (cards.length > 0) {
//     container.scrollTo({
//       left: 0,
//       behavior: "smooth",
//     });
//     console.log(container);
//   }

//   // Navigation functions
//   function scrollToCard(direction) {
//     if (cards.length === 0) return;

//     if (direction === "next") {
//       currentIndex = (currentIndex + 1) % cards.length;
//     } else {
//       currentIndex = (currentIndex - 1 + cards.length) % cards.length;
//     }

//     container.scrollTo({
//       left: currentIndex * cardWidth,
//       behavior: "smooth",
//     });
//   }

//   // Event listeners
//   nextBtn.addEventListener("click", () => scrollToCard("next"));
//   prevBtn.addEventListener("click", () => scrollToCard("prev"));

//   // Keyboard navigation
//   document.addEventListener("keydown", function (e) {
//     if (e.key === "ArrowRight") scrollToCard("next");
//     if (e.key === "ArrowLeft") scrollToCard("prev");
//   });
// });




document.addEventListener("DOMContentLoaded", function () {
  const container = document.querySelector(".projects-carousel-container");
  const prevBtn = document.querySelector(".project-carousel-prev");
  const nextBtn = document.querySelector(".project-carousel-next");
  const cards = Array.from(document.querySelectorAll(".project-card"));
  const projectLinkButton = document.querySelector(".project-link");

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
        card.style.display = i === currentIndex ? "flex" : "none";
        card.style.margin = "0 auto"; // Center the card
        card.style.animation = "slideIn 0.4s ease-out forwards"; // Add animation for entry
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