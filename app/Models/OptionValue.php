<?php
namespace App\Models;

use App\Support\Activated;
use App\Support\Featured;
use Spatie\Activitylog\Traits\LogsActivity;

class OptionValue extends Model
{
    use LogsActivity, Activated, Featured;

    protected static $logAttributes = ['*'];

    protected $guarded = [
        'id'
    ];

    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
