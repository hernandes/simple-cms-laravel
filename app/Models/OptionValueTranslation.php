<?php
namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;

class OptionValueTranslation extends Model
{
    use LogsActivity;

    protected $fillable = [
        'label'
    ];

    protected static $logAttributes = ['*'];
}
