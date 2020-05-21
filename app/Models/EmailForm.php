<?php
namespace App\Models;

use App\Support\Filterable;
use Spatie\Activitylog\Traits\LogsActivity;

class EmailForm extends Model
{
    use LogsActivity, Filterable;

    protected static $logAttributes = ['*'];

    protected $guarded = ['id'];

    protected $searchable = [
        'name', 'email'
    ];

    protected $casts = [
        'data' => 'json',
        'attachments' => 'array'
    ];

    public function group()
    {
        return $this->belongsTo(EmailGroup::class, 'email_group_id');
    }
}
