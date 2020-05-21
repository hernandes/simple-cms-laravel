<?php
namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;

class State extends Model
{
    use LogsActivity;

    protected $guarded = ['id'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
