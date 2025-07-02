document.addEventListener("DOMContentLoaded", function () {
  const themeDots = document.querySelectorAll(".theme-dot");

  function setTheme(theme) {
    const themes = ['theme-pink', 'theme-yellow', 'theme-green', 'theme-dark'];
    document.body.classList.remove(...themes);
    if (themes.includes(theme)) {
      document.body.classList.add(theme);
    }
  }

  if (themeDots.length) {
    themeDots.forEach((dot) => {
      dot.addEventListener("click", function () {
        const theme = this.dataset.theme;
        const color = this.style.backgroundColor;
        const overlayColor = this.style.backgroundColor;
        const fontTextColor = this.style.color;

        // Set a cookie or localStorage
        localStorage.setItem("maxoliv-theme", theme);
        localStorage.setItem("maxoliv-theme-color", color);

        setTheme('theme-' + theme);

        // Dispatch event for other scripts
        document.dispatchEvent(
          new CustomEvent("maxoliv-theme-change", {
            detail: { theme, color, overlayColor, fontTextColor },
          })
        );
      });
    });
  }
});
// This script handles the theme switching functionality for the Maxoliv website.
// It listens for clicks on elements with the class "theme-dot" and changes the theme accordingly.
