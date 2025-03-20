const defaultTheme = require('tailwindcss/defaultTheme');
const forms = require('@tailwindcss/forms');

/** @type {import('tailwindcss').Config} */
module.exports = {
    // Suppression du préfixe tw-
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
            screens: {
                'custom-sm': '640px',
                'custom-md': '768px',
                'custom-lg': '1024px',
                'custom-xl': '1280px',
                'custom-2xl': '1536px',
            },
        },
    },

    plugins: [forms],
    corePlugins: {
        preflight: false, 
    },
};
