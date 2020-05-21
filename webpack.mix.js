const mix = require('laravel-mix');

mix.sass('resources/sass/admin/app.scss', 'public/css/admin');

mix.js('resources/js/web/app.js', 'public/js/web')
   .sass('resources/sass/web/app.scss', 'public/css/web');
