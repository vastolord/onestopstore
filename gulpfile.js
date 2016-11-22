const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

// elixir(mix => {
//     mix.sass('app.scss')
//        .webpack('app.js');
// });


elixir(function(mix) {
	mix.sass('app.scss')


	.styles([
		'appstyle.css',
        'bootstrap.css',
        'font-awesome.css',
        'styles.css',
    ],'./public/css/libs.css')
    


    .styles([
        'dashboard/blog-post.css',
        'dashboard/bootstrap.min.css',
        'dashboard/font-awesome.css',
        'dashboard/metisMenu.css',
        'dashboard/sb-admin-2.css',
        'dashboard/timeline.css',
    ],'./public/css/libs-dash.css')



    .scripts([
        'jquery-2.1.4.min.js',
        'bootstrap.min.js',
        'scripts.js',

    ],'./public/js/libs.js')


        .scripts([
        'dashboard/jquery.js',
        'dashboard/bootstrap.min.js',
        'dashboard/metisMenu.js',
        'dashboard/sb-admin-2.js',
    ],'./public/js/libs-dash.js')

});