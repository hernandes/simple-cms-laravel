<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use KgBot\LaravelLocalization\Facades\ExportLocalizations;

class ExportLocalizationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer(['admin.layouts.app', 'admin.layouts.auth'], function ($view) {
            return $view->with([
                'messages' => ExportLocalizations::export()->toFlat(),
            ]);
        });
    }
}
