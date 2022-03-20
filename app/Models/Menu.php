<?php
namespace App\Models;

use App\Support\Activated;
use App\Support\Filterable;
use Route;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Activitylog\Traits\LogsActivity;

class Menu extends Model
{
    use Filterable,
        LogsActivity,
        NodeTrait,
        Activated;

    protected static $logAttributes = ['*'];

    protected $guarded = ['id'];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function scopeToTreeList($query)
    {
        $nodes = $query->defaultOrder()
            ->get()
            ->toTree();

        $menus = [];
        $traverse = function ($categories, $prefix = '') use (&$traverse, &$menus) {
            foreach ($categories as $category) {
                $menus[$category->id] = $prefix . ' ' . $category->title;

                $traverse($category->children, $prefix . '--');
            }
        };

        $traverse($nodes);

        return $menus;
    }

    public function path()
    {
        $url = null;
        if (!empty($this->url)) {
            $url = $this->getRoutePrefix($this->url);
        } else if ($this->page) {
            $url = $this->getRoutePrefix($this->page->slug);
        } else if ($this->post) {
            $url = $this->getRoutePrefix($this->post->slug);
        }

        return $url;
    }

    private function getRoutePrefix($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return $url;
        }

        if (substr($url, 0, 1) !== '/') {
            $url = '/' . $url;
        }

        return $url;
    }

    public static function routes()
    {
        if (app()->runningInConsole()) return;

        static::activated()->whereNotNull('page_id')->each(function ($menu) {
            if ($menu->page->slug) {
                Route::get('/' . $menu->page->slug, 'PagesController@show')
                    ->name('pages.show')
                    ->defaults('slug', $menu->page->slug);
            }
        });

        static::activated()->whereNotNull('post_id')->each(function ($menu) {
            if ($menu->post->slug) {
                Route::get('/' . $menu->post->slug, 'PostsController@show')
                    ->name('posts.show')
                    ->defaults('slug', $menu->post->slug);
            }
        });
    }

    public static function sitemap($instance)
    {
        if (config('modules.pages.active')) {
            static::activated()->whereNotNull('page_id')->each(function ($menu) use ($instance) {
                $translates = $menu->page->getTranslationsArray();
                $languages = [];
                foreach ($translates as $locale => $page) {
                    if ($locale !== app()->getLocale()) {
                        $languages[] = [
                            'language' => $locale,
                            'url' => url($page['slug'])
                        ];
                    }
                }
                $instance->add(url($menu->page->slug), $menu->page->updated_at, '0.8', 'weekly', [], null, $languages);
            });
        }

        if (config('modules.posts.active')) {
            static::activated()->whereNotNull('post_id')->each(function ($menu) use ($instance) {
                $translates = $menu->post->getTranslationsArray();
                $languages = [];
                foreach ($translates as $locale => $post) {
                    if ($locale !== app()->getLocale()) {
                        $languages[] = [
                            'language' => $locale,
                            'url' => url($post['slug'])
                        ];
                    }
                }
                $instance->add(url($menu->post->slug), $menu->post->updated_at, '0.8', 'weekly', [], null, $languages);
            });
        }

        static::activated()->whereNull('page_id')->whereNull('post_id')->each(function ($menu) use ($instance) {
            if (!empty($menu->url) && $menu->url !== '#') {
                $translates = $menu->getTranslationsArray();
                $languages = [];
                foreach ($translates as $locale => $url) {
                    if ($locale !== app()->getLocale()) {
                        $languages[] = [
                            'language' => $locale,
                            'url' => url($url['url'])
                        ];
                    }
                }
                $instance->add(url($menu->url), $menu->updated_at, '0.8', 'weekly', [], null, $languages);
            }
        });
    }

}
