var elixir = require('laravel-elixir');
var targetCssDir = 'public/css';

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.copy('bower/angular/angular.min.js', 'public/js/angular.min.js');
    mix.copy('bower/jquery/dist/jquery.min.js', 'public/js/jquery.min.js');
    mix.copy('bower/jquery-ui/jquery-ui.min.js', 'public/js/jquery-ui.min.js');
    mix.copy('bower/bootstrap-sass-official/assets/javascripts/bootstrap.min.js', 'public/js/bootstrap.min.js');
    //mix.copy('', 'public/js/');


    // current

    mix.sass('styles.scss').coffee();

    mix.scripts([
        'main.js',
        'nav.js'
    ], 'public/js/scripts.js', 'resources/assets/js');

    mix.version([
        "public/css/styles.css",
        "public/js/scripts.js",
    ]);

    /* Switch out either phpunit or phpSpec
     * when using gulp tdd.
     * OR in this case we'll use both.
     */
    mix.phpUnit().phpSpec();

});

