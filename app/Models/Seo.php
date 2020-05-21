<?php
namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Seo extends Model implements TranslatableContract
{
    use Translatable, LogsActivity;

    protected $table = 'seo';

    public $translatedAttributes = [
        'title', 'description', 'keywords'
    ];

    protected static $logAttributes = ['*'];

    protected $guarded = ['id'];
}
