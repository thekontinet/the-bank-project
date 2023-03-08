const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

colors.gray[1000] = colors.gray[700]

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                primary: colors.red,
                muted: colors.gray
            }
        },
    },

    plugins: [require('@tailwindcss/forms'),  require('@tailwindcss/typography'),],
};
