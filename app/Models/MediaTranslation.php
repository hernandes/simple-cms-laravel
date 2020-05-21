<?php
namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;

class MediaTranslation extends Model
{
    use LogsActivity;

    protected $fillable = [
        'title', 'subtitle', 'body'
    ];

    protected static $logAttributes = ['*'];
}
