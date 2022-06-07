const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.setPublicPath('./wp-content/themes/dw/public')
    .js('wp-content/themes/dw/resources/ts/script.ts', 'wp-content/themes/dw/public/js/').sourceMaps()
    .sass('wp-content/themes/dw/resources/sass/main.scss', 'wp-content/themes/dw/public/css/').sourceMaps()
    .options({
        processCssUrls: false
    })
    .browserSync({
        proxy: 'http://portfolio-repogithub.test/',
        notify: false
    })
    .version();
