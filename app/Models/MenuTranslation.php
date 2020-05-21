<?php
namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;

class MenuTranslation extends Model
{
    use LogsActivity;

    protected static $logAttributes = ['*'];

    protected $fillable = [
        'title', 'url'
    ];

}
