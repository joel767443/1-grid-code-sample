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
    'resources/css': 'public/css',
    'resources/js': 'public/js',
    'resources/font-awesome': 'public/font-awesome',
    'resources/fonts':'public/fonts',
};

mix.styles([
    'resources/css/bootstrap.css',
    'resources/css/site.css',
], 'public/css/site.css', './').version();

mix.styles([
    'resources/css/admin.css',
], 'public/css/admin.css', './').version();

mix.scripts([
    // 'resources/js/jquery-3.1.1.min.js',
//     'resources/js/bootstrap.min.js',
//     'resources/js/plugins/metisMenu/jquery.metisMenu.js',
//     'resources/js/plugins/slimscroll/jquery.slimscroll.min.js',
//     'resources/js/inspinia.js',
//     'resources/js/plugins/pace/pace.min.js',
], 'public/js/app.js', './').version();


for (directory in directories) {
    mix.copy(directory, directories[directory]);
}
