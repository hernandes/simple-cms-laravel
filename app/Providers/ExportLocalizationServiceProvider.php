<?php
namespace App\Providers;

use ExportLocalization;
use Illuminate\Support\ServiceProvider;

class ExportLocalizationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer(['admin.layouts.app', 'admin.layouts.auth'], function ($view) {
            return $view->with([
                'messages' => ExportLocalization::export()->toFlat(),
            ]);
        });
    }
}
