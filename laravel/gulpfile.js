var elixir = require('laravel-elixir');

var bowerDir = './resources/assets/bower/';
var publicDir = './public/assets/';
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.copy(bowerDir + 'jquery/dist/jquery.min.js', publicDir + 'js/jquery.min.js')

        .copy(bowerDir + 'bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js', publicDir + 'js/bootstrap-datepicker.min.js')
        .copy(bowerDir + 'bootstrap-datepicker/dist/css/bootstrap-datepicker.standalone.css', publicDir + 'css/bootstrap-datepicker.min.css')

        .copy(bowerDir + 'bootstrap/dist/js/bootstrap.min.js', publicDir + 'js/bootstrap.min.js')
        .copy(bowerDir + 'bootswatch/cosmo/bootstrap.min.css', publicDir + 'css/bootstrap.min.css') // cosmo boostrap theme
        .copy(bowerDir + 'bootswatch/fonts', publicDir + 'fonts')

        .copy(bowerDir + 'timeago/jquery.timeago.js', publicDir + 'js/jquery.timeago.js'); // requires jquery
});
