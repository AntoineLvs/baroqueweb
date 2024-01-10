// webpack.mix.js

let mix = require('laravel-mix');

//mix.js('src/app.js', 'dist').setPublicPath('dist');


require("laravel-mix-tailwind");

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

// mix.js("resources/js/app.js", "public/js/app.js")
// .sass("resources/sass/app.scss", "public/css/app.css")
// .tailwind("./tailwind.config.js")
// .sourceMaps();
// .postCss("resources/css/app.css", "public/css",

mix.js("resources/js/app.js", "public/js")
  .postCss("resources/css/app.css", "public/css", [
    require("tailwindcss"),
  ]);

if (mix.inProduction()) {
  mix.version();
}
