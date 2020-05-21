<?php
namespace App\Models;

use App\Support\Activated;
use App\Support\Featured;
use App\Support\FileUpload;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Activitylog\Traits\LogsActivity;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class ProductCategory extends Model implements TranslatableContract
{
    use Translatable, LogsActivity, Activated, NodeTrait, FileUpload, Featured;

    public $translatedAttributes = [
        'name', 'slug', 'description'
    ];

    protected static $logAttributes = ['*'];

    protected $guarded = [
        'id'
    ];

    protected $appends = ['image_url'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->fileUrl();
    }

    public function scopeToTreeList($query)
    {
        $nodes = $query->defaultOrder()
            ->get()
            ->toTree();

        $menus = [];
        $traverse = function ($categories, $prefix = '') use (&$traverse, &$menus) {
            foreach ($categories as $category) {
                $menus[$category->id] = $prefix . ' ' . $category->name;

                $traverse($category->children, $prefix . '--');
            }
        };

        $traverse($nodes);

        return $menus;
    }
}
