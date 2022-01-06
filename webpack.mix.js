const mix = require('laravel-mix');
require('laravel-mix-purgecss');

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

// mix.copy('node_modules/swiper/swiper-bundle.js','public/js');

mix.js('resources/js/app.js', 'public/js')

    .combine([
        'public/frontend/assets/js/lazysizes.min.js',
        'public/frontend/assets/js/marquee.js',
        'public/frontend/assets/js/svg-turkiye-haritasi.js',
        'node_modules/swiper/swiper-bundle.js',
        'node_modules/slick-carousel/slick/slick.js',
    ], 'public/frontend/assets/js/combine.js').extract()


.styles([
        'public/frontend/assets/css/style.css',
        'public/frontend/assets/css/weather-icons.css',
        'public/frontend/assets/css/magnific-popup.css',
        'public/frontend/assets/css/svg-turkiye-haritasi.css',
        'node_modules/swiper/swiper-bundle.css',
        'node_modules/slick-carousel/slick/slick.scss',

    ],'public/frontend/assets/css/combine.css')

    .sourceMaps();

mix.version()
.purgeCss({
    enabled: true,
});
