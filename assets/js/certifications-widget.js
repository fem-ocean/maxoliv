
document.addEventListener("DOMContentLoaded", function () {
  const cards = document.querySelectorAll(".certification-card");
  const overlay = document.querySelector(".cert-section-overlay");
  const closeButton = overlay.querySelector(".close-overlay");

  cards.forEach((card) => {
    card.addEventListener("click", function () {
      const name = this.getAttribute("data-name");
      const description = this.getAttribute("data-description");
      const link = this.getAttribute("data-certification-link");
      console.log(name, description, link);

      // Update overlay content
      overlay.querySelector(".overlay-title").textContent = name;
      overlay.querySelector(".overlay-description").textContent = description;

      // Update link
      const overlayLink = overlay.querySelector(".overlay-link");
      overlayLink.href = link;

      // Show overlay
      overlay.classList.add("active");
      overlay.style.opacity = "1";
      overlay.style.display = "flex";
    });
  });

  // Close overlay when clicking outside
  overlay.addEventListener("click", function (e) {
    if (e.target === this) {
      this.classList.remove("active");
      this.style.opacity = "0";
      this.style.display = "none";
    }
  });

  // Close overlay when clicking the close button
  closeButton.addEventListener("click", function (e) {
    e.stopPropagation(); // Prevent the click from bubbling up to the overlay
    overlay.classList.remove("active");
    overlay.style.opacity = "0";
    overlay.style.display = "none";
  });

  //close overlay when pressing the escape key
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && overlay.classList.contains("active")) {
      overlay.classList.remove("active");
      overlay.style.opacity = "0";
      overlay.style.display = "none";
    }
  });
});