<?php
namespace App\Models;

use App\Support\Activated;
use App\Support\FileUpload;
use Carbon\Carbon;
use Spatie\Activitylog\Traits\LogsActivity;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Modal extends Model implements TranslatableContract
{
    use Translatable, LogsActivity, Activated, FileUpload;

    public $translatedAttributes = [
        'title', 'body'
    ];

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
