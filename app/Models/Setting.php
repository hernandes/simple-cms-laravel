<?php
namespace App\Models;

use App\Support\Filterable;
use Spatie\Activitylog\Traits\LogsActivity;

class Setting extends Model
{
    use LogsActivity, Filterable;

    protected static $logAttributes = ['*'];

    public $fillable = [
        'key', 'value', 'type', 'description'
    ];

    public function setKeyAttribute($key)
    {
        $this->attributes['key'] = strtolower($key);
    }
}
