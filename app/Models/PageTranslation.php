<?php
namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Activitylog\Traits\LogsActivity;

class PageTranslation extends Model
{
    use Sluggable, LogsActivity;

    protected static $logAttributes = ['*'];

    protected $fillable = [
        'title', 'slug', 'body'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
