/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./app/Views/**/*.{html,php,js}', './app/Views/pages/**/*.{html,php,js}'],
  theme: {
    extend: {},
  },
  plugins: [
    require("daisyui"),

  ],


}

