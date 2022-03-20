<?php
namespace App\Models;

use App\Support\Activated;
use App\Support\FileUpload;;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Banner extends Model implements Sortable
{
    use Activated,
        LogsActivity,
        SortableTrait,
        FileUpload;

    public $sortable = [
        'order_column_name' => 'sequence',
        'sort_when_creating' => true
    ];

    protected static $logAttributes = ['*'];

    protected $guarded = ['id'];

    protected $casts = [
        'phrases' => 'array'
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return $this->fileUrl('image');
    }
}
