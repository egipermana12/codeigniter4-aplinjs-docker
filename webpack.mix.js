// webpack.mix.js

let mix = require('laravel-mix');

mix.js("src/js/dist.js", "public/dist")
  .js("src/js/aplineGlobal.js", "public/dist")
  .postCss("src/css/app.css", "public/css", [
    require("tailwindcss"),
  ]);
