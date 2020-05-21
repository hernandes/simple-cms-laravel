<?php
namespace App\Models;

use App\Support\Filterable;
use Spatie\Activitylog\Traits\LogsActivity;

class EmailRecipient extends Model
{
    use LogsActivity, Filterable;

    protected static $logAttributes = ['*'];

    protected $fillable = [
        'name', 'email'
    ];

    protected $searchable = [
        'name', 'email'
    ];

    public function groups()
    {
        return $this->belongsToMany(EmailGroup::class);
    }
}
