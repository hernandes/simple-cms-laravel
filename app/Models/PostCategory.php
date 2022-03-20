<?php
namespace App\Models;

use App\Support\Activated;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class PostCategory extends Model implements Sortable
{
    use LogsActivity, SortableTrait, Activated;

    public $sortable = [
        'order_column_name' => 'sequence',
        'sort_when_creating' => true
    ];

    protected static $logAttributes = ['*'];

    protected $guarded = ['id'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
