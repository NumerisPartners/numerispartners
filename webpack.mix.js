const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('@tailwindcss/postcss'),
        require('autoprefixer'),
    ])
    .sass('resources/styles/app.scss', 'public/css', {}, [
        require('postcss-import'),
        require('postcss-nested'),
        require('postcss-nesting'),
        require('./postcss-apply-plugin')(),
        require('autoprefixer'),
    ])
    .version();

// Disable processing URLs in CSS
mix.options({
    processCssUrls: false,
});
