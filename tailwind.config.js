/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./templates/*.php", "./content/*.md", "./content/**/*.md"],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}

