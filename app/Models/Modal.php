<?php
namespace App\Models;

use App\Support\Activated;
use App\Support\FileUpload;
use Spatie\Activitylog\Traits\LogsActivity;

class Modal extends Model
{
    use LogsActivity, Activated, FileUpload;

    protected static $logAttributes = ['*'];

    protected $guarded = [
        'id'
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return $this->fileUrl();
    }
}
