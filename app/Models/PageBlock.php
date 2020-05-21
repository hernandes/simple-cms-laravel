<?php
namespace App\Models;

use App\Support\FileUpload;
use App\Support\Filterable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class PageBlock extends Model implements Sortable, TranslatableContract
{
    use Translatable, Filterable, LogsActivity, SortableTrait, FileUpload;

    public $translatedAttributes = [
        'title', 'subtitle', 'body'
    ];

    protected static $logAttributes = ['*'];

    protected $sortable = [
        'order_column_name' => 'sequence',
        'sort_when_creating' => true
    ];

    protected $guarded = ['id'];

    protected $appends = ['image_url'];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function setKeyAttribute($key)
    {
        $this->attributes['key'] = strtolower($key);
    }

    public function getImageUrlAttribute()
    {
        return $this->fileUrl();
    }
}
