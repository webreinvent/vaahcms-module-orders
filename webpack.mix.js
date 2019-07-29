const mix = require('laravel-mix');
var fs = require('fs');
const fs_extra = require('fs-extra');



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

var path = __dirname+'/Resources/assets/';
var path_vue = __dirname+"/";

mix.setPublicPath(path_vue);

mix.js(path+'vue/app.js',  './Resources/assets/builds').version();


mix.webpackConfig({
    watchOptions: {
        aggregateTimeout: 2000,
        poll: 20,
        ignored: [
            '/Config/',
            '/Database/',
            '/Entities/',
            '/Helpers/',
            '/Http/',
            '/Providers/',
            '/Resources/',
            '/Routes/',
            '/node_modules/',
            '/vendor/',

        ]
    }
});