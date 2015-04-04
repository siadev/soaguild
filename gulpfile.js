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
    mix.copy('bower/assets/angular/angular.min.js', 'public/js/angular.min.js');
    // current

    mix.sass('app.scss');

    mix.styles([
        'app.css'
    ], 'public/css/styles.css', 'public/css');

    mix.scripts([
        'main.js',
        'nav.js'
    ], 'public/js/scripts.js', 'public/js');

    mix.version([
        "public/css/styles.css",
        "public/js/scripts.js"
    ]);


});

