/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/views/vendor/pagination/*.blade.php",
    ],
    theme: {
        screens: {
            sm: "576px",
            md: "960px",
            lg: "1440px",
        },
    },
    plugins: [],
};
