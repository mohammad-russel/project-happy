/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: ["./*.{html,js}"],
  theme: {
    extend: {
      screens: {
        'xs': '400px',
        // => @media (min-width: 400px) { ... }
      },
    },

  },
  plugins: [],
}

