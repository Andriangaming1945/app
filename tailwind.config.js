const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        fontFamily: {
            primary: ["Roboto", ...defaultTheme.fontFamily.sans], // Applying Roboto with fallback fonts
            body: ["Roboto", ...defaultTheme.fontFamily.sans], // Applying Roboto to the body
        },
        container: {
            padding: {
                DEFAULT: "1rem",
                lg: "3rem",
            },
        },
        extend: {
            colors: {
                crimson: "#D80032", 
                dark: "#000000",  
                gold: "#FFD700", 
                slate: colors.slate, 
                accent: {
                    DEFAULT: "#ac6b34",
                    hover: "#D80032",
                },
                paragraph: "#878e99",
                blue: colors.blue,
                indigo: colors.indigo,
                green: colors.green,
                red: colors.red,
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
