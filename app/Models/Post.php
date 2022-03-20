<?php
namespace App\Models;

use App\Support\Activated;
use App\Support\FileUpload;
use Carbon\Carbon;
use Conner\Tagging\Taggable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;

class Post extends Model
{
    use LogsActivity,
        Activated,
        FileUpload,
        Taggable,
        Sluggable,
        HasFactory;

    protected static $logAttributes = ['*'];

    protected $guarded = [
        'id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

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
