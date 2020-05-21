<?php
namespace App\Models;

use App\Support\Activated;
use Spatie\Activitylog\Traits\LogsActivity;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class PostCategory extends Model implements TranslatableContract, Sortable
{
    use Translatable, LogsActivity, SortableTrait, Activated;

    public $sortable = [
        'order_column_name' => 'sequence',
        'sort_when_creating' => true
    ];

    public $translatedAttributes = [
        'name', 'slug'
    ];

    protected static $logAttributes = ['*'];

    protected $guarded = ['id'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
