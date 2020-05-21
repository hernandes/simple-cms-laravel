<?php
namespace App\Models;

use App\Support\Activated;
use App\Support\FileUpload;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Spatie\Activitylog\Traits\LogsActivity;

class Testimonial extends Model implements TranslatableContract
{
    use Translatable, LogsActivity, Activated, FileUpload;

    public $translatedAttributes = [
        'body'
    ];

    protected static $logAttributes = ['*'];

    protected $guarded = ['id'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return $this->fileUrl();
    }
}
