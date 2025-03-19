module.exports = {
  plugins: [
    require('postcss-import'),
    require('postcss-nested'),
    require('postcss-nesting'),
    require('./postcss-apply-plugin')(),
    require('@tailwindcss/postcss'),
    require('autoprefixer'),
  ],
}
