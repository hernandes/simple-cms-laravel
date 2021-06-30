<?php
namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{

    public function boot()
    {
        Blade::directive('navigation', function ($expression) {
            if (strpos($expression, '[') !== false) {
                $menu = trim(str_replace(',', '', substr($expression, 0, strpos($expression, '['))));
                $options = trim(substr($expression, strpos($expression, '[')));
                return "<?php echo \Menu::get($menu)->asUl($options) ?>";
            } else {
                return "<?php echo \Menu::get($expression)->asUl() ?>";
            }
        });

        Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->format(trans('admin.locale.datetime')) ?>";
        });

        Blade::directive('date', function ($expression) {
            return "<?php echo ($expression)->format(trans('admin.locale.date')) ?>";
        });

        Blade::directive('flag', function ($expression) {
            $word = $expression ? 'yes' : 'no';
            return "<?php echo trans('admin.words.$word') ?>";
        });

        Blade::directive('config', function ($expression) {
            $key = str_replace("'", '', $expression);
            return "<?php echo config($expression, 'Key $key not found') ?>";
        });

        Blade::if('permission', function ($environment) {
            if (auth('admin')->user()->super_user) {
                return true;
            }

            return auth('admin')->user()->can($environment);
        });

        Blade::if('module', function ($environment) {
            return config('modules.' . $environment . '.active');
        });

        Blade::if('hasconfig', function ($environment) {
            return config()->has($environment);
        });
    }

}
