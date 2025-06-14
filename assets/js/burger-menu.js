class BurgerMenu {
  constructor() {
    this.menuOpen = false;
    this.init();
  }

  init() {
    this.cacheElements();
    this.setupEventListeners();
  }

  cacheElements() {
    this.burgerButton = document.getElementById("hamburger");
    this.menuOverlay = document.querySelector(".burger-menu-overlay");
    this.menuItems = document.querySelectorAll(".burger-menu-item");
  }

  setupEventListeners() {
    // Toggle menu
    this.burgerButton.addEventListener("click", () => this.toggleMenu());

    // Close menu when clicking outside
    document.addEventListener("click", (e) => {
      const isClickInside =
        this.burgerButton.contains(e.target) ||
        document.getElementById("burger-menu-modal").contains(e.target);

      if (!isClickInside && this.menuOpen) {
        this.closeMenu();
      }
    });

    // Handle menu item clicks
    this.menuItems.forEach((item) => {
      item.addEventListener("click", () => {
        const section = item.dataset.section;
        this.closeMenu();
        this.scrollToSection(section);
      });
    });
  }

  toggleMenu() {
    this.menuOpen = !this.menuOpen;
    if (this.menuOpen) {
      this.menuOverlay.classList.add("active");
    } else {
      this.menuOverlay.classList.remove("active");
    }
  }

  closeMenu() {
    this.menuOpen = false;
    this.menuOverlay.classList.remove("active");
  }

  scrollToSection(section) {
    const sectionElement = document.getElementById(section + "-section");
    if (sectionElement) {
      sectionElement.scrollIntoView({
        behavior: "smooth",
        block: "start",
      });
    }
  }
}

// Initialize when DOM is ready
document.addEventListener("DOMContentLoaded", () => {
  new BurgerMenu();
});




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
      if (!burgerToggle.contains(e.target) && !burgerMenu.contains(e.target)) {
        burgerToggle.setAttribute("aria-expanded", "false");
        burgerMenu.classList.remove("active");
        document.body.style.overflow = "";

        // Reset circle reveal
        circleReveal.style.transform = "scale(0)";
        circleReveal.style.opacity = "0";
      }
    });

    // Handle menu item clicks
    document.querySelectorAll(".burger-menu-item").forEach((item) => {
      item.addEventListener("click", function () {
        const section = this.dataset.section;
        const target = document.getElementById(section + "-section");

        if (target) {
          // Close menu
          burgerToggle.setAttribute("aria-expanded", "false");
          burgerMenu.classList.remove("active");
          document.body.style.overflow = "";

          // Scroll to section
          setTimeout(() => {
            target.scrollIntoView({
              behavior: "smooth",
              block: "start",
            });
          }, 300);
        }
      });
    });
  }
});