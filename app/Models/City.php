<?php
namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;

class City extends Model
{
    use LogsActivity;

    protected $guarded = ['id'];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
