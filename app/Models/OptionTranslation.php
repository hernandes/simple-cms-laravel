<?php
namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;

class OptionTranslation extends Model
{
    use LogsActivity;

    protected $fillable = [
        'name'
    ];

    protected static $logAttributes = ['*'];
}
