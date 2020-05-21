<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $locale = $request->segment(1);
        if ($locale === 'admin') {
            $locale = $request->segment(2);
        }

        if (array_key_exists($locale, config('translatable.locales'))) {
            app()->setLocale($locale);
        }
    }
}
