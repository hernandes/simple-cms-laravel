<?php
namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Option extends Model implements TranslatableContract
{
    use Translatable, LogsActivity;

    public $translatedAttributes = [
        'name'
    ];

    protected static $logAttributes = ['*'];

    protected $guarded = [
        'id'
    ];

    public function values()
    {
        return $this->hasMany(OptionValue::class);
    }
}
