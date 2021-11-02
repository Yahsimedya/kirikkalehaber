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


mix.js('frontend/assets/js/svg-turkiye-haritasi.js', 'public/js')

.combine([
    'public/frontend/assets/js/lazysizes.min.js',
    'public/frontend/assets/js/marquee.js',
    'public/frontend/assets/js/svg-turkiye-haritasi.js',
], 'public/frontend/assets/js/combine.js')
    .styles([
      'public/frontend/assets/css/style.css',
      'public/frontend/assets/css/weather-icons.css',
      'public/frontend/assets/css/magnific-popup.css',
      'public/frontend/assets/css/svg-turkiye-haritasi.css',
      'public/frontend/assets/css/svg-turkiye-haritasi.css',
    ],'public/frontend/assets/css/combine.css')
    .sourceMaps();
mix.version();
