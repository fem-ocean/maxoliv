// class BurgerMenu {
//   constructor() {
//     this.menuOpen = false;
//     this.init();
//   }

//   init() {
//     this.cacheElements();
//     this.setupEventListeners();
//   }

//   cacheElements() {
//     this.burgerButton = document.getElementById("hamburger");
//     this.menuOverlay = document.querySelector(".burger-menu-overlay");
//     this.menuItems = document.querySelectorAll(".burger-menu-item");
//   }

//   setupEventListeners() {
//     // Toggle menu
//     this.burgerButton.addEventListener("click", () => this.toggleMenu());

//     // Close menu when clicking outside
//     document.addEventListener("click", (e) => {
//       const isClickInside =
//         this.burgerButton.contains(e.target) ||
//         document.getElementById("burger-menu-modal").contains(e.target);'
//         '

//       if (!isClickInside && this.menuOpen) {
//         this.closeMenu();
//       }
//     });

//     // Handle menu item clicks
//     this.menuItems.forEach((item) => {
//       item.addEventListener("click", () => {
//         const section = item.dataset.section;
//         this.closeMenu();
//         this.scrollToSection(section);
//       });
//     });
//   }

//   toggleMenu() {
//     this.menuOpen = !this.menuOpen;
//     if (this.menuOpen) {
//       this.menuOverlay.classList.add("active");
//     } else {
//       this.menuOverlay.classList.remove("active");
//     }
//   }

//   closeMenu() {
//     this.menuOpen = false;
//     this.menuOverlay.classList.remove("active");
//   }

//   scrollToSection(section) {
//     const sectionElement = document.getElementById(section + "-section");
//     if (sectionElement) {
//       sectionElement.scrollIntoView({
//         behavior: "smooth",
//         block: "start",
//       });
//     }
//   }
// }

// // Initialize when DOM is ready
// document.addEventListener("DOMContentLoaded", () => {
//   new BurgerMenu();
// });




// document.addEventListener("DOMContentLoaded", function () {
//   const burgerToggle = document.getElementById("burger-toggle");
//   const burgerMenu = document.querySelector(".burger-menu-overlay");
//   const circleReveal = document.getElementById("circle-reveal");

//   if (burgerToggle && burgerMenu && circleReveal) {
//     burgerToggle.addEventListener("click", function () {
//       const isExpanded = this.getAttribute("aria-expanded") === "true";
//       this.setAttribute("aria-expanded", !isExpanded);
//       burgerMenu.classList.toggle("active");

//       // Toggle body scroll
//       document.body.style.overflow = isExpanded ? "" : "hidden";

//       // Animate circle reveal
//       if (!isExpanded) {
//         circleReveal.style.transform = "scale(0)";
//         circleReveal.style.opacity = "0";
//         setTimeout(() => {
//           circleReveal.style.transform = "scale(3)";
//           circleReveal.style.opacity = "1";
//         }, 10);
//       } else {
//         circleReveal.style.transform = "scale(0)";
//         circleReveal.style.opacity = "0";
//       }
//     });

//     // Close when clicking outside
//     document.addEventListener("click", function (e) {
//       if (!burgerToggle.contains(e.target) && !burgerMenu.contains(e.target)) {
//         burgerToggle.setAttribute("aria-expanded", "false");
//         burgerMenu.classList.remove("active");
//         document.body.style.overflow = "";

//         // Reset circle reveal
//         circleReveal.style.transform = "scale(0)";
//         circleReveal.style.opacity = "0";
//       }
//     });

//     // Handle menu item clicks
//     document.querySelectorAll(".burger-menu-item").forEach((item) => {
//       item.addEventListener("click", function () {
//         const section = this.dataset.section;
//         const target = document.getElementById(section + "-section");

//         if (target) {
//           // Close menu
//           burgerToggle.setAttribute("aria-expanded", "false");
//           burgerMenu.classList.remove("active");
//           document.body.style.overflow = "";

//           // Scroll to section
//           setTimeout(() => {
//             target.scrollIntoView({
//               behavior: "smooth",
//               block: "start",
//             });
//           }, 300);
//         }
//       });
//     });
//   }
// });






// class BurgerMenu {
//   constructor() {
//     this.menuOpen = false;
//     this.init();
//   }

//   init() {
//     this.cacheElements();
//     this.setupEventListeners();
//   }

