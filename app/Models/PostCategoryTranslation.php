<?php
namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Activitylog\Traits\LogsActivity;

class PostCategoryTranslation extends Model
{
    use Sluggable, LogsActivity;

    protected $fillable = [
        'name', 'slug'
    ];

    protected static $logAttributes = ['*'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
