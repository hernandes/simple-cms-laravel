<?php
namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Activitylog\Traits\LogsActivity;

class PostTranslation extends Model
{
    use Sluggable, LogsActivity;

    protected $fillable = [
        'title', 'slug', 'summary', 'body'
    ];

    protected static $logAttributes = ['*'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
