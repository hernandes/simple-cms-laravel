<?php

namespace App\Providers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{

    protected $namespace = 'App\Http\Controllers';

    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapAdminRoutes();
    }

    protected function mapWebRoutes()
    {
        $locale = Request::segment(1);
        if (!config('app.translatable') || !array_key_exists($locale, config('translatable.locales'))) {
            $locale = '';
        }

        Route::middleware('web')
             ->namespace($this->namespace . '\Web')
             ->name('web.')
             ->prefix($locale)
             ->group(base_path('routes/web.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    protected function mapAdminRoutes()
    {
        $locale = Request::segment(2);
        if (!config('app.translatable') || !array_key_exists($locale, config('translatable.locales'))) {
            $locale = null;
        }

        Route::prefix('admin' . ($locale ? '/' . $locale : ''))
            ->middleware('web')
            ->name('admin.')
            ->namespace($this->namespace . '\Admin')
            ->group(base_path('routes/admin.php'));
    }
}
