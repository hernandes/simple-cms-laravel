<?php
namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;

class Option extends Model
{
    use LogsActivity;

    protected static $logAttributes = ['*'];

    protected $guarded = [
        'id'
    ];

    public function values()
    {
        return $this->hasMany(OptionValue::class);
    }
}
