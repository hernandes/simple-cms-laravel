<?php
namespace App\Models;

use App\Support\Activated;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Faq extends Model implements Sortable
{
    use Activated, LogsActivity, SortableTrait;

    public $sortable = [
        'order_column_name' => 'sequence',
        'sort_when_creating' => true
    ];

    protected static $logAttributes = ['*'];

    protected $guarded = ['id'];
}
