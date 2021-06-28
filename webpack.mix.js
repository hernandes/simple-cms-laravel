const mix = require('laravel-mix');

mix.sass('resources/admin/sass/app.scss', 'public/css/admin');

mix.js('resources/web/js/app.js', 'public/js/web')
   .sass('resources/web/sass/app.scss', 'public/css/web');
