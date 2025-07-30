/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php", "./template-parts/**/*.php", "./assets/js/**/*.js"],
  theme: {
    extend: {
      colors: {
        primary: "#fd8e8e",
        secondary: "#2e304b",
        dark: "#0A090C",
        transparentOverlay: "rgba(253, 142, 142, 0.3)",
      },
      fontFamily: {
        sans: ["Poppins", "sans-serif"],
      },
      animation: {
        "loading-line":
          "loading-grow 2.5s cubic-bezier(0.3,0.7,0.4,0.9) forwards",
        "fade-in-down": "fadeInDown 0.5s ease",
      },
      keyframes: {
        "loading-grow": {
          "0%": { height: "15%" },
          "100%": { height: "100%" },
        },
        "fadeInDown": {
          "0%": { opacity: "0", transform: "translateY(-20px)" },
          "100%": { opacity: "1", transform: "translateY(0)" },
        },
        "slideIn": {
          "0%": {opacity: "0", transform: "translateX(50px)"},
          "70%": {opacity: "0.8", transform: "translateX(-10px)"},
          "100%": {opacity: "1", transform: "translateX(0)"},
        },
        "slideOut": {
          "0%": {opacity: "1", transform: "translateX(0)"},
          "20%": {opacity: "0.8", transform: "translateX(-30px)"},
          "40%": {opacity: "0.6", transform: "translateX(-80px)"},
          "60%": {opacity: "0.4", transform: "translateX(-100px)"},
          "80%": {opacity: "0.2", transform: "translateX(-120px)"},
          "100%": {opacity: "0", transform: "translateX(-150px)"},
        }
      },
      gridTemplateColumns: {
        "cert-grid": "repeat(auto-fit, minmax(162px, 1fr))",
      },
    },
  },
  plugins: [],
};
