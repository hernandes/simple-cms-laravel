<?php
namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;

class TestimonialTranslation extends Model
{
    use LogsActivity;

    protected static $logAttributes = ['*'];

    protected $fillable = [
        'body'
    ];

}
