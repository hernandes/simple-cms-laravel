<?php
namespace App\Models;

use App\Support\Activated;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Faq extends Model implements TranslatableContract, Sortable
{
    use Translatable, Activated, LogsActivity, SortableTrait;

    public $sortable = [
        'order_column_name' => 'sequence',
        'sort_when_creating' => true
    ];

    public $translatedAttributes  = [
        'question', 'answer'
    ];

    protected static $logAttributes = ['*'];

    protected $guarded = ['id'];
}
