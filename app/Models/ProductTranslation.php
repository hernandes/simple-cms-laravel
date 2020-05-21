<?php
namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Activitylog\Traits\LogsActivity;

class ProductTranslation extends Model
{
    use Sluggable, LogsActivity;

    protected $fillable = [
        'name', 'description'
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
