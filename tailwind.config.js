/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        customBlue: 'rgba(58, 70, 94, 1)', // Tambahkan warna custom
      },
    },
  },
  plugins: [],
};
