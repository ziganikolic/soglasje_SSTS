/** @type {import('tailwindcss').Config} */

module.exports = {
    purge: {
        content: [
            "./resources/**/*.blade.php",
            "./resources/**/*.js",
            "./resources/**/*.vue",


            // "./resources/views/*.blade.php",
            // "./resources/**/*.js",
            // "./resources/js/views/*.vue",

        ],

    },
    darkMode: false, // or 'media' or 'class'

    theme: {
        screens: {
            'mobile': '640px',
            'sm': '640px',
            // => @media (min-width: 640px) { ... }

            'md': '768px',
            // => @media (min-width: 768px) { ... }

            'lg': '1024px',
            // => @media (min-width: 1024px) { ... }

            'xl': '1280px',
            // => @media (min-width: 1280px) { ... }

            '2xl': '1536px',
            // => @media (min-width: 1536px) { ... }
        },
        extend: {

        },

    },
    variants: {
        extend: {},
    },
    plugins: [],
}

