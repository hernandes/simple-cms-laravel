<?php
namespace App\Models;

use App\Support\FileUpload;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Media extends Model implements Sortable
{
    use LogsActivity, SortableTrait, FileUpload;

    protected $table = 'medias';

    protected static $logAttributes = ['*'];

    protected $guarded = ['id'];

    protected $appends = [
        'file_url', 'thumb'
    ];

    protected $sortable = [
        'order_column_name' => 'sequence',
        'sort_when_creating' => true
    ];

    public function getFileUrlAttribute()
    {
        return $this->fileUrl('file');
    }

    public function getThumbAttribute()
    {
        if ($this->type === 'image') {
            return $this->fileUrl('file');
        } else {
            return 'https://i.ytimg.com/vi/' . $this->file . '/hqdefault.jpg';
        }
    }
}
