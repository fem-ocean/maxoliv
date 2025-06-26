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

        // Update burger circle color
        // const burgerCircle = document.querySelector(".burger-circle");
        // if (burgerCircle) {
        //   burgerCircle.style.backgroundColor = color;
        // }

        //update right panel first section overlay color
        // const rightPanelOverlay = document.querySelector(
        //   ".right-panel .overlay"
        // );
        // if (rightPanelOverlay) {
        //   // Convert the color to rgba with 0.3 opacity
        //   let rgbaColor = color;
        //   // If color is in rgb or hex, convert to rgba
        //   if (color.startsWith("rgb(")) {
        //     // rgb(r, g, b) -> rgba(r, g, b, 0.3)
        //     rgbaColor = color.replace(/^rgb\(([^)]+)\)/, "rgba($1, 0.3)");
        //   } else if (color.startsWith("#")) {
        //     // Convert hex to rgba
        //     const hex = color.replace("#", "");
        //     let r = 0,
        //       g = 0,
        //       b = 0;
        //     if (hex.length === 3) {
        //       r = parseInt(hex[0] + hex[0], 16);
        //       g = parseInt(hex[1] + hex[1], 16);
        //       b = parseInt(hex[2] + hex[2], 16);
        //     } else if (hex.length === 6) {
        //       r = parseInt(hex.substring(0, 2), 16);
        //       g = parseInt(hex.substring(2, 4), 16);
        //       b = parseInt(hex.substring(4, 6), 16);
        //     }
        //     rgbaColor = `rgba(${r}, ${g}, ${b}, 0.3)`;
        //   }
        //   rightPanelOverlay.style.backgroundColor = rgbaColor;
        // }

        // // Update testimonial section background color
        // const testimonialSection = document.getElementById("testimonials-section");
        // if (testimonialSection) {
        //   testimonialSection.style.backgroundColor = color;
        // }

        //Update left panel text and button color
        // const leftPanelInfo = document.querySelector(".left-panel__info");
        // const leftPanelBtn = document.querySelector(".left-panel__button");
        // console.log(leftPanelInfo)
        // if (leftPanelInfo) {
        //   const textElements = leftPanelInfo.querySelectorAll("h1, h2, p");
        //   textElements.forEach((el) => {
        //     el.style.color = theme === "dark" ? "#fff" : color;
        //   });

        //   leftPanelBtn.style.color = theme === "dark" ? "#fff" : fontTextColor;
        //   leftPanelBtn.style.borderColor = theme === "dark" ? "#fff" : fontTextColor;
        
          // Instead, add/remove a CSS class and define the hover effect in your CSS file.

          // Add a class to the button for the current theme
          // leftPanelBtn.classList.remove("theme-dark-btn", "theme-light-btn");
          // leftPanelBtn.classList.add(`theme-${theme}-btn`);

          // In your CSS, define the hover styles for each theme, for example:
          

        // Add class to body
        // document.body.classList.remove(
        //   "theme-light",
        //   "theme-dark",
        //   "theme-blue"
        // );
        // document.body.classList.add(`theme-${theme}`);

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
