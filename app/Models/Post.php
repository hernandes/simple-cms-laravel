<?php
namespace App\Models;

use App\Support\Activated;
use App\Support\FileUpload;
use Carbon\Carbon;
use Conner\Tagging\Taggable;
use Spatie\Activitylog\Traits\LogsActivity;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Post extends Model implements TranslatableContract
{
    use Translatable, LogsActivity, Activated, FileUpload, Taggable;

    public $translatedAttributes = [
        'title', 'slug', 'summary', 'body'
    ];

    protected static $logAttributes = ['*'];

    protected $guarded = [
        'id'
    ];

    protected $appends = ['image_url'];

    public function categories()
    {
        return $this->belongsToMany(PostCategory::class);
    }

    public function setPublishedAtAttribute($value)
    {
        if ($value instanceof \DateTime) {
            $this->attributes['published_at'] = $value;
        } else {
            $this->attributes['published_at'] = Carbon::createFromFormat(trans('admin.locale.datetime'), $value ?? 'now')->format('Y-m-d H:i:s');
        }
    }

    public function getPublishedAtAttribute($value)
    {
        return new \DateTime($value ?? 'now');
    }

    public function getImageUrlAttribute()
    {
        return $this->fileUrl();
    }
}