//   cacheElements() {
//     this.burgerButton = document.getElementById("hamburger");
//     this.menuOverlay = document.querySelector(".burger-menu-overlay");
//     this.menuItems = document.querySelectorAll(".burger-menu-item");
//   }

//   setupEventListeners() {
//     // Toggle menu
//     this.burgerButton.addEventListener("click", () => this.toggleMenu());

//     // Close menu when clicking outside
//     document.addEventListener("click", (e) => {
//       const isClickInside =
//         this.burgerButton.contains(e.target) ||
//         document.getElementById("burger-menu-modal").contains(e.target);'
//         '

//       if (!isClickInside && this.menuOpen) {
//         this.closeMenu();
//       }
//     });

//     // Handle menu item clicks
//     this.menuItems.forEach((item) => {
//       item.addEventListener("click", () => {
//         const section = item.dataset.section;
//         this.closeMenu();
//         this.scrollToSection(section);
//       });
//     });
//   }

//   toggleMenu() {
//     this.menuOpen = !this.menuOpen;
//     if (this.menuOpen) {
//       this.menuOverlay.classList.add("active");
//     } else {
//       this.menuOverlay.classList.remove("active");
//     }
//   }

//   closeMenu() {
//     this.menuOpen = false;
//     this.menuOverlay.classList.remove("active");
//   }

//   scrollToSection(section) {
//     const sectionElement = document.getElementById(section + "-section");
//     if (sectionElement) {
//       sectionElement.scrollIntoView({
//         behavior: "smooth",
//         block: "start",
//       });
//     }
//   }
// }

// // Initialize when DOM is ready
// document.addEventListener("DOMContentLoaded", () => {
//   new BurgerMenu();
// });




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

    // Handle menu item clicks
    // document.querySelectorAll(".burger-menu-item").forEach((item) => {
    //   item.addEventListener("click", function () {
    //     const section = this.dataset.section;
    //     const target = document.getElementById(section + "-section");
    //     const rightPanel = document.getElementById("right-panel");

    //     if (target) {
    //       // Close menu
    //       burgerToggle.setAttribute("aria-expanded", "false");
    //       burgerMenu.classList.remove("active");
    //       document.body.style.overflow = "";

    //       // Scroll to section
    //       // setTimeout(() => {
    //       //   target.scrollIntoView({
    //       //     behavior: "smooth",
    //       //     block: "start",
    //       //   });
    //       // }, 300);
    //       //Debugging logs
    //       console.log("Scrolling to section:", section);
    //       console.log('scroll Container exists:', !!rightPanel);
    //       console.log('Container Height:', rightPanel.clientHeight);
    //       console.log('Section Height:', target.clientHeight);
    //       console.log('Section Top:', target.getBoundingClientRect().top);
    //       console.log('Right Panel Scroll Top:', rightPanel.scrollTop);
    //       console.log('Right Panel Page Y Offset:', rightPanel.pageYOffset);
    //       console.log('window Inner Height:', window.innerHeight);

    //       const offset = 80;
    //       const y =
    //         target.getBoundingClientRect().top;
    //       rightPanel.scrollTo({ top: y, behavior: "smooth" });
    //     }
    //   });

    


          // scrollToSection(section) {
          //   const sectionElement = document.getElementById(section + "-section");
          //   if (sectionElement) {
          //     sectionElement.scrollIntoView({
          //       behavior: "smooth",
          //       block: "start",
          //     });
          //   }
          // };

          

        
      
    // });

    document.querySelectorAll(".burger-menu-item").forEach((item) => {
      item.addEventListener("click", function () {
        const section = this.dataset.section;
        const target = document.getElementById(section + "-section");
        const rightPanel = document.getElementById("right-panel");
        const scrollableSections = document.querySelector(
          ".scrollable-sections"
        );

        if (target) {
          // Close menu
          burgerToggle.setAttribute("aria-expanded", "false");
          burgerMenu.classList.remove("active");
          document.body.style.overflow = "";

          // Calculate correct scroll position
          const offset = 80; // Adjust this if needed
          // const y = target.offsetTop;
          const y = Array.from(scrollableSections.children).findIndex(child => child === target) * window.innerHeight;


          // Scroll the container
          scrollableSections.scrollTo({
            top: y,
            behavior: "smooth",
          });

          // Debugging
          console.log("Calculated scroll position:", y);
          console.log("Target offsetTop:", target.offsetTop);
          console.log("Container scrollTop:", scrollableSections.scrollTop);
        }
      });
    });

 };
});