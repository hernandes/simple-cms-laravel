<?php
namespace App\Models;

use App\Support\Activated;
use App\Support\Featured;
use Spatie\Activitylog\Traits\LogsActivity;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class OptionValue extends Model implements TranslatableContract
{
    use Translatable, LogsActivity, Activated, Featured;

    public $translatedAttributes = [
        'label'
    ];

    protected static $logAttributes = ['*'];

    protected $guarded = [
        'id'
    ];

    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
