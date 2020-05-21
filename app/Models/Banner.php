<?php
namespace App\Models;

use App\Support\Activated;
use App\Support\FileUpload;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Banner extends Model implements TranslatableContract, Sortable
{
    use Translatable, Activated, LogsActivity, SortableTrait, FileUpload;

    public $sortable = [
        'order_column_name' => 'sequence',
        'sort_when_creating' => true
    ];

    public $translatedAttributes  = [
        'phrases'
    ];

    protected static $logAttributes = ['*'];

    protected $guarded = ['id'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return $this->fileUrl('image');
    }
}
