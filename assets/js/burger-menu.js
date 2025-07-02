document.addEventListener("DOMContentLoaded", function () {
  const burgerToggle = document.getElementById("burger-toggle");
  const burgerMenu = document.querySelector(".burger-menu-overlay");
  const circleReveal = document.getElementById("circle-reveal");

  if (burgerToggle && burgerMenu && circleReveal) {
    burgerToggle.addEventListener("click", function () {
      const isExpanded = this.getAttribute("aria-expanded") === "true";
      this.setAttribute("aria-expanded", !isExpanded);
      burgerMenu.classList.toggle("active");

      // Toggle body scroll
      document.body.style.overflow = isExpanded ? "" : "hidden";

      // Animate circle reveal
      if (!isExpanded) {
        circleReveal.style.transform = "scale(0)";
        circleReveal.style.opacity = "0";
        setTimeout(() => {
          circleReveal.style.transform = "scale(3)";
          circleReveal.style.opacity = "1";
        }, 10);
      } else {
        circleReveal.style.transform = "scale(0)";
        circleReveal.style.opacity = "0";
      }
    });

    // Close when clicking outside
    document.addEventListener("click", function (e) {
      if (!burgerToggle.contains(e.target) && burgerMenu.contains(e.target)) {
        burgerToggle.setAttribute("aria-expanded", "false");
        burgerMenu.classList.remove("active");
        document.body.style.overflow = "";

        // Reset circle reveal
        circleReveal.style.transform = "scale(0)";
        circleReveal.style.opacity = "0";
      }
    });

    //close when escape button is pressed
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape" && burgerMenu.classList.contains("active")) {
        burgerToggle.setAttribute("aria-expanded", "false");
        burgerMenu.classList.remove("active");
        document.body.style.overflow = "";

        // Reset circle reveal
        circleReveal.style.transform = "scale(0)";
        circleReveal.style.opacity = "0";
      }
    });

    document.querySelectorAll(".burger-menu-item").forEach((item) => {
      item.addEventListener("click", function () {
        const section = this.dataset.section;
        const target = document.getElementById(section + "-section");
        const rightPanel = document.getElementById("right-panel");
        const scrollableSections = document.querySelector(
          ".scrollable-sections"
        );
        const mobileScrollableSections =
          document.querySelector(".mobile-scrollable");

        if (target) {
          // Close menu
          burgerToggle.setAttribute("aria-expanded", "false");
          burgerMenu.classList.remove("active");
          document.body.style.overflow = "";

          // Calculate correct scroll position
          if (window.innerWidth <= 1024) {
            console.log("mobile scrolling")
            const y =
              Array.from(mobileScrollableSections.children).findIndex(
                (child) => child === target
              ) * window.innerHeight;
              console.log(y)
            // Scroll the container
            mobileScrollableSections.scrollTo({
              top: y,
              behavior: "smooth",
            });
          } else {
            const y =
              Array.from(scrollableSections.children).findIndex(
                (child) => child === target
              ) * window.innerHeight;
            // Scroll the container
            scrollableSections.scrollTo({
              top: y,
              behavior: "smooth",
            });
          }

          // Debugging
          // console.log("Calculated scroll position:", y);
          // console.log("Target offsetTop:", target.offsetTop);
          // console.log("Container scrollTop:", scrollableSections.scrollTop);
        }
      });
    });
  }
});
