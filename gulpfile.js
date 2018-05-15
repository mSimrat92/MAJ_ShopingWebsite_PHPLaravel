const elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing product resources.
 |
 */

elixir(mix => {
    mix.sass('app.scss');
    mix.copy('resources/assets/product/bootstrap/fonts', 'public/fonts');
    mix.copy('resources/assets/product/font-awesome/fonts', 'public/fonts')
    mix.styles([
        'resources/assets/product/bootstrap/css/bootstrap.css',
        'resources/assets/product/animate/animate.css',
        'resources/assets/product/font-awesome/css/font-awesome.css',
    ], 'public/css/product.css', './');
    mix.scripts([
        'resources/assets/product/jquery/jquery-3.1.1.min.js',
        'resources/assets/product/bootstrap/js/bootstrap.js',
        'resources/assets/product/metisMenu/jquery.metisMenu.js',
        'resources/assets/product/slimscroll/jquery.slimscroll.min.js',
        'resources/assets/product/pace/pace.min.js',
        'resources/assets/js/app.js'
    ], 'public/js/app.js', './');

});
