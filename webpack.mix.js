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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);

if (mix.inProduction()) {
    mix.version();
}


// mix.js('resources/js/script.js', 'public/js')
//     .postCss('resources/css/style.css', 'public/css');

// mix.styles(
//     [
//         'resources/css/style1.css',
//         'resources/css/style2.css',
//     ], 'public/css')
//     .scripts([
//             'resources/js/script1.js',
//             'resources/js/script2.js',
//         ], 'public/js'
//     );
