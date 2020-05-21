<?php
namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;

class SeoTranslation extends Model
{
    use LogsActivity;

    protected $fillable = [
        'title', 'description', 'keywords'
    ];

    protected static $logAttributes = ['*'];
}
