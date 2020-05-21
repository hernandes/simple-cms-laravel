<?php
namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;

class FaqTranslation extends Model
{
    use LogsActivity;

    protected static $logAttributes = ['*'];

    protected $fillable = [
        'question', 'answer'
    ];
}
