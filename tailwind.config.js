const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

colors.gray[1000] = colors.gray[700];

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/templates/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                poppins: ["Poppins", 'sans-serif'],
                roboto: ["Roboto", 'sans-serif'],
            },
            colors: {
                primary: {
                    ...colors.red,
                    '300' : colors.red[500],
                    '400' : colors.red[500],
                    '500' : colors.red[600],
                },
                muted: colors.gray,
            },
        },
    },

    daisyui: {
        themes: [
            {
                mytheme: {
                    primary: colors.orange[500],

                    secondary: "#F000B8",

                    accent: "#37CDBE",

                    neutral: "#3D4451",

                    "base-100": "#FFFFFF",

                    info: "#3ABFF8",

                    success: "#36D399",

                    warning: "#FBBD23",

                    error: "#F87272",
                },
            },
        ],
    },

    plugins: [
        require("@tailwindcss/typography"),
        require("daisyui"),
    ],
};
