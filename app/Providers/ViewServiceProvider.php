<?php
namespace App\Providers;

use App\Models\Modal;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{

    public function boot()
    {
        view()->composer('web.layouts.app', function ($view) {
            $modal = Modal::activated()->first();

            $view->with('modal', $modal);
        });
    }
}
