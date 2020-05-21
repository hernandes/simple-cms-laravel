<?php
namespace App\Models;

use App\Support\Activated;
use App\Support\Featured;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Route;
use Spatie\Activitylog\Traits\LogsActivity;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;

class Page extends Model implements TranslatableContract
{
    use Translatable, LogsActivity, Activated, Featured;

    private $_blocks = null;
    private $_medias = null;

    public $translatedAttributes  = [
        'title', 'slug', 'body'
    ];

    protected static $logAttributes = ['*'];

    protected $guarded = ['id'];

    public function blocks()
    {
        return $this->hasMany(PageBlock::class)->ordered();
    }

    public function medias()
    {
        return $this->morphMany(Media::class, 'model')->ordered();
    }

    public function seo()
    {
        return $this->morphOne(Seo::class, 'model');
    }

    public function setKeyAttribute($key)
    {
        $this->attributes['key'] = strtolower($key);
    }

    public function updateOrCreateSeo($data)
    {
        if ($this->seo) {
            $this->seo->update($data);
        } else {
            $this->seo()->create($data);
        }
    }

    public function configSeo()
    {
        if (!empty($this->seo->title)) {
            SEOTools::setTitle($this->seo->title);
        }
        if (!empty($this->seo->description)) {
            SEOTools::setDescription($this->seo->description);
        }
        if (!empty($this->seo->keywords)) {
            SEOMeta::setKeywords(explode(',', $this->seo->keywords));
        }
    }

    public function block($block)
    {
        $blocks = $this->getBlocks();

        if (strpos($block, '*') !== false) {
            $index = strpos($block, '*');
            $text = substr($block, 0, $index);

            $result = [];
            foreach ($blocks as $b) {
                $search = substr($b->key, 0, $index);
                if ($search === $text) {
                    $result[] = $b;
                }
            }

            return collect($result)->sortBy('sequence');
        }

        return optional($blocks[$block] ?? null);
    }

    public function media($media)
    {
        $medias = $this->getMedias();
        return optional($medias[$media] ?? null);
    }

    public static function routes()
    {
        if (app()->runningInConsole()) return;

        static::activated()->featured()->each(function ($page) {
            Route::get('/' . $page->slug, 'PagesController@show')
                ->name('pages.show')
                ->defaults('slug', $page->slug);
        });
    }

    private function getBlocks()
    {
        if ($this->_blocks === null) {
            $this->_blocks = [];
            foreach ($this->blocks as $block) {
                $this->_blocks[$block->key] = $block;
            }
        }

        return $this->_blocks;
    }

    private function getMedias()
    {
        if ($this->_medias === null) {
            $this->_medias = [];
            foreach ($this->medias as $media) {
                $this->_medias[$media->key] = $media;
            }
        }

        return $this->_medias;
    }
}
