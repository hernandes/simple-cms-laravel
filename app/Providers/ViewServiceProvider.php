<?php
namespace App\Providers;

use App\Models\Modal;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{

    public function boot()
    {
        view()->composer('web.layouts.app', function ($view) {
            $modal = Modal::activated()->first();

            $view->with('modal', $modal);
        });

        view()->composer('web.partials.business', function ($view) {
            $pages = Page::activated()->where('key', 'like', 'business_%')->get();
            $page = Page::where('key', 'business')->first();

            $view->with('page', $page)
                ->with('pages', $pages);
        });

        view()->composer('web.partials.info', function ($view) {
            $page = Page::where('key', 'info')->first();

            $view->with('page', $page);
        });

        view()->composer('web.partials.posts', function ($view) {
            $page = Page::where('key', 'posts')->first();
            $posts = Post::latest()->take(3)->get();

            $view->with('page', $page)
                ->with('posts', $posts);
        });
    }
}
