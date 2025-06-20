// certifications-widget.js
// document.addEventListener("DOMContentLoaded", function () {
//   // Select all certification cards
//   const cards = document.querySelectorAll(".certification-card");

//   // Add event listeners for hover effects
//   cards.forEach((card) => {
//     // Mouse enter event
//     card.addEventListener("mouseenter", function () {
//       // You can add additional JavaScript animations here if needed
//       // The main hover effects are handled by CSS
//     });

//     // Mouse leave event
//     card.addEventListener("mouseleave", function () {
//       // You can add additional JavaScript animations here if needed
//     });
//   });

//   // If you need more complex animations, you could use:
//   // const overlays = document.querySelectorAll('.certification-overlay');
//   // overlays.forEach(overlay => {
//   //     // Animate with JavaScript instead of CSS
//   // });
// });

// document.addEventListener("DOMContentLoaded", function () {
//   const cards = document.querySelectorAll(".certification-card");
//   const overlayTitle = document.getElementById("overlay-title");
//   const overlayDesc = document.getElementById("overlay-description");

//   cards.forEach((card) => {
//     card.addEventListener("click", function () {
//       // Get both name and description
//       const name = this.getAttribute("data-name");
//       const description = this.getAttribute("data-description");
//       console.log(name, description);

//       // Update overlay content
//       overlayTitle.textContent = name;
//       overlayDesc.textContent = description;
//     });

//     // Mobile click event
//     card.addEventListener("click", function () {
//       const name = this.getAttribute("data-name");
//       const description = this.getAttribute("data-description");
//       const certificationLink = this.getAttribute("data-certification-link");

//       overlayTitle.textContent = name;
//       overlayDesc.textContent = description;
//       const overlayLink = document.getElementById("overlay-link");
//       overlayLink.href = certificationLink;
//       document.querySelector(".cert-section-overlay").classList.add("active");
//       document.querySelector(".cert-section-overlay").style.opacity = "1";
      
//     });
//   });

//   // Close overlay when clicking outside (optional)
//   document
//     .querySelector(".cert-section-overlay")
//     .addEventListener("click", function (e) {
//       if (e.target === this) {
//         this.classList.remove("active");
//       }
//     });
// });

// document.addEventListener("DOMContentLoaded", function () {
//   const cards = document.querySelectorAll(".certification-card");
//   const overlayDesc = document.getElementById("overlay-description");

//   cards.forEach((card) => {
//     card.addEventListener("mouseenter", function () {
//       // Get the description from data attribute
//       const description = this.getAttribute("data-description");
//       overlayDesc.textContent = description;
//       //
//     });

//     // Optional: Add click event for mobile
//     card.addEventListener("click", function () {
//       const description = this.getAttribute("data-description");
//       overlayDesc.textContent = description;
//       document.querySelector(".section-overlay").classList.add("active");
//     });
//   });

//   // Optional: Close overlay when clicking outside
//   document
//     .querySelector(".section-overlay")
//     .addEventListener("click", function (e) {
//       if (e.target === this) {
//         this.classList.remove("active");
//       }
//     });
// });



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