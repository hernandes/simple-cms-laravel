<?php
namespace App\Models;

use App\Support\Activated;
use App\Support\FileUpload;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Partner extends Model implements Sortable
{
    use LogsActivity, SortableTrait, Activated, FileUpload;

    protected $table = 'partners';

    protected static $logAttributes = ['*'];

    protected $fillable = [
        'active', 'sequence', 'name', 'type', 'logo', 'site_url'
    ];

    protected $appends = [
        'page_url'
    ];

    protected $sortable = [
        'order_column_name' => 'sequence',
        'sort_when_creating' => true
    ];

    public function getLogoUrlAttribute()
    {
        return $this->fileUrl('logo');
    }
}
