<?php
namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (!app()->runningInConsole()) {
            $settings = Setting::all();
            foreach ($settings as $setting) {
                config()->set('settings.' . $setting->key, $setting->value);
            }
        }
    }
}
