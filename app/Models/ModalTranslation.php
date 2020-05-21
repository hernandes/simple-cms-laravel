<?php
namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Activitylog\Traits\LogsActivity;

class ModalTranslation extends Model
{
    use LogsActivity;

    protected $fillable = [
        'title', 'body'
    ];

    protected static $logAttributes = ['*'];
}
