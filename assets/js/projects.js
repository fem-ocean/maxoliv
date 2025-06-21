document.addEventListener("DOMContentLoaded", function () {
  const carousels = document.querySelectorAll(".project-carousel");

  carousels.forEach((carousel) => {
    const container = carousel.querySelector(".project-carousel-container");
    const cards = carousel.querySelectorAll(".project-card");
    const prevBtn = carousel.querySelector(".project-carousel-prev");
    const nextBtn = carousel.querySelector(".project-carousel-next");
    let currentIndex = 0;

    // Initialize - hide all cards except first
    cards.forEach((card, index) => {
      if (index !== 0) {
        card.style.display = "none";
      }
    });

    // Navigation functions
    function showCard(index) {
      // Animate out current card
      if (cards[currentIndex]) {
        cards[currentIndex].style.animation = "slideOut 0.5s forwards";
        setTimeout(() => {
          cards[currentIndex].style.display = "none";
          cards[currentIndex].style.animation = "";
        }, 500);
      }

      // Animate in new card
      currentIndex = index;
      cards[currentIndex].style.display = "block";
      cards[currentIndex].style.animation = "slideIn 0.5s forwards";
    }

    function nextCard() {
      const newIndex = (currentIndex + 1) % cards.length;
      showCard(newIndex);
    }

    function prevCard() {
      const newIndex = (currentIndex - 1 + cards.length) % cards.length;
      showCard(newIndex);
    }

    // Event listeners
    nextBtn.addEventListener("click", nextCard);
    prevBtn.addEventListener("click", prevCard);
  });
});
