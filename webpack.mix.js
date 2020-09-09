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

mix.js('resources/js/app.js', 'public/js')
    .scripts([
        'resources/js/themes/dashboard/bundles/libscripts.bundle.js',
        'resources/js/themes/dashboard/bundles/vendorscripts.bundle.js',
        'resources/js/themes/dashboard/bundles/mainscripts.bundle.js',
        'resources/js/themes/js-default/inputMask-5x.js',
        'resources/js/themes/js-default/jquery-autocomplete.min.js',
        'resources/js/themes/js-default/mask.js',
        'resources/js/themes/js-default/maskMoney.js',
        'resources/js/themes/js-default/moment.min.js',
        'resources/js/themes/js-default/popper.min.js',
        'resources/js/themes/js-default/sweetalert.min.js',
        'resources/js/themes/dashboard/plugins/jquery-datatable/jquery.dataTables.js',
        'resources/js/themes/dashboard/plugins/jquery-datatable/dataTables.bootstrap4.min.js',
        'resources/js/themes/dashboard/plugins/jquery-datatable/buttons/dataTables.buttons.min.js',
        'resources/js/themes/js-default/datatable.js',
    ], 'public/js/theme/main.js')
    .sass('resources/sass/app.scss', 'public/css');
