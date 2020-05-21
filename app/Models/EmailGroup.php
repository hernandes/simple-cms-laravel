<?php
namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;

class EmailGroup extends Model
{
    use LogsActivity;

    protected static $logAttributes = ['*'];

    protected $guarded = ['id'];

    public function recipients()
    {
        return $this->belongsToMany(EmailRecipient::class);
    }
}
