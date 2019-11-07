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

var directories = {
    'resources/img': 'public/img',
};

mix.styles([
    'resources/css/bootstrap.css',
    'resources/css/site.css',
], 'public/css/site.css', './').version();

// mix.scripts([], 'public/js/app.js', './').version();


for (directory in directories) {
    mix.copy(directory, directories[directory]);
}
