document.addEventListener("DOMContentLoaded", function () {
  const themeDots = document.querySelectorAll(".theme-dot");

  if (themeDots.length) {
    themeDots.forEach((dot) => {
      dot.addEventListener("click", function () {
        const theme = this.dataset.theme;

        // Set a cookie or localStorage
        localStorage.setItem("maxoliv-theme", theme);

        // Add class to body
        document.body.classList.remove(
          "theme-light",
          "theme-dark",
          "theme-blue"
        );
        document.body.classList.add(`theme-${theme}`);

        // Dispatch event for other scripts
        document.dispatchEvent(
          new CustomEvent("maxoliv-theme-change", {
            detail: { theme },
          })
        );
      });
    });
  }
});
// This script handles the theme switching functionality for the MaxOliv website.
// It listens for clicks on elements with the class "theme-dot" and changes the theme accordingly.