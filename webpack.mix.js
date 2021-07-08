const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
.sass('resources/scss/style.scss', 'public/assets/css/style.css')
.js('node_modules/jquery/dist/jquery.js', 'public/assets/js/jquery.js')
.js('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/assets/js/bootstrap.js')
.js('node_modules/@fortawesome/fontawesome-free/js/fontawesome.js', 'public/assets/js/fontawesome.js');
