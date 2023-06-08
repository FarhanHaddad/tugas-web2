/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/**/*.{php,html,js}", "./node_modules/flowbite/**/*.js"],
  theme: {
    extend: {
      colors: {
        pertama: "#6E85B2",
        kedua: "#5C527F",
        ketiga: "#3E2C41",
        keempat: "#261C2C",
        baru: "#0ea5e9",
        biru: "#1d4ed8",
      },
    },
  },
  plugins: [
    require("@fortawesome/fontawesome-free"),
    require("flowbite/plugin"),
  ],
};
