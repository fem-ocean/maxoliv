/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php", "./template-parts/**/*.php", "./assets/js/**/*.js"],
  theme: {
    extend: {
      colors: {
        primary: "#fd8e8e",
        secondary: "#2e304b",
        dark: "#0A090C",
      },
      fontFamily: {
        sans: ["Poppins", "sans-serif"],
      },
      animation: {
        "loading-line":
          "loading-grow 2.5s cubic-bezier(0.3,0.7,0.4,0.9) forwards",
      },
      keyframes: {
        "loading-grow": {
          "0%": { height: "15%" },
          "100%": { height: "100%" },
        },
      },
      gridTemplateColumns: {
        "cert-grid": "repeat(auto-fit, minmax(162px, 1fr))",
      },
    },
  },
  plugins: [],
};

